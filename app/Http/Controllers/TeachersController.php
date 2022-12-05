<?php

namespace App\Http\Controllers;

use App\Course_enrollment;
use App\Student_course_assignment;
use App\Student_course_quiz_answer;
use App\Student_package_assignment;
use App\Student_package_quiz_answer;
use App\Teachers_commission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course_primary_category;
use App\ Course_secondary_category;
use App\Course_sub_category;
use App\Institution_type;
use App\Course;
use App\Course_cost;
use App\Course_lesson;
use App\Course_package;
use App\Course_package_cost;
use App\Course_package_lesson;
use App\Course_batch;
use App\Course_package_batch;
use App\Course_batch_student_mapping;
use App\Course_package_batch_student_mapping;
use App\Pdf_library;
use App\Video_library;
use App\Free_quiz_setting;
use App\Free_quiz;
use App\Course_quiz_setting;
use App\Course_quiz_question;
use App\Course_assignment;
use App\Package_quiz_setting;
use App\Package_quiz_question;
use App\Package_assignment;
use App\Student_result;
use App\Payment;
use App\Referral_agent;
use App\Referred_student;
use App\User;
use App\Personal_information;
use Spatie\Permission\Models\Role;
use DB;
use Image;
use File;

class TeachersController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:pending-teacher-list', ['only' => ['pending_teacher_list']]);
        $this->middleware('permission:teacher-list', ['only' => ['teacher_list']]);
        $this->middleware('permission:suspended-teacher-list', ['only' => ['suspended_teacher_list']]);
    }

    public function pending_teacher_list()
    {
        $data = User::with('personal_information')->whereHas("roles", function($q){ $q->where("name", "Teacher"); })->where('is_active',0)->orderBy('id','DESC')->get();
        return view('backend.teachers.pending_teachers_list',compact('data'));
    }

    public function teacher_list(){
        $data = User::with('personal_information')->whereHas("roles", function($q){ $q->where("name", "Teacher"); })->where('is_active',1)->orderBy('id','DESC')->get();
        return view('backend.teachers.teachers_list',compact('data'));
    }

    public function teachers_course_commission(Request $request){
        $id = $request->input('id');
        $data = Teachers_commission::where('user_id',$id)->first();
        return view('backend.teachers.teachers_course_commission',compact('data','id'));
    }

    public function store_teachers_course_commission(Request $request){
        $teacher_id = $request->input('teacher_id');
        $id = $request->input('commission_id');
        $teachers_commission = Teachers_commission::where('user_id',$teacher_id)->first();
        if(!empty($teachers_commission)){
            $data = array(
                'commission_rate' => $request->input('commission_rate'),
            );
            $commission = Teachers_commission::find($id);
            $commission->update($data);

            return back()
                ->with('toast_success','Teachers Commission Updated successfully');
        }else{
            $data = array(
                'user_id' => $teacher_id,
                'commission_rate' => $request->input('commission_rate'),
            );
            Teachers_commission::create($data);

            return back()
                ->with('toast_success','Teachers Commission Updated successfully');
        }
    }

    public function suspended_teacher_list(){
        $data = User::with('personal_information')->whereHas("roles", function($q){ $q->where("name", "Teacher"); })->where('is_active',2)->orderBy('id','DESC')->get();
        return view('backend.teachers.suspended_teacher_list',compact('data'));
    }

    public function course_list(){
        $data = Course::where([['status',1],['user_id',auth()->user()->id]])->orderBy('id','DESC')->get();
        return view('backend.teachers.course_list',compact('data'));
    }

    public function course_create(){
        $primary_cat = Course_primary_category::all();
        $institution = Institution_type::all();
        $ckeditor = 'ckeditor_config.js';
        return view('backend.teachers.course_create',compact('primary_cat','institution','ckeditor'));
    }

    public function ajax_secondaryCat(Request $request){
        $parent_id = $request->priCat_id;
        $secondaryCategories = DB::table('course_secondary_categories')->where('course_primary_category_id',$parent_id)->pluck("secondary_category_name","id");
        return json_encode($secondaryCategories);
    }

    public function ajax_subCat(Request $request){
        $parent_id = $request->secCat_id;
        $subCategories = DB::table('course_sub_categories')->where('course_secondary_category_id',$parent_id)->pluck("sub_category_name","id");
        return json_encode($subCategories);
    }

    public function course_store(Request $request){
        if($request->hasFile('course_image')){
            $image = $request->file('course_image');
            $extension = $image->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $destinationPath = public_path('/uploads/course-photo/thumbnail');
            $publicPath = 'public/uploads/course-photo/thumbnail/';
            $img = Image::make($image->path());
            $img->resize(800, 425, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);
            $image->move(public_path('uploads/course-photo'), $fileName);
            File::delete(public_path('uploads/course-photo/'.$fileName));

            $data = array(
                'course_title' => $request->input('course_title'),
                'course_sub_title' => $request->input('course_sub_title'),
                'course_sub_category_id' => $request->input('course_sub_category_id'),
                'institution_type_id' => $request->input('institution_type_id'),
                'course_details' => $request->input('course_details'),
                'course_requirement' => $request->input('course_requirement'),
                'course_component' => $request->input('course_component'),
                'course_benefit' => $request->input('course_benefit'),
                'course_content' => $request->input('course_content'),
                'course_duration' => $request->input('course_duration'),
                'course_image' => $publicPath.$fileName,
                'user_id' => auth()->user()->id,
            );

            Course::create($data);

            return redirect('courseList')
                ->with('toast_success','Course Created successfully');
        }else{
            return back()
                ->with('toast_success','Image Upload Problem.');
        }
    }

    public function course_cost_list(Request $request){
        $course_id = $request->input('id');
        $data = Course_cost::where('course_id',$course_id)->orderBy('id','DESC')->get();
        return view('backend.teachers.course_cost_list',compact('data','course_id'));
    }

    public function add_course_cost(Request $request){
        $course_id = $request->input('id');
        return view('backend.teachers.add_course_cost',compact('course_id'));
    }

    public function store_course_cost(Request $request){
        $course_fee = $request->input('course_fee');
        $course_discount_rate = $request->input('course_discount_rate');
        $discounted_course_fee = $course_fee - (($course_fee * $course_discount_rate) / 100);
        if(!empty($request->input('course_registration_last_date'))){
            $registration_last_date = date('Y-m-d',strtotime($request->input('course_registration_last_date')));
        }else{
            $registration_last_date = '';
        }
        if(!empty($request->input('course_start_date'))){
            $course_start_date = date('Y-m-d',strtotime($request->input('course_start_date')));
        }else{
            $course_start_date = '';
        }
        $data = array(
            'course_fee' => $course_fee,
            'course_discount_rate' => $course_discount_rate,
            'course_discounted_cost' => $discounted_course_fee,
            'course_registration_last_date' => $registration_last_date,
            'course_start_date' => $course_start_date,
            'course_id' => $request->input('course_id'),
        );

        Course_cost::create($data);

        return back()
            ->with('toast_success','Course Cost Created successfully');
    }

    public function edit_course_cost(Request $request){
        $course_cost_id = $request->input('id');
        $data = Course_cost::find($course_cost_id);
        return view('backend.teachers.edit_course_cost',compact('data'));
    }

    public function update_course_cost(Request $request,$id){
        $course_fee = $request->input('course_fee');
        $course_discount_rate = $request->input('course_discount_rate');
        $discounted_course_fee = $course_fee - (($course_fee * $course_discount_rate) / 100);
        if(!empty($request->input('course_registration_last_date'))){
            $registration_last_date = date('Y-m-d',strtotime($request->input('course_registration_last_date')));
        }else{
            $registration_last_date = '';
        }
        if(!empty($request->input('course_start_date'))){
            $course_start_date = date('Y-m-d',strtotime($request->input('course_start_date')));
        }else{
            $course_start_date = '';
        }
        $data = array(
            'course_fee' => $course_fee,
            'course_discount_rate' => $course_discount_rate,
            'course_discounted_cost' => $discounted_course_fee,
            'course_registration_last_date' => $registration_last_date,
            'course_start_date' => $course_start_date,
        );

        $cost = Course_cost::find($id);
        $cost->update($data);

        return back()
            ->with('toast_success','Course Cost Updated successfully');
    }

    public function course_details($id){
        $id = decrypt($id);
        $data = Course::find($id);
        $enrollment = Course_enrollment::where([['course_id',$id],['type','course'],['is_payment',1],['status',1]])->get();
        return view('backend.teachers.course_details',compact('data','enrollment'));
    }

    public function edit_course($id){
        $id = decrypt($id);
        $data = Course::find($id);
        $primary_cat = Course_primary_category::all();
        $institution = Institution_type::all();
        $ckeditor = 'ckeditor_config.js';
        $sec_cat = Course_secondary_category::where('course_primary_category_id',$data->course_sub_category->course_secondary_category->course_primary_category->id)->get();
        $sub_cat = Course_sub_category::where('course_secondary_category_id',$data->course_sub_category->course_secondary_category->id)->get();
        return view('backend.teachers.edit_course',compact('data','primary_cat','institution','ckeditor','sec_cat','sub_cat'));
    }

    public function update_course(Request $request,$id){
        if($request->hasFile('course_image')){
            $image = $request->file('course_image');
            $extension = $image->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $destinationPath = public_path('/uploads/course-photo/thumbnail');
            $publicPath = 'public/uploads/course-photo/thumbnail/';
            $img = Image::make($image->path());
            $img->resize(800, 425, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);
            $image->move(public_path('uploads/course-photo'), $fileName);
            File::delete(public_path('uploads/course-photo/'.$fileName));

            $data = array(
                'course_title' => $request->input('course_title'),
                'course_sub_title' => $request->input('course_sub_title'),
                'course_sub_category_id' => $request->input('course_sub_category_id'),
                'institution_type_id' => $request->input('institution_type_id'),
                'course_details' => $request->input('course_details'),
                'course_requirement' => $request->input('course_requirement'),
                'course_component' => $request->input('course_component'),
                'course_benefit' => $request->input('course_benefit'),
                'course_content' => $request->input('course_content'),
                'course_duration' => $request->input('course_duration'),
                'course_image' => $publicPath.$fileName,
            );

            $course = Course::find($id);
            $course->update($data);

            return redirect('courseList')
                ->with('toast_success','Course Updated successfully');
        }else{
            $data = array(
                'course_title' => $request->input('course_title'),
                'course_sub_title' => $request->input('course_sub_title'),
                'course_sub_category_id' => $request->input('course_sub_category_id'),
                'institution_type_id' => $request->input('institution_type_id'),
                'course_details' => $request->input('course_details'),
                'course_requirement' => $request->input('course_requirement'),
                'course_component' => $request->input('course_component'),
                'course_benefit' => $request->input('course_benefit'),
                'course_content' => $request->input('course_content'),
                'course_duration' => $request->input('course_duration'),
            );

            $course = Course::find($id);
            $course->update($data);

            return redirect('courseList')
                ->with('toast_success','Course Updated successfully');
        }
    }

    public function course_lesson_list(Request $request){
        $course_id = $request->input('id');
        $data = Course_lesson::where('course_id',$course_id)->orderBy('id','DESC')->get();
        return view('backend.teachers.course_lesson_list',compact('data','course_id'));
    }

    public function add_course_lesson(Request $request){
        $course_id = $request->input('id');
        return view('backend.teachers.add_course_lesson',compact('course_id'));
    }

    public function store_course_lesson(Request $request){
        $lesson_title = $request->input('lesson_title');
        $lesson_description = $request->input('lesson_description');
        $lesson_duration = $request->input('lesson_duration');
        if(!empty($request->input('lesson_start_date'))){
            $lesson_start_date = date('Y-m-d',strtotime($request->input('lesson_start_date')));
        }else{
            $lesson_start_date = '';
        }
        $data = array(
            'lesson_title' => $lesson_title,
            'lesson_description' => $lesson_description,
            'lesson_duration' => $lesson_duration,
            'lesson_start_date' => $lesson_start_date,
            'course_id' => $request->input('course_id'),
        );

        Course_lesson::create($data);

        return back()
            ->with('toast_success','Course Lesson Created successfully');
    }

    public function edit_course_lesson(Request $request){
        $course_lesson_id = $request->input('id');
        $data = Course_lesson::find($course_lesson_id);
        return view('backend.teachers.edit_course_lesson',compact('data'));
    }

    public function update_course_lesson(Request $request,$id){
        $lesson_title = $request->input('lesson_title');
        $lesson_description = $request->input('lesson_description');
        $lesson_duration = $request->input('lesson_duration');
        if(!empty($request->input('lesson_start_date'))){
            $lesson_start_date = date('Y-m-d',strtotime($request->input('lesson_start_date')));
        }else{
            $lesson_start_date = '';
        }
        $data = array(
            'lesson_title' => $lesson_title,
            'lesson_description' => $lesson_description,
            'lesson_duration' => $lesson_duration,
            'lesson_start_date' => $lesson_start_date,
        );

        $lesson = Course_lesson::find($id);
        $lesson->update($data);

        return back()
            ->with('toast_success','Course Lesson Updated successfully');
    }

    public function course_package_list(){
        $subCat = Course_sub_category::all();
        $data = Course_package::where([['status',1],['user_id',auth()->user()->id]])->orderBy('id','DESC')->get();
        return view('backend.teachers.course_package_list',compact('data','subCat'));
    }

    public function course_package_create(){
        $primary_cat = Course_primary_category::all();
        $institution = Institution_type::all();
        $ckeditor = 'ckeditor_config.js';
        return view('backend.teachers.course_package_create',compact('primary_cat','institution','ckeditor'));
    }

    public function course_package_store(Request $request){
        if($request->hasFile('package_image')){
            $image = $request->file('package_image');
            $extension = $image->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $destinationPath = public_path('/uploads/course-photo/thumbnail');
            $publicPath = 'public/uploads/course-photo/thumbnail/';
            $img = Image::make($image->path());
            $img->resize(800, 425, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);
            $image->move(public_path('uploads/course-photo'), $fileName);
            File::delete(public_path('uploads/course-photo/'.$fileName));

            $data = array(
                'package_title' => $request->input('package_title'),
                'package_subtitle' => $request->input('package_sub_title'),
                'package_sub_category_id' => $request->input('package_sub_category_id'),
                'institution_type_id' => $request->input('institution_type_id'),
                'package_details' => $request->input('package_details'),
                'package_requirements' => $request->input('package_requirement'),
                'package_component' => $request->input('package_component'),
                'package_benefit' => $request->input('package_benefit'),
                'package_content' => $request->input('package_content'),
                'package_duration' => $request->input('package_duration'),
                'package_image' => $publicPath.$fileName,
                'user_id' => auth()->user()->id,
            );

            Course_package::create($data);

            return redirect('coursePackageList')
                ->with('toast_success','Course Package Created successfully');
        }else{
            return back()
                ->with('toast_success','Image Upload Problem.');
        }
    }

    public function course_package_cost_list(Request $request){
        $package_id = $request->input('id');
        $data = Course_package_cost::where('course_package_id',$package_id)->orderBy('id','DESC')->get();
        return view('backend.teachers.course_package_cost_list',compact('data','package_id'));
    }

    public function add_course_package_cost(Request $request){
        $package_id = $request->input('id');
        return view('backend.teachers.add_course_package_cost',compact('package_id'));
    }

    public function store_course_package_cost(Request $request){
        $package_fee = $request->input('package_fee');
        $package_discount_rate = $request->input('package_discount_rate');
        $discounted_package_fee = $package_fee - (($package_fee * $package_discount_rate) / 100);
        if(!empty($request->input('package_registration_last_date'))){
            $registration_last_date = date('Y-m-d',strtotime($request->input('package_registration_last_date')));
        }else{
            $registration_last_date = '';
        }
        if(!empty($request->input('package_start_date'))){
            $package_start_date = date('Y-m-d',strtotime($request->input('package_start_date')));
        }else{
            $package_start_date = '';
        }
        $data = array(
            'package_fee' => $package_fee,
            'package_discount_rate' => $package_discount_rate,
            'package_discounted_cost' => $discounted_package_fee,
            'package_registration_last_date' => $registration_last_date,
            'package_start_date' => $package_start_date,
            'course_package_id' => $request->input('package_id'),
        );

        Course_package_cost::create($data);

        return back()
            ->with('toast_success','Course Package Cost Created successfully');
    }

    public function edit_course_package_cost(Request $request){
        $package_cost_id = $request->input('id');
        $data = Course_package_cost::find($package_cost_id);
        return view('backend.teachers.edit_course_package_cost',compact('data'));
    }

    public function update_course_package_cost(Request $request,$id){
        $package_fee = $request->input('package_fee');
        $package_discount_rate = $request->input('package_discount_rate');
        $discounted_package_fee = $package_fee - (($package_fee * $package_discount_rate) / 100);
        if(!empty($request->input('package_registration_last_date'))){
            $registration_last_date = date('Y-m-d',strtotime($request->input('package_registration_last_date')));
        }else{
            $registration_last_date = '';
        }
        if(!empty($request->input('package_start_date'))){
            $package_start_date = date('Y-m-d',strtotime($request->input('package_start_date')));
        }else{
            $package_start_date = '';
        }
        $data = array(
            'package_fee' => $package_fee,
            'package_discount_rate' => $package_discount_rate,
            'package_discounted_cost' => $discounted_package_fee,
            'package_registration_last_date' => $registration_last_date,
            'package_start_date' => $package_start_date,
        );

        $cost = Course_package_cost::find($id);
        $cost->update($data);

        return back()
            ->with('toast_success','Course Package Cost Updated successfully');
    }

    public function course_package_details($id){
        $id = decrypt($id);
        $data = Course_package::find($id);
        $subCat = Course_sub_category::all();
        return view('backend.teachers.course_package_details',compact('data','subCat'));
    }

    public function edit_course_package($id){
        $id = decrypt($id);
        $data = Course_package::find($id);
        $primary_cat = Course_primary_category::all();
        $institution = Institution_type::all();
        $ckeditor = 'ckeditor_config.js';
        $subCat = explode(',',$data->course_sub_category_id);
        $secCatID = DB::table('course_sub_categories')->where('id',$subCat[0])->select('course_secondary_category_id')->first();
        $priCatID = DB::table('course_secondary_categories')->where('id',$subCat[0])->select('course_primary_category_id')->first();
        $sec_cat = Course_secondary_category::where('course_primary_category_id',$priCatID->course_primary_category_id)->get();
        $sub_cat = Course_sub_category::where('course_secondary_category_id',$secCatID->course_secondary_category_id)->get();
        return view('backend.teachers.edit_course_package',compact(
            'data',
            'primary_cat',
            'institution',
            'ckeditor',
            'sec_cat',
            'sub_cat',
            'subCat',
            'secCatID',
            'priCatID'
        ));
    }

    public function update_course_package(Request $request,$id){
        if($request->hasFile('package_image')){
            $image = $request->file('package_image');
            $extension = $image->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $destinationPath = public_path('/uploads/course-photo/thumbnail');
            $publicPath = 'public/uploads/course-photo/thumbnail/';
            $img = Image::make($image->path());
            $img->resize(800, 425, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);
            $image->move(public_path('uploads/course-photo'), $fileName);
            File::delete(public_path('uploads/course-photo/'.$fileName));

            $data = array(
                'package_title' => $request->input('package_title'),
                'package_subtitle' => $request->input('package_sub_title'),
                'package_sub_category_id' => $request->input('package_sub_category_id'),
                'institution_type_id' => $request->input('institution_type_id'),
                'package_details' => $request->input('package_details'),
                'package_requirements' => $request->input('package_requirement'),
                'package_component' => $request->input('package_component'),
                'package_benefit' => $request->input('package_benefit'),
                'package_content' => $request->input('package_content'),
                'package_duration' => $request->input('package_duration'),
                'package_image' => $publicPath.$fileName,
            );

            $package = Course_package::find($id);
            $package->update($data);

            return redirect('coursePackageList')
                ->with('toast_success','Course Package Updated successfully');
        }else{
            $data = array(
                'package_title' => $request->input('package_title'),
                'package_subtitle' => $request->input('package_sub_title'),
                'package_sub_category_id' => $request->input('package_sub_category_id'),
                'institution_type_id' => $request->input('institution_type_id'),
                'package_details' => $request->input('package_details'),
                'package_requirements' => $request->input('package_requirement'),
                'package_component' => $request->input('package_component'),
                'package_benefit' => $request->input('package_benefit'),
                'package_content' => $request->input('package_content'),
                'package_duration' => $request->input('package_duration'),
            );

            $package = Course_package::find($id);
            $package->update($data);

            return redirect('coursePackageList')
                ->with('toast_success','Course Package Updated successfully');
        }
    }

    public function course_package_lesson_list(Request $request){
        $package_id = $request->input('id');
        $data = Course_package_lesson::where('course_package_id',$package_id)->orderBy('id','DESC')->get();
        return view('backend.teachers.course_package_lesson_list',compact('data','package_id'));
    }

    public function add_course_package_lesson(Request $request){
        $package_id = $request->input('id');
        return view('backend.teachers.add_course_package_lesson',compact('package_id'));
    }

    public function store_course_package_lesson(Request $request){
        $package_lesson_title = $request->input('package_lesson_title');
        $package_lesson_description = $request->input('package_lesson_description');
        $package_lesson_duration = $request->input('package_lesson_duration');
        if(!empty($request->input('package_lesson_start_date'))){
            $lesson_start_date = date('Y-m-d',strtotime($request->input('package_lesson_start_date')));
        }else{
            $lesson_start_date = '';
        }
        $data = array(
            'package_lesson_title' => $package_lesson_title,
            'package_lesson_description' => $package_lesson_description,
            'package_lesson_duration' => $package_lesson_duration,
            'package_lesson_start_date' => $lesson_start_date,
            'course_package_id' => $request->input('package_id'),
        );

        Course_package_lesson::create($data);

        return back()
            ->with('toast_success','Course Package Lesson Created successfully');
    }

    public function edit_course_package_lesson(Request $request){
        $package_lesson_id = $request->input('id');
        $data = Course_package_lesson::find($package_lesson_id);
        return view('backend.teachers.edit_course_package_lesson',compact('data'));
    }

    public function update_course_package_lesson(Request $request,$id){
        $package_lesson_title = $request->input('package_lesson_title');
        $package_lesson_description = $request->input('package_lesson_description');
        $package_lesson_duration = $request->input('package_lesson_duration');
        if(!empty($request->input('package_lesson_start_date'))){
            $lesson_start_date = date('Y-m-d',strtotime($request->input('package_lesson_start_date')));
        }else{
            $lesson_start_date = '';
        }
        $data = array(
            'package_lesson_title' => $package_lesson_title,
            'package_lesson_description' => $package_lesson_description,
            'package_lesson_duration' => $package_lesson_duration,
            'package_lesson_start_date' => $lesson_start_date,
        );

        $lesson = Course_package_lesson::find($id);
        $lesson->update($data);

        return back()
            ->with('toast_success','Course Package Lesson Updated successfully');
    }

    public function course_batch_list(Request $request){
        $course_id = $request->input('id');
        $data = Course_batch::where('course_id',$course_id)->orderBy('id','DESC')->get();
        return view('backend.teachers.course_batch_list',compact('data','course_id'));
    }

    public function add_course_batch(Request $request){
        $course_id = $request->input('id');
        return view('backend.teachers.add_course_batch',compact('course_id'));
    }

    public function store_course_batch(Request $request){
        $data = array(
            'course_batch_title' => $request->input('course_batch_title'),
            'course_id' => $request->input('course_id'),
        );

        Course_batch::create($data);

        return back()
            ->with('toast_success','Course Batch Created successfully');
    }

    public function edit_course_batch(Request $request){
        $batch_id = $request->input('id');
        $data = Course_batch::find($batch_id);
        return view('backend.teachers.edit_course_batch',compact('data'));
    }

    public function update_course_batch(Request $request,$id){
        $data = array(
            'course_batch_title' => $request->input('course_batch_title'),
        );

        $batch = Course_batch::find($id);
        $batch->update($data);

        return back()
            ->with('toast_success','Course Batch Updated successfully');
    }

    public function close_course_batch(Request $request){
        $id = $request->input('id');
        $batch = Course_batch::find($id);
        $batch->status = 0;
        $batch->save();

        return back()
            ->with('toast_success','Course Batch Closed successfully');
    }

    public function course_batch_student(Request $request){
        $batch_id = $request->input('id');
        $data = Course_batch_student_mapping::where('course_batch_id',$batch_id)->orderBy('id','DESC')->get();

        return view('backend.teachers.course_batch_student',compact('data','batch_id'));
    }

    public function create_course_batch_student(Request $request){
        $batch_id = $request->input('id');
        $courseID = Course_batch::find($batch_id);
        $batchStudent = DB::table('course_batch_student_mappings')
            ->join('course_batches','course_batch_student_mappings.course_batch_id' , '=','course_batches.id','LEFT')
            ->where('course_batches.course_id',$courseID->course_id)
            ->select('user_id')->get();

        $studentID = array();
        foreach($batchStudent as $std){
            $studentID[] = $std->user_id;
        }
        $data = DB::table('course_enrollments')
            ->join('users','course_enrollments.user_id' , '=','users.id','LEFT')
            ->where('course_enrollments.type','course')
            ->where('course_enrollments.course_id',$courseID->course_id)
            ->whereNotIn('course_enrollments.user_id',$studentID)
            ->select('users.id as studentID','users.name as studentname')
            ->get();
        return view('backend.teachers.create_course_batch_student',compact('data','batch_id','studentID'));
    }

    public function store_course_batch_student(Request $request){
        $batch_id = $request->input('batchID');
        $student_id = $request->input('studentID');

        for($i=0;$i<count($student_id);$i++){
            $data = array(
                'course_batch_id' => $batch_id,
                'user_id' => $student_id[$i],
            );

            Course_batch_student_mapping::create($data);
        }

        return back()
            ->with('toast_success','Student Added to Batch successfully');
    }

    public function remove_course_batch_student(Request $request){
        $id = $request->input('id');
        $student = Course_batch_student_mapping::find($id);
        $student->delete();
        return back()
            ->with('toast_success','Student Removed from Batch successfully');
    }

    public function course_quiz(Request $request){
        $batch_id = $request->input('id');
        $data = Course_quiz_setting::where('course_batch_id',$batch_id)->orderBy('id','DESC')->get();

        return view('backend.teachers.course_quiz',compact('data','batch_id'));
    }

    public function add_course_quiz(Request $request){
        $batch_id = $request->input('id');
        return view('backend.teachers.add_course_quiz',compact('batch_id'));
    }

    public function store_course_quiz(Request $request){
        $data = array(
            'quiz_name' => $request->input('quiz_name'),
            'time_duration' => $request->input('time_duration'),
            'course_batch_id' => $request->input('batch_id'),
        );

        Course_quiz_setting::create($data);

        return back()
            ->with('toast_success','Course Quiz Created successfully');
    }

    public function edit_course_quiz(Request $request){
        $quiz_id = $request->input('id');
        $data = Course_quiz_setting::find($quiz_id);
        return view('backend.teachers.edit_course_quiz',compact('data'));
    }

    public function update_course_quiz(Request $request, $id){
        $data = array(
            'quiz_name' => $request->input('quiz_name'),
            'time_duration' => $request->input('time_duration'),
        );

        $quiz = Course_quiz_setting::find($id);
        $quiz->update($data);

        return back()
            ->with('toast_success','Course Quiz Updated successfully');
    }

    public function course_quiz_questions(Request $request){
        $quiz_id = $request->input('id');
        $data = Course_quiz_question::where('course_quiz_setting_id',$quiz_id)->get();

        return view('backend.teachers.course_quiz_questions',compact('data','quiz_id'));
    }

    public function add_quiz_questions(Request $request){
        $quiz_id = $request->input('id');
        return view('backend.teachers.add_quiz_questions',compact('quiz_id'));
    }

    public function store_quiz_questions(Request $request){
        $data = array(
            'question' => $request->input('question'),
            'option_one' => $request->input('option_one'),
            'option_two' => $request->input('option_two'),
            'option_three' => $request->input('option_three'),
            'option_four' => $request->input('option_four'),
            'answer' => $request->input('answer'),
            'course_quiz_setting_id' => $request->input('quiz_id'),
        );

        Course_quiz_question::create($data);

        return back()
            ->with('toast_success','Course Quiz Question Created successfully');
    }

    public function edit_quiz_questions(Request $request){
        $question_id = $request->input('id');
        $data = Course_quiz_question::find($question_id);
        return view('backend.teachers.edit_quiz_questions',compact('data'));
    }

    public function update_quiz_questions(Request $request, $id){
        $data = array(
            'question' => $request->input('question'),
            'option_one' => $request->input('option_one'),
            'option_two' => $request->input('option_two'),
            'option_three' => $request->input('option_three'),
            'option_four' => $request->input('option_four'),
            'answer' => $request->input('answer'),
        );
        $question = Course_quiz_question::find($id);
        $question->update($data);

        return back()
            ->with('toast_success','Course Quiz Question Updated successfully');
    }

    public function course_assignment(Request $request){
        $batch_id = $request->input('id');
        $data = Course_assignment::where('course_batch_id',$batch_id)->orderBy('id','DESC')->get();

        return view('backend.teachers.course_assignment',compact('data','batch_id'));
    }

    public function add_course_assignment(Request $request){
        $batch_id = $request->input('id');
        return view('backend.teachers.add_course_assignment',compact('batch_id'));
    }

    public function store_course_assignment(Request $request){
        $data = array(
            'title' => $request->input('title'),
            'details' => $request->input('details'),
            'submit_last_date' => date('Y-m-d',strtotime($request->input('submit_last_date'))),
            'course_batch_id' => $request->input('batch_id'),
        );

        Course_assignment::create($data);

        return back()
            ->with('toast_success','Course Assignment Created successfully');
    }

    public function edit_course_assignment(Request $request){
        $assignment_id = $request->input('id');
        $data = Course_assignment::find($assignment_id);
        return view('backend.teachers.edit_course_assignment',compact('data'));
    }

    public function update_course_assignment(Request $request, $id){
        $data = array(
            'title' => $request->input('title'),
            'details' => $request->input('details'),
            'submit_last_date' => date('Y-m-d',strtotime($request->input('submit_last_date'))),
        );

        $assignment = Course_assignment::find($id);
        $assignment->update($data);

        return back()
            ->with('toast_success','Course Assignment Updated successfully');
    }

    public function package_batch_list(Request $request){
        $package_id = $request->input('id');
        $data = Course_package_batch::where('course_package_id',$package_id)->orderBy('id','DESC')->get();
        return view('backend.teachers.package_batch_list',compact('data','package_id'));
    }

    public function add_package_batch(Request $request){
        $package_id = $request->input('id');
        return view('backend.teachers.add_package_batch',compact('package_id'));
    }

    public function store_package_batch(Request $request){
        $data = array(
            'course_package_batch_title' => $request->input('course_package_batch_title'),
            'course_package_id' => $request->input('package_id'),
        );

        Course_package_batch::create($data);

        return back()
            ->with('toast_success','Batch Created successfully');
    }

    public function edit_package_batch(Request $request){
        $batch_id = $request->input('id');
        $data = Course_package_batch::find($batch_id);
        return view('backend.teachers.edit_package_batch',compact('data'));
    }

    public function update_package_batch(Request $request,$id){
        $data = array(
            'course_package_batch_title' => $request->input('course_package_batch_title'),
        );

        $batch = Course_package_batch::find($id);
        $batch->update($data);

        return back()
            ->with('toast_success','Batch Updated successfully');
    }

    public function close_package_batch(Request $request){
        $id = $request->input('id');
        $batch = Course_package_batch::find($id);
        $batch->status = 0;
        $batch->save();

        return back()
            ->with('toast_success','Batch Closed successfully');
    }

    public function package_batch_student(Request $request){
        $batch_id = $request->input('id');
        $data = Course_package_batch_student_mapping::where('course_package_batch_id',$batch_id)->orderBy('id','DESC')->get();

        return view('backend.teachers.package_batch_student',compact('data','batch_id'));
    }

    public function create_package_batch_student(Request $request){
        $batch_id = $request->input('id');
        $packageID = Course_package_batch::find($batch_id);
        $batchStudent = DB::table('course_package_batch_student_mappings')
            ->join('course_package_batches','course_package_batch_student_mappings.course_package_batch_id' , '=','course_package_batches.id','LEFT')
            ->where('course_package_batches.course_package_id',$packageID->course_package_id)
            ->select('user_id')->get();

        $studentID = array();
        foreach($batchStudent as $std){
            $studentID[] = $std->user_id;
        }
        $data = DB::table('course_enrollments')
            ->join('users','course_enrollments.user_id' , '=','users.id','LEFT')
            ->where('course_enrollments.type','package')
            ->where('course_enrollments.course_id',$packageID->course_package_id)
            ->whereNotIn('course_enrollments.user_id',$studentID)
            ->select('users.id as studentID','users.name as studentname')
            ->get();
        return view('backend.teachers.create_package_batch_student',compact('data','batch_id','studentID'));
    }

    public function store_package_batch_student(Request $request){
        $batch_id = $request->input('batchID');
        $student_id = $request->input('studentID');

        for($i=0;$i<count($student_id);$i++){
            $data = array(
                'course_package_batch_id' => $batch_id,
                'user_id' => $student_id[$i],
            );

            Course_package_batch_student_mapping::create($data);
        }

        return back()
            ->with('toast_success','Student Added to Batch successfully');
    }

    public function remove_package_batch_student(Request $request){
        $id = $request->input('id');
        $student = Course_package_batch_student_mapping::find($id);
        $student->delete();
        return back()
            ->with('toast_success','Student Removed from Batch successfully');
    }

    public function package_quiz(Request $request){
        $batch_id = $request->input('id');
        $data = Package_quiz_setting::where('course_package_batch_id',$batch_id)->orderBy('id','DESC')->get();

        return view('backend.teachers.package_quiz',compact('data','batch_id'));
    }

    public function add_package_quiz(Request $request){
        $batch_id = $request->input('id');
        return view('backend.teachers.add_package_quiz',compact('batch_id'));
    }

    public function store_package_quiz(Request $request){
        $data = array(
            'quiz_name' => $request->input('quiz_name'),
            'time_duration' => $request->input('time_duration'),
            'course_package_batch_id' => $request->input('batch_id'),
        );

        Package_quiz_setting::create($data);

        return back()
            ->with('toast_success','Package Quiz Created successfully');
    }

    public function edit_package_quiz(Request $request){
        $quiz_id = $request->input('id');
        $data = Package_quiz_setting::find($quiz_id);
        return view('backend.teachers.edit_package_quiz',compact('data'));
    }

    public function update_package_quiz(Request $request, $id){
        $data = array(
            'quiz_name' => $request->input('quiz_name'),
            'time_duration' => $request->input('time_duration'),
        );

        $quiz = Package_quiz_setting::find($id);
        $quiz->update($data);

        return back()
            ->with('toast_success','Package Quiz Updated successfully');
    }

    public function package_quiz_questions(Request $request){
        $quiz_id = $request->input('id');
        $data = Package_quiz_question::where('package_quiz_setting_id',$quiz_id)->get();

        return view('backend.teachers.package_quiz_questions',compact('data','quiz_id'));
    }

    public function add_package_quiz_questions(Request $request){
        $quiz_id = $request->input('id');
        return view('backend.teachers.add_package_quiz_questions',compact('quiz_id'));
    }

    public function store_package_quiz_questions(Request $request){
        $data = array(
            'question' => $request->input('question'),
            'option_one' => $request->input('option_one'),
            'option_two' => $request->input('option_two'),
            'option_three' => $request->input('option_three'),
            'option_four' => $request->input('option_four'),
            'answer' => $request->input('answer'),
            'package_quiz_setting_id' => $request->input('quiz_id'),
        );

        Package_quiz_question::create($data);

        return back()
            ->with('toast_success','Package Quiz Question Created successfully');
    }

    public function edit_package_quiz_questions(Request $request){
        $question_id = $request->input('id');
        $data = Package_quiz_question::find($question_id);
        return view('backend.teachers.edit_package_quiz_questions',compact('data'));
    }

    public function update_package_quiz_questions(Request $request, $id){
        $data = array(
            'question' => $request->input('question'),
            'option_one' => $request->input('option_one'),
            'option_two' => $request->input('option_two'),
            'option_three' => $request->input('option_three'),
            'option_four' => $request->input('option_four'),
            'answer' => $request->input('answer'),
        );
        $question = Package_quiz_question::find($id);
        $question->update($data);

        return back()
            ->with('toast_success','Package Quiz Question Updated successfully');
    }

    public function package_assignment(Request $request){
        $batch_id = $request->input('id');
        $data = Package_assignment::where('course_package_batch_id',$batch_id)->orderBy('id','DESC')->get();

        return view('backend.teachers.package_assignment',compact('data','batch_id'));
    }

    public function add_package_assignment(Request $request){
        $batch_id = $request->input('id');
        return view('backend.teachers.add_package_assignment',compact('batch_id'));
    }

    public function store_package_assignment(Request $request){
        $data = array(
            'title' => $request->input('title'),
            'details' => $request->input('details'),
            'submit_last_date' => date('Y-m-d',strtotime($request->input('submit_last_date'))),
            'course_package_batch_id' => $request->input('batch_id'),
        );

        Package_assignment::create($data);

        return back()
            ->with('toast_success','Package Assignment Created successfully');
    }

    public function edit_package_assignment(Request $request){
        $assignment_id = $request->input('id');
        $data = Package_assignment::find($assignment_id);
        return view('backend.teachers.edit_package_assignment',compact('data'));
    }

    public function update_package_assignment(Request $request, $id){
        $data = array(
            'title' => $request->input('title'),
            'details' => $request->input('details'),
            'submit_last_date' => date('Y-m-d',strtotime($request->input('submit_last_date'))),
        );

        $assignment = Package_assignment::find($id);
        $assignment->update($data);

        return back()
            ->with('toast_success','Package Assignment Updated successfully');
    }

    public function student_quizzes(Request $request){
        $batch_id = $request->input('id');
        $stdID = $request->input('stdID');

        $data = Course_quiz_setting::where('course_batch_id',$batch_id)->get();
        $checkSubmitQuiz = DB::table('student_course_quiz_answers')
            ->where('user_id',$stdID)
            ->select('course_quiz_setting_id')
            ->groupBy('course_quiz_setting_id')->get();
        $courseQuizSettingID = array();
        foreach($checkSubmitQuiz as $quiz){
            $courseQuizSettingID[] = $quiz->course_quiz_setting_id;
        }
        if(!empty($checkSubmitQuiz)){
            $isSubmitQuiz = $courseQuizSettingID;
        }else{
            $isSubmitQuiz = 0;
        }
        return view('backend.teachers.student_quizzes',compact('data','batch_id','isSubmitQuiz','stdID'));
    }

    public function student_quiz_answers(Request $request){
        $quiz_id = $request->input('id');
        $stdID = $request->input('stdID');

        $data = Student_course_quiz_answer::where([['course_quiz_setting_id',$quiz_id],['user_id',$stdID]])->get();
        return view('backend.teachers.student_quiz_answers',compact('data'));
    }

    public function student_assignment(Request $request){
        $stdID = $request->input('id');

        $data = Student_course_assignment::where([['user_id',$stdID]])->get();
        return view('backend.teachers.student_assignment',compact('data'));
    }

    public function student_marks_list(Request $request){
        $batch_id = $request->input('id');
        $stdID = $request->input('stdID');
        $courseID = Course_batch::where('id',$batch_id)->first();
        $data = Student_result::where([['user_id',$stdID],['course_id',$courseID->course_id],['type','course']])->get();
        return view('backend.teachers.student_marks_list',compact('data','courseID','stdID'));
    }

    public function add_student_marks(Request $request){
        $course_id = $request->input('id');
        $stdID = $request->input('stdID');
        return view('backend.teachers.add_student_marks',compact('course_id','stdID'));
    }

    public function store_student_marks(Request $request){
        $data = array(
            'user_id' => $request->input('stdID'),
            'course_id' => $request->input('course_id'),
            'type' => 'course',
            'exam_name' => $request->input('exam_name'),
            'full_marks' => $request->input('full_marks'),
            'obtained_marks' => $request->input('obtained_marks'),
        );
        Student_result::create($data);

        return back()
            ->with('toast_success','Student Result Added successfully');
    }

    public function student_package_quizzes(Request $request){
        $batch_id = $request->input('id');
        $stdID = $request->input('stdID');

        $data = Package_quiz_setting::where('course_package_batch_id',$batch_id)->get();
        $checkSubmitQuiz = DB::table('student_package_quiz_answers')
            ->where('user_id',$stdID)
            ->select('package_quiz_setting_id')
            ->groupBy('package_quiz_setting_id')->get();
        $packageQuizSettingID = array();
        foreach($checkSubmitQuiz as $quiz){
            $packageQuizSettingID[] = $quiz->package_quiz_setting_id;
        }
        if(!empty($checkSubmitQuiz)){
            $isSubmitQuiz = $packageQuizSettingID;
        }else{
            $isSubmitQuiz = 0;
        }
        return view('backend.teachers.student_package_quizzes',compact('data','batch_id','isSubmitQuiz','stdID'));
    }

    public function student_package_quiz_answers(Request $request){
        $quiz_id = $request->input('id');
        $stdID = $request->input('stdID');

        $data = Student_package_quiz_answer::where([['package_quiz_setting_id',$quiz_id],['user_id',$stdID]])->get();
        return view('backend.teachers.student_package_quiz_answers',compact('data'));
    }

    public function student_package_assignment(Request $request){
        $stdID = $request->input('id');

        $data = Student_package_assignment::where([['user_id',$stdID]])->get();
        return view('backend.teachers.student_package_assignment',compact('data'));
    }

    public function student_package_marks_list(Request $request){
        $batch_id = $request->input('id');
        $stdID = $request->input('stdID');
        $packageID = Course_package_batch::where('id',$batch_id)->first();
        $data = Student_result::where([['user_id',$stdID],['course_id',$packageID->course_package_id],['type','package']])->get();
        return view('backend.teachers.student_package_marks_list',compact('data','packageID','stdID'));
    }

    public function add_student_package_marks(Request $request){
        $package_id = $request->input('id');
        $stdID = $request->input('stdID');
        return view('backend.teachers.add_student_package_marks',compact('package_id','stdID'));
    }

    public function store_student_package_marks(Request $request){
        $data = array(
            'user_id' => $request->input('stdID'),
            'course_id' => $request->input('package_id'),
            'type' => 'package',
            'exam_name' => $request->input('exam_name'),
            'full_marks' => $request->input('full_marks'),
            'obtained_marks' => $request->input('obtained_marks'),
        );
        Student_result::create($data);

        return back()
            ->with('toast_success','Student Result Added successfully');
    }

    public function pdf_library_list(){
        $data = Pdf_library::where('user_id',auth()->user()->id)->orderBy('id','DESC')->get();
        return view('backend.teachers.pdf_library_list',compact('data'));
    }

    public function pdf_library_create(){
        $primary_cat = Course_primary_category::all();
        return view('backend.teachers.pdf_library_create',compact('primary_cat'));
    }

    public function pdf_library_store(Request $request){
        if($request->hasFile('pdf_location')){
            $request->validate([
                'pdf_location' => 'required|mimes:pdf',
            ]);
            $image = $request->file('pdf_location');
            $extension = $image->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $destinationPath = 'public/uploads/pdf-library/';

            //$request->file->move(public_path('/uploads/pdf-library/'), $fileName);
            $image->move(public_path('uploads/pdf-library'), $fileName);

            $data = array(
                'title' => $request->input('title'),
                'pdf_location' => $destinationPath.$fileName,
                'course_sub_category_id' => $request->input('course_sub_category_id'),
                'user_id' => auth()->user()->id,
            );

            Pdf_library::create($data);

            return redirect('pdfLibrary')
                ->with('toast_success','PDF Library Created successfully');
        }else{
            return back()
                ->with('toast_success','Image Upload Problem.');
        }
    }

    public function pdf_library_delete(Request $request){
        $id = $request->input('id');
        $pdf = Pdf_library::find($id);
        $pdf->delete();
        return back()
            ->with('toast_success','PDF Library deleted successfully');
    }

    public function video_library_list(){
        $data = Video_library::where('user_id',auth()->user()->id)->orderBy('id','DESC')->get();
        return view('backend.teachers.video_library_list',compact('data'));
    }

    public function video_library_create(){
        $primary_cat = Course_primary_category::all();
        return view('backend.teachers.video_library_create',compact('primary_cat'));
    }

    public function video_library_store(Request $request){
        $url = $request->input('video_url');

        if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $url, $id)) {
            $videoID = $id[1];
        } else if (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $url, $id)) {
            $videoID = $id[1];
        } else if (preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $url, $id)) {
            $videoID = $id[1];
        } else if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $url, $id)) {
            $videoID = $id[1];
        } else if (preg_match('/youtube\.com\/verify_age\?next_url=\/watch%3Fv%3D([^\&\?\/]+)/', $url, $id)) {
            $videoID = $id[1];
        }

        $data = array(
            'video_title' => $request->input('video_title'),
            'video_url' => $videoID,
            'course_sub_category_id' => $request->input('course_sub_category_id'),
            'user_id' => auth()->user()->id,
        );

        Video_library::create($data);

        return redirect('videoLibrary')
            ->with('toast_success','Video Library Created successfully');
    }

    public function video_library_delete(Request $request){
        $id = $request->input('id');
        $video = Video_library::find($id);
        $video->delete();
        return back()
            ->with('toast_success','Video Library deleted successfully');
    }

    public function free_quiz_setting(){
        $data = Free_quiz_setting::where('user_id',auth()->user()->id)->orderBy('id','DESC')->get();
        return view('backend.teachers.free_quiz_setting',compact('data'));
    }

    public function create_free_quiz(){
        $primary_cat = Course_primary_category::all();
        return view('backend.teachers.create_free_quiz',compact('primary_cat'));
    }

    public function store_free_quiz (Request $request){
        $data = array(
            'quiz_name' => $request->input('quiz_name'),
            'time_duration' => $request->input('time_duration'),
            'course_sub_category_id' => $request->input('course_sub_category_id'),
            'user_id' => auth()->user()->id,
        );

        Free_quiz_setting::create($data);

        return redirect('freeQuizSetting')
            ->with('toast_success','Free Quiz Created successfully');
    }

    public function edit_free_quiz($id){
        $id = decrypt($id);
        $data = Free_quiz_setting::find($id);
        $primary_cat = Course_primary_category::all();
        $sec_cat = Course_secondary_category::where('course_primary_category_id',$data->course_sub_category->course_secondary_category->course_primary_category->id)->get();
        $sub_cat = Course_sub_category::where('course_secondary_category_id',$data->course_sub_category->course_secondary_category->id)->get();
        return view('backend.teachers.edit_free_quiz',compact('data','primary_cat','sec_cat','sub_cat'));
    }

    public function update_free_quiz(Request $request, $id){
        $id = decrypt($id);
        $data = array(
            'quiz_name' => $request->input('quiz_name'),
            'time_duration' => $request->input('time_duration'),
            'course_sub_category_id' => $request->input('course_sub_category_id'),
        );

        $quiz = Free_quiz_setting::find($id);
        $quiz->update($data);

        return redirect('freeQuizSetting')
            ->with('toast_success','Free Quiz Updated successfully');
    }

    public function free_quiz_questions($id){
        $id = decrypt($id);
        $data = Free_quiz::where('free_quiz_setting_id',$id)->orderBy('id','DESC')->get();
        return view('backend.teachers.free_quiz_questions',compact('data','id'));
    }

    public function create_free_quiz_questions($id){
        $id = decrypt($id);
        return view('backend.teachers.create_free_quiz_questions',compact('id'));
    }

    public function store_free_quiz_questions(Request $request,$id){
        $id = decrypt($id);
        $data = array(
            'questions' => $request->input('questions'),
            'option_one' => $request->input('option_one'),
            'option_two' => $request->input('option_two'),
            'option_three' => $request->input('option_three'),
            'option_four' => $request->input('option_four'),
            'answer' => $request->input('answer'),
            'free_quiz_setting_id' => $id,
        );

        Free_quiz::create($data);

        return redirect('freeQuizQuestions/'.encrypt($id))
            ->with('toast_success','Free Quiz Question Created successfully');
    }

    public function edit_free_quiz_questions($id){
        $id = decrypt($id);
        $data = Free_quiz::find($id);
        return view('backend.teachers.edit_free_quiz_questions',compact('data'));
    }

    public function update_free_quiz_questions(Request $request, $id){
        $id = decrypt($id);
        $quizID = $request->input('free_quiz_setting_id');
        $data = array(
            'questions' => $request->input('questions'),
            'option_one' => $request->input('option_one'),
            'option_two' => $request->input('option_two'),
            'option_three' => $request->input('option_three'),
            'option_four' => $request->input('option_four'),
            'answer' => $request->input('answer'),
        );

        $quiz = Free_quiz::find($id);
        $quiz->update($data);

        return redirect('freeQuizQuestions/'.encrypt($quizID))
            ->with('toast_success','Free Quiz Question Updated successfully');
    }

    public function incomplete_course(){
        $id = auth()->user()->id;
        $data = DB::table('course_costs')
            ->join('courses','course_costs.course_id' , '=','courses.id','LEFT')
            ->where('courses.user_id',$id)
            ->orderBy('course_costs.course_complete_status')
            ->select('course_costs.*','courses.course_title','courses.course_duration')
            ->get();
        return view('backend.teachers.incomplete_course',compact('data'));
    }

    public function approve_complete_course(Request $request){
        $id = $request->input('id');
        $course = Course_cost::find($id);
        $course->course_complete_status = 1;
        $course->save();

        return back()
            ->with('toast_success','Approved Course Complete successfully');
    }

    public function incomplete_package(){
        $id = auth()->user()->id;
        $data = DB::table('course_package_costs')
            ->join('course_packages','course_package_costs.course_package_id' , '=','course_packages.id','LEFT')
            ->where('course_packages.user_id',$id)
            ->orderBy('course_package_costs.package_complete_status')
            ->select('course_package_costs.*','course_packages.package_title','course_packages.package_duration')
            ->get();
        return view('backend.teachers.incomplete_package',compact('data'));
    }

    public function approve_complete_package(Request $request){
        $id = $request->input('id');
        $course = Course_package_cost::find($id);
        $course->package_complete_status = 1;
        $course->save();

        return back()
            ->with('toast_success','Approved Course Complete successfully');
    }

    public function accounts_summery(){
        $id = auth()->user()->id;
        $courseEnrollment = new Course_enrollment();
        $courseIncome = $courseEnrollment->get_total_income_from_course($id);
        $courseCommission = Teachers_commission::where('user_id',$id)->first();
        $totalCourseIncome = $courseEnrollment->get_income_from_course($id,$courseCommission->commission_rate);


        $referral_code = Referral_agent::where('user_id',$id)->select('referral_code','commission_rate')->first();
        $output = new Referred_student();
        $outputs = $output->my_referred_enrolled_studrnt($referral_code->referral_code);
        $earnings = $output->monthly_earning($referral_code->referral_code,$referral_code->commission_rate);

        $commissionPaid = Payment::where([['user_id',$id],['is_withdraw',1]])->sum('paid_amount');
        $withdrawRequest = Payment::where([['user_id',$id],['is_withdraw',0]])->first();
        $monthlyWithdraw = DB::table('payments')
            ->where([['user_id',$id],['is_withdraw',1]])
            ->select('created_at', DB::raw('SUM(paid_amount) as totalWithdraw'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        $totalReferralEarning = 0;
        foreach($outputs['student'] as $std){
            $stdID = $std->studentID;
            $courseInfo = Course_enrollment::where('user_id',$stdID)->get();
            foreach($courseInfo as $course){
                $courseFee = DB::table('transactions')->where([['tran_id',$course->tran_id],['status','Complete']])->first();
                $totalReferralEarning = $totalReferralEarning + $courseFee->origin_cost;
            }
        }

        $totalReferralCommission = ($totalReferralEarning * $referral_code->commission_rate) / 100;
        $totalCourseCommission = ($courseIncome['courseIncome'] * $courseCommission->commission_rate) / 100;
        $totalOutstanding = ($totalCourseCommission + $totalReferralCommission) - $commissionPaid;

        return view('backend.teachers.account_summery',compact('totalReferralCommission','totalCourseCommission','totalOutstanding','commissionPaid','totalCourseIncome','earnings','monthlyWithdraw','withdrawRequest'));
    }
}

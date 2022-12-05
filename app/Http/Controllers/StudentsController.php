<?php

namespace App\Http\Controllers;

use App\Course;
use App\Course_package;
use App\Course_package_batch_student_mapping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Personal_information;
use App\Pdf_library;
use App\Video_library;
use App\Free_quiz_setting;
use App\Free_quiz;
use App\Course_enrollment;
use App\Course_batch_student_mapping;
use App\Course_assignment;
use App\Student_course_assignment;
use App\Course_quiz_setting;
use App\Course_quiz_question;
use App\Student_course_quiz_answer;
use App\Package_assignment;
use App\Package_quiz_question;
use App\Package_quiz_setting;
use App\Student_package_assignment;
use App\Student_package_quiz_answer;
use App\Student_result;
use App\Course_student_review;
use App\Teacher_evaluation;
use App\Course_sub_category;
use Spatie\Permission\Models\Role;
use DB;
use Image;
use File;

class StudentsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:pending-student-list', ['only' => ['pending_student_list']]);
        $this->middleware('permission:student-list', ['only' => ['student_list']]);
        $this->middleware('permission:suspended-student-list', ['only' => ['suspended_student_list']]);
    }

    public function pending_student_list()
    {
        $data = User::with('personal_information')->whereHas("roles", function($q){ $q->where("name", "Student"); })->where('is_active',0)->orderBy('id','DESC')->get();
        return view('backend.students.pending_students_list',compact('data'));
    }

    public function student_list(){
        $data = User::with('personal_information')->whereHas("roles", function($q){ $q->where("name", "Student"); })->where('is_active',1)->orderBy('id','DESC')->get();
        return view('backend.students.students_list',compact('data'));
    }

    public function suspended_student_list(){
        $data = User::with('personal_information')->whereHas("roles", function($q){ $q->where("name", "Student"); })->where('is_active',2)->orderBy('id','DESC')->get();
        return view('backend.students.suspended_student_list',compact('data'));
    }

    public function pdf_library(){
        $data = Pdf_library::orderBy('id','DESC')->get();
        return view('backend.students.pdf_library',compact('data'));
    }

    public function video_library(){
        $data = Video_library::orderBy('id','DESC')->get();
        return view('backend.students.video_library',compact('data'));
    }

    public function free_quiz(){
        $data = Free_quiz_setting::where('status',1)->orderBy('id','DESC')->get();
        return view('backend.students.free_quiz',compact('data'));
    }

    public function start_free_quiz_exam($id){
        $id = decrypt($id);
        $data = Free_quiz::where('free_quiz_setting_id',$id)->orderBy('id','DESC')->get();
        return view('backend.students.start_free_quiz_exam',compact('data'));
    }

    public function pay_course_fee(){
        $unPaidCourse = Course_enrollment::where([['user_id',auth()->user()->id],['is_payment',0]])->orderBy('id','desc')->get();

        $unPaidCourseFee = array();
        foreach($unPaidCourse as $course){
            if($course->type == 'course'){
                $unPaidCourseFee[] = Course_enrollment::where('id',$course->id)->first();
                $courseType = 'course';
            }else{
                $unPaidCourseFee[] = Course_enrollment::where('id',$course->id)->first();
                $courseType = 'package';
            }
        }

        return view('backend.students.pay_course_fee',compact('unPaidCourseFee','courseType'));
    }

    public function cancel_course_enrollment(Request $request){
        $id = $request->input('id');
        $enrollment = Course_enrollment::find($id);
        $enrollment->delete();
        return back()
            ->with('toast_success','Course Enrollment Canceled successfully');
    }

    public function course_start($id){
        $id = explode('_',decrypt($id));
        if($id[1] == 'course'){
            $courseData = Course::find($id[0]);
            $type = $id[1];
        }else{
            $courseData = Course_package::find($id[0]);
            $type = $id[1];
        }

        return view('backend.students.course_start',compact('courseData','type'));
    }

    public function course_quiz(){
        $checkSubmitQuiz = DB::table('student_course_quiz_answers')
            ->where('user_id',auth()->user()->id)
            ->select('course_quiz_setting_id')
            ->groupBy('course_quiz_setting_id')->get();
        $courseQuizSettingID = array();
        foreach($checkSubmitQuiz as $quiz){
            $courseQuizSettingID[] = $quiz->course_quiz_setting_id;
        }
        $batchID = Course_batch_student_mapping::where('user_id',auth()->user()->id)->first();
        $data = Course_quiz_setting::where([['course_batch_id',$batchID->course_batch_id],['status',1]])->get();
        if(!empty($checkSubmitQuiz)){
            $isSubmitQuiz = $courseQuizSettingID;
        }else{
            $isSubmitQuiz = 0;
        }
        return view('backend.students.course_quiz',compact('data','isSubmitQuiz'));
    }

    public function start_course_quiz_exam($id){
        $id = decrypt($id);
        $data = Course_quiz_question::where('course_quiz_setting_id',$id)->get();
        return view('backend.students.start_course_quiz_exam',compact('data'));
    }

    public function submit_course_quiz_exam(Request $request){
        $questionID = $request->input('questionID');
        $course_quiz_setting_id = $request->input('course_quiz_setting_id');
        $checkResubmit = Student_course_quiz_answer::where('course_quiz_setting_id',$course_quiz_setting_id[0])->first();
        if(empty($checkResubmit)){
            for($i=0;$i<count($questionID);$i++){
                if(!empty($request->input('option_'.$i))){
                    $data = array(
                        'user_id' => auth()->user()->id,
                        'course_quiz_question_id' => $questionID[$i],
                        'course_quiz_setting_id' => $course_quiz_setting_id[$i],
                        'answer' => $request->input('option_'.$i),
                    );

                    Student_course_quiz_answer::create($data);
                }
            }

            return redirect('studentCourseQuiz')
                ->with('toast_success','Course Quiz Submit successfully');
        }else{
            return redirect('studentCourseQuiz')
                ->with('toast_success','Already Submitted This Quiz.');
        }
    }

    public function course_assignment(){
        $checkSubmitAssignment = Student_course_assignment::where('user_id',auth()->user()->id)->get();
        $courseAssignmentID = array();
        foreach($checkSubmitAssignment as $assignment){
            $courseAssignmentID[] = $assignment->course_assignment_id;
        }
        $batchID = Course_batch_student_mapping::where('user_id',auth()->user()->id)->first();
        $data = Course_assignment::where([['course_batch_id',$batchID->course_batch_id],['status',1]])->get();
        if(!empty($checkSubmitAssignment)){
            $isSubmitAssignment = $courseAssignmentID;
        }else{
            $isSubmitAssignment = 0;
        }
        return view('backend.students.course_assignment',compact('data','isSubmitAssignment'));
    }

    public function start_course_assignment(Request $request){
        $id = $request->input('id');
        return view('backend.students.start_course_assignment',compact('id'));
    }

    public function submit_course_assignment(Request $request){
        if($request->hasFile('assignment')){
            $request->validate([
                'assignment' => 'required|mimes:pdf',
            ]);
            $assignmentID = $request->input('assignment_id');
            $image = $request->file('assignment');
            $extension = $image->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $destinationPath = 'public/uploads/course-assignment/'.$assignmentID.'/';

            if(!File::isDirectory($destinationPath)){
                File::makeDirectory($destinationPath, 0777, true, true);
            }

            //$request->file->move(public_path('/uploads/pdf-library/'), $fileName);
            $image->move(public_path('uploads/course-assignment/'.$assignmentID.'/'), $fileName);

            $data = array(
                'user_id' => auth()->user()->id,
                'assignment' => $destinationPath.$fileName,
                'course_assignment_id' => $assignmentID,
            );

            Student_course_assignment::create($data);

            return redirect('studentCourseAssignment')
                ->with('toast_success','Course Assignment Submitted successfully');
        }else{
            return back()
                ->with('toast_success','PDF Upload Problem.');
        }
    }

    public function package_quiz(){
        $checkSubmitQuiz = DB::table('student_package_quiz_answers')
            ->where('user_id',auth()->user()->id)
            ->select('package_quiz_setting_id')
            ->groupBy('package_quiz_setting_id')->get();
        $packageQuizSettingID = array();
        foreach($checkSubmitQuiz as $quiz){
            $packageQuizSettingID[] = $quiz->package_quiz_setting_id;
        }
        $batchID = Course_package_batch_student_mapping::where('user_id',auth()->user()->id)->first();
        $data = Package_quiz_setting::where([['course_package_batch_id',$batchID->course_package_batch_id],['status',1]])->get();
        if(!empty($checkSubmitQuiz)){
            $isSubmitQuiz = $packageQuizSettingID;
        }else{
            $isSubmitQuiz = 0;
        }
        return view('backend.students.package_quiz',compact('data','isSubmitQuiz'));
    }

    public function start_package_quiz_exam($id){
        $id = decrypt($id);
        $data = Package_quiz_question::where('package_quiz_setting_id',$id)->get();
        return view('backend.students.start_package_quiz_exam',compact('data'));
    }

    public function submit_package_quiz_exam(Request $request){
        $questionID = $request->input('questionID');
        $package_quiz_setting_id = $request->input('package_quiz_setting_id');
        $checkResubmit = Student_package_quiz_answer::where('package_quiz_setting_id',$package_quiz_setting_id[0])->first();
        if(empty($checkResubmit)){
            for($i=0;$i<count($questionID);$i++){
                if(!empty($request->input('option_'.$i))){
                    $data = array(
                        'user_id' => auth()->user()->id,
                        'package_quiz_question_id' => $questionID[$i],
                        'package_quiz_setting_id' => $package_quiz_setting_id[$i],
                        'answer' => $request->input('option_'.$i),
                    );

                    Student_package_quiz_answer::create($data);
                }
            }

            return redirect('studentPackageQuiz')
                ->with('toast_success','Package Quiz Submit successfully');
        }else{
            return redirect('studentPackageQuiz')
                ->with('toast_success','Already Submitted This Quiz.');
        }
    }

    public function package_assignment(){
        $checkSubmitAssignment = Student_package_assignment::where('user_id',auth()->user()->id)->get();
        $packageAssignmentID = array();
        foreach($checkSubmitAssignment as $assignment){
            $packageAssignmentID[] = $assignment->package_assignment_id;
        }
        $batchID = Course_package_batch_student_mapping::where('user_id',auth()->user()->id)->first();
        $data = Package_assignment::where([['course_package_batch_id',$batchID->course_package_batch_id],['status',1]])->get();
        if(!empty($checkSubmitAssignment)){
            $isSubmitAssignment = $packageAssignmentID;
        }else{
            $isSubmitAssignment = 0;
        }
        return view('backend.students.package_assignment',compact('data','isSubmitAssignment'));
    }

    public function start_package_assignment(Request $request){
        $id = $request->input('id');
        return view('backend.students.start_package_assignment',compact('id'));
    }

    public function submit_package_assignment(Request $request){
        if($request->hasFile('assignment')){
            $request->validate([
                'assignment' => 'required|mimes:pdf',
            ]);
            $assignmentID = $request->input('assignment_id');
            $image = $request->file('assignment');
            $extension = $image->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $destinationPath = 'public/uploads/package-assignment/'.$assignmentID.'/';

            if(!File::isDirectory($destinationPath)){
                File::makeDirectory($destinationPath, 0777, true, true);
            }

            //$request->file->move(public_path('/uploads/pdf-library/'), $fileName);
            $image->move(public_path('uploads/package-assignment/'.$assignmentID.'/'), $fileName);

            $data = array(
                'user_id' => auth()->user()->id,
                'assignment' => $destinationPath.$fileName,
                'package_assignment_id' => $assignmentID,
            );

            Student_package_assignment::create($data);

            return redirect('studentPackageAssignment')
                ->with('toast_success','Package Assignment Submitted successfully');
        }else{
            return back()
                ->with('toast_success','PDF Upload Problem.');
        }
    }

    public function mark_sheet($id){
        $id = explode('_',decrypt($id));
        if($id[1] == 'course'){
            $courseData = Course::find($id[0]);
            $type = $id[1];
        }else{
            $courseData = Course_package::find($id[0]);
            $type = $id[1];
        }
        $data = Student_result::where([['course_id',$id[0]],['type',$id[1]],['user_id',auth()->user()->id]])->get();

        return view('backend.students.mark_sheet',compact('data','courseData','type'));
    }

    public function course_review($id){
        $id = explode('_',decrypt($id));

        $checkSubmittedReview = Course_student_review::where([['user_id',auth()->user()->id],['course_id',$id[0],['type',$id[1]]]])->first();
        if(empty($checkSubmittedReview)){
            $ckeditor = 'ckeditor_config.js';
            return view('backend.students.course_review',compact('id','ckeditor'));
        }else{
            return back()
                ->with('toast_success','Already Submitted This Course Review.');
        }
    }

    public function store_course_review(Request $request){
        $data = array(
            'user_id' => auth()->user()->id,
            'course_id' => $request->input('course_id'),
            'type' => $request->input('type'),
            'rating' => $request->input('rating'),
            'comments' => $request->input('comments'),
        );
        Course_student_review::create($data);

        return redirect('dashboard')
            ->with('toast_success','Course Review Submitted successfully');
    }

    public function teacher_evaluation($id){
        $id = explode('_',decrypt($id));

        $checkSubmittedReview = Teacher_evaluation::where([['user_id',auth()->user()->id],['course_id',$id[0],['type',$id[1]]]])->first();
        if(empty($checkSubmittedReview)){
            $ckeditor = 'ckeditor_config.js';
            return view('backend.students.teacher_evaluation',compact('id','ckeditor'));
        }else{
            return back()
                ->with('toast_success','Already Submitted This Teacher Review.');
        }
    }

    public function store_teacher_evaluation(Request $request){
        $data = array(
            'user_id' => auth()->user()->id,
            'course_id' => $request->input('course_id'),
            'type' => $request->input('type'),
            'rating' => $request->input('rating'),
            'comments' => $request->input('comments'),
        );
        Teacher_evaluation::create($data);

        return redirect('dashboard')
            ->with('toast_success','Teacher Evaluation Submitted successfully');
    }

    public function course_search_result(Request $request){
        $subcategory = $request->input('subcategory');
        $institution_type_id = $request->input('institution_type_id');
        $type = $request->input('type');
        if($type == 'course'){
            $data = Course::where([['status',1],['course_sub_category_id',$subcategory],['institution_type_id',$institution_type_id]])->orderBy('id','DESC')->get();
        }else{
            $packageData = Course_package::where([['status',1],['institution_type_id',$institution_type_id]])->orderBy('id','DESC')->get();
            $data = array();
            foreach($packageData as $package){
                $subCat = explode(',',$package->course_sub_category_id);
                if(in_array($subcategory,$subCat)){
                    $data[] = Course_package::find($package->id);
                }
            }
        }

        return view('backend.students.course_search_result',compact('data','type'));
    }

    public function course_details($id){
        $id = decrypt($id);
        $data = Course::find($id);
        return view('backend.students.course_details',compact('data'));
    }

    public function purchase_course($id){
        $id = decrypt($id);
        $courseData = Course::where('id',$id)->first();
        $enrollmentData = array(
            'course_id' => $id,
            'type' => 'course',
            'user_id' => auth()->user()->id,
            'enrollment_start_date' => date('Y-m-d',strtotime($courseData->course_cost->last()->course_start_date)),
            'enrollment_end_date' => date('Y-m-d',strtotime($courseData->course_cost->last()->course_start_date.' + '.$courseData->course_duration.' Days')),
        );
        Course_enrollment::create($enrollmentData);
        return redirect('payCourseFee');
    }

    public function package_details($id){
        $id = decrypt($id);
        $data = Course_package::find($id);
        $subCat = Course_sub_category::all();
        return view('backend.students.package_details',compact('data','subCat'));
    }

    public function purchase_package($id){
        $id = decrypt($id);
        $courseData = Course_package::where('id',$id)->first();
        $enrollmentData = array(
            'course_id' => $id,
            'type' => 'package',
            'user_id' => auth()->user()->id,
            'enrollment_start_date' => date('Y-m-d',strtotime($courseData->course_package_cost->last()->package_start_date)),
            'enrollment_end_date' => date('Y-m-d',strtotime($courseData->course_package_cost->last()->package_start_date.' + '.$courseData->package_duration.' Days')),
        );
        Course_enrollment::create($enrollmentData);
        return redirect('payCourseFee');
    }
}

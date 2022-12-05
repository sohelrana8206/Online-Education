<?php

namespace App\Http\Controllers;

use App\Course;
use App\Course_package;
use App\Employment_history;
use App\Professional_qualification;
use App\Special_qualification;
use App\Training_information;
use App\Referred_student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Personal_information;
use App\Academic_qualification;
use App\Course_enrollment;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use DB;
use Hash;
use Image;
use File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['delete_user']]);
    }

    public function index(Request $request)
    {
        $data = User::where('is_active',1)->orderBy('id','DESC')->get();
        return view('backend.users.index',compact('data'));
    }

    public function approve_users(Request $request){
        $id = $request->input('id');
        $user = User::find($id);
        $user->is_active = 1;
        $user->save();

        /*This manual activity log for laravel Query Builder */
        /*User::where('id', $id)->update(['is_active' => 1]);
         activity()
            ->useLog('User')
            ->performedOn(new User())
            ->causedBy(auth()->user()->id)
            ->withProperties(['is_active' => '1'])
            ->log('This user is approved by the admin');*/

        return back()
            ->with('toast_success','Approved successfully');
    }

    public function suspend_users(Request $request){
        $id = $request->input('id');
        $user = User::find($id);
        $user->is_active = 2;
        $user->save();
        return back()
            ->with('toast_success','Suspended successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }

    public function add_user()
    {
        $roles = Role::pluck('name','name')->all();
        return view('backend.users.add_user',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $data = array(
            'name'=>$request->input('name'),
            "email"=>$request->input('email'),
            "password"=>Hash::make($request->input('password')),
            "is_active"=>1,
            "created_at"=>date('Y-m-d h:i:s')
        );

        //$input = $request->all();
        //$input['password'] = Hash::make($input['password']);

        $user = User::create($data);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('toast_success','User created successfully');
    }

    public function login_form($id){
        $courseId = decrypt($id);
        return view('auth.login',compact('courseId'));
    }

    public function course_registration($id){
        $courseId = decrypt($id);
        return view('auth.register',compact('courseId'));
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        if($request->input('roles') == 'Student'){
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);

            $userData = array(
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'is_active' => 1,
            );
            $user = User::create($userData);
            $user->assignRole($request->input('roles'));

            $data = array(
                'user_id' => $user->id,
                'mobile' => $request->input('mobile'),
                'birth_date' => date('Y-m-d',strtotime($request->input('birth-date'))),
                'home_district' => $request->input('home-district'),
                'upazila' => $request->input('upazila'),
            );
            Personal_information::create($data);

            if(!empty($request->input('referral_code'))){
                $refData = array(
                    'user_id' => $user->id,
                    'referred_code' => $request->input('referral_code'),
                );
                Referred_student::create($refData);
            }

            if(isset($request->courseID)){
                $courseInfo = explode('_',$request->courseID);

                if($courseInfo[1] == 'course'){
                    $courseData = Course::where('id',$courseInfo[0])->first();
                    $enrollmentData = array(
                        'course_id' => $courseInfo[0],
                        'type' => $courseInfo[1],
                        'user_id' => $user->id,
                        'enrollment_start_date' => date('Y-m-d',strtotime($courseData->course_cost->last()->course_start_date)),
                        'enrollment_end_date' => date('Y-m-d',strtotime($courseData->course_cost->last()->course_start_date.' + '.$courseData->course_duration.' Days')),
                    );
                    Course_enrollment::create($enrollmentData);
                }else{
                    $courseData = Course_package::where('id',$courseInfo[0])->first();
                    $enrollmentData = array(
                        'course_id' => $courseInfo[0],
                        'type' => $courseInfo[1],
                        'user_id' => $user->id,
                        'enrollment_start_date' => date('Y-m-d',strtotime($courseData->course_package_cost->last()->package_start_date)),
                        'enrollment_end_date' => date('Y-m-d',strtotime($courseData->course_package_cost->last()->package_start_date.' + '.$courseData->package_duration.' Days')),
                    );
                    Course_enrollment::create($enrollmentData);
                }

            }

            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
            {
                $request->email;
                $request->password;
                return redirect()->intended('dashboard')
                    ->with('toast_success','Registration Completed successfully');
            }
        }else{
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);

            $user = User::create($input);
            $user->assignRole($request->input('roles'));

            $data = array(
                'user_id' => $user->id,
                'mobile' => $request->input('mobile'),
                'birth_date' => date('Y-m-d',strtotime($request->input('birth-date'))),
                'home_district' => $request->input('home-district'),
                'upazila' => $request->input('upazila'),
            );
            Personal_information::create($data);
            $message = '<h1 style="font-size: 100px" class="error-title">Congratulations !</h1><h3>Your Application successfully Submitted to FCTB Academy. After Verification FCTB Academy will Confirm you by the email.</h3>';
            return view('backend.users.message',compact('message'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    public function user_profile(){
        $id = auth()->user()->id;
        $user = User::with('personal_information','academic_qualification','employment_history','professional_qualification','special_qualification','training_information')->where('id',$id)->first();

        return view('backend.users.profile',compact('user'));
    }

    public function user_profile_pdf($id){
        $id = decrypt($id);
        $user = User::with('personal_information','academic_qualification','employment_history','professional_qualification','special_qualification','training_information')->where('id',$id)->first();
        require_once(base_path('/vendor/autoload.php'));

        $mpdf = new \Mpdf\Mpdf();
        $html = view('backend.users.profile_pdf',compact('user'));
        $stylesheet = file_get_contents(base_path('public/assets/css/pdf.css'));
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($html,2);
        $fileName = $user->name.'('.date('d-m-Y').').pdf';
        $mpdf->Output($fileName, 'I');
    }

    public function add_academic(Request $request){
        $userID = auth()->user()->id;
        $exam_title = $request->input('exam_title');
        $board_university = $request->input('board_university');
        $major = $request->input('major');
        $institute = $request->input('institute');
        $result = $request->input('result');
        $passing_year = $request->input('passing_year');

        $data = array(
            'user_id' => $userID,
            'exam_title' => $exam_title,
            'board_university' => $board_university,
            'major' => $major,
            'institute' => $institute,
            'result' => $result,
            'passing_year' => $passing_year,
        );

        Academic_qualification::create($data);
        return back()
            ->with('toast_success','Academic Qualification Added successfully');
    }

    public function add_training(Request $request){
        $userID = auth()->user()->id;
        $training_title = $request->input('training_title');
        $topic = $request->input('topic');
        $institute = $request->input('institute');
        $country = $request->input('country');
        $location = $request->input('location');
        $year = $request->input('year');
        $duration = $request->input('duration');

        $data = array(
            'user_id' => $userID,
            'training_title' => $training_title,
            'topic' => $topic,
            'institute' => $institute,
            'country' => $country,
            'location' => $location,
            'year' => $year,
            'duration' => $duration,
        );

        Training_information::create($data);
        return back()
            ->with('toast_success','Training Summery Added successfully');
    }

    public function add_special(Request $request){
        $userID = auth()->user()->id;
        $qualification_name = $request->input('qualification_name');
        $qualification_details = $request->input('qualification_details');

        $data = array(
            'user_id' => $userID,
            'qualification_name' => $qualification_name,
            'qualification_details' => $qualification_details,
        );

        Special_qualification::create($data);
        return back()
            ->with('toast_success','Special Qualification Added successfully');
    }

    public function add_employment(Request $request){
        $userID = auth()->user()->id;
        $company_name = $request->input('company_name');
        $company_business = $request->input('company_business');
        $designation = $request->input('designation');
        $department = $request->input('department');
        $responsibility = $request->input('responsibility');
        $start_date = date('Y-m-d',strtotime($request->input('start_date')));
        $end_date = date('Y-m-d',strtotime($request->input('end_date')));
        $company_address = $request->input('company_address');

        $data = array(
            'user_id' => $userID,
            'company_name' => $company_name,
            'company_business' => $company_business,
            'designation' => $designation,
            'department' => $department,
            'responsibility' => $responsibility,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'company_address' => $company_address,
        );

        Employment_history::create($data);
        return back()
            ->with('toast_success','Employment History Added successfully');
    }

    public function add_professional(Request $request){
        $userID = auth()->user()->id;
        $certificate_name = $request->input('certificate_name');
        $institute = $request->input('institute');
        $location = $request->input('location');
        $form_date = date('Y-m-d',strtotime($request->input('form_date')));
        $to_date = date('Y-m-d',strtotime($request->input('to_date')));

        $data = array(
            'user_id' => $userID,
            'certificate_name' => $certificate_name,
            'institute' => $institute,
            'location' => $location,
            'form_date' => $form_date,
            'to_date' => $to_date,
        );

        Professional_qualification::create($data);
        return back()
            ->with('toast_success','Professional Qualification Added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('backend.users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('toast_success','User updated successfully');
    }

    public function update_personal_info(Request $request){
        $piID = $request->input('piID');
        $name = $request->input('name');
        $mobile = $request->input('mobile');
        $birth_date = date('Y-m-d',strtotime($request->input('birth_date')));
        $father_name = $request->input('father_name');
        $mother_name = $request->input('mother_name');
        $gender = $request->input('gender');
        $marital_status = $request->input('marital_status');
        $nationality = $request->input('nationality');
        $nid = $request->input('nid');
        $religion = $request->input('religion');
        $permanent_address = $request->input('permanent_address');
        $home_district = $request->input('home_district');
        $present_address = $request->input('present_address');
        $upazila = $request->input('upazila');
        $current_location = $request->input('current_location');

        $data = array(
            'mobile' => $mobile,
            'birth_date' => $birth_date,
            'fathers_name' => $father_name,
            'mothers_name' => $mother_name,
            'gender' => $gender,
            'marital_status' => $marital_status,
            'nationality' => $nationality,
            'national_id_no' => $nid,
            'religion' => $religion,
            'permanent_address' => $permanent_address,
            'home_district' => $home_district,
            'present_address' => $present_address,
            'upazila' => $upazila,
            'current_location' => $current_location,
        );

        $userID = auth()->user()->id;
        $userData = array('name' => $name);

        $user = Personal_information::find($piID);
        $user->update($data);

        $userName = User::find($userID);
        $userName->update($userData);

        return back()
            ->with('toast_success','personal information Updated successfully');
    }

    public function update_academic(Request $request){
        $acaID = $request->input('acaID');
        $exam_title = $request->input('exam_title');
        $board_university = $request->input('board_university');
        $major = $request->input('major');
        $institute = $request->input('institute');
        $result = $request->input('result');
        $passing_year = $request->input('passing_year');

        $data = array(
            'exam_title' => $exam_title,
            'board_university' => $board_university,
            'major' => $major,
            'institute' => $institute,
            'result' => $result,
            'passing_year' => $passing_year,
        );

        $aca = Academic_qualification::find($acaID);
        $aca->update($data);

        return back()
            ->with('toast_success','Academic Qualification Updated successfully');
    }

    public function update_training(Request $request){
        $traID = $request->input('traID');
        $training_title = $request->input('training_title');
        $topic = $request->input('topic');
        $institute = $request->input('institute');
        $country = $request->input('country');
        $location = $request->input('location');
        $year = $request->input('year');
        $duration = $request->input('duration');

        $data = array(
            'training_title' => $training_title,
            'topic' => $topic,
            'institute' => $institute,
            'country' => $country,
            'location' => $location,
            'year' => $year,
            'duration' => $duration,
        );

        $tra = Training_information::find($traID);
        $tra->update($data);

        return back()
            ->with('toast_success','Training Summery Updated successfully');
    }

    public function update_special(Request $request){
        $speID = $request->input('speID');
        $qualification_name = $request->input('qualification_name');
        $qualification_details = $request->input('qualification_details');

        $data = array(
            'qualification_name' => $qualification_name,
            'qualification_details' => $qualification_details,
        );

        $spe = Special_qualification::find($speID);
        $spe->update($data);

        return back()
            ->with('toast_success','Special Qualification Updated successfully');
    }

    public function update_employment(Request $request){
        $empID = $request->input('empID');
        $company_name = $request->input('company_name');
        $company_business = $request->input('company_business');
        $designation = $request->input('designation');
        $department = $request->input('department');
        $responsibility = $request->input('responsibility');
        $start_date = date('Y-m-d',strtotime($request->input('start_date')));
        $end_date = date('Y-m-d',strtotime($request->input('end_date')));
        $company_address = $request->input('company_address');

        $data = array(
            'company_name' => $company_name,
            'company_business' => $company_business,
            'designation' => $designation,
            'department' => $department,
            'responsibility' => $responsibility,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'company_address' => $company_address,
        );

        $emp = Employment_history::find($empID);
        $emp->update($data);

        return back()
            ->with('toast_success','Employment History Updated successfully');
    }

    public function update_professional(Request $request){
        $proID = $request->input('proID');
        $certificate_name = $request->input('certificate_name');
        $institute = $request->input('institute');
        $location = $request->input('location');
        $form_date = date('Y-m-d',strtotime($request->input('form_date')));
        $to_date = date('Y-m-d',strtotime($request->input('to_date')));

        $data = array(
            'certificate_name' => $certificate_name,
            'institute' => $institute,
            'location' => $location,
            'form_date' => $form_date,
            'to_date' => $to_date,
        );

        $pro = Professional_qualification::find($proID);
        $pro->update($data);

        return back()
            ->with('toast_success','Professional Qualification Updated successfully');
    }

    public function upload_cover_photo(Request $request){
        if($request->hasFile('cover_photo')){
            $image = $request->file('cover_photo');
            $extension = $image->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $destinationPath = public_path('/uploads/cover-photo/thumbnail');
            $publicPath = 'public/uploads/cover-photo/thumbnail/';
            $img = Image::make($image->path());
            $img->resize(1300, 350, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);
            $image->move(public_path('uploads/cover-photo'), $fileName);
            File::delete(public_path('uploads/cover-photo/'.$fileName));

            $id = $request->input('personal_id');
            $data = array(
                "cover_image"=>$publicPath.$fileName,
            );

            $cover = Personal_information::find($id);
            $cover->update($data);

            return back()
                ->with('toast_success','Cover Photo Updated successfully');
        }else{
            return back()
                ->with('toast_success','Image Upload Problem.');
        }
    }

    public function upload_profile_picture(Request $request){
        if($request->hasFile('profile_picture')){
            $image = $request->file('profile_picture');
            $extension = $image->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $destinationPath = public_path('/uploads/profile-photo/thumbnail');
            $publicPath = 'public/uploads/profile-photo/thumbnail/';
            $img = Image::make($image->path());
            $img->resize(250, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);
            $image->move(public_path('uploads/profile-photo'), $fileName);
            File::delete(public_path('uploads/profile-photo/'.$fileName));

            $id = $request->input('personal_id');
            $data = array(
                "image"=>$publicPath.$fileName,
            );

            $profile = Personal_information::find($id);
            $profile->update($data);

            return back()
                ->with('toast_success','Cover Photo Updated successfully');
        }else{
            return back()
                ->with('toast_success','Image Upload Problem.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete_user(Request $request){
        $id = $request->input('id');
        $user = User::find($id);
        $user->delete();
        return back()
            ->with('toast_success','User deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Pdf_library;
use App\Referral_package;
use App\Referral_agent;
use App\Referred_student;
use App\Notification;
use App\Course_primary_category;
use App\Course_secondary_category;
use App\Course_sub_category;
use App\Institution_type;
use App\Course;
use App\Course_package;
use App\User;
use App\Video_library;
use App\Free_quiz_setting;
use App\Free_quiz;
use App\Course_student_review;
use App\Teacher_evaluation;
use App\Course_enrollment;
use App\Payment;
use App\Teachers_commission;
use Session;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    function __construct()
    {
        //$this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','store']]);
        $this->middleware('permission:activity-log', ['only' => ['user_activities_log']]);
        $this->middleware('permission:dashboard', ['only' => ['dashboard']]);
        //$this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
        //$this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }

    public function index(){
        return view('backend.index');
    }

    public function dashboard(){

        /*START FOR GET REFERRAL CODE*/
        $id = auth()->user()->id;
        $referral_agent = Referral_agent::where([['user_id',$id],['status',1]])->first();

        if(!empty($referral_agent)){
            if($referral_agent->package_end_date >= date('Y-m-d')){
                $referral_code = $referral_agent->referral_code;
                $package_end_date = $referral_agent->package_end_date;
            }else{
                $referral_code = 'expired';
                $package_end_date = '';
            }
        }else{
            $referral_code = '';
            $package_end_date = '';
        }
        /*END FOR GET REFERRAL CODE*/

        /*START FOR GET NOTIFICATION*/
        $user_roleID = auth()->user()->roles->pluck('id')->last();
        $data = DB::table('notifications')->where('status',1)->orderBy('id','desc')->first();
        $roleID = explode(',',$data->role_id);
        if(in_array($user_roleID,$roleID)){
            $notification = array(
                'id' => $data->id,
                'title' => $data->notification_title,
                'details' => $data->notification_details,
            );
        }else{
            $notification = '';
        }
        /*END FOR GET NOTIFICATION*/

        $referral_package = Referral_package::where('status',1)->get();
        if (Auth::check()) {
            $profile_pic = User::with('personal_information')->where('id',$id)->first();

            session([
                'profile_pic' => $profile_pic->personal_information->image,
                'referral_code' => $referral_code,
                'package_end_date' => $package_end_date
            ]);
        }

       if(Auth::user()->hasRole('Teacher')){
           $courseEnrollment = new Course_enrollment();
           $totalEnrolledStudent = $courseEnrollment->get_total_enrolled_student($id);
           $todayEnrolledStudent = $courseEnrollment->get_today_enrolled_student($id);
           $courseIncome = $courseEnrollment->get_total_income_from_course($id);
           $courseCommission = Teachers_commission::where('user_id',$id)->first();

           $totalActiveCourse = Course::where([['user_id',$id],['status',1]])->get();
           $totalActivePackage = Course_package::where([['user_id',$id],['status',1]])->get();

           $referral_code = Referral_agent::where('user_id',$id)->select('referral_code','commission_rate')->first();
           $output = new Referred_student();
           $outputs = $output->my_referred_enrolled_studrnt($referral_code->referral_code);
           $outputArray = $output->my_referred_studrnt($referral_code->referral_code);
           $totalOutputArray = $output->today_my_referred_studrnt($referral_code->referral_code);
           $commissionPaid = Payment::where([['user_id',$id],['is_withdraw',1]])->sum('paid_amount');

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
           return view('backend.teacher_dashboard',compact('notification','totalEnrolledStudent','outputArray','totalOutputArray','totalActiveCourse','totalActivePackage','todayEnrolledStudent','totalOutstanding'));
       }elseif(Auth::user()->hasRole('Student')){
           session()->forget('referral_code');
           $unPaidCourseFee = Course_enrollment::where([['user_id',$id],['is_payment',0]])->get();
           if(count($unPaidCourseFee) > 0){
               return redirect('payCourseFee');
           }else{
               $primary_cat = Course_primary_category::all();
               $institution = Institution_type::all();
               $courseData = Course_enrollment::where([['user_id',$id],['enrollment_end_date','>=',date('Y-m-d')]])->get();
               return view('backend.student_dashboard',compact('notification','courseData','primary_cat','institution'));
           }
       }elseif(Auth::user()->hasRole('Agent')){
           $referral_code = Referral_agent::where('user_id',$id)->select('referral_code','commission_rate')->first();
           $output = new Referred_student();
           $outputs = $output->my_referred_enrolled_studrnt($referral_code->referral_code);
           $outputArray = $output->my_referred_studrnt($referral_code->referral_code);
           $totalOutputArray = $output->today_my_referred_studrnt($referral_code->referral_code);
           $commissionPaid = Payment::where([['user_id',$id],['is_withdraw',1]])->sum('paid_amount');

           $totalEarning = 0;
           foreach($outputs['student'] as $std){
               $stdID = $std->studentID;
               $courseInfo = Course_enrollment::where('user_id',$stdID)->get();
               foreach($courseInfo as $course){
                   $courseFee = DB::table('transactions')->where([['tran_id',$course->tran_id],['status','Complete']])->first();
                   $totalEarning = $totalEarning + $courseFee->origin_cost;
               }
           }

           $totalCommission = ($totalEarning * $referral_code->commission_rate) / 100;
           $totalOutstanding = $totalCommission - $commissionPaid;

           return view('backend.agent_dashboard',compact('referral_agent','referral_package','notification','outputArray','totalOutputArray','totalOutstanding'));
       }else{
           $totalEnrolledStudent = Course_enrollment::where([['is_payment',1],['status',1]])->groupBy('user_id')->get();
           $todayEnrolledStudent = Course_enrollment::where([['is_payment',1],['status',1],['created_at',date('Y-m-d')]])->groupBy('user_id')->get();
           $totalActiveTeacher = User::whereHas("roles", function($q){ $q->where("name", "Teacher"); })->where('is_active',1)->orderBy('id','DESC')->get();
           $totalActiveAgent = Referral_agent::where('status',1)->get();
           $pendingNewTeacher = User::with('personal_information')->whereHas("roles", function($q){ $q->where("name", "Teacher"); })->where('is_active',0)->orderBy('id','DESC')->get();
           $pendingNewAgent = User::with('personal_information')->whereHas("roles", function($q){ $q->where("name", "Agent"); })->where('is_active',0)->orderBy('id','DESC')->get();
           $pendingPaymentRequest = Payment::where('is_withdraw',0)->get();

           $referral_code = Referral_agent::where('user_id',$id)->select('referral_code','commission_rate')->first();
           $output = new Referred_student();
           $outputs = $output->my_referred_enrolled_studrnt($referral_code->referral_code);
           $outputArray = $output->my_referred_studrnt($referral_code->referral_code);
           $totalOutputArray = $output->today_my_referred_studrnt($referral_code->referral_code);
           $commissionPaid = Payment::where([['user_id',$id],['is_withdraw',1]])->sum('paid_amount');

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
           $totalOutstanding = $totalReferralCommission - $commissionPaid;

           return view('backend.dashboard',compact('notification','referral_code','totalEnrolledStudent','outputArray','totalOutputArray','totalActiveTeacher','totalActiveAgent','todayEnrolledStudent','totalOutstanding','pendingNewTeacher','pendingNewAgent','pendingPaymentRequest'));
       }
    }

    public function referral_package_list(){
        $package = Referral_package::where('status',1)->orderBy('id','DESC')->get();
        return view('backend.referral.referral_package_list',compact('package'));
    }

    public function referral_package_create(){
        $ckeditor = 'ckeditor_config.js';
        return view('backend.referral.referral_package_create',compact('ckeditor'));
    }

    public function referral_package_store(Request $request){
        $title = $request->input('title');
        $price = $request->input('price');
        $duration = $request->input('duration');
        $details = $request->input('details');

        $data = array(
            'title' => $title,
            'price' => $price,
            'duration' => $duration,
            'details' => $details,
        );

        Referral_package::create($data);
        return back()
            ->with('toast_success','Referral Package Created successfully');
    }

    public function referral_package_edit($id){
        $data = Referral_package::find($id);
        $ckeditor = 'ckeditor_config.js';
        return view('backend.referral.referral_package_edit',compact('data','ckeditor'));
    }

    public function referral_package_update(Request $request, $id){
        $title = $request->input('title');
        $price = $request->input('price');
        $duration = $request->input('duration');
        $details = $request->input('details');

        $data = array(
            'title' => $title,
            'price' => $price,
            'duration' => $duration,
            'details' => $details,
        );
        $package = Referral_package::find($id);
        $package->update($data);

        return back()
            ->with('toast_success','Referral Package Updated successfully');
    }

    public function referral_package_delete(Request $request){
        $id = $request->input('id');
        $package = Referral_package::find($id);
        $package->delete();
        return back()
            ->with('toast_success','Referral Package deleted successfully');
    }

    public function get_referral_package(){
        $referral_package = Referral_package::where('status',1)->get();
        return view('backend.referral.referral_package',compact('referral_package'));
    }

    public function my_referral(){
        $id = auth()->user()->id;
        $referral_agent = Referral_agent::where([['user_id',$id],['status',1],['package_end_date','>=',date('Y-m-d')]])->first();
        return view('backend.referral.my_referral',compact('referral_agent'));
    }

    public function my_referred_student(){
        $id = auth()->user()->id;
        $referral_code = Referral_agent::where('user_id',$id)->select('referral_code')->first();
        $output = new Referred_student();
        $outputArray = $output->my_referred_studrnt($referral_code->referral_code);

        return view('backend.referral.my_referred_student_list',compact('outputArray'));
    }

    public function referral_agent_list(){
        $agent = Referral_agent::with('user','referral_package')->where('status',1)->orderBy('id','DESC')->get();
        return view('backend.referral.referral_agent_list',compact('agent'));
    }

    public function edit_referral_agent_commission($id){
        $data = Referral_agent::find($id);
        return view('backend.referral.referral_agent_commission_edit',compact('data'));
    }

    public function referral_agent_commission_update(Request $request, $id){
        $referral_commission = $request->input('referral_commission');
        $commission = Referral_agent::find($id);
        $commission->commission_rate = $referral_commission;
        $commission->save();

        return redirect('referralAgent')
            ->with('toast_success','Referral Agent Commission Updated successfully');
    }

    public function referred_student_list(){
        $data = Referred_student::with('user')->orderBy('id','DESC')->get();
        $output = new Referred_student();
        $dataOutput = array();
        foreach($data as $item){
            $outputArray = $output->referral_agent($item->id);
            $dataOutput[] = array(
                'studentName' => $item->user['name'],
                'studentEmail' => $item->user['email'],
                'agentName' => $outputArray['agent']->agentname,
                'agentEmail' => $outputArray['agent']->agentemail,
                'agentRole' => $outputArray['agent']->userrole,
            );

        }

        return view('backend.referral.referred_student_list',compact('dataOutput'));
    }

    public function notification_list(){
        $role = DB::table('roles')->get();
        $data = Notification::where('status',1)->orderBy('id','DESC')->get();
        return view('backend.notification.notification_list',compact('data','role'));
    }

    public function notification_create(){
        $ckeditor = 'ckeditor_config.js';
        return view('backend.notification.notification_create',compact('ckeditor'));
    }

    public function notification_store(Request $request){
        $role = implode(',',$request->input('role_id'));
        $data = array(
            'notification_title' => $request->input('notification_title'),
            'publish_date' => date('Y-m-d',strtotime($request->input('publish_date'))),
            'notification_details' => $request->input('notification_details'),
            'role_id' => $role,
        );

        Notification::create($data);

        return redirect('notificationList')
            ->with('toast_success','Notification Created successfully');
    }

    public function notification_edit($id){
        $ckeditor = 'ckeditor_config.js';
        $data = Notification::find($id);

        return view('backend.notification.notification_edit',compact('ckeditor','data'));
    }

    public function notification_update(Request $request,$id){
        $role = implode(',',$request->input('role_id'));
        $data = array(
            'notification_title' => $request->input('notification_title'),
            'publish_date' => date('Y-m-d',strtotime($request->input('publish_date'))),
            'notification_details' => $request->input('notification_details'),
            'role_id' => $role,
        );

        $notification = Notification::find($id);
        $notification->update($data);

        return redirect('notificationList')
            ->with('toast_success','Notification Updated successfully');
    }

    public function notification_close(Request $request){
        $id = $request->input('id');
        $notification = Notification::find($id);
        $notification->status = 0;
        $notification->save();

        return redirect('notificationList')
            ->with('toast_success','Notification Closed successfully');
    }

    public function my_notifications(){
        $user_roleID = auth()->user()->roles->pluck('id')->last();
        $data = DB::table('notifications')->where('status',1)->orderBy('id','desc')->get();
        $notification = array();
        foreach($data as $item){
            $roleID = explode(',',$item->role_id);
            if(in_array($user_roleID,$roleID)){
                $notification[] = array(
                    'id' => $item->id,
                    'title' => $item->notification_title,
                    'details' => $item->notification_details,
                    'publish_date' => $item->publish_date,
                );
            }
        }

        return view('backend.notification.my_notifications',compact('notification'));
    }

    public function course_primary_category_list(){
        $data = Course_primary_category::all();
        return view('backend.course_category.course_primary_category_list',compact('data'));
    }

    public function create_course_primary_category(){
        return view('backend.course_category.create_course_primary_category');
    }

    public function store_course_primary_category(Request $request){
        $data = array(
            'primary_category_name' => $request->input('primary_category_name'),
        );

        Course_primary_category::create($data);

        return redirect('coursePrimaryCategory')
            ->with('toast_success','Course Primary Category Created successfully');
    }

    public function edit_course_primary_category($id){
        $data = Course_primary_category::find($id);
        return view('backend.course_category.edit_course_primary_category',compact('data'));
    }

    public function update_course_primary_category(Request $request, $id){
        $data = array(
            'primary_category_name' => $request->input('primary_category_name'),
        );
        $primary = Course_primary_category::find($id);
        $primary->update($data);

        return redirect('coursePrimaryCategory')
            ->with('toast_success','Course Primary Category Updated successfully');
    }

    public function course_secondary_category_list(){
        $data = Course_secondary_category::with('course_primary_category')->get();
        return view('backend.course_category.course_secondary_category_list',compact('data'));
    }

    public function create_course_secondary_category(){
        $primary_category = Course_primary_category::all();
        return view('backend.course_category.create_course_secondary_category',compact('primary_category'));
    }

    public function store_course_secondary_category(Request $request){
        $data = array(
            'secondary_category_name' => $request->input('secondary_category_name'),
            'course_primary_category_id' => $request->input('course_primary_category_id'),
        );

        Course_secondary_category::create($data);

        return redirect('courseSecondaryCategory')
            ->with('toast_success','Course Secondary Category Created successfully');
    }

    public function edit_course_secondary_category($id){
        $data = Course_secondary_category::find($id);
        $primary_category = Course_primary_category::all();
        return view('backend.course_category.edit_course_secondary_category',compact('data','primary_category'));
    }

    public function update_course_secondary_category(Request $request, $id){
        $data = array(
            'secondary_category_name' => $request->input('secondary_category_name'),
            'course_primary_category_id' => $request->input('course_primary_category_id'),
        );
        $secondary = Course_secondary_category::find($id);
        $secondary->update($data);

        return redirect('courseSecondaryCategory')
            ->with('toast_success','Course Secondary Category Updated successfully');
    }

    public function course_sub_category_list(){
        $data = Course_sub_category::with('course_secondary_category')->get();
        return view('backend.course_category.course_sub_category_list',compact('data'));
    }

    public function create_course_sub_category(){
        $secondary_category = Course_secondary_category::with('course_primary_category')->get();
        return view('backend.course_category.create_course_sub_category',compact('secondary_category'));
    }

    public function store_course_sub_category(Request $request){
        $data = array(
            'sub_category_name' => $request->input('sub_category_name'),
            'course_secondary_category_id' => $request->input('course_secondary_category_id'),
        );

        Course_sub_category::create($data);

        return redirect('courseSubCategory')
            ->with('toast_success','Course Sub Category Created successfully');
    }

    public function edit_course_sub_category($id){
        $data = Course_sub_category::find($id);
        $secondary_category = Course_secondary_category::all();
        return view('backend.course_category.edit_course_sub_category',compact('data','secondary_category'));
    }

    public function update_course_sub_category(Request $request, $id){
        $data = array(
            'sub_category_name' => $request->input('sub_category_name'),
            'course_secondary_category_id' => $request->input('course_secondary_category_id'),
        );
        $sub = Course_sub_category::find($id);
        $sub->update($data);

        return redirect('courseSubCategory')
            ->with('toast_success','Course Sub Category Updated successfully');
    }

    public function institution_type_list(){
        $data = Institution_type::all();
        return view('backend.institution_type.institution_type_list',compact('data'));
    }

    public function create_institution_type(){
        return view('backend.institution_type.create_institution_type');
    }

    public function store_institution_type(Request $request){
        $data = array(
            'institution_type_name' => $request->input('institution_type_name'),
        );

        Institution_type::create($data);

        return redirect('institutionType')
            ->with('toast_success','Institution Type Created successfully');
    }

    public function edit_institution_type($id){
        $data = Institution_type::find($id);
        return view('backend.institution_type.edit_institution_type',compact('data'));
    }

    public function update_institution_type(Request $request,$id){
        $data = array(
            'institution_type_name' => $request->input('institution_type_name'),
        );

        $insType = Institution_type::find($id);
        $insType->update($data);

        return redirect('institutionType')
            ->with('toast_success','Institution Type Updated successfully');
    }

    public function pending_course_list(){
        $data = Course::where('is_course_verified',0)->orderBy('id','DESC')->get();
        return view('backend.teachers.pending_course_list',compact('data'));
    }

    public function approve_course(Request $request){
        $id = $request->input('id');
        $course = Course::find($id);
        $course->is_course_verified = 1;
        $course->approved_by = auth()->user()->id;
        $course->save();

        return back()
            ->with('toast_success','Course Approved successfully');
    }

    public function reject_course(Request $request){
        $id = $request->input('id');
        $course = Course::find($id);
        $course->is_course_verified = 2;
        $course->save();

        return back()
            ->with('toast_success','Course Rejected successfully');
    }

    public function active_course_list(){
        $data = Course::with('approved_name')->where([['is_course_verified',1],['status',1]])->orderBy('id','DESC')->get();
        return view('backend.teachers.active_course_list',compact('data'));
    }

    public function inactivate_course(Request $request){
        $id = $request->input('id');
        $course = Course::find($id);
        $course->status = 0;
        $course->save();

        return back()
            ->with('toast_success','Course Inactivated successfully');
    }

    public function inactive_course_list(){
        $data = Course::where('is_course_verified',2)->orWhere('status',0)->orderBy('id','DESC')->get();
        return view('backend.teachers.inactive_course_list',compact('data'));
    }

    public function active_course(Request $request){
        $id = $request->input('id');
        $course = Course::find($id);
        $course->status = 1;
        $course->save();

        return back()
            ->with('toast_success','Course Activated successfully');
    }

    public function pending_course_package_list(){
        $subCat = Course_sub_category::all();
        $data = Course_package::where('is_package_verified',0)->orderBy('id','DESC')->get();
        return view('backend.teachers.pending_course_package_list',compact('data','subCat'));
    }

    public function approve_course_package(Request $request){
        $id = $request->input('id');
        $package = Course_package::find($id);
        $package->is_package_verified = 1;
        $package->approved_by = auth()->user()->id;
        $package->save();

        return back()
            ->with('toast_success','Course Package Approved successfully');
    }

    public function reject_course_package(Request $request){
        $id = $request->input('id');
        $package = Course_package::find($id);
        $package->is_package_verified = 2;
        $package->save();

        return back()
            ->with('toast_success','Course Package Rejected successfully');
    }

    public function active_course_package_list(){
        $subCat = Course_sub_category::all();
        $data = Course_package::with('approved_name')->where([['is_package_verified',1],['status',1]])->orderBy('id','DESC')->get();
        return view('backend.teachers.active_course_package_list',compact('data','subCat'));
    }

    public function inactivate_course_package(Request $request){
        $id = $request->input('id');
        $package = Course_package::find($id);
        $package->status = 0;
        $package->save();

        return back()
            ->with('toast_success','Course Package Inactivated successfully');
    }

    public function inactive_course_package_list(){
        $subCat = Course_sub_category::all();
        $data = Course_package::where('is_package_verified',2)->orWhere('status',0)->orderBy('id','DESC')->get();
        return view('backend.teachers.inactive_course_package_list',compact('data','subCat'));
    }

    public function active_course_package(Request $request){
        $id = $request->input('id');
        $package = Course_package::find($id);
        $package->status = 1;
        $package->save();

        return back()
            ->with('toast_success','Course Package Activated successfully');
    }

    public function pdf_library_list(){
        $data = Pdf_library::orderBy('id','DESC')->get();
        return view('backend.teachers.pdf_library',compact('data'));
    }

    public function video_library_list(){
        $data = Video_library::orderBy('id','DESC')->get();
        return view('backend.teachers.video_library',compact('data'));
    }

    public function free_quiz(){
        $data = Free_quiz_setting::orderBy('id','DESC')->get();
        return view('backend.teachers.free_quiz',compact('data'));
    }

    public function course_review(){
        $data = Course_student_review::orderBy('id','DESC')->get();
        return view('backend.teachers.course_review',compact('data'));
    }

    public function teacher_review(){
        $data = Teacher_evaluation::orderBy('id','DESC')->get();
        return view('backend.teachers.teacher_review',compact('data'));
    }

    public function withdraw_request(Request $request){
        $amount = $request->input('amount');
        $data = array(
            'user_id' => auth()->user()->id,
            'amount' => $amount,
        );
        Payment::create($data);
        return back()
            ->with('toast_success','Withdraw Request successfully Send');
    }

    public function payment_request_modal(Request $request){
        $id = $request->input('id');
        $request_amount = $request->input('request_amount');
        return view('backend.payment_request_modal',compact('id','request_amount'));
    }

    public function approve_payment_request(Request $request){
        $id = $request->input('id');
        $paid_amount = $request->input('partial_amount');
        $payment = Payment::find($id);
        $payment->is_withdraw = 1;
        $payment->paid_amount = $paid_amount;
        $payment->save();

        return back()
            ->with('toast_success','Withdraw Request Approved successfully');
    }

    public function payment_history(Request $request){
        $id = $request->input('id');
        $data = Payment::where([['user_id',$id],['is_withdraw',1]])->get();
        return view('backend.payment_history',compact('data'));
    }

    public function agents_referred_student(Request $request){
        $id = $request->input('id');
        $referralCode = Referral_agent::where('user_id',$id)->first();
        if(!empty($referralCode)){
            $data = Referred_student::where('referred_code',$referralCode->referral_code)->get();
        }else{
            $data = '';
        }
        return view('backend.agents.agents_referred_student',compact('data'));
    }

    public function course_status(){
        $data = DB::table('course_costs')
            ->join('courses','course_costs.course_id' , '=','courses.id','LEFT')
            ->join('users','courses.user_id' , '=','users.id','LEFT')
            ->orderBy('course_costs.course_complete_status')
            ->select('course_costs.*','courses.course_title','courses.course_duration','users.name','users.email')
            ->get();
        return view('backend.teachers.course_status',compact('data'));
    }

    public function package_status(){
        $data = DB::table('course_package_costs')
            ->join('course_packages','course_package_costs.course_package_id' , '=','course_packages.id','LEFT')
            ->join('users','course_packages.user_id' , '=','users.id','LEFT')
            ->orderBy('course_package_costs.package_complete_status')
            ->select('course_package_costs.*','course_packages.package_title','course_packages.package_duration','users.name','users.email')
            ->get();
        return view('backend.teachers.package_status',compact('data'));
    }

    public function course_completed_student(){
        $courseData = DB::table('course_enrollments')
            ->join('course_costs','course_enrollments.course_id' , '=','course_costs.course_id','LEFT')
            ->join('users','course_enrollments.user_id' , '=','users.id','LEFT')
            ->join('personal_informations', 'users.id', '=', 'personal_informations.user_id')
            ->where('course_enrollments.type','course')
            ->where('course_costs.course_complete_status',1)
            ->select('course_enrollments.user_id',DB::raw('users.name,users.email,personal_informations.mobile,personal_informations.home_district,personal_informations.upazila,course_enrollments.created_at'))
            ->groupBy('course_enrollments.user_id')
            ->get();

        $packageData = DB::table('course_enrollments')
            ->join('course_package_costs','course_enrollments.course_id' , '=','course_package_costs.course_package_id','LEFT')
            ->join('users','course_enrollments.user_id' , '=','users.id','LEFT')
            ->join('personal_informations', 'users.id', '=', 'personal_informations.user_id')
            ->where('course_enrollments.type','package')
            ->where('course_package_costs.package_complete_status',1)
            ->select('course_enrollments.user_id',DB::raw('users.name,users.email,personal_informations.mobile,personal_informations.home_district,personal_informations.upazila,course_enrollments.created_at'))
            ->groupBy('course_enrollments.user_id')
            ->get();
        return view('backend.students.course_completed_student',compact('courseData','packageData'));
    }

    public function accounts_summery(){
        $id = auth()->user()->id;
        $pendingPaymentRequest = Payment::where('is_withdraw',0)->get();
        $totalIncome = DB::table('transactions')->where('status','Complete')->sum('amount');
        $totalPayment = Payment::where('is_withdraw',1)->sum('paid_amount');
        $totalIncomeList = DB::table('transactions')->where('status','Complete')->orderBy('id','desc')->get();
        $totalPaymentList = Payment::where('is_withdraw',1)->orderBy('id','desc')->get();

        $referral_code = Referral_agent::where('user_id',$id)->select('referral_code','commission_rate')->first();
        $output = new Referred_student();
        $outputs = $output->my_referred_enrolled_studrnt($referral_code->referral_code);
        $commissionPaid = Payment::where([['user_id',$id],['is_withdraw',1]])->sum('paid_amount');
        $withdrawRequest = Payment::where([['user_id',$id],['is_withdraw',0]])->first();

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
        $totalOutstanding = $totalReferralCommission - $commissionPaid;

        return view('backend.accounts_summery',compact('referral_code','withdrawRequest','totalIncome','totalPayment','totalOutstanding','pendingPaymentRequest','totalIncomeList','totalPaymentList'));
    }

    public function user_activities_log(){

        //dd(Activity::with('causer')->orderBy('id','DESC')->get()->toArray());

        //dd(Activity::with('causer')->orderBy('id','DESC')->get()->map(function ($m) {return [[$m->causer->name],[$m->causer->email]];}));

        $data = Activity::with('causer')->orderBy('id','DESC')->get()->toArray();
        return view('backend.log.user_activities_log',compact('data'));
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        Cache::flush();
        return redirect('admin');
    }
}

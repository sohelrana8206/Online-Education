<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Referred_student extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'user_id', 'referred_code',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['user_id', 'referred_code'];

    protected static $logName = 'Referred Student';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Referred Student has been {$eventName}";
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function referral_agent($id){
        $agent = DB::table('referred_students')
            ->join('referral_agents','referred_students.referred_code' , '=','referral_agents.referral_code','LEFT')
            ->join('users','referral_agents.user_id' , '=','users.id','LEFT')
            ->join('model_has_roles', function ($join) {
                $join->on('users.id', '=', 'model_has_roles.model_id')
                    ->where('model_has_roles.model_type', User::class);
            })
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('referred_students.id',$id)
            ->select('users.name as agentname','users.email as agentemail','roles.name as userrole')
            ->first();

        return array(
            'agent' => $agent
        );
    }

    public function monthly_earning($referral_code,$commission_rate){

        $earning = DB::table('referred_students')
            ->join('users','referred_students.user_id' , '=','users.id','LEFT')
            ->join('course_enrollments', 'users.id', '=', 'course_enrollments.user_id')
            ->join('transactions', 'course_enrollments.tran_id', '=', 'transactions.tran_id')
            ->where('referred_students.referred_code',$referral_code)
            ->where('course_enrollments.is_payment',1)
            ->select('transactions.origin_cost','transactions.created_at')
            ->get();

        $income = array();
        foreach($earning as $value){
            $courseCommission = ($value->origin_cost * $commission_rate) / 100;
            $income[] = array(
                'commission' => $courseCommission,
                'date' => $value->created_at
            );
        }

        return array(
            'income' => $income
        );
    }
    public function my_referred_enrolled_studrnt($referral_code){
        $student = DB::table('referred_students')
            ->join('users','referred_students.user_id' , '=','users.id','LEFT')
            ->join('personal_informations', 'users.id', '=', 'personal_informations.user_id')
            ->join('course_enrollments', 'users.id', '=', 'course_enrollments.user_id')
            ->where('referred_students.referred_code',$referral_code)
            ->where('course_enrollments.is_payment',1)
            ->select('users.id as studentID','users.name as studentname','users.email as studentemail','personal_informations.mobile','personal_informations.home_district','personal_informations.upazila','course_enrollments.is_payment')
            ->groupBy('users.id','users.name','users.email','personal_informations.mobile','personal_informations.home_district','personal_informations.upazila','course_enrollments.is_payment')
            ->get();

        return array(
            'student' => $student
        );
    }

    public function my_referred_studrnt($referral_code){
        $student = DB::table('referred_students')
            ->join('users','referred_students.user_id' , '=','users.id','LEFT')
            ->join('personal_informations', 'users.id', '=', 'personal_informations.user_id')
            ->join('course_enrollments', 'users.id', '=', 'course_enrollments.user_id')
            ->where('referred_students.referred_code',$referral_code)
            ->select('users.id as studentID','users.name as studentname','users.email as studentemail','personal_informations.mobile','personal_informations.home_district','personal_informations.upazila','course_enrollments.is_payment')
            ->groupBy('users.id','users.name','users.email','personal_informations.mobile','personal_informations.home_district','personal_informations.upazila','course_enrollments.is_payment')
            ->get();

        return array(
            'student' => $student
        );
    }

    public function today_my_referred_studrnt($referral_code){
        $student = DB::table('referred_students')
            ->join('users','referred_students.user_id' , '=','users.id','LEFT')
            ->join('personal_informations', 'users.id', '=', 'personal_informations.user_id')
            ->where('referred_students.referred_code',$referral_code)
            ->where('referred_students.created_at',date('Y-m-d'))
            ->select('users.id as studentID','users.name as studentname','users.email as studentemail','personal_informations.mobile','personal_informations.home_district','personal_informations.upazila')
            ->get();

        return array(
            'student' => $student
        );
    }
}

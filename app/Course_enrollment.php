<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Course_enrollment extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'course_id', 'type','user_id','enrollment_start_date','enrollment_end_date','is_payment','tran_id','status',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['course_id', 'type','user_id','enrollment_start_date','enrollment_end_date','is_payment','tran_id','status'];

    protected static $logName = 'Course Enrollment';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Course Enrollment has been {$eventName}";
    }

    public function course(){
        return $this->belongsTo('App\Course','course_id');
    }

    public function course_package(){
        return $this->belongsTo('App\Course_package','course_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function get_total_enrolled_student($id){
        $courseStudent = DB::table('course_enrollments')
            ->join('courses','course_enrollments.course_id' , '=','courses.id','LEFT')
            ->where('course_enrollments.type','course')
            ->where('courses.user_id',$id)
            ->select('course_enrollments.course_id')
            ->groupBy('course_enrollments.user_id')
            ->get();

        $packageStudent = DB::table('course_enrollments')
            ->join('course_packages','course_enrollments.course_id' , '=','course_packages.id','LEFT')
            ->where('course_enrollments.type','package')
            ->where('course_packages.user_id',$id)
            ->select('course_enrollments.course_id')
            ->groupBy('course_enrollments.user_id')
            ->get();

        return array(
            'courseStudent' => $courseStudent,
            'packageStudent' => $packageStudent
        );
    }

    public function get_today_enrolled_student($id){
        $courseStudent = DB::table('course_enrollments')
            ->join('courses','course_enrollments.course_id' , '=','courses.id','LEFT')
            ->join('users','course_enrollments.user_id' , '=','users.id','LEFT')
            ->join('personal_informations', 'users.id', '=', 'personal_informations.user_id')
            ->where('course_enrollments.type','course')
            ->where('courses.user_id',$id)
            ->where('course_enrollments.created_at',date('Y-m-d'))
            ->select('course_enrollments.user_id','users.name as studentname','users.email as studentemail','personal_informations.mobile','personal_informations.home_district','personal_informations.upazila','course_enrollments.type')
            ->get();

        $packageStudent = DB::table('course_enrollments')
            ->join('course_packages','course_enrollments.course_id' , '=','course_packages.id','LEFT')
            ->join('users','course_enrollments.user_id' , '=','users.id','LEFT')
            ->join('personal_informations', 'users.id', '=', 'personal_informations.user_id')
            ->where('course_enrollments.type','package')
            ->where('course_packages.user_id',$id)
            ->where('course_enrollments.created_at',date('Y-m-d'))
            ->select('course_enrollments.user_id','users.name as studentname','users.email as studentemail','personal_informations.mobile','personal_informations.home_district','personal_informations.upazila','course_enrollments.type')
            ->get();

        return array(
            'courseStudent' => $courseStudent,
            'packageStudent' => $packageStudent
        );
    }

    public function get_total_income_from_course($id){
        $courseIncome = DB::table('course_enrollments')
            ->join('courses','course_enrollments.course_id' , '=','courses.id','LEFT')
            ->join('transactions','course_enrollments.tran_id' , '=','transactions.tran_id','LEFT')
            ->where('course_enrollments.type','course')
            ->where('courses.user_id',$id)
            ->where('transactions.status','Complete')
            ->sum('transactions.origin_cost');

        $packageIncome = DB::table('course_enrollments')
            ->join('course_packages','course_enrollments.course_id' , '=','course_packages.id','LEFT')
            ->join('transactions','course_enrollments.tran_id' , '=','transactions.tran_id','LEFT')
            ->where('course_enrollments.type','package')
            ->where('course_packages.user_id',$id)
            ->where('transactions.status','Complete')
            ->sum('transactions.origin_cost');

        return array(
            'courseIncome' => $courseIncome + $packageIncome,
        );
    }

    public function get_income_from_course($id,$commission_rate){
        $earningCourse = DB::table('course_enrollments')
            ->join('courses','course_enrollments.course_id' , '=','courses.id','LEFT')
            ->join('transactions','course_enrollments.tran_id' , '=','transactions.tran_id','LEFT')
            ->where('course_enrollments.type','course')
            ->where('courses.user_id',$id)
            ->where('transactions.status','Complete')
            ->select('transactions.origin_cost','transactions.created_at')
        ->get();

        $earningPackage = DB::table('course_enrollments')
            ->join('course_packages','course_enrollments.course_id' , '=','course_packages.id','LEFT')
            ->join('transactions','course_enrollments.tran_id' , '=','transactions.tran_id','LEFT')
            ->where('course_enrollments.type','package')
            ->where('course_packages.user_id',$id)
            ->where('transactions.status','Complete')
            ->select('transactions.origin_cost','transactions.created_at')
        ->get();

        $incomeCourse = array();
        $incomePackage = array();
        foreach($earningCourse as $value){
            $courseCommission = ($value->origin_cost * $commission_rate) / 100;
            $incomeCourse[] = array(
                'commission' => $courseCommission,
                'date' => $value->created_at
            );
        }
        foreach($earningPackage as $item){
            $packageCommission = ($item->origin_cost * $commission_rate) / 100;
            $incomePackage[] = array(
                'commission' => $packageCommission,
                'date' => $value->created_at
            );
        }

        $income = array_merge($incomeCourse,$incomePackage);

        return array(
            'courseIncome' => $income,
        );
    }
}

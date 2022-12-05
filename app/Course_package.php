<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Support\Facades\DB;

class Course_package extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'package_title', 'package_subtitle','course_sub_category_id','institution_type_id','package_details','package_requirements','package_component','package_benefit','package_content','package_duration','package_image','is_package_verified','approved_by','user_id','status',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['package_title', 'package_subtitle','course_sub_category_id','institution_type_id','package_details','package_requirements','package_component','package_benefit','package_content','package_duration','package_image','is_package_verified','approved_by','user_id','status'];

    protected static $logName = 'Course Package';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Course Package has been {$eventName}";
    }

    public function course_package_cost(){
        return $this->hasMany('App\Course_package_cost');
    }

    public function institution_type(){
        return $this->belongsTo('App\Institution_type','institution_type_id');
    }

    public function course_package_lesson(){
        return $this->hasMany('App\Course_package_lesson');
    }

    public function course_enrollment(){
        return $this->hasMany('App\Course_enrollment');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function approved_name(){
        return $this->belongsTo('App\User','approved_by');
    }
}

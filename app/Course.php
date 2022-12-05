<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Course extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'course_title', 'course_sub_title', 'course_sub_category_id', 'institution_type_id', 'course_details', 'course_requirement', 'course_component', 'course_benefit', 'course_content','course_duration','course_image','is_course_verified','approved_by','user_id','status',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['course_title', 'course_sub_title', 'course_sub_category_id', 'institution_type_id','course_details', 'course_requirement', 'course_component', 'course_benefit', 'course_content','course_duration','course_image','is_course_verified','approved_by','status'];

    protected static $logName = 'Course';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Course has been {$eventName}";
    }

    public function course_sub_category(){
        return $this->belongsTo('App\Course_sub_category','course_sub_category_id');
    }

    public function institution_type(){
        return $this->belongsTo('App\Institution_type','institution_type_id');
    }

    public function course_cost(){
        return $this->hasMany('App\Course_cost');
    }

    public function course_lesson(){
        return $this->hasMany('App\Course_lesson');
    }

    public function course_batch(){
        return $this->hasOne('App\Course_batch');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function approved_name(){
        return $this->belongsTo('App\User','approved_by');
    }
}

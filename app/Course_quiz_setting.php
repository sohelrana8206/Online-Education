<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Course_quiz_setting extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'quiz_name', 'time_duration', 'course_batch_id','status',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['quiz_name', 'time_duration', 'course_batch_id','status'];

    protected static $logName = 'Course Quiz Setting';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Course Quiz Setting has been {$eventName}";
    }

    public function course_batch(){
        return $this->belongsTo('App\Course_batch','course_batch_id');
    }

    public function student_course_quiz_answer(){
        return $this->hasMany('App\Student_course_quiz_answer');
    }
}

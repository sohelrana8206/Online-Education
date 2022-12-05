<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Student_course_assignment extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'user_id', 'course_assignment_id', 'assignment',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['user_id', 'course_assignment_id', 'assignment'];

    protected static $logName = 'Student Course Assignment';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Student Course Assignment has been {$eventName}";
    }

    public function course_assignment(){
        return $this->belongsTo('App\Course_assignment','course_assignment_id');
    }
}

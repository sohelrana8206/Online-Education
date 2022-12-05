<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Course_student_review extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'user_id', 'course_id', 'type','rating','comments',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['user_id', 'course_id', 'type','rating','comments'];

    protected static $logName = 'Course Student Review';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Course Student Review has been {$eventName}";
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
}

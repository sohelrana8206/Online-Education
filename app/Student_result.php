<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Student_result extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'user_id', 'course_id','type','exam_name','full_marks','obtained_marks',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['user_id', 'course_id','type','exam_name','full_marks','obtained_marks'];

    protected static $logName = 'Student Result';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Student Result has been {$eventName}";
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function course(){
        return $this->belongsTo('App\Course','course_id');
    }
}

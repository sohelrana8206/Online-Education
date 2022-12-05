<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Teacher_evaluation extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'user_id', 'course_id','type','rating','comments',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['user_id', 'course_id','type','rating','comments'];

    protected static $logName = 'Teacher Evaluation';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Teacher Evaluation has been {$eventName}";
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function course(){
        return $this->belongsTo('App\Course','course_id');
    }

    public function course_package(){
        return $this->belongsTo('App\Course_package','course_id');
    }
}

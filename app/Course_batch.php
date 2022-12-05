<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Course_batch extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'course_batch_title', 'course_id', 'status',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['course_batch_title', 'course_id', 'status'];

    protected static $logName = 'Course Batch';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Course Batch has been {$eventName}";
    }

    public function course(){
        return $this->belongsTo('App\Course','course_id');
    }
}

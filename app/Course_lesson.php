<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Course_lesson extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'lesson_title', 'lesson_description', 'lesson_duration','lesson_start_date','course_id',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['lesson_title', 'lesson_description', 'lesson_duration','lesson_start_date','course_id'];

    protected static $logName = 'Course Lesson';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Course Lesson has been {$eventName}";
    }

    public function course(){
        return $this->belongsTo('App\Course','course_id');
    }
}

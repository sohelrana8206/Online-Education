<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Course_package_lesson extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'package_lesson_title', 'package_lesson_description', 'package_lesson_duration','package_lesson_start_date','course_package_id',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['package_lesson_title', 'package_lesson_description', 'package_lesson_duration','package_lesson_start_date','course_package_id'];

    protected static $logName = 'Course Package Lesson';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Course Package Lesson has been {$eventName}";
    }

    public function course_package(){
        return $this->belongsTo('App\Course_package','course_package_id');
    }
}

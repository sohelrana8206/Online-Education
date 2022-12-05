<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Course_package_batch extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'course_package_batch_title','course_package_id','status',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['course_package_batch_title','course_package_id','status'];

    protected static $logName = 'Course Package Batch';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Course Package Batch has been {$eventName}";
    }

    public function course_package(){
        return $this->belongsTo('App\Course_package','course_package_id');
    }
}

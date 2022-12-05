<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Course_package_batch_student_mapping extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'course_package_batch_id','user_id',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['course_package_batch_id','user_id'];

    protected static $logName = 'Course Package Batch Student Mapping';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Course Package Batch Student Mapping has been {$eventName}";
    }

    public function course_package_batch(){
        return $this->belongsTo('App\Course_package_batch','course_package_batch_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}

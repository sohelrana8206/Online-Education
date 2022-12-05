<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Package_quiz_setting extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'quiz_name', 'time_duration', 'course_package_batch_id','status',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['quiz_name', 'time_duration', 'course_package_batch_id','status'];

    protected static $logName = 'Package Quiz Setting';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Package Quiz Setting has been {$eventName}";
    }

    public function course_package_batch(){
        return $this->belongsTo('App\Course_package_batch','course_package_batch_id');
    }
}

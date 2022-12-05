<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Student_package_assignment extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'user_id', 'package_assignment_id', 'assignment',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['user_id', 'package_assignment_id', 'assignment'];

    protected static $logName = 'Student Package Assignment';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Student Package Assignment has been {$eventName}";
    }

    public function package_assignment(){
        return $this->belongsTo('App\Package_assignment','package_assignment_id');
    }
}

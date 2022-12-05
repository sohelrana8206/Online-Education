<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Package_assignment extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'title', 'details', 'submit_last_date','course_package_batch_id','status',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['title', 'details', 'submit_last_date','course_package_batch_id','status'];

    protected static $logName = 'Package Assignment';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Package Assignment has been {$eventName}";
    }

    public function course_package_batch(){
        return $this->belongsTo('App\Course_package_batch','course_package_batch_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Course_package_cost extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'package_fee', 'package_discount_rate', 'package_discounted_cost','package_registration_last_date','package_start_date','course_package_id',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['package_fee', 'package_discount_rate', 'package_discounted_cost','package_registration_last_date','package_start_date','course_package_id'];

    protected static $logName = 'Course Package Cost';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Course Package Cost has been {$eventName}";
    }

    public function course_package(){
        return $this->belongsTo('App\Course_package','course_package_id');
    }
}

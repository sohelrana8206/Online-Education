<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Course_cost extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'course_fee', 'course_discount_rate', 'course_discounted_cost','course_registration_last_date','course_start_date','course_id',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['course_fee', 'course_discount_rate', 'course_discounted_cost','course_registration_last_date','course_start_date','course_id'];

    protected static $logName = 'Course Cost';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Course Cost has been {$eventName}";
    }

    public function course(){
        return $this->belongsTo('App\Course','course_id');
    }
}

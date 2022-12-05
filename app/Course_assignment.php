<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Course_assignment extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'title', 'details', 'submit_last_date','course_batch_id','status',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['title', 'details', 'submit_last_date','course_batch_id','status'];

    protected static $logName = 'Course Assignment';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Course Assignment has been {$eventName}";
    }

    public function course_batch(){
        return $this->belongsTo('App\Course_batch','course_batch_id');
    }
}

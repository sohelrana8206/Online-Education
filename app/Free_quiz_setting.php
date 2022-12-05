<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Free_quiz_setting extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'quiz_name', 'time_duration', 'course_sub_category_id','user_id','status',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['quiz_name', 'time_duration', 'course_sub_category','user_id','status'];

    protected static $logName = 'Free Quiz Setting';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Free Quiz Setting has been {$eventName}";
    }

    public function course_sub_category(){
        return $this->belongsTo('App\Course_sub_category','course_sub_category_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}

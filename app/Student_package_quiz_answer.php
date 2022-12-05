<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Student_package_quiz_answer extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'user_id', 'package_quiz_question_id','package_quiz_setting_id','answer',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['user_id', 'package_quiz_question_id','package_quiz_setting_id','answer'];

    protected static $logName = 'Student Package Quiz Answer';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Student Package Quiz Answer has been {$eventName}";
    }

    public function package_quiz_question(){
        return $this->belongsTo('App\Package_quiz_question','package_quiz_question_id');
    }

    public function package_quiz_setting(){
        return $this->belongsTo('App\Package_quiz_setting','package_quiz_setting_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}

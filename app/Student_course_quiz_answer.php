<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Student_course_quiz_answer extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'user_id', 'course_quiz_question_id','course_quiz_setting_id','answer',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['user_id', 'course_quiz_question_id','course_quiz_setting_id','answer'];

    protected static $logName = 'Student Course Quiz Answer';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Student Course Quiz Answer has been {$eventName}";
    }

    public function course_quiz_question(){
        return $this->belongsTo('App\Course_quiz_question','course_quiz_question_id');
    }

    public function course_quiz_setting(){
        return $this->belongsTo('App\Course_quiz_setting','course_quiz_setting_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}

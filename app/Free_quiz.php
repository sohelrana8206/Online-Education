<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Free_quiz extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'questions', 'option_one', 'option_two','option_three','option_four','answer','free_quiz_setting_id',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['questions', 'option_one', 'option_two','option_three','option_four','answer','free_quiz_setting_id'];

    protected static $logName = 'Free Quiz';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Free Quiz has been {$eventName}";
    }

    public function free_quiz_setting(){
        return $this->belongsTo('App\Free_quiz_setting','free_quiz_setting_id');
    }
}

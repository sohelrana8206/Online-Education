<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Package_quiz_question extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'question', 'option_one', 'option_two','option_three','option_four','answer','package_quiz_setting_id',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['question', 'option_one', 'option_two','option_three','option_four','answer','package_quiz_setting_id'];

    protected static $logName = 'Package Quiz Question';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Package Quiz Question has been {$eventName}";
    }

    public function package_quiz_setting(){
        return $this->belongsTo('App\Package_quiz_setting','package_quiz_setting_id');
    }
}

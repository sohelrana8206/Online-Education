<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Academic_qualification extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'user_id', 'exam_title', 'board_university', 'major','institute', 'result', 'passing_year',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['exam_title', 'board_university', 'major','institute', 'result', 'passing_year'];

    protected static $logName = 'Academic Qualification';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Academic Qualification has been {$eventName}";
    }

    public function user(){
        return $this->hasMany('App\User','user_id');
    }
}

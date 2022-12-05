<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Special_qualification extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'user_id', 'qualification_name', 'qualification_details',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['qualification_name','qualification_details'];

    protected static $logName = 'Special Qualification';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Special Qualification has been {$eventName}";
    }

    public function user(){
        return $this->hasMany('App\User','user_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Professional_qualification extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'user_id', 'certificate_name', 'institute','location', 'form_date', 'to_date',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['certificate_name', 'institute','location', 'form_date', 'to_date'];

    protected static $logName = 'Professional Qualification';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Professional Qualification has been {$eventName}";
    }

    public function user(){
        return $this->hasMany('App\User','user_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Referral_package extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'title', 'price', 'duration', 'details','status',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['title', 'price', 'duration', 'details','status'];

    protected static $logName = 'Referral Package';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Referral Package has been {$eventName}";
    }

    public function referral_agent(){
        return $this->hasOne('App\Referral_agent');
    }
}

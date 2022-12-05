<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Employment_history extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'user_id', 'company_name', 'company_business','designation', 'department', 'responsibility', 'start_date', 'company_address',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['company_name', 'company_business','designation', 'department', 'responsibility', 'start_date', 'end_date', 'company_address'];

    protected static $logName = 'Employment History';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Employment History has been {$eventName}";
    }

    public function user(){
        return $this->hasMany('App\User','user_id');
    }
}

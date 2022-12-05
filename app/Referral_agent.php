<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Referral_agent extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'user_id', 'referral_package_id', 'referral_code', 'commission_rate', 'package_start_date', 'package_end_date', 'tran_id','status',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['user_id', 'referral_package_id', 'referral_code', 'commission_rate', 'package_start_date', 'package_end_date', 'tran_id','status'];

    protected static $logName = 'Referral Agent';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Referral Agent has been {$eventName}";
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function referral_package(){
        return $this->belongsTo('App\Referral_package','referral_package_id');
    }
}

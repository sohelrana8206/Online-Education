<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Payment extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'user_id','is_withdraw','amount','paid_amount',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['user_id','is_withdraw','amount','paid_amount'];

    protected static $logName = 'Payment';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Payment has been {$eventName}";
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}

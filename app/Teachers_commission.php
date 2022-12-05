<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Teachers_commission extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'user_id', 'commission_rate',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['user_id', 'commission_rate'];

    protected static $logName = 'Teachers Commission';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Teachers Commission has been {$eventName}";
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}

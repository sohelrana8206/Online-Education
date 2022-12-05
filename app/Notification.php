<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Notification extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'notification_title', 'publish_date', 'notification_details', 'role_id','status',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['notification_title', 'publish_date', 'notification_details', 'role_id','status'];

    protected static $logName = 'Notification';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Notification has been {$eventName}";
    }
}

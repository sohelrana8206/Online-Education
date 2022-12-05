<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Institution_type extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'institution_type_name',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['institution_type_name'];

    protected static $logName = 'Institution Type';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Institution Type has been {$eventName}";
    }
}

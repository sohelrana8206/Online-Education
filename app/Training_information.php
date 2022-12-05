<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Training_information extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'user_id', 'training_title', 'topic', 'institute', 'country', 'location', 'year', 'duration',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['training_title', 'topic', 'institute', 'country', 'location', 'year', 'duration'];

    protected static $logName = 'Training Information';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Training Information has been {$eventName}";
    }

    public function user(){
        return $this->hasMany('App\User','user_id');
    }
}

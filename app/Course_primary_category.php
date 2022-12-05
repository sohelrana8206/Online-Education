<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Course_primary_category extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'primary_category_name',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['primary_category_name'];

    protected static $logName = 'Course Primary Category';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return " Primary Category has been {$eventName}";
    }

    public function course_secondary_category(){
        return $this->hasOne('App\Course_secondary_category');
    }
}

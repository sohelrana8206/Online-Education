<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Course_secondary_category extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'secondary_category_name','course_primary_category_id',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['secondary_category_name','course_primary_category_id'];

    protected static $logName = 'Course Secondary Category';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Course Secondary Category has been {$eventName}";
    }

    public function course_sub_category(){
        return $this->hasOne('App\Course_sub_category');
    }

    public function course_primary_category(){
        return $this->belongsTo('App\Course_primary_category','course_primary_category_id');
    }
}

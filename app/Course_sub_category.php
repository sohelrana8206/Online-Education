<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Course_sub_category extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'sub_category_name','course_secondary_category_id',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['sub_category_name','course_secondary_category_id'];

    protected static $logName = 'Course Sub Category';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Course Sub Category has been {$eventName}";
    }

    public function course_secondary_category(){
        return $this->belongsTo('App\Course_secondary_category','course_secondary_category_id');
    }
}

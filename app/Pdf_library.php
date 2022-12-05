<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Pdf_library extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'title','pdf_location','course_sub_category_id','status','user_id',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['title','pdf_location','course_sub_category_id','status'];

    protected static $logName = 'PDF Library';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "PDF Library has been {$eventName}";
    }

    public function course_sub_category(){
        return $this->belongsTo('App\Course_sub_category','course_sub_category_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Personal_information extends Model
{
    use HasRoles;
    use LogsActivity;

    protected $fillable = [
        'user_id', 'mobile', 'birth_date','home_district', 'upazila', 'fathers_name', 'mothers_name', 'gender', 'marital_status', 'nationality', 'national_id_no', 'religion', 'permanent_address', 'present_address', 'current_location', 'image', 'cover_image',
    ];

    //protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['mobile', 'birth_date', 'fathers_name', 'mothers_name', 'gender', 'marital_status', 'nationality', 'national_id_no', 'religion', 'permanent_address', 'home_district', 'present_address	', 'upazila', 'current_location', 'image','cover_image'];

    protected static $logName = 'Personal Information';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "Personal Information has been {$eventName}";
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}

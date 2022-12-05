<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','last_login_at', 'last_login_ip', 'is_active',
    ];

    protected static $ignoreChangedAttributes = ['password','updated_at','last_login_at','last_login_ip'];

    protected static $logAttributes = ['name', 'email', 'is_active'];

    protected static $logName = 'User';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName)
    {
        return "User has been {$eventName} By the User.";
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function personal_information(){
        return $this->hasOne('App\Personal_information');
    }

    public function referral_agent(){
        return $this->hasOne('App\Referral_agent');
    }

    public function referred_student(){
        return $this->hasOne('App\Referred_student');
    }

    public function academic_qualification(){
        return $this->hasMany('App\Academic_qualification');
    }

    public function employment_history(){
        return $this->hasMany('App\Employment_history');
    }

    public function professional_qualification(){
        return $this->hasMany('App\Professional_qualification');
    }

    public function special_qualification(){
        return $this->hasMany('App\Special_qualification');
    }

    public function training_information(){
        return $this->hasMany('App\Training_information');
    }

    public function student_course_quiz_answer(){
        return $this->hasMany('App\Student_course_quiz_answer');
    }
}

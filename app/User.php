<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Users\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\Courses\CourseLecturer;
use App\Models\Courses\Certification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Role(){
        return $this->hasOne(Role::class,'cl_role_id');
    }

    public function Lecturer(){
        return $this->hasMany(CourseLecturer::class);
    }

    public function Certifications(){
        return $this->hasMany(Certification::class);
    }

    public function isAdmin(){
        $role = Role::find(Auth::user()->cl_role_id);
        if($role->role != 'admin'){
            return false;
        }
        return true;
    }

    public function isLecturer(){
        $isLecturer = CourseLecturer::where('user_id',Auth::user()->id)->first();
        if($isLecturer){
            return true;
        }
        return false;
    }

    public function hasCertification(){
        $certificates = Certification::where('user_id',Auth::user()->id)->get();
        if(!$certificates->isEmpty()){
            return true;
        }
        return false;
    }

    public function getCertificates(){
        return Certification::where('user_id',Auth::user()->id)->get();
    }
}

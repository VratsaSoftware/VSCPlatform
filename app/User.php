<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Users\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\Courses\CourseLecturer;

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
}

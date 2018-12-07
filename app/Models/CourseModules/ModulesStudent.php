<?php

namespace App\Models\CourseModules;

use Illuminate\Database\Eloquent\Model;
use App\Models\Courses\CourseModule;
use App\User;

class ModulesStudent extends Model
{
    protected $table = 'modules_students';

    public function CourseModules(){
    	return $this->hasMany(CourseModule::class,'course_modules_id');
    }

    public function User(){
    	return $this->belongsTo(User::class,'user_id');
    }
}

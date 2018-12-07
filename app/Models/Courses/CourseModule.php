<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;
use App\Models\CourseModules\ModulesStudent;

class CourseModule extends Model
{
    protected $table = 'courses_modules';

    public function ModulesStudent(){
    	return $this->hasMany(ModulesStudent::class,'course_modules_id');
    }
}

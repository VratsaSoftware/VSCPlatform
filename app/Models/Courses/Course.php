<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;
use App\Models\Courses\CourseModule;
use App\Models\Courses\CourseLecturer;

class Course extends Model
{
    protected $table = 'courses';
    protected $dates = ['starts','ends'];

    public function Modules(){
    	return $this->hasMany(CourseModule::class);
    }

    public function Lecturers(){
    	return $this->hasMany(CourseLecturer::class);
    }
}

<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Courses\Course;
use App\Models\CourseModules\Modules;

class Certification extends Model
{
    protected $table = 'course_certifications';
    protected $dates = ['started','finished'];

    public function Users(){
    	return $this->hasMany(User::class);
    }

    public function Courses(){
    	return $this->hasMany(Course::class);
    }

    public function Modules(){
    	return $this->hasMany(Modules::class);
    }
}

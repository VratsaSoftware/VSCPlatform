<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Courses\Course;

class CourseLecturer extends Model
{
    protected $table = 'courses_lecturers';

    public function User(){
    	return $this->belongsToMany(User::class);
    }

    public function Courses(){
    	return $this->belongsToMany(Course::class);
    }
}

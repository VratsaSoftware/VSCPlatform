<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;
use App\Models\CourseModules\Module;
use App\Models\Courses\CourseLecturer;
use App\Models\Courses\Certification;

class Course extends Model
{
    protected $table = 'courses';
    protected $dates = ['starts','ends'];
    protected $guarded = [];

    public function Modules()
    {
        return $this->hasMany(Module::class);
    }

    public function Lecturers()
    {
        return $this->hasMany(CourseLecturer::class);
    }

    public function Certifications()
    {
        return $this->hasMany(Certification::class);
    }

    public static function getModules($course, $isLecturer)
    {
        if ($isLecturer) {
            return Module::where('course_id', $course)->with('Lections')->oldest('order')->get();
        }
        return Module::where([
            ['course_id', $course],
            ['visibility','!=','draft'],
            ])->with('Lections')->oldest('order')->get();
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}

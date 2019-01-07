<?php

namespace App\Models\CourseModules;

use Illuminate\Database\Eloquent\Model;
use App\Models\Courses\Certification;
use App\Models\CourseModules\Lection;

class Module extends Model
{
    protected $table = 'courses_modules';
    protected $dates = ['starts','ends'];

    public function Certifications()
    {
        return $this->hasMany(Certification::class, 'module_id');
    }

    public function Lections()
    {
        return $this->hasMany(Lection::class, 'course_modules_id');
    }

    public function ModulesStudent()
    {
        return $this->hasMany(ModulesStudent::class, 'course_modules_id');
    }

    public function getNameAttribute($value)
    {
        return mb_strtoupper($value);
    }

    public static function getLections($module)
    {
        return Lection::where('course_modules_id', $module)->with('Video')->get();
    }
}

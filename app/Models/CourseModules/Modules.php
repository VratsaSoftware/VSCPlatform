<?php

namespace App\Models\CourseModules;

use Illuminate\Database\Eloquent\Model;
use App\Models\Courses\Certification;

class Modules extends Model
{
    protected $table = 'courses_modules';

    public function Certifications(){
        return $this->hasMany(Certification::class,'module_id');
    }
}

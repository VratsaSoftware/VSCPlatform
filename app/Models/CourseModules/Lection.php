<?php

namespace App\Models\CourseModules;

use Illuminate\Database\Eloquent\Model;
use App\Models\CourseModules\Module;
use App\Models\CourseModules\LectionVideo;

class Lection extends Model
{
    protected $table = 'course_lections';
    protected $dates = ['first_date','second_date'];

    public function Module()
    {
        return $this->hasMany(Module::class, 'course_modules_id');
    }

    public function Video()
    {
        return $this->hasMany(LectionVideo::class, 'id');
    }
}

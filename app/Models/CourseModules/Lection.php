<?php

namespace App\Models\CourseModules;

use Illuminate\Database\Eloquent\Model;
use App\Models\CourseModules\Module;
use App\Models\CourseModules\LectionVideo;
use App\Models\CourseModules\LectionComment;

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
        return $this->hasOne(LectionVideo::class, 'id', 'lections_video_id');
    }

    public function Comments()
    {
        return $this->hasMany(LectionComment::class, 'course_lection_id');
    }

    public function getTitleAttribute($value)
    {
        return ucwords($value);
    }

    public function getDescriptionAttribute($value)
    {
        return ucwords($value, '.');
    }
}

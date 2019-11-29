<?php

namespace App\Models\CourseModules;

use Illuminate\Database\Eloquent\Model;
use App\Models\CourseModules\HomeworkComment;

class Homework extends Model
{
    protected $table = 'homeworks';

    public function comments()
    {
        return $this->hasMany(HomeworkComment::class,'homework_id');
    }
}

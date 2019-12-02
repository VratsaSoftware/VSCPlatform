<?php

namespace App\Models\CourseModules;

use Illuminate\Database\Eloquent\Model;
use App\Models\CourseModules\HomeworkComment;
use App\User;

class Homework extends Model
{
    protected $table = 'homeworks';

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function comments()
    {
        return $this->hasMany(HomeworkComment::class, 'homework_id');
    }
}

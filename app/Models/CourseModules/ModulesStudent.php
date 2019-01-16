<?php

namespace App\Models\CourseModules;

use Illuminate\Database\Eloquent\Model;
use App\Models\CourseModules\Module;
use App\User;

class ModulesStudent extends Model
{
    protected $table = 'modules_students';
    protected $guarded = [];

    public function CourseModules()
    {
        return $this->hasMany(Module::class, 'course_modules_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

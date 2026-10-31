<?php

namespace App\Models\Courses;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PersonalCertificate extends Model
{
    protected $table = 'personal_certificate';
    protected $casts = ['date' => 'datetime', 'created_at' => 'datetime', 'updated_at' => 'datetime', 'deleted_at' => 'datetime'];
    protected $guarded = [];

    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function Course()
    {
        return $this->hasOne(Course::class, 'id', 'course_id');
    }
}

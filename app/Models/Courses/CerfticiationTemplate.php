<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Model;

class CerfticiationTemplate extends Model
{
    protected $table = 'certificate_templates';
    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime', 'deleted_at' => 'datetime'];
}

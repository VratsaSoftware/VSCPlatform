<?php

namespace App\Models\Tests;

use Illuminate\Database\Eloquent\Model;

class TestUserSubmited extends Model
{
    protected $guarded = [];
    protected $table = 'test_users_submited';

    protected $casts = ['started_at' => 'datetime', 'submited_at' => 'datetime'];
}

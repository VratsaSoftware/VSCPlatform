<?php

namespace App\Models\Tests;

use Illuminate\Database\Eloquent\Model;

class TestUserAnswer extends Model
{
    protected $guarded = [];
    protected $table = 'tests_users_answers';

    public function User(){
        return $this->hasOne(User::class);
    }

    public function Question(){
        return $this->hasMany(BankQuestion::class);
    }
}

<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users\InterestsType;

class Interest extends Model
{
    protected $table = 'cl_users_interests';

    public function Type()
    {
        return $this->hasOne(InterestsType::class, 'id', 'cl_users_interest_type_id');
    }
}

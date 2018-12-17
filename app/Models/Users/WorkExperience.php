<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users\WorkCompany;
use App\Models\Users\WorkPosition;

class WorkExperience extends Model
{
  protected $table = 'work_experience';
  protected $guarded = [];

  public function Companies(){
    return $this->hasMany(WorkCompany::class,'id','company_id');
  }

  public function Positions(){
    return $this->hasMany(WorkPosition::class,'id','position_id');
  }
}

<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users\EducationType;
use App\User;
use App\Models\Users\EducationSpeciality;
use App\Models\Users\EducationInstitution;

class Education extends Model
{
    protected $table = 'users_education';
    protected $dates = ['y_from','y_to'];

    public function Users(){
    	return $this->hasMany(User::class,'id','user_id');
    }

    public function EduType(){
    	return $this->hasOne(EducationType::class,'id','cl_education_type_id');
    }

    public function EduInstitution(){
    	return $this->hasOne(EducationInstitution::class,'id','institution_id');
    }

    public function EduSpeciality(){
    	return $this->hasOne(EducationSpeciality::class,'id','specialty_id');
    }
}

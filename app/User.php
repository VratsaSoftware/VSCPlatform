<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Users\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\Courses\CourseLecturer;
use App\Models\Courses\Certification;
use App\Models\Courses\Course;
use App\Models\Courses\CourseModule;
use App\Models\Users\Education;
use App\Models\Users\SocialLink;
use App\Models\Users\VisibleInformation;
use App\Models\Users\WorkCompany;
use App\Models\Users\WorkExperience;
use App\Models\Users\WorkPosition;
use App\Models\Users\Hobbie;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Role()
    {
        return $this->hasOne(Role::class, 'cl_role_id');
    }

    public function Lecturer()
    {
        return $this->hasMany(CourseLecturer::class);
    }

    public function Certifications()
    {
        return $this->hasMany(Certification::class);
    }

    public function isAdmin()
    {
        $role = Role::find(Auth::user()->cl_role_id);
        if ($role->role != 'admin') {
            return false;
        }
        return true;
    }

    public function isOnCourse()
    {
        $userId = Auth::user()->id;
        $isOnCourse = Course::with('Modules', 'Modules.ModulesStudent', 'Modules.ModulesStudent.User')->whereHas('Modules.ModulesStudent', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();
        if (!$isOnCourse->isEmpty()) {
            return true;
        }
        return false;
    }

    public function getCourse()
    {
        $userId = Auth::user()->id;
        return Course::with('Modules', 'Modules.ModulesStudent', 'Modules.ModulesStudent.User')->whereHas('Modules.ModulesStudent', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();
    }

    public function getSocialLinks()
    {
        return SocialLink::with('SocialName')->where('user_id', Auth::user()->id)->get();
    }

    public function isLecturer()
    {
        $isLecturer = CourseLecturer::where('user_id', Auth::user()->id)->first();
        if ($isLecturer) {
            return true;
        }
        return false;
    }

    public function hasCertification()
    {
        $certificates = Certification::where('user_id', Auth::user()->id)->get();
        if (!$certificates->isEmpty()) {
            return true;
        }
        return false;
    }

    public function getCertificates()
    {
        return Certification::with('Users', 'Courses.Lecturers.User', 'Modules')->where('user_id', Auth::user()->id)->get();
    }

    public function hasEducation(User $user = null)
    {
        $findEdu = Education::where('user_id', Auth::user()->id)->get();
        if (!$findEdu->isEmpty()) {
            return true;
        }
        return false;
    }

    public function getEducation()
    {
        return Education::with('Users', 'EduType', 'EduInstitution', 'EduSpeciality')->where('user_id', Auth::user()->id)->get();
    }

    public function isVisible($type)
    {
        if (in_array($type, \Config::get('userInformationTypes'))) {
            $visibleCheck = VisibleInformation::where([
                    ['user_id', Auth::user()->id],
                    ['information_type',$type],
                    ['visible',true]
            ])->first();
            if (!is_null($visibleCheck)) {
                return true;
            }
            return false;
        }
        return false;
    }

    public function hasWorkExp()
    {
        $hasWorkExp = WorkExperience::where([
              ['user_id', Auth::user()->id],
        ])->first();
        if (!is_null($hasWorkExp)) {
            return true;
        }
        return false;
    }

    public function getWorkExp()
    {
        return WorkExperience::where('user_id', Auth::user()->id)->with('Company', 'Position')->get();
    }

    public function hasHobbies()
    {
        $hasHobbies = Hobbie::where('user_id', Auth::user()->id)->first();
        if (!is_null($hasHobbies)) {
            return true;
        }
        return false;
    }

    public function getHobbies()
    {
        return Hobbie::where('user_id', Auth::user()->id)->with('Interests.Type')->get();
    }
}

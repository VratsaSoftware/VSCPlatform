<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Users\Social;
use Illuminate\Http\Request;

class SocialLink extends Model
{
    protected $table = 'users_social_links';

    public function Users()
    {
        return $this->hasMany(User::class);
    }

    public function SocialName()
    {
        return $this->belongsTo(Social::class, 'cl_social_id');
    }

    public static function updateLinks($user_id, Request $request)
    {
        $facebook = Social::where('name', 'facebook')->first();
        $linkedin = Social::where('name', 'linkedin')->first();
        $github = Social::where('name', 'github')->first();
        $skype = Social::where('name', 'skype')->first();
        $dribbble = Social::where('name', 'dribbble')->first();
        $behance = Social::where('name', 'behance')->first();
        $changeFacebook = SocialLink::where([
            ['user_id',$user_id],
            ['cl_social_id',$facebook->id],
        ])->first();
        if ($changeFacebook) {
            if (empty($request->facebook)) {
                $changeFacebook->delete();
                return;
            }
            $changeFacebook->link = $request->facebook;
            $changeFacebook->save();
        } else {
            if (!empty($request->facebook)) {
                $insertFacebook = new SocialLink;
                $insertFacebook->user_id = $user_id;
                $insertFacebook->cl_social_id = $facebook->id;
                $insertFacebook->link = $request->facebook;
                $insertFacebook->save();
            }
        }

        $changelinkedin = SocialLink::where([
            ['user_id',$user_id],
            ['cl_social_id',$linkedin->id],
        ])->first();
        if ($changelinkedin) {
            if (empty($request->linkedin)) {
                $changelinkedin->delete();
                return;
            }
            $changelinkedin->link = $request->linkedin;
            $changelinkedin->save();
        } else {
            if (!empty($request->linkedin)) {
                $insertLinkedin = new SocialLink;
                $insertLinkedin->user_id = $user_id;
                $insertLinkedin->cl_social_id = $linkedin->id;
                $insertLinkedin->link = $request->linkedin;
                $insertLinkedin->save();
            }
        }

        $changeGithub = SocialLink::where([
            ['user_id',$user_id],
            ['cl_social_id',$github->id],
        ])->first();
        if ($changeGithub) {
            if (empty($request->github)) {
                $changeGithub->delete();
                return;
            }
            $changeGithub->link = $request->github;
            $changeGithub->save();
        } else {
            if (!empty($request->github)) {
                $insertGithub = new SocialLink;
                $insertGithub->user_id = $user_id;
                $insertGithub->cl_social_id = $github->id;
                $insertGithub->link = $request->github;
                $insertGithub->save();
            }
        }

        $changeSkype = SocialLink::where([
            ['user_id',$user_id],
            ['cl_social_id',$skype->id],
        ])->first();
        if ($changeSkype) {
            if (empty($request->skype)) {
                $changeSkype->delete();
                return;
            }
            $changeSkype->link = $request->skype;
            $changeSkype->save();
        } else {
            if (!empty($request->skype)) {
                $insertSkype = new SocialLink;
                $insertSkype->user_id = $user_id;
                $insertSkype->cl_social_id = $skype->id;
                $insertSkype->link = $request->skype;
                $insertSkype->save();
            }
        }

        $changeDribbble = SocialLink::where([
            ['user_id',$user_id],
            ['cl_social_id',$dribbble->id],
        ])->first();
        if ($changeDribbble) {
            if (empty($request->dribbble)) {
                $changeDribbble->delete();
                return;
            }
            $changeDribbble->link = $request->dribbble;
            $changeDribbble->save();
        } else {
            if (!empty($request->dribbble)) {
                $insertDribbble = new SocialLink;
                $insertDribbble->user_id = $user_id;
                $insertDribbble->cl_social_id = $dribbble->id;
                $insertDribbble->link = $request->dribbble;
                $insertDribbble->save();
            }
        }

        $changeBehance = SocialLink::where([
            ['user_id',$user_id],
            ['cl_social_id',$behance->id],
        ])->first();
        if ($changeBehance) {
            if (empty($request->behance)) {
                $changeBehance->delete();
                return;
            }
            $changeBehance->link = $request->behance;
            $changeBehance->save();
        } else {
            if (!empty($request->behance)) {
                $insertBehance = new SocialLink;
                $insertBehance->user_id = $user_id;
                $insertBehance->cl_social_id = $behance->id;
                $insertBehance->link = $request->behance;
                $insertBehance->save();
            }
        }
    }
}

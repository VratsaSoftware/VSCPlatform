<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Input;
use Image;
use File;
use Carbon\Carbon;
use App\Models\Users\SocialLink;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {   
        $data = $request->validate([
            'picture' => 'file|image|mimes:jpeg,png,gif,webp,ico|max:4000',
            'name' => 'sometimes',
            'location' => 'sometimes',
            'dob' => 'sometimes|date_format:Y-m-d|before:'.Carbon::now(),
            'email' => ['sometimes','unique:users']
        ]);
        if(Input::hasFile('picture')){
            $userPic=Input::file('picture');
            $image = Image::make($userPic->getRealPath());
            $name=time()."_".$userPic->getClientOriginalName();
            $oldImage = public_path().'/images/user-pics/'.$user->picture;
            if(File::exists($oldImage)) {
                File::delete($oldImage);
            }
            $user->picture = $name;
            $image->save(public_path().'/images/user-pics/'.$name,60);
        }
        if($request->has('name')){
            $name = explode(" ", $data['name']);
            $user->name = $name[0];
            $user->last_name = $name[1];
        }
        if($request->has('location')){
            $user->location = $data['location'];
        }
        if($request->has('dob')){
            $user->dob = $data['dob'];
        }
        if($request->has('email')){
            $user->email = $data['email'];
        }
        $updateLinks = SocialLink::updateLinks($user->id,$request);
        $user->save();
        $message = __('Успешно направени промени!');
        return redirect()->route('myProfile')->with('success', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\FormRequest;
use App\Profile;
use App\Http\Requests\UpdateUserProfileRequest;
use Illuminate\Support\Facades\Auth;
use Gate;
use Image;
use Intervention\Image\File;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\User;
use Illuminate\Support\Facades\Storage;
use Validator;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $profile = Profile::find($user->id);

        return view('admin.profile.myProfile',compact('user','profile'));
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
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        abort_if(Gate::denies('my_profile_information_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::find($profile->user_id);
        $profile = Profile::find($user->id);

        return view('admin.profile.userProfile',compact('user','profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserProfileRequest $request, $id)
    {
//        dd($request->all());
        //validate user
        //if request has image..
        //prepare the request for user and profile

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->nid_number = $request->nid_number;
        $user->profile->phone_number = $request->phone_number;
        $user->profile->education = $request->education;
        $user->profile->designation = $request->designation;
        $user->profile->present_address = $request->present_address;
        $user->profile->permanent_address = $request->permanent_address;
        $user->profile->office_address = $request->office_address;
        $user->profile->current_location = $request->current_location;
        $user->profile->notes = $request->notes;
        $user->profile->profile_summary = $request->profile_summary;
        if($request->hasFile('profile_image')){
//            $this->validate($request,[
//                'profile_image' =>  [
//                    'sometimes|images|max:2048'],
//            ]);
            $oldImagePath = asset($user->profile->profile_image);
//            dd($oldImagePath);
            $file = basename($oldImagePath);         // $file is set to "index.php"
            $filePath = '/upload/profileImage/'.$file;

            if(is_file(public_path('/upload/profileImage/'.$file))){
                unlink(public_path('/upload/profileImage/'.$file));
            }

//            $image = $request->profile_image->store('public/profileImage');
//            $user->profile->profile_image = $image;
////            dd($request->profile_image->store('public/profileImage'));


            $image = $request->file('profile_image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(128,128)->save(public_path('/upload/profileImage/'.$filename));
            $user->profile->profile_image = asset('/upload/profileImage/'.$filename);
        }

        $user->save();
        $user->profile->save();

        return redirect()->back()->with("success","Profile updated successfully !");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}

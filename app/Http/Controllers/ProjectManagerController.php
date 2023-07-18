<?php

namespace App\Http\Controllers;

use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProjectManagerController extends Controller
{
    function homePM(){
        return view('pm.home');
    }

    function editprofilePM($id){
        $user = User::findOrFail($id);
        return view('pm.editprofile',compact('user'));
    }

    function updateprofil(Request $request, $id){
        $user = User::findOrFail($id);
        $profile = $user->profiles->image;
        dd($user->profiles->image);

        if ($request->hasFile("image")) {
            if (File::exists(public_path('profile').'/'. $profile)) {
                File::delete(public_path('profile').'/'.$profile);
            }
            $file = $request->file("image");
            $profile = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("profile/"), $profile->image);
            $request['image'] = $profile;
        }
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'user_id' => $user->id,
            'image' => $profile->image,
        ]);
        return redirect()->route('homePM');
    }

    function updateprofilePM(Request $request,$id){

        $user = User::findOrFail($id);
        $profile = $user->profiles->image;
        // dd($user->profiles->image);

        if ($request->hasFile("image")) {
            if (File::exists(public_path('profile').'/'. $profile)) {
                File::delete(public_path('profile').'/'.$profile);
            }
            $file = $request->file("image");
            $profile = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("profile/"), $profile);
            $request['image'] = $profile;
        }
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
        ]);
        $user->save();

        $profileku = profile::findOrFail($id);
        $profileku->update([
            'user_id' => $user->id,
            'image' => $profile
        ]);
        $profileku->save();

        return redirect()->route('homePM');
    }
}

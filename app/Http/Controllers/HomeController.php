<?php

namespace App\Http\Controllers;

use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    function login()
    {
        return view('login');
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    function register()
    {
        return view('register');
    }

    function storeRegister(Request $request)
    {
        // dd($request);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName();
            $data2 = profile::create([
                'user_id' => $user->id,
                'image' => $imageName
            ]);
            $data2->save();
            $file->move(\public_path("profile/"), $imageName);
        } else {
            $data2 = profile::create([
                'user_id' => $user->id,
                'image' => ''
            ]);
            $data2->save();
        }

        if ($user) {
            Session::flash('berhasil', 'Berhasil Melakukan Registrasi');
            return redirect()->route('login');
        } else {
            Session::flash('gagal', 'Gagal Melakukan Registrasi');
            return redirect()->route('login');
        }
    }

    function storeLogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        // if (Auth::attempt($data)) {
        //     if ($request->user()->role == User::role_pm) {
        //         return redirect()->route('homePM');
        //     } else {
        //     }
        // }else{
        //     return redirect()->route('login');
        // }
        if (Auth::attempt($data)) {
            return redirect()->route('homePM');
        } else {
            return redirect()->route('login');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function register()
    {
        return view('account.register');
    }

    public function processRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('account.register')->with('success', 'Account created successfully, login now');

    }

    public function login()
    {
        return view('account.login');
    }

    public function authenticate(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])){
            return redirect()->route('disease.index');
        } else {
            return redirect()->route('account.login')->with('error', 'Invalid email or password');
        }
    }

    public function listUser(){
        $users = User::all();

        return view('account.list', [
            'users' => $users
        ]);
    }

    public function profile (){
        $user = User::find(Auth::user()->id);

        return view('account.profile', [
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request){
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.Auth::user()->id.',id'
        ];

        if(!empty($request->image)){
            $rules['image'] = 'image';
        }
    
        $validator = Validator::make($request->all(), $rules);
    
        if($validator->fails()){
            return redirect()->route('account.profile')->withInput()->withErrors($validator);
        }
    
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        if(!empty($request->image)){

            File::delete(public_path('uploads/user/'.$user->image));

            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $image_name = time().'.'.$ext;
            $image->move(public_path('uploads/user'), $image_name);
            $user->image = $image_name;

            $user->save();

        }

        
    
        return redirect()->route('account.profile')->with('success', 'Profile updated successfully');
    }
        

    
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('Auth.login');
    }

    public function store(){


        $values = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // $users = DB::table('users')
        //         ->where('email', '=', $values['email'])
        //         ->where('type', '=', 'admin')
        //         ->get();
        // dd(Auth::attempt($values));

        if (Auth::attempt($values)) {
            session()->regenerate();
            if(Auth::user()->type == 'admin')
                return redirect('/adminDashboard')->with('success',"Welcome Back!!");
            elseif (Auth::user()->type == 'student') {
                return redirect('/studentDashboard')->with('success',"Welcome Back!!");
            }
        }

        throw ValidationException::withMessages([
            'password' => 'Your Provided Credential Could not be verified'
        ]);
    }
    public function ChangePassword(){
        $values = request()->validate([
            'email' => ['required','email'],
            'old_Password' => 'required',
            'new_Password' => 'required',
        ]);

        if(request()->email !=auth()->user()->email){
            return back()->with('error',"Your Email not match");
        }
        if(!Hash::check(request()->old_Password, auth()->user()->password)){
            return back()->with('error',"Your Old password not match");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make(request()->new_Password)
        ]);

        return back()->with('success',"Your Password update successfuly");
    }

    public function logout(){
        Auth::logout();
        return redirect('/')->with('success', 'Goodbye!!');
    }

    public function accountSettings(){
        return view('General-Settings.account-settings');
    }
}

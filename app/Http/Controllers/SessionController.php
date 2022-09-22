<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Employee;
use App\Models\Institute;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(Request $request){
        $key = 'login.'.$request->ip();
        return view('Auth.login',['key' => $key,'retries' => RateLimiter::retriesLeft($key,3),'seconds'=>RateLimiter::availableIn($key)]);
    }

    public function store(Request $request){
        $values = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        RateLimiter::clear('login.'.$request->ip());

        if (Auth::attempt($values)) {


            session()->regenerate();
            if(Auth::user()->type == 'admin'){
                $logo = Institute::where('email','=',auth()->user()->email)->first(['logo'])->logo;
                if($logo){
                    session(['photo' => $logo]);
                }
                $name = Institute::where('email','=',auth()->user()->email)->first(['name'])->name;
                if($name){
                    session(['institute_name' => $name]);
                }
                return redirect('/adminDashboard')->with('success',"Welcome Back!!");
            }
            elseif (Auth::user()->type == 'student') {
                session(['photo' => Student::where('email','=',auth()->user()->email)->first(['student_photo'])->student_photo]);
                return redirect('/studentDashboard')->with('success',"Welcome Back!!");
            }
            elseif (Auth::user()->type == 'teacher'){
                session(['photo' => Employee::where('email','=',auth()->user()->email)->first(['employee_photo'])->employee_photo]);
                return redirect('/teacherDashboard')->with('success',"Welcome Back!!");
            }
            else{
                session(['photo' => Student::where('guardian_email','=',auth()->user()->email)->first(['guardian_photo'])->guardian_photo]);
                return redirect('/guardianDashboard')->with('success',"Welcome Back!!");
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

    public function getForgotPassword(){
        return view('Auth.forgot-password');
    }
    public function postForgetPassword(Request $request){
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }
    public function getResetPassword($token){
        return view('Auth.reset-password', ['token' => $token]);
    }
    public function postResetPassword(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}

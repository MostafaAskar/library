<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm(){
        return view('auth.register');
    }
    public function register(Request $request){
        $data =$request->validate([
            'name' => 'required |max:255',
            'email' => 'required |email |max:255',
            'password' => 'required | min: 5 | max:255 |confirmed',

        ]);
        $data['password'] = bcrypt($data['password']);
        $data['role_id'] =Role::where('name' , 'user')->first()->id ;
        $user = User::create($data);
        Auth::login($user) ;
        return redirect(url('/categories'));
        
    }
    public function loginForm(){
        return view('auth.login') ;
    }
    public function login(Request $request){
        $data =$request->validate([
            'email' => 'required |email |max:255',
            'password' => 'required | min: 5 | max:255 ',
        ]);

        $isLogin =Auth::attempt([ 'email' => $data['email'] , 'password' =>$data['password'] ]);
        if(! $isLogin){
            return back()->withErrors([
                'credentials is not correct'
            ]);
        }
        return redirect(url('/categories'));
    }


    public function logout(){
        Auth::logout();
        return redirect(url('/login'));
    }



}

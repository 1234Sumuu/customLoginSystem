<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use Hash;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function login(){
        return view ("auth.login");
    }
    public function registration()
    {
        return view("auth.registration");
    }
    public function registerUser(Request $request){
            $request ->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12'
        ]);
        $user =new User();
        $user ->name = $request ->name;
        $user ->email = $request ->email;
        $user ->password = Hash::make($request ->password);
        $res = $user ->save();
        if($res){
            return back()->with('success', 'Youre Successfully registered');
        }else{
            return back()->with('fail', 'Somthing went wrong!');
        }
    }
    public function loginUser(Request $request){
        $request ->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);
        $user = User:: Where('email', '=' , $request ->email) -> first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginID', $user ->id);
                return redirect('dashboard');
            }else{
                return back() ->with('fail', 'Incorrect Password!');  
            }

        }else{
            return back() ->with('fail', 'This email is not registered!');
        }
    }
    public function dashboard()
    {
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id', '=',Session::get('loginId')) ->first();
        }
        return view('dashboard', compact('data')); 
    }
    public function logout(){
        if(Session::has('loginId')){
            Session::pull();
           return redirect('login');
        }
    }
}

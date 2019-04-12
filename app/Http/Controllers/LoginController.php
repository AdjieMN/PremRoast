<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelAdmin;
use App\ModelItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('admin.login');
    }
    public function loginPost(Request $request){

        $username = $request->username;
        $password = $request->password;

        $data = ModelAdmin::where('username',$username)->first();
        if($data){ 
            if(Hash::check($password,$data->password)){
                Session::put('username',$data->username);
                Session::put('email',$data->email);
                Session::put('login',TRUE);
                return redirect('/item');
            }
            else{
                return redirect('/login')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('/login')->with('alert','Password atau Email, Salah!');
        }
    }
    public function logout(){
        Session::flush();
        return redirect('/login')->with('alert','Kamu sudah logout');
    }

    public function register(Request $request){
        return view('admin.register');
    }

    public function registerPost(Request $request){
        $this->validate($request, [
            'username' => 'required|min:4',
            'email' => 'required|min:4|email|unique:admin',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);

        ModelAdmin::insert([
	    	'username' => $request->username,
	    	'password' =>bcrypt($request->password),
            'email' => $request->email
	    ]);
        return redirect('/login')->with('alert-success','Kamu berhasil Register');
    }
}

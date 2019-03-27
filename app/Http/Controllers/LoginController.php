<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Account;
class LoginController extends Controller
{
    //
    public function getLogin(){
    	return view('pages/login');
    }
    public function postLogin(Request $request)
    {
    	$rules = [
    		'username' => 'required',
    		'password' => 'required'
    	];
    	$validator =  Validator::make($request->all(),$rules);
    	if($validator->fails()){
    		return redirect()->back()->withErrors($validator);
    	}
    	else{
    		$username = $request->input('username');
    		$password = $request->input('password');
            echo $username.'<br>';
            echo $password.'<br>';
            echo bcrypt($password).'<br>';
    		if(Auth::attempt(['Username' => $username, 'Password' => $password])){
    			echo "Successs";
    		}
    		else{
    			echo "Fail";
    		}
    	}
    }
}

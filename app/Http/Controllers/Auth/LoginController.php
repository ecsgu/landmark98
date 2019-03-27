<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use Validator;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected function guard()
    {
        return Auth::guard('account');
    }
    public function username(){
        return 'username';
    }
    public function showLoginForm(){
        return view('pages/login');
    }
    public function login(Request $request)
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
            if(Auth::attempt(['username' => $username, 'password' => $password])){
                echo "Successs";
            }
            else{
                return view('/pages/login');
            }
        }
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

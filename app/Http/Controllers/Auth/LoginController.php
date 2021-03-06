<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use Validator;
use Session;
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
        if(Session::has('account'))
            return redirect()->action('TopicController@index');
        return view('Auth/register');
    }
    public static function login(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];
        $validator =  Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->back()->withErrors(['fail'=>'Sai tài khoản hoặc mật khẩu']);
        }
        else{
            $username = $request->input('username');
            $password = $request->input('password');
            if(Auth::attempt(['username' => $username, 'password' => $password])){
                Session::put('account', Auth::user());
                return redirect()->action('TopicController@index');
            }
            else{
                return redirect()->back()->withErrors(['fail'=>'Sai tài khoản hoặc mật khẩu']);
            }
        }
    }
    public function logout()
    {
        Session::forget('account');
        return view('auth/register');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

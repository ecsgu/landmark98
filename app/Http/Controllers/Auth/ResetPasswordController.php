<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use DB;
use Hash;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function reset(Request $request)
    {
        $account = DB::table('account')->where('username',$request->username)->first();
        if(!Hash::check($request->oldpassword,$account->password))
            return redirect()->back()->with(['error_oldpassword' => "Mật khẩu cũ không đúng"]);
        if($request->password != $request->repassword)
            return redirect()->back()->with(['error_repassword' => "Mật khẩu nhập lại không khớp"]);
        DB::table('account')->where('username',$request->username)->update(['password' => Hash::make($request->password)]);
        return redirect()->back();
    }
}

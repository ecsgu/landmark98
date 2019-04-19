<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Account;
use App\Forgotpw;
use Mail;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showLinkRequestForm()
    {
        return view('/auth/passwords/reset');
    }
    public function sendResetLinkEmail(Request $request)
    {
        $account = Account::where('email',$request->email)->first();
        if(!$account)
            return redirect()->back()->with(['error' => 'Email không tồn tại']);
        $forgotpw = Forgotpw::where('username',$account->username)->first();
        if(!$forgotpw){
            $forgotpw = new Forgotpw;
            $forgotpw->username= $account->username;
            $forgotpw->code = mt_rand(100000, 999999);
            $forgotpw->save();
        }
        $this->sendEmail($account,$forgotpw->code);
        return redirect()->back()->with(['success' => 'Đã gửi mã số khôi phục đến email '.$account->email, 'account' => $account]);
    }
    public function sendEmail($account, $code)
    {
        $customer= $account->customer;
        Mail::send(
            'email.forgot',
            ['user' => $account, 'code' => $code],
            function($message) use ($account , $customer){
                $message->to($account->email);
                $message->subject("Hello $customer->name , Thay đổi mật khẩu của bạn.");
            }
        );
    }
    public function resetPassword(Request $request)
    {
        
    }
}

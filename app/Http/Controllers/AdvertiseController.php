<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertise;
use Carbon\Carbon;
use Auth;
use DB;
use Validator;
use Session;
use Mail;
use App\Account;
use App\Customer;
use App\Position;
use App\Forgotpw;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(session('advertiser')){
            $Advertise = Advertise::where('username',session('advertiser')->username)->get();
            return view('advertise/advertisemanager',compact('Advertise'));
        }
        return view('advertise/advertiselogin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $advertise = new Advertise;
        // $advertise->linkad = $request->input("linkad");
        // $advertise ->image = hash('sha256', $request->input("password"));
        // $advertise ->username = $request->input("email");
        // $advertise ->start = 1;
        // $advertise ->end = 1;
        // $advertise ->position = 1;
        // $advertise ->money = 1;
        // $advertise ->click = 1;
        // $advertise->created_at = now();
        // $advertise->updated_at = now();
        // $advertise->save();
        // return response($account,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function showregister(){
        return view('advertise/useradvertise');
    }
    public function register(Request $request){
        $Account = Account::where('username',$request->input('username'))->get();
        if($Account->count()>0)
            return redirect()->back()->withErrors(['username' => "Tài khoản đã có người sử dụng"]);
        $Account = Account::where('email',$request->input('email'))->get();
        if($Account->count()>0)
            return redirect()->back()->withErrors(['email' => "Email đã tồn tại"]);
        $request->request->add(['role' => '1']);
        $CC = new CustomerController;
        $CC->store($request);
        $Account = Account::where('username',$request->input('username'))->first();
        $forgotpw = new Forgotpw;
        $forgotpw->username= $request->username;
        $forgotpw->code = mt_rand(100000, 999999);
        $forgotpw->save();
        $this->sendEmail($Account,$forgotpw->code);

        Session::put('verify', true);
        return redirect()->action('AdvertiseController@index');

    }
    public function sendEmail($account, $code)
    {
        $customer= $account->customer;
        Mail::send(
            'email.verify',
            ['user' => $account, 'code' => $code , 'customer' => $customer],
            function($message) use ($account , $customer){
                $message->to($account->email);
                $message->subject("Hello $customer->name , Xác nhận đăng ký quảng cáo Landmark98.");
            }
        );
    }
    public function verify($username,$code)
    {
        $account = Account::where('username',$username)->first();
        $forgotpw = Forgotpw::where('username',$username)->first();
        if($forgotpw->code == $code)
        {
            DB::table('account')
            ->where('username', $username)
            ->update(['role' => 3]);
            Session::forget('verify');
            DB::table('forgotpw')->where('username',$username)->delete();
        }
        else 
            return abort(404);
        return redirect()->action('AdvertiseController@index');
    }
    public function showlogin(){
        if(!session('advertiser'))
            return view('advertise/advertiselogin');
        return view('advertise/advertisemanager');
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
                if((Auth::user()->role & 2) != 0)
                {
                    Session::put('advertiser', Auth::user());
                    return redirect()->action('AdvertiseController@index');
                }
                else
                    return redirect()->back()->with('fail','Sai tài khoản hoặc mật khẩu');
            }
            else{
                return redirect()->back()->with('fail','Sai tài khoản hoặc mật khẩu');
            }
        }
    }
    public function logout()
    {
        Session::forget('advertiser');
        return redirect()->action('AdvertiseController@index');
    }
    public function showposition(){
        if(session('advertiser')){

            $Position = Position::all();
            return view('advertise/chooseposition',compact('Position'));
        }
        return redirect()->action('AdvertiseController@index');
    }
    public function newadvertise($position){
        if(!Session::has('advertiser'))
            return redirect()->action('AdvertiseController@index');
        if($position!=5)
            $Advertise = Advertise::where('position',$position)->where('end','>=',Now())->orderBy('start','asc')->get();
        else
            $Advertise = Advertise::where('status','0')->get();
        $Position = Position::find($position);
        $days = array();
        foreach($Advertise as $advertise)
        {
            $day = Carbon::createFromFormat('Y-m-d H:i:s', $advertise->start);
            $end = Carbon::createFromFormat('Y-m-d H:i:s', $advertise->end);
            while($end->gte($day))
            {
                array_push($days,$day->toDateString());
                $day->addDay(1);
            }
        }
        return view('advertise/advertiseregister', compact('days','Position'));
    }
    public function deleteadvertise(Request $request)
    {
        if(session('advertiser'))
        {
            $Advertise = Advertise::find($request->id);
            if($Advertise->username != session('advertiser')->username)
                return "false";
            else
                $Advertise->delete();
            return "true";
        }
        return "false";
    }
    public function thanhtoan(Request $request)
    {
        if(session('advertiser'))
        {
            $Advertise = Advertise::find($request->id);
            $Advertise->status=2;
            $Advertise->save();
            return "true";
        }
        return "false";
    }
    public function thanhtoanpaypal($id)
    {
        if(session('advertiser'))
        {
            $Advertise = Advertise::find($id);
            if($Advertise->status == 1)
                return view('advertise/paypal',compact('Advertise'));
            return redirect()->back();
        }
        return redirect()->back();
    }
    public function postnewadvertise(Request $request)
    {
        $Advertise = new Advertise;
        $Position = Position::find($request->input('position'));
        $start = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('ad-begin')." "."00:00:00");
        $end = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('ad-end')." "."23:59:59");
        // upload file ảnh
        if(isset($request->image))
        {
            $file = $request->image;
            $array = explode('.',$file->getClientOriginalName());
            $Extend = end($array);

            $Name = md5($file->getClientOriginalName() . "." . str_random());
            // Lấy đuôi file

            // Upload lên server
            $filename=$file->move('upload', $Name.'.'.$Extend );

            //echo "hello mother fucker";
            //Update database topic
            $request->request->add(['filename' => $filename]);
        }
        //Dữ liệu Advertise
        $Advertise->linkad=$request->input('linkad');
        $Advertise->image=$request->filename;
        $Advertise->username=session('advertiser')->username;
        $Advertise->start = $start;
        $Advertise->end = $end;
        $Advertise->position = $request->input('position');
        $Advertise->money=($start->diffInDays($end)+1)*$Position->price;
        $Advertise->click=0;
        $Advertise->status=1;
        $Advertise->save();
        if($request->input('thanhtoan')=="paypal")
            return view('advertise/paypal',compact('Advertise'));
        else
            return view('advertise/bank',compact('Advertise'));

    }
    public function bank(){
        return view('advertise/bank');
    }
    public function paypal(){
        return view('advertise/paypal');
    }
}

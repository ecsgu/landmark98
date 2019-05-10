<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertise;
use Carbon\Carbon;
use Auth;
use DB;
use Validator;
use Session;
use App\Account;
use App\Customer;
use App\Position;

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
        if(session('advertiser'))
            return view('advertise/advertisemanager');
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
        $request->request->add(['role' => '2']);
        $CC = new CustomerController;
        $CC->store($request);
        $this->login($request);
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
        if(session('advertiser'))
            return view('advertise/chooseposition');
        return redirect()->action('AdvertiseController@index');
    }
    public function newadvertise($position){
        if(!Session::has('advertiser'))
            return redirect()->action('AdvertiseController@index');
        $Advertise = Advertise::where('position',$position)->where('end','>=',Now())->orderBy('start','asc')->get();
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
        $Advertise->money=$start->diffInDays($end)*$Position->price;
        $Advertise->click=0;
        $Advertise->status=1;
        $Advertise->save();
        if($request->input('thanhtoan')=="paypal")
            return view('advertise/paypal',compact('Advertise'));
        else
            return view('advertise/bank',compact('bank'));

    }
    public function bank(){
        return view('advertise/bank');
    }
    public function paypal(){
        return view('advertise/paypal');
    }
}

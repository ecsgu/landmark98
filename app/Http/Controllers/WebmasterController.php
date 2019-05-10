<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use DB;
use Validator;
use Session;
use App\Topic;
use App\Comment;
use App\Account;
use App\Notification;
use App\Advertise;

class WebmasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(session('admin'))
            return view('webmaster/webmaster');
        else
            return view ('webmaster/login');

    }
    public function topic()
    {
        if((session('admin')->role & 8)!=0 )
        {
            $Topic = Topic::orderBy('id', 'desc')->get();
            return view('webmaster/topic', compact('Topic'));
        }
        return redirect()->action('WebmasterController@index');
    }
    public function comment()
    {
        if((session('admin')->role & 8)!=0 )
        {
            $Comment = Comment::orderBy('id', 'desc')->get();
            return view('webmaster/comment', compact('Comment'));
        }
        return redirect()->action('WebmasterController@index');
    }
    public function advertise()
    {
        if((session('admin')->role & 16)!=0 )
        {
            $Advertise = Advertise::orderBy('id', 'desc')->get();
            return view('webmaster/advertise', compact('Advertise'));
        }
        return redirect()->action('WebmasterController@index');
    }
    public function notification()
    {
        $Notification = Notification::orderBy('end', 'desc')->get();
        return view('webmaster/notification', compact('Notification'));
    }
    public function postnotification(Request $request)
    {
        $Notification = new Notification;
        $Notification->caption = $request->input('caption');
        $Notification->level = $request->input('level');
        $Notification->end = now()->addDay($request->input('end'));
        $Notification->username=session('admin')->username;
        $Notification->save();
         return redirect()->back();
    }
    public function indexphanquyen()
    {
        if((session('admin')->role & 64)!=0 )
        {
            $Account = Account::all();
            //$Account = Account::where('username', '!=', session('admin')->username);
            return view('webmaster/phanquyen', compact('Account'));
        }
        return redirect()->action('WebmasterController@index');
    }
    public function phanquyen(Request $request)
    {
        $status = "false";
        if((session('admin')->role & 64)!=0 )
        {
            $Account=DB::table('account')->where('username', $request->user)->first();
            if(($Account->role & $request->role) ==0)
                DB::table('account')
                ->where('username', $request->user)
                ->update(['role' => $Account->role + $request->role]);
            else
                DB::table('account')
                ->where('username', $request->user)
                ->update(['role' => $Account->role - $request->role]);
            $status="true";
        }
        return $status;
    }
    public function forgot()
    {
        return view('webmaster/forgot');
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
                if((Auth::user()->role & 124) != 0)
                {
                    Session::put('admin', Auth::user());
                    return redirect()->action('WebmasterController@index');
                }
                else
                    return redirect()->back()->with('fail','Sai tài khoản hoặc mật khẩu');
            }
            else{
                return redirect()->back()->with('fail','Sai tài khoản hoặc mật khẩu');
            }
        }
    }
    public function duyetbai(Request $request)
    {
        $topic = Topic::find($request->id);
        $topic->status=2;
        $topic->save();
    }
    public function xoabai(Request $request)
    {
        $topic = Topic::find($request->id);
        $topic->status=3;
        $topic->save();
    }
    public function duyetcmt(Request $request)
    {
        $comment = Comment::find($request->id);
        $comment->status=2;
        $comment->save();
    }
    public function xoacmt(Request $request)
    {
        $comment = Comment::find($request->id);
        $comment->status=3;
        $comment->save();
    }
    public function logout()
    {
        Session::forget('admin');
        return redirect()->action('WebmasterController@index');
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
}

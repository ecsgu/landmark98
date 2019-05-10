<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Customer;
use App\Notification;
use App\Advertise;
use Session;
use DB;
class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        //
        if(!Session::has('account'))
            return view('/pages/login');
        $Advertise = Advertise::where('status','3')->where('start','<=',Now())->where('end','>=',Now())->orderBy('start','asc')->get();
        $Notification = Notification::Where('end','>=',Now())->orderBy('created_at','desc')->get();
        $Topic = Topic::Where('status','2')->orderBy('id','desc')->get();
        return view('/pages/landmark', compact(['Topic','Notification','Advertise']));
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
    public static function store(Request $request)
    {
        //
        DB::table('topic')->insert([
                'caption' => $request->caption,
                'image' => $request->filename,
                'username' => Session::get('account')->username, 
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
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
        $topic = Topic::find($id);
        if($topic->status==2)
            return view('pages/topic', compact('topic'));
        else
            return redirect()->back();
    }
    public function topicjson($id)
    {
        //
        $data = Topic::find($id);
        $cmtcustomer =[];
        foreach($data->comment as $comment)
            array_push($cmtcustomer,$comment->customer);
        return response()->json([
            'topic' => $data,
            'customer' => $data->customer,
            'comment' => $data->comment,
            'cmtcustomer' => $cmtcustomer
        ]);
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

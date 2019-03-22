<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertise;


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
        $advertise = Advertise::all();
        return $advertise; 
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
}

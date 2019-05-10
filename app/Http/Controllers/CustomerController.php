<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Customer;
use App\Account;
use File;
use Hash;
use Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Customer = Customer::all();
        return $Customer;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        echo "Create";
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
        $customer = new Customer;
        $customer->id = $request->input("username");
        $customer->name = $request->input("name");
        $customer->gender = $request->input("gender");
        $customer->email = $request->input("email");
        $customer->phone_number = $request->input("phone_number");
        $customer->room = "Chưa";
        $customer->image = 'upload/defaultCus.jpg';
        $customer->created_at = now();
        $customer->updated_at = now();
        $customer->save();
        $account = new Account;
        $account->username = $request->input("username");
        $account ->password = Hash::make($request->input("password"));
        $account ->email = $request->input("email");
        $account ->role = isset($request->role)?$request->role:1;
        $account->created_at = now();
        $account->updated_at = now();
        $account->save();
        return response($customer,201);
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
        $Customer = Customer::find($id);
        for($i=0;$i<$Customer->topic->count();$i++)
            if($Customer->topic[$i]->status != 2)
                unset($Customer->topic[$i]);
        return view('/pages/customer', compact('Customer'));
        //$account->save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function edit(Request $request)
    {
        //
        $Customer = Customer::find(session('account')->customer->id);
        File::delete(public_path()."/".$Customer->image);
        $Customer->image=$request->filename;
        $Customer->save();
        $username = session('account')->username;
        $password = session('account')->password;
        Auth::loginUsingId(['username' => $username]);
        Session::put('account', Auth::user());
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
        $customer = Customer::find($id);
        $customer->name = $request->input("name");
        $customer->gender = $request->input("gender");
        $customer->email = $request->input("email");
        $customer->phone_number = $request->input("phone_number");
        $customer->room = $request->input("room");
        $customer->updated_at = now();
        $customer->save();
        return response($customer,201);
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
        $customer = Customer::find($id);
        $customer->delete();
    }
}

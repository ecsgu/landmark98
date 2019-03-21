<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Account;
class CustomerController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $Customer = Customer::all();
        return $Customer;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $customer = new Customer;
        $customer->id = $request->input("username");
        $customer->name = $request->input("name");
        $customer->gender = $request->input("gender");
        $customer->email = $request->input("email");
        $customer->phone_number = $request->input("phone_number");
        $customer->room = $request->input("room");
        $customer->created_at = now();
        $customer->updated_at = now();
        $customer->save();
        $account = new Account;
        $account->username = $request->input("username");
        $account ->password = hash('sha256', $request->input("password"));
        $account ->email = $request->input("email");
        $account ->role = 1;
        $account->created_at = now();
        $account->updated_at = now();
        $account->save();
        return response($customer,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        $Customer = Customer::find($id);
        return $Customer;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

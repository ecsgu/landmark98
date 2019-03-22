<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;

class AccountController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $Account = Account::all();
        return $Account;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
    	//
        $account = new Account;
        $account->username = $request->input("username");
        $account ->password = hash('sha256', $request->input("password"));
        $account ->email = $request->input("email");
        $account ->role = 1;
        $account->created_at = now();
        $account->updated_at = now();
        $account->save();
        return response($account,201);
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
        $Account = Account::where('Username', $id)->get();
        return $Account;
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
        $account = Account::where('Username', $id)->get();
        $account->username = $request->input('username');
        $account->password = $request->input('password');
        $account->email = $request->input('email');
        $account->updated_at = now();
        $account->save();
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
        $accound = Account::where('Username', $id)->get();
        $account->delete();
    }
}

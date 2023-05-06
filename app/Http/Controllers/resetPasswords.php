<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Models\User;
use App\Models\resetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class resetPasswords extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reset.index');
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
     * @param  \App\Models\resetPassword  $resetPassword
     * @return \Illuminate\Http\Response
     */
    public function show(resetPassword $resetPassword)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\resetPassword  $resetPassword
     * @return \Illuminate\Http\Response
     */
    public function edit(resetPassword $resetPassword)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\resetPassword  $resetPassword
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, resetPassword $resetPassword)
    {
        if($request->ajax()){
            $last_id = 1;
            $update_args = array(
                'password' => Hash::make($request->password),
            );

            if($update_args){
                $pass_change = User::where('id', $last_id)->update($update_args);
                return response()->json([ 'message' => 'success updated', 'status' => 'success' ]);
            }else{
                return response()->json([ 'message' => 'Error: call the admin', 'status' => 'danger' ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\resetPassword  $resetPassword
     * @return \Illuminate\Http\Response
     */
    public function destroy(resetPassword $resetPassword)
    {
        //
    }
}

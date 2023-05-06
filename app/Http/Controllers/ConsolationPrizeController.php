<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Models\consolation_prize;
use Illuminate\Http\Request;

class ConsolationPrizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //Ajax checker
        if($request->ajax()){
            // $price = new PrizeList;
            $price = DB::table('prize_lists')->latest('created_at')->first();

            $last_id = $price->id;

            if($last_id){

                $cp = new consolation_prize;

                $cp->first_digit = $request->first_digit;
                $cp->second_digit = $request->second_digit;
                $cp->thrid_digit = $request->thrid_digit;
                $cp->fourth_digit = $request->fourth_digit;
                $cp->fifth_digit = $request->fifth_digit;
                $cp->six_digit = $request->six_digit;
                $cp->save();

                $cpLast_id = $cp->latest('created_at')->first();

                if($cp){
                    DB::table('prize_lists')->where('id', $last_id)->update(['consolation_prize_id' => $cpLast_id->id]);
                }

                return response()->json(['status' => 'success', 'message' => 'Successfully save']);
            }else{
                return response()->json(['status' => 'error', 'message' => 'Kindly check the file type before you upload it again.']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\consolation_prize  $consolation_prize
     * @return \Illuminate\Http\Response
     */
    public function show(consolation_prize $consolation_prize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\consolation_prize  $consolation_prize
     * @return \Illuminate\Http\Response
     */
    public function edit(consolation_prize $consolation_prize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\consolation_prize  $consolation_prize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, consolation_prize $consolation_prize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\consolation_prize  $consolation_prize
     * @return \Illuminate\Http\Response
     */
    public function destroy(consolation_prize $consolation_prize)
    {
        //
    }
}

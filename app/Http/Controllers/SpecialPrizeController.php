<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Models\special_prize;
use Illuminate\Http\Request;

class SpecialPrizeController extends Controller
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

                $sp = new special_prize;

                $sp->first_digit = $request->first_digit;
                $sp->second_digit = $request->second_digit;
                $sp->thrid_digit = $request->thrid_digit;
                $sp->fourth_digit = $request->fourth_digit;
                $sp->fifth_digit = $request->fifth_digit;
                $sp->six_digit = $request->six_digit;
                $sp->save();

                $spLast_id = $sp->latest('created_at')->first();

                if($sp){
                    DB::table('prize_lists')->where('id', $last_id)->update(['special_prize' => $spLast_id->id]);
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
     * @param  \App\Models\special_prize  $special_prize
     * @return \Illuminate\Http\Response
     */
    public function show(special_prize $special_prize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\special_prize  $special_prize
     * @return \Illuminate\Http\Response
     */
    public function edit(special_prize $special_prize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\special_prize  $special_prize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, special_prize $special_prize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\special_prize  $special_prize
     * @return \Illuminate\Http\Response
     */
    public function destroy(special_prize $special_prize)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Carbon\Carbon;
use App\Models\FrontPage;
use Illuminate\Http\Request;
use App\Models\PrizeList;
use App\Models\consolation_prize;
use App\Models\special_prize;

class FrontPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_date_times = Carbon::now();

        $grand_winner = PrizeList::latest('created_at')->first();
        $consolation = consolation_prize::latest('created_at')->first();
        $special = special_prize::latest('created_at')->first();
        $tbl_prize = PrizeList::latest('created_at')->limit(10)->orderBy('created_at', 'DESC')->get();
        return view('front.front', compact('grand_winner', 'consolation', 'special', 'tbl_prize'));
    }

    /**
     * Show the Results of the latest item by id
     */
    public function result_details(Request $request, $id)
    {
        // $special = PrizeList::join('special_prizes', 'prize_lists.special_prize', '=', 'special_prizes.id')->where('prize_lists.id', '=', $id)->get();
        $grand_winner = PrizeList::where('prize_lists.id', '=', $id)->first();
        $consolation = consolation_prize::where('consolation_prizes.id', '=', $id)->first();
        $special = special_prize::where('special_prizes.id', '=', $id)->first();
        return view('front.result-details', compact('grand_winner', 'consolation', 'special'));
    }

    public function fetchData(Request $request){
        $fetchGW = PrizeList::latest('created_at')->first();
        return response()->json(['data', $fetchGW]);
    }

    /**
     * Show the Results page
     */
    public function result_page(Request $request)
    {
        $grand_winner = PrizeList::latest('created_at')->first();
        $consolation = consolation_prize::latest('created_at')->first();
        $special = special_prize::latest('created_at')->first();
        $tbl_prize = PrizeList::latest('created_at')->limit(10)->orderBy('created_at', 'DESC')->get();
        // return view('front.result');
    }

    /**
     * Show the about page
     */
    public function pages_about(){
        return view('front.about');
    }

    /**
     * Show the contact page
     */
    public function pages_contact(){
        return view('front.contact');
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
     * @param  \App\Models\FrontPage  $frontPage
     * @return \Illuminate\Http\Response
     */
    public function show(FrontPage $frontPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrontPage  $frontPage
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontPage $frontPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrontPage  $frontPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrontPage $frontPage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrontPage  $frontPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontPage $frontPage)
    {
        //
    }
}

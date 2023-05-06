<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Carbon\Carbon;
use App\Models\PrizeList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PrizeListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * STATUS
         * 1: ACTIVE ()
         * 2: UPDATED
         * 3: TRASH
         */
        $list = PrizeList::where('status', '1')->orWhere('status', '2')->get();
        $count = PrizeList::where('status', '1')->orWhere('status', '2')->count();
        return view('admin.prize.index', compact('list', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prize.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()) {
            // $nset_date = Carbon::createFromFormat('yyyy-mm-dd', $request->set_date)->format('Y-m-d');

            $price = new PrizeList;
            $price->first_prize = $request->first_prize;
            $price->second_prize = $request->second_prize;
            $price->thrid_prize = $request->thrid_prize;
            $price->consolation_prize_id = $request->consolation_prize_id;
            $price->special_prize = $request->special_prize;
            $price->status = $request->status;
            $price->period = $request->period;
            $price->set_date = $request->set_date;
            $price->save();
            return response()->json([ 'message' => 'Successfully Created', 'status' => 'success' ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrizeList  $prizeList
     * @return \Illuminate\Http\Response
     */
    public function show(PrizeList $prizeList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrizeList  $prizeList
     * @return \Illuminate\Http\Response
     */
    public function edit(PrizeList $prizeList, $id)
    {
        $last_id = $id;
        $list_item = PrizeList::where('id', $last_id)->firstOrFail();
        return view('admin.prize.edit', compact('list_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrizeList  $prizeList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrizeList $prizeList, $id)
    {
        if($request->ajax()) {
            $last_id = $id;
            $update_args = array(
                'first_prize' => $request->first_prize,
                'second_prize' => $request->second_prize,
                'thrid_prize' => $request->thrid_prize,
            );
            
            if($last_id) {
                $price = PrizeList::where('id', $last_id)->update($update_args);
                return response()->json([ 'message' => 'success updated', 'status' => 'success' ]);
            }else{
                return response()->json([ 'message' => 'Error: call the admin', 'status' => 'danger' ]);
            }

        }
    }

    public function trash(Request $request) {
        if($request->ajax()) {
            $last_id = $request->id;
            $price = PrizeList::where('id', $last_id)->update(['status' => '3']);
            if($price) {
                $list = PrizeList::where('status', '1')->orWhere('status', '2')->get();
                $count = PrizeList::where('status', '1')->orWhere('status', '2')->count();
                return response()->json([ 'message' => 'Moved to trash', 'status' => 'Success', 'id' => $last_id, 'list' => $list ]); 
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrizeList  $prizeList
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrizeList $prizeList)
    {
    }
}

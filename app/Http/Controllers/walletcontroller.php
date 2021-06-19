<?php

namespace App\Http\Controllers;

use App\Models\wallet;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
class walletcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function walletaddition()
    {
        $refid = Auth::id();
        $debit='0';
        //$credit='500';
        //$credit = $request->input('credit');
        //$credit = Input::only('credit');
        $credit = request()->get('credit');
        //$credit = $input['credit'];
        DB::insert('insert into wallethistory (refid,credit,debit) values(?,?,?)',[$refid,$credit,$debit]);
        //$walletbalance = DB::select('select walletbal from users');

        
        $id = Auth::id();
        //$walletbalance = DB::select('select walletbal from users');

        $walletbalance = DB::table('wallethistory')
        ->select(DB::raw('SUM(credit)-SUM(debit) as walletbal'))
        ->where('refid',$id)
        ->get();

        $history = DB::table('wallethistory')
        ->select()
        ->where('refid',$id)
        ->get();
    /*
$walletbalance = DB::select('(SELECT sum(credit) from wallethistory where refid=$id)-(SELECT sum(debit) from wallethistory where refid=$id) as walletbalance');

*/
        return view('wallet',['walletbalance'=>$walletbalance], ['history'=>$history])->with('status',"Insert successfully");

     
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
        $request->validate([
            'refid' => 'required',
            'credit' => 'required',
            'debit' => 'required'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function show(wallet $wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function edit(wallet $wallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, wallet $wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(wallet $wallet)
    {
        //
    }
}

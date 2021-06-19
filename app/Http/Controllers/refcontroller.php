<?php

namespace App\Http\Controllers;

use App\Models\ref;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;

class refcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function refaddition()
    {
        $curid = Auth::id();
        $refcd = request()->get('refcd');


        $credit = 50;
        $debit = 0;
        DB::insert('insert into wallethistory (refid,credit,debit) values(?,?,?)',[$curid,$credit,$debit]);
        DB::insert('insert into wallethistory (refid,credit,debit) values(?,?,?)',[$refcd,$credit,$debit]);
        DB::table('users')
              ->where('id', $curid)
              ->update(['usedrefid' => 1]);

        $walletbalance = DB::table('wallethistory')
        ->select(DB::raw('SUM(credit)-SUM(debit) as walletbal'))
        ->where('refid',$curid)
        ->get();

        $history = DB::table('wallethistory')
        ->select()
        ->where('refid',$curid)
        ->get();
    /*
$walletbalance = DB::select('(SELECT sum(credit) from wallethistory where refid=$id)-(SELECT sum(debit) from wallethistory where refid=$id) as walletbalance');

*/
        return view('wallet',['walletbalance'=>$walletbalance], ['history'=>$history]);

        
    }


   public function addcomment()
    {
        $curid = Auth::id();
        $curname = Auth::user()->name;
        $homecomment = request()->get('homecomment');

        DB::insert('insert into commentstable (name,refid,commentdata) values(?,?,?)',[$curname,$curid,$homecomment]);
        $allcomments = DB::table('commentstable')
        ->select()
        ->get();



        return view('dashboard',['allcomments'=>$allcomments]);

        
    }

       public function viewhome()
    {
    
        $allcomments = DB::table('commentstable')
        ->select()
        ->get();



        return view('dashboard',['allcomments'=>$allcomments]);

        
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
     * @param  \App\Models\ref  $ref
     * @return \Illuminate\Http\Response
     */
    public function show(ref $ref)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ref  $ref
     * @return \Illuminate\Http\Response
     */
    public function edit(ref $ref)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ref  $ref
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ref $ref)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ref  $ref
     * @return \Illuminate\Http\Response
     */
    public function destroy(ref $ref)
    {
        //
    }
}

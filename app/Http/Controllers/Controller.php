<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Auth;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
//use App\wallet;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function walletbalance(){


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
		return view('wallet',['walletbalance'=>$walletbalance], ['history'=>$history]);

}


    public function myrefid(){


    	$curid = Auth::id();
		//$walletbalance = DB::select('select walletbal from users');
		//$usedrefid = DB::select('select usedrefid from users')

		//$allreferrals = 500;

    	
    	$history = DB::table('users')
		->select('id')
		->get();
		

    	$usedrefid = DB::table('users')
    	->select('usedrefid','id')
    	->where('id',$curid)
		->get();

		//$allusers = DB::select('select id from users');

		return view('ref',['usedrefid'=>$usedrefid], ['history'=>$history]);

}


    public function walletaddition(){


    	$id = Auth::id();
    	$debit=0;
    	$credit=500;
    	 //$credit = $request->input('credit');
    	DB::insert('insert into wallethistory (id,credit,debit) values(?)',[$id,$credit,$debit]);
		//$walletbalance = DB::select('select walletbal from users');

    	

		return view('wallet');

}






}

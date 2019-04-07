<?php

namespace App\Http\Controllers\AM;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\AspekBisnis;
use App\ChatRoom;
use App\Jabatan;
use App\LatarBelakang;
use App\Mitra;
use App\Pelanggan;
use App\Proyek;
use App\User;
use App\UnitKerja;
use App\Witel;
use DB;
use Auth;
use Session;
use Telegram;
use Telegram\Bot\Api;
// use Input;

class WitelController extends Controller
{
	public function _construct()
	{
		$this->middleware('auth');
	}


	public function indexWitel()
	{
		$witel = DB::table('witel')->get();
		$user = DB::table('users')->get();
		$jabatan = DB::table('jabatan')->get();
		// dd($witel);
		$se = DB::table('witel') 
            ->leftjoin('users','users.id','=','witel.se')->where('id_jabatan',2)
            ->get();
        $bidding = DB::table('witel') 
            ->leftjoin('users','users.id','=','witel.bidding')->where('id_jabatan',3)
            ->get();
        $manager = DB::table('witel') 
            ->leftjoin('users','users.id','=','witel.manager')->where('id_jabatan',4)
            ->get();
        $deputy = DB::table('witel') 
            ->leftjoin('users','users.id','=','witel.deputy')->where('id_jabatan',5)
            ->get();
        $gm = DB::table('witel') 
            ->leftjoin('users','users.id','=','witel.gm')->where('id_jabatan',6)
            ->get();
        $approval = DB::table('witel') 
            ->leftjoin('users','users.id','=','witel.approval')->where('id_jabatan',7)
            ->get();
		return view('AM.witel', ['witel'=>$witel, 'user'=>$user, 'jabatan'=>$jabatan, 'se'=>$se, 'bidding'=>$bidding, 'manager'=>$manager, 'deputy'=>$deputy, 'gm'=>$gm, 'approval'=>$approval]);
	}

	public function insertWitel(Request $request)
	{

		$witel = new Witel;
		$witel->nama_witel = $request->input('nama_witel');
		$witel->se = $request->input('se');
		$witel->bidding = $request->input('bidding');
		$witel->manager = $request->input('manager');
		$witel->deputy = $request->input('deputy');
		$witel->gm = $request->input('gm');
		$witel->approval = $request->input('approval');
		$witel->save();
		return redirect()->route('witel');
	}

	public function updateWitel(Request $request,$id)
	{
		// dd($id);
		$witel = Witel::find($id);
		$witel->id_witel = $request->input('id_witel',$id);
		$witel->nama_witel = $request->input('nama_witel');
		$witel->se = $request->input('se');
		$witel->bidding = $request->input('bidding');
		$witel->manager = $request->input('manager');
		$witel->deputy = $request->input('deputy');
		$witel->gm = $request->input('gm');
		$witel->approval = $request->input('approval');
		$witel->save();
		
		// dd($witel);
		return redirect()->route('witel');
	}

	public function deleteWitel($id)
	{
		DB::table('witel')->where('id_witel',$id)->delete();
		return redirect()->route('witel');
	}


	

	
}
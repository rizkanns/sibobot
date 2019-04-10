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
		$pejabat = DB::table('users')
			->leftjoin('witel','users.id_witel','=','witel.id_witel')
			->leftjoin('jabatan','users.id_jabatan','=','jabatan.id_jabatan')
            ->get();
		// dd($witel);
		$se = DB::table('users')->where('id_jabatan',2)->get();
		// dd($se);
        $bidding = DB::table('users')->where('id_jabatan',3)->get();
        $manager = DB::table('users')->where('id_jabatan',4)->get();
        $deputy = DB::table('users')->where('id_jabatan',5)->get();
        $gm = DB::table('users')->where('id_jabatan',6)->get();
        $approval = DB::table('users')->where('id_jabatan',7)->get();

		return view('AM.witel', ['witel'=>$witel, 'user'=>$user, 'jabatan'=>$jabatan, 'se'=>$se, 'bidding'=>$bidding, 'manager'=>$manager, 'deputy'=>$deputy, 'gm'=>$gm, 'approval'=>$approval]);
	}

	public function insertWitel(Request $request)
	{

		$witel = new Witel;
		$witel->nama_witel = $request->input('nama_witel');
		$witel->save();
		return redirect()->route('witel');
	}

	public function updateWitel(Request $request,$id)
	{
		// dd($id);
		$witel = Witel::find($id);
		$witel->id_witel = $request->input('id_witel',$id);
		$witel->nama_witel = $request->input('nama_witel');
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
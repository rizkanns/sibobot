<?php

namespace App\Http\Controllers\KelolaData;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Jabatan;
use App\User;
use App\Witel;
use DB;
use Auth;
use Session;

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

		return view('kelola_data.witel', ['witel'=>$witel, 'user'=>$user, 'jabatan'=>$jabatan, 'se'=>$se, 'bidding'=>$bidding, 'manager'=>$manager, 'deputy'=>$deputy, 'gm'=>$gm, 'approval'=>$approval]);
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
		// $witel = Witel::find($id);
		// $witel->id_witel = $request->input('id_witel',$id);
		// $witel->nama_witel = $request->input('nama_witel');
		// $witel->save();

		Witel::where('id_witel',$id)->update($request->all());
		// dd($witel);
		return redirect()->route('witel');
	}

	public function deleteWitel($id)
	{
		Witel::where('id_witel',$id)->delete();
		return redirect()->route('witel');
	}


	public function indexDetilWitel($id)
	{
		$witel = Witel::where('id_witel',$id)->get();
		$user = User::get();
		$se = User::where('id_jabatan',2)->get();
        $bidding = User::where('id_jabatan',3)->get();
        $manager = User::where('id_jabatan',4)->get();
        $deputy = User::where('id_jabatan',5)->get();
        $gm = User::where('id_jabatan',6)->get();
        $approval = User::where('id_jabatan',7)->get();


		return view('kelola_data.witel-detil', ['witel'=>$witel, 'user'=>$user, 'se'=>$se, 'bidding'=>$bidding, 'manager'=>$manager, 'deputy'=>$deputy, 'gm'=>$gm, 'approval'=>$approval]);
	}


	public function insertDetilWitel(Request $request)
	{
		$user = User::get();

		$user->id_witel = $require->input('id_witel');
		$user->save();
		return redirect()->route('witel');
	}

	
}
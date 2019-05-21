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

class PejabatController extends Controller
{
	public function _construct()
	{
		$this->middleware('auth');
	}


	public function indexPejabat()
	{

		$user = User::leftjoin('witel','users.id_witel','=','witel.id_witel')
				->leftjoin('jabatan','users.id_jabatan','=','jabatan.id_jabatan')
				->get();
		$jabatan = Jabatan::get();
		
		return view('kelola_data.pejabat', ['user'=>$user, 'jabatan'=>$jabatan]);
	}

	public function insertPejabat(Request $request)
	{

		$user = new User;
		$user->name = $request->input('name');
		$user->nik = $request->input('nik');
		$user->id_jabatan = $request->input('id_jabatan');
		$user->id_witel = $request->input('id_witel');
		$user->email = $request->input('email');
		$user->password = $request->input('password');
		$user->save();

		// dd($user);
		return redirect()->route('pejabat')->with('create','User "'.$user->name.'" Berhasil Ditambahkan!');
	}

	public function updatePejabat(Request $request,$id)
	{
		// $user = User::find($id);
		// $user->id = $request->input('id',$id);
		// $user->name = $request->input('name');
		// $user->nik = $request->input('nik');
		// $user->id_jabatan = $request->input('id_jabatan');
		// $user->id_wilayah = $request->input('id_wilayah');
		// $user->email = $request->input('email');
		// $user->password = $request->input('password');
		// $user->save();

    	User::where('id',$id)->update($request->all());
		
		// dd($user);
		return redirect()->route('pejabat')->with('update','Data Berhasil Diperbarui!');
	}

	public function deletePejabat($id)
	{
		User::where('id',$id)->delete();
		return redirect()->route('pejabat')->with('delete','Data Berhasil Dihapus!');
	}



	
}
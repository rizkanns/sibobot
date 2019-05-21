<?php

namespace App\Http\Controllers\KelolaData;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Mitra;
use DB;
use Auth;
use Session;

class MitraController extends Controller
{
	public function _construct()
	{
		$this->middleware('auth');
	}


	///////////////////////// MITRA /////////////////////////
	public function indexMitra()
	{
		$mitra = Mitra::get();
		return view('kelola_data.mitra', ['mitra'=>$mitra]);
	}

	public function insertMitra(Request $request)
	{
		$mitra = New Mitra;
		$mitra->id_mitra = $request->input('id_mitra');
		$mitra->nama_mitra = $request->input('nama_mitra');
		$mitra->deskripsi_mitra = $request->input('deskripsi_mitra');
		$mitra->save();
		return redirect()->route('mitra')->with('create','Mitra "'.$mitra->nama_mitra.'" Berhasil Ditambahkan!');
	}

	public function updateMitra(Request $request, $id)
    {
    	Mitra::where('id_mitra',$id)->update($request->all());
    	return redirect()->route('mitra')->with('update','Data Berhasil Diperbarui!');
    }

    public function deleteMitra(Request $request, $id)
    {
    	Mitra::where('id_mitra',$id)->delete();
    	return redirect()->route('mitra')->with('delete','Data Berhasil Dihapus!');
    }
    
}
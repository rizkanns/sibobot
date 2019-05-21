<?php

namespace App\Http\Controllers\KelolaData;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\UnitKerja;
use DB;
use Auth;
use Session;

class UnitKerjaController extends Controller
{
	public function _construct()
	{
		$this->middleware('auth');
	}


	////////////////////////// UNIT KERJA ///////////////////////////
	public function indexUnitKerja()
	{
		$unit_kerja = UnitKerja::get();
		return view('kelola_data.unit-kerja', ['unit_kerja'=>$unit_kerja]);
	}

	public function insertUnitKerja(Request $request)
	{
		$unit_kerja = new UnitKerja;
		$unit_kerja->id_unit_kerja = $request->input('id_unit_kerja');
		$unit_kerja->nama_unit_kerja = $request->input('nama_unit_kerja');
		$unit_kerja->deskripsi_unit_kerja = $request->input('deskripsi_unit_kerja');
		$unit_kerja->save();
		return redirect()->route('unit')->with('create','Unit Kerja "'.$unit_kerja->nama_unit_kerja.'" Berhasil Ditambahkan!');
	}

	public function updateUnitKerja(Request $request, $id)
	{
		UnitKerja::where('id_unit_kerja',$id)->update($request->all());
		return redirect()->route('unit')->with('update','Data Berhasil Diperbarui!');
	}

	public function deleteUnitKerja($id)
	{
		UnitKerja::where('id_unit_kerja',$id)->delete();
		return redirect()->route('unit')->with('delete','Data Berhasil Dihapus!');
	}

	
}
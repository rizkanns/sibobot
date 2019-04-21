<?php

namespace App\Http\Controllers\SE;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Nilai;
use App\Parameter;
use App\Rumus;
use App\DetilNilai;
use App\DetilParameter;
use App\Rekomendasi;
use DB;
use Auth;
use Session;
// use Input;

class RekomendasiController extends Controller
{
	public function _construct()
	{
		$this->middleware('auth');
	}


	///////////////////////// MITRA /////////////////////////
	public function indexRekomendasi()
	{
		// $mitra = DB::table('mitra')->get();
		$parameter = Parameter::get();
		// dd($parameter);
		return view('SE.rekomendasi', ['parameter'=>$parameter]);
	}

	public function insertParameter(Request $request)
	{
		$parameter = New Parameter;
		$parameter->id_parameter = $request->input('id_parameter');
		$parameter->nama_parameter = $request->input('nama_parameter');
		$parameter->nilai_parameter = $request->input('nilai_parameter');
		$parameter->save();
		return redirect()->route('rekomendasi');
	}

	public function updateParameter(Request $request, $id)
    {
    	Parameter::where('id_parameter',$id)->update($request->all());
    	return redirect()->route('rekomendasi');
    }

    public function deleteMitra(Request $request, $id)
    {
    	Parameter::where('id_mitra',$id)->delete();
    	return redirect()->route('mitra');
    }
    
}
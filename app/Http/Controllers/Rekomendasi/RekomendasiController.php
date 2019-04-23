<?php

namespace App\Http\Controllers\Rekomendasi;

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

class RekomendasiController extends Controller
{
	public function _construct()
	{
		$this->middleware('auth');
	}
	
	public function indexRekomendasi()
	{
		$parameter = Parameter::get();

		// dd($parameter);
		return view('rekomendasi.rekomendasi', ['parameter'=>$parameter]);
	}


	///////////////////////// parameter /////////////////////////
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

    public function resetParameter(Request $request, $id)
    {
    	$parameter = Parameter::find($id);
    	$parameter->id_parameter = $request->input('id_parameter',$id);
    	$parameter->nilai_parameter = 0;
    	$parameter->save();
    	return redirect()->route('rekomendasi');
    }


    //////////////////////////// rumus ///////////////////////////
    public function insertRumus(Request $request)
	{
		$rumus = New Rumus;
		$rumus->id_rumus = $request->input('id_rumus');
		$rumus->nama_parameter = $request->input('nama_parameter');
		$rumus->save();
		return redirect()->route('rekomendasi');
	}

	public function updateRumus(Request $request, $id)
    {
    	Parameter::where('id_rumus',$id)->update($request->all());
    	return redirect()->route('rekomendasi');
    }

    public function deleteMitra(Request $request, $id)
    {
    	Parameter::where('id_rumus',$id)->delete();
    	return redirect()->route('mitra');
    }
    
}
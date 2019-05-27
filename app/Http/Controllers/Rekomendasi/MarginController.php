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

class MarginController extends Controller
{
	public function _construct()
	{
		$this->middleware('auth');
	}
	
	public function indexMargin()
	{
		$nilai = Nilai::get();
		$rumus = Rumus::get();

		// dd($parameter);
		return view('rekomendasi.margin', ['nilai'=>$nilai, 'rumus'=>$rumus]);
	}


    //////////////////////////// rumus ///////////////////////////
	public function insertMargin(Request $request)
    {
    	$margin = New Nilai;
    	$margin->id_revenue = $request->input('id_revenue');
    	$margin->id_rumus = $request->input('id_rumus');
    	$margin->nilai_pc = $request->input('nilai_pc');
    	$margin->save();

    	// dd($margin);
    	return redirect()->route('margin');
    }

    public function updateMargin(Request $request, $id)
    {
    	$margin = Nilai::find($id);
    	$margin->id_nilai = $request->input('id_nilai',$id);
    	$margin->id_revenue = $request->input('id_revenue');
    	$margin->id_rumus = $request->input('id_rumus');
    	$margin->nilai_pc = $request->input('nilai_pc');
    	$margin->save();

    	// dd($margin);
    	return redirect()->route('margin');
    }

    
}
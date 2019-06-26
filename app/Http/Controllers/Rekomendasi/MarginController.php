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
use App\Revenue;
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

    public function singleMargin($id)
    {
        $nilai = Nilai::where('id_nilai',$id)->get();
        $rumus = Rumus::get();
        $revenue = Revenue::get();

        // dd($nilai);
        return view('rekomendasi.single', ['nilai'=>$nilai, 'rumus'=>$rumus, 'revenue'=>$revenue]);
    }


    //////////////////////////// rumus ///////////////////////////
	public function insertMargin(Request $request)
    {
    	$margin = New Nilai;
    	$margin->id_revenue = $request->input('id_revenue');
    	$margin->id_rumus = $request->input('id_rumus');
    	$margin->nilai_pc = $request->input('nilai_pc');

        if ($margin->id_revenue == 1)
            $margin->rumus_akhir = "12 x nilai_kontrak x ".$margin->nilai_pc;
        elseif ($margin->id_revenue == 2)
            $margin->rumus_akhir = "masa_kontrak x nilai_kontrak x ".$margin->nilai_pc;
        else
            $margin->rumus_akhir = "nilai_kontrak x ".$margin->nilai_pc;
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

    	if ($margin->id_revenue == 1)
            $margin->rumus_akhir = "12 x nilai_kontrak x ".$margin->nilai_pc;
        elseif ($margin->id_revenue == 2)
            $margin->rumus_akhir = "masa_kontrak x nilai_kontrak x ".$margin->nilai_pc;
        else
            $margin->rumus_akhir = "nilai_kontrak x ".$margin->nilai_pc;
        $margin->save();

    	// dd($margin);
    	return redirect()->route('margin');
    }

    
}
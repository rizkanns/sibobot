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

class HasilController extends Controller
{
    public function _construct()
	{
		$this->middleware('auth');
	}
	
	public function indexHasil()
	{
		$nilai = Nilai::get();

		// dd($parameter);
		return view('rekomendasi.hasil', ['nilai'=>$nilai]);
	}
}

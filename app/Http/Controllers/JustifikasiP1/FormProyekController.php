<?php

namespace App\Http\Controllers\JustifikasiP1;

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
use DB;
use Auth;
use Session;
use Telegram;
use Telegram\Bot\Api;
// use Input;

class FormProyekController extends Controller
{
	public function _construct()
	{
		$this->middleware('auth');
	}


    //////////////////////// PROYEK /////////////////////////////
	public function indexProyek($id_pelanggan,$id_proyek,$id_aspek)
    {
		$data['pelanggan'] = Pelanggan::find($id_pelanggan)->select('id_pelanggan','jenis_pelanggan')->where('id_pelanggan',$id_pelanggan)->get();
		$data['proyek'] = Proyek::find($id_proyek)->where('id_proyek',$id_proyek)->get();
		$data['aspek'] = AspekBisnis::find($id_aspek)->select('id_aspek')->where('id_aspek',$id_aspek)->get();
		$data['unit'] = DB::table('unit_kerja')->select('id_unit_kerja','nama_unit_kerja')->orderBy('nama_unit_kerja')->get();
		$data['mitra'] = DB::table('mitra')->select('id_mitra','nama_mitra')->orderBy('nama_mitra')->get();
		// dd($data);
    	return view('justifikasi_p1.form-proyek',$data);
    }

	public function insertProyek(Request $request,$id_pelanggan,$id_proyek,$id_aspek)
    {
    	// $this->validate($request, ['gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' ]);

			$find = Proyek::find($id_proyek);
			if($find->file_p1 == NULL || $find->file_p0 == NULL)
			{
	        	$file_p0 = $request->file('file_p0');
	        	// $name_p0 = $file_p0->getClientOriginalName();
	        	// dd($name_p0);
	        	if(Input::hasFile('file_p0'))
	        	{
	        	$file_p0 = $request->file('file_p0');
	        	$file_p1 = $request->file('file_p1');

	        		if(Input::hasFile('file_p1'))
	        		{
	        		$file_p0 = $request->file('file_p0');
		        	$name_p0 = $file_p0->getClientOriginalName();
					$destinationPath = public_path('/plugins/images/file_p0');
		        	$file_p0->move($destinationPath, $name_p0);

		        	$file_p1 = $request->file('file_p1');
					$name_p1 = $file_p1->getClientOriginalName();
					$destinationPath = public_path('/plugins/images/file_p1');
		        	$file_p1->move($destinationPath, $name_p1);

		        	$proyek = Proyek::find($id_proyek);
					$proyek->id_proyek = $request->input('id_proyek',$id_proyek);
					$proyek->id_mitra = $request->input('id_mitra');
					$proyek->id_mitra_2 = $request->input('id_mitra_2');
					$proyek->keterangan_mitra_1 = $request->input('keterangan_mitra_1');
					$proyek->keterangan_mitra_2 = $request->input('keterangan_mitra_2');
					$proyek->id_pelanggan = $request->input('id_pelanggan',$id_pelanggan);
					$proyek->judul = $request->input('judul');
					$proyek->id_unit_kerja = $request->input('id_unit_kerja');
					$proyek->latar_belakang_1 = $request->input('latar_belakang_1');
					$proyek->latar_belakang_2 = $request->input('latar_belakang_2');
					$proyek->saat_penggunaan = $request->input('saat_penggunaan');
					$proyek->pemasukan_dokumen = $request->input('pemasukan_dokumen');
					$proyek->ready_for_service = $request->input('ready_for_service');
					$proyek->skema_bisnis = $request->input('skema_bisnis');
					$proyek->masa_kontrak = $request->input('masa_kontrak');
					$proyek->alamat_delivery = $request->input('alamat_delivery');
					$proyek->mekanisme_pembayaran = $request->input('mekanisme_pembayaran');
					$proyek->rincian_pembayaran = $request->input('rincian_pembayaran');
					$proyek->file_p0 = $name_p0;
					$proyek->file_p1 = $name_p1;
					$proyek->save();

					$pelanggan = Pelanggan::find($id_pelanggan);
					$pelanggan->id_pelanggan = $request->input('id_pelanggan',$id_pelanggan);
					$pelanggan->save();

					$aspek = AspekBisnis::find($id_aspek);
					$aspek->id_aspek = $request->input('id_aspek',$id_aspek);
					$aspek->id_proyek = $request->input('id_proyek',$id_proyek);
					$aspek->save();

					// dd($proyek);
					return redirect()->route('p1_aspek_single', ['id_pelanggan' => $pelanggan, 'id_proyek' => $proyek->id_proyek, 'id_aspek' => $aspek]);
					}

					else
					{
						$file_p0 = $request->file('file_p0');
	        			$name_p0 = $file_p0->getClientOriginalName();
						$destinationPath = public_path('/plugins/images/file_p0');
	        			$file_p0->move($destinationPath, $name_p0);

	        			$proyek = Proyek::find($id_proyek);
						$proyek->id_proyek = $request->input('id_proyek',$id_proyek);
						$proyek->id_mitra = $request->input('id_mitra');
						$proyek->id_mitra_2 = $request->input('id_mitra_2');
						$proyek->keterangan_mitra_1 = $request->input('keterangan_mitra_1');
						$proyek->keterangan_mitra_2 = $request->input('keterangan_mitra_2');
						$proyek->id_pelanggan = $request->input('id_pelanggan',$id_pelanggan);
						$proyek->judul = $request->input('judul');
						$proyek->id_unit_kerja = $request->input('id_unit_kerja');
						$proyek->latar_belakang_1 = $request->input('latar_belakang_1');
						$proyek->latar_belakang_2 = $request->input('latar_belakang_2');
						$proyek->saat_penggunaan = $request->input('saat_penggunaan');
						$proyek->pemasukan_dokumen = $request->input('pemasukan_dokumen');
						$proyek->ready_for_service = $request->input('ready_for_service');
						$proyek->skema_bisnis = $request->input('skema_bisnis');
						$proyek->masa_kontrak = $request->input('masa_kontrak');
						$proyek->alamat_delivery = $request->input('alamat_delivery');
						$proyek->mekanisme_pembayaran = $request->input('mekanisme_pembayaran');
						$proyek->rincian_pembayaran = $request->input('rincian_pembayaran');
						$proyek->file_p0 = $name_p0;
						// $proyek->file_p1 = $name_p1;
						$proyek->save();

						$pelanggan = Pelanggan::find($id_pelanggan);
						$pelanggan->id_pelanggan = $request->input('id_pelanggan',$id_pelanggan);
						$pelanggan->save();

						$aspek = AspekBisnis::find($id_aspek);
						$aspek->id_aspek = $request->input('id_aspek',$id_aspek);
						$aspek->id_proyek = $request->input('id_proyek',$id_proyek);
						$aspek->save();

						// dd($proyek);
						return redirect()->route('p1_aspek_single', ['id_pelanggan' => $pelanggan, 'id_proyek' => $proyek->id_proyek, 'id_aspek' => $aspek]);
					}

				// dd($proyek);
				return redirect()->route('p1_aspek_single', ['id_pelanggan' => $pelanggan, 'id_proyek' => $proyek->id_proyek, 'id_aspek' => $aspek]);
				}

				else
				{
					$file_p1 = $request->file('file_p1');
					if(Input::hasFile('file_p1'))
	        		{
	        			$file_p1 = $request->file('file_p1');
						$name_p1 = $file_p1->getClientOriginalName();
						$destinationPath = public_path('/plugins/images/file_p1');
		        		$file_p1->move($destinationPath, $name_p1);

						$proyek = Proyek::find($id_proyek);
						$proyek->id_proyek = $request->input('id_proyek',$id_proyek);
						$proyek->id_mitra = $request->input('id_mitra');
						$proyek->id_mitra_2 = $request->input('id_mitra_2');
						$proyek->keterangan_mitra_1 = $request->input('keterangan_mitra_1');
						$proyek->keterangan_mitra_2 = $request->input('keterangan_mitra_2');
						$proyek->id_pelanggan = $request->input('id_pelanggan',$id_pelanggan);
						$proyek->judul = $request->input('judul');
						$proyek->id_unit_kerja = $request->input('id_unit_kerja');
						$proyek->latar_belakang_1 = $request->input('latar_belakang_1');
						$proyek->latar_belakang_2 = $request->input('latar_belakang_2');
						$proyek->saat_penggunaan = $request->input('saat_penggunaan');
						$proyek->pemasukan_dokumen = $request->input('pemasukan_dokumen');
						$proyek->ready_for_service = $request->input('ready_for_service');
						$proyek->skema_bisnis = $request->input('skema_bisnis');
						$proyek->masa_kontrak = $request->input('masa_kontrak');
						$proyek->alamat_delivery = $request->input('alamat_delivery');
						$proyek->mekanisme_pembayaran = $request->input('mekanisme_pembayaran');
						$proyek->rincian_pembayaran = $request->input('rincian_pembayaran');
						$proyek->file_p1 = $name_p1;
						$proyek->save();

						$pelanggan = Pelanggan::find($id_pelanggan);
						$pelanggan->id_pelanggan = $request->input('id_pelanggan',$id_pelanggan);
						$pelanggan->save();

						$aspek = AspekBisnis::find($id_aspek);
						$aspek->id_aspek = $request->input('id_aspek',$id_aspek);
						$aspek->id_proyek = $request->input('id_proyek',$id_proyek);
						$aspek->save();

						// dd($proyek);
						return redirect()->route('p1_aspek_single', ['id_pelanggan' => $pelanggan, 'id_proyek' => $proyek->id_proyek, 'id_aspek' => $aspek]);
					}

					else
					{
						$proyek = Proyek::find($id_proyek);
						$proyek->id_proyek = $request->input('id_proyek',$id_proyek);
						$proyek->id_mitra = $request->input('id_mitra');
						$proyek->id_mitra_2 = $request->input('id_mitra_2');
						$proyek->keterangan_mitra_1 = $request->input('keterangan_mitra_1');
						$proyek->keterangan_mitra_2 = $request->input('keterangan_mitra_2');
						$proyek->id_pelanggan = $request->input('id_pelanggan',$id_pelanggan);
						$proyek->judul = $request->input('judul');
						$proyek->id_unit_kerja = $request->input('id_unit_kerja');
						$proyek->latar_belakang_1 = $request->input('latar_belakang_1');
						$proyek->latar_belakang_2 = $request->input('latar_belakang_2');
						$proyek->saat_penggunaan = $request->input('saat_penggunaan');
						$proyek->pemasukan_dokumen = $request->input('pemasukan_dokumen');
						$proyek->ready_for_service = $request->input('ready_for_service');
						$proyek->skema_bisnis = $request->input('skema_bisnis');
						$proyek->masa_kontrak = $request->input('masa_kontrak');
						$proyek->alamat_delivery = $request->input('alamat_delivery');
						$proyek->mekanisme_pembayaran = $request->input('mekanisme_pembayaran');
						$proyek->rincian_pembayaran = $request->input('rincian_pembayaran');
						// $proyek->file_p1 = $name_p1;
						$proyek->save();

						$pelanggan = Pelanggan::find($id_pelanggan);
						$pelanggan->id_pelanggan = $request->input('id_pelanggan',$id_pelanggan);
						$pelanggan->save();

						$aspek = AspekBisnis::find($id_aspek);
						$aspek->id_aspek = $request->input('id_aspek',$id_aspek);
						$aspek->id_proyek = $request->input('id_proyek',$id_proyek);
						$aspek->save();

						// dd($proyek);
						return redirect()->route('p1_aspek_single', ['id_pelanggan' => $pelanggan, 'id_proyek' => $proyek->id_proyek, 'id_aspek' => $aspek]);
					}
				}
			}

			else
			{
				$proyek = Proyek::find($id_proyek);
				$proyek->id_proyek = $request->input('id_proyek',$id_proyek);
				$proyek->id_mitra = $request->input('id_mitra');
				$proyek->id_mitra_2 = $request->input('id_mitra_2');
				$proyek->keterangan_mitra_1 = $request->input('keterangan_mitra_1');
				$proyek->keterangan_mitra_2 = $request->input('keterangan_mitra_2');
				$proyek->id_pelanggan = $request->input('id_pelanggan',$id_pelanggan);
				$proyek->judul = $request->input('judul');
				$proyek->id_unit_kerja = $request->input('id_unit_kerja');
				$proyek->latar_belakang_1 = $request->input('latar_belakang_1');
				$proyek->latar_belakang_2 = $request->input('latar_belakang_2');
				$proyek->saat_penggunaan = $request->input('saat_penggunaan');
				$proyek->pemasukan_dokumen = $request->input('pemasukan_dokumen');
				$proyek->ready_for_service = $request->input('ready_for_service');
				$proyek->skema_bisnis = $request->input('skema_bisnis');
				$proyek->masa_kontrak = $request->input('masa_kontrak');
				$proyek->alamat_delivery = $request->input('alamat_delivery');
				$proyek->mekanisme_pembayaran = $request->input('mekanisme_pembayaran');
				$proyek->rincian_pembayaran = $request->input('rincian_pembayaran');
				// $proyek->file_p0 = $name_p0;
				// $proyek->file_p1 = $name_p1;
				$proyek->save();

				$pelanggan = Pelanggan::find($id_pelanggan);
				$pelanggan->id_pelanggan = $request->input('id_pelanggan',$id_pelanggan);
				$pelanggan->save();

				$aspek = AspekBisnis::find($id_aspek);
				$aspek->id_aspek = $request->input('id_aspek',$id_aspek);
				$aspek->id_proyek = $request->input('id_proyek',$id_proyek);
				$aspek->save();

				// dd($proyek);
				return redirect()->route('p1_aspek_single', ['id_pelanggan' => $pelanggan, 'id_proyek' => $proyek->id_proyek, 'id_aspek' => $aspek]);
			}
		// }		 
	}

	public function updateFileP0(Request $request,$id_pelanggan,$id_proyek,$id_aspek)
    {

        $data['proyek2'] = Proyek::find($id_proyek);
        $data['proyek2']->id_proyek = $request->input('id_proyek',$id_proyek);
        $data['proyek2']->file_p0 = NULL;
        $data['proyek2']->save();

    	$data['pelanggan'] = Pelanggan::find($id_pelanggan)->select('id_pelanggan','jenis_pelanggan')->where('id_pelanggan',$id_pelanggan)->get();
		$data['proyek'] = Proyek::find($id_proyek)->where('id_proyek',$id_proyek)->get();
		$data['aspek'] = AspekBisnis::find($id_aspek)->select('id_aspek')->where('id_aspek',$id_aspek)->get();
		$data['unit'] = DB::table('unit_kerja')->select('id_unit_kerja','nama_unit_kerja')->orderBy('nama_unit_kerja')->get();
		$data['mitra'] = DB::table('mitra')->select('id_mitra','nama_mitra')->orderBy('nama_mitra')->get();

        return view('justifikasi_p1.form-proyek',$data);
    }

    public function updateFileP1(Request $request,$id_pelanggan,$id_proyek,$id_aspek)
    {

        $data['proyek2'] = Proyek::find($id_proyek);
        $data['proyek2']->id_proyek = $request->input('id_proyek',$id_proyek);
        $data['proyek2']->file_p1 = NULL;
        $data['proyek2']->save();

    	$data['pelanggan'] = Pelanggan::find($id_pelanggan)->select('id_pelanggan','jenis_pelanggan')->where('id_pelanggan',$id_pelanggan)->get();
		$data['proyek'] = Proyek::find($id_proyek)->where('id_proyek',$id_proyek)->get();
		$data['aspek'] = AspekBisnis::find($id_aspek)->select('id_aspek')->where('id_aspek',$id_aspek)->get();
		$data['unit'] = DB::table('unit_kerja')->select('id_unit_kerja','nama_unit_kerja')->orderBy('nama_unit_kerja')->get();
		$data['mitra'] = DB::table('mitra')->select('id_mitra','nama_mitra')->orderBy('nama_mitra')->get();

        return view('justifikasi_p1.form-proyek',$data);
    }

    public function updateMitra(Request $request,$id_pelanggan,$id_proyek,$id_aspek)
    {

        $data['proyek3'] = Proyek::find($id_proyek);
        $data['proyek3']->id_proyek = $request->input('id_proyek',$id_proyek);
        $data['proyek3']->id_mitra_2 = NULL;
        $data['proyek3']->save();

    	$data['pelanggan'] = Pelanggan::find($id_pelanggan)->select('id_pelanggan','jenis_pelanggan')->where('id_pelanggan',$id_pelanggan)->get();
		$data['proyek'] = Proyek::find($id_proyek)->where('id_proyek',$id_proyek)->get();
		$data['aspek'] = AspekBisnis::find($id_aspek)->select('id_aspek')->where('id_aspek',$id_aspek)->get();
		$data['unit'] = DB::table('unit_kerja')->select('id_unit_kerja','nama_unit_kerja')->orderBy('nama_unit_kerja')->get();
		$data['mitra'] = DB::table('mitra')->select('id_mitra','nama_mitra')->orderBy('nama_mitra')->get();

        return view('justifikasi_p1.form-proyek',$data);
    }

}
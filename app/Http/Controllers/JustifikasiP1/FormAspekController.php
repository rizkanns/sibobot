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

class FormAspekController extends Controller
{
	public function _construct()
	{
		$this->middleware('auth');
	}


    /////////////////////////////// ASPEK ///////////////////////////
	public function indexAspek($id_pelanggan,$id_proyek,$id_aspek)
	{
		$data['pelanggan'] = Pelanggan::find($id_pelanggan)->select('id_pelanggan')->where('id_pelanggan',$id_pelanggan)->get();
		$data['proyek'] = Proyek::find($id_proyek)->select('id_proyek','id_mitra_2')->where('id_proyek',$id_proyek)->get();
		$data['aspek'] = AspekBisnis::find($id_aspek)->where('id_aspek',$id_aspek)->get();
		
		return view('justifikasi_p1.form-aspek',$data);
	}
	
    public function insertAspek(Request $request,$id_pelanggan,$id_proyek,$id_aspek)
    {
		$pelanggan = Pelanggan::find($id_pelanggan);
		$pelanggan->id_pelanggan = $request->input('id_pelanggan',$id_pelanggan);
		$pelanggan->save();
	
		$proyek = Proyek::find($id_proyek);
		$proyek->id_proyek = $request->input('id_proyek',$id_proyek);
		$proyek->id_pelanggan = $request->input('id_pelanggan',$id_pelanggan);
		$proyek->id_users = Auth::user()->id;
		$proyek->save();

		$aspek = AspekBisnis::find($id_aspek);
		$aspek->id_aspek = $request->input('id_aspek',$id_aspek);
		$aspek->id_proyek = $request->input('id_proyek',$id_proyek);
		$aspek->layanan_revenue = $request->input('layanan_revenue');
		$aspek->beban_mitra = $request->input('beban_mitra');
		$aspek->nilai_kontrak = $request->input('nilai_kontrak');
		$aspek->rp_margin = $request->input('rp_margin');
		$aspek->colocation = $request->input('colocation');
		$aspek->revenue_connectivity = $request->input('revenue_connectivity');
		$aspek->revenue_cpe_proyek = $request->input('revenue_cpe_proyek');
		$aspek->revenue_cpe_mitra = $request->input('revenue_cpe_mitra');
		$aspek->margin_tg = number_format($aspek->rp_margin/$aspek->beban_mitra*100,2);
		$aspek->save();

        $changes = $aspek->getChanges();
        $arrlength=count($changes);
        // dd($arrlength);
        // $original = $changes->getOriginal();
        // dd($changes);
        
        // if (!$aspek->wasRecentlyCreated) {
        //     $original = $aspek->getOriginal();
        //     $changes = [];

        //     foreach ($aspek->getChanges() as $key => $value) {
        //         $changes[$key] = [
        //             'original' => $original[$key],
        //             'changes' => $value,
        //         ];

        //     }
        //     // dd($changes);

        $string = array();
        $string = '';
        // $data = DB::table('proyek')
        //     ->leftJoin('mitra', 'proyek.id_mitra', '=', 'mitra.id_mitra')
        //     ->leftJoin('aspek_bisnis', 'proyek.id_proyek', '=', 'aspek_bisnis.id_proyek')
        //     ->leftJoin('pelanggan', 'proyek.id_pelanggan', '=', 'pelanggan.id_pelanggan')
        //     ->where('proyek.id_proyek',$id_proyek)
        //     ->first();
            
        // dd($proyek, $pelanggan, $aspek);
//         $json = file_get_contents('https://api.telegram.org/bot849520264:AAFgi8lzkNfynife9Efipw4j_8lGgAM1Iq8/getUpdates');
//         $obj = json_decode($json, true);
//         $array = array();

//         for ($i=0; $i<count($obj['result']); $i++)
//         {
//             print ($obj['result'][$i]['message']['chat']['id']);
//             print '<br>';
//             $chatid=Chatroom::where('chat_id','=', input::get('chat_id', $obj['result'][$i]['message']['chat']['id']))->first();
//             if($chatid === null){
//                 $chatroom = new Chatroom;
//                 $count = Chatroom::count();
//                 $chatroom->id = Chatroom::count()+1;
//                 $chatroom->chat_id = input::get('chat_id', $obj['result'][$i]['message']['chat']['id']);
//                 $chatroom->save();
//             }
//         }
        
// // foreach ($changes as $key => $value) {
// //     $string[$key] = $value;

        
// //         }
// //         $text = $string;

//     // foreach ($changes as $key => $value) {
//     //     $text = "Data yang berubah:".$value."";
//     //     }
// foreach ($changes as $change) {

//         $text = 
//         "ALERT!
// Ada perubahan data proyek yang telah disetujui '".$data->judul."'
// Dengan rincian sebagai berikut:
//     ".$change."

//         ";
// }
//         for ($i=1; $i<=Chatroom::count(); $i++)
//         {
//             $result = Chatroom::select('chat_id')->where('id', $i)->first();
//             $response = Telegram::sendMessage([
//                 'chat_id' => $result->chat_id, 
//                 'text' => $text,
//                 'parse_mode' => 'HTML'
//             ]);
//         }
//         $messageId = $response->getMessageId();
        // }


        $data = DB::table('proyek')
            ->leftJoin('mitra', 'proyek.id_mitra', '=', 'mitra.id_mitra')
            ->leftJoin('aspek_bisnis', 'proyek.id_proyek', '=', 'aspek_bisnis.id_proyek')
            ->leftJoin('pelanggan', 'proyek.id_pelanggan', '=', 'pelanggan.id_pelanggan')
            ->where('proyek.id_proyek',$id_proyek)
            ->first();
            
        // dd($proyek, $pelanggan, $aspek);
        $json = file_get_contents('https://api.telegram.org/bot849520264:AAFgi8lzkNfynife9Efipw4j_8lGgAM1Iq8/getUpdates');
        $obj = json_decode($json, true);
        $array = array();

        for ($i=0; $i<count($obj['result']); $i++)
        {
            print ($obj['result'][$i]['message']['chat']['id']);
            print '<br>';
            $chatid=Chatroom::where('chat_id','=', input::get('chat_id', $obj['result'][$i]['message']['chat']['id']))->first();
            if($chatid === null){
                $chatroom = new Chatroom;
                $count = Chatroom::count();
                $chatroom->id = Chatroom::count()+1;
                $chatroom->chat_id = input::get('chat_id', $obj['result'][$i]['message']['chat']['id']);
                $chatroom->save();
            }
        }

//         $text = 
//         "ALERT!
// Ada perubahan data proyek yang telah disetujui '".$data->judul."'
// Dengan rincian sebagai berikut:
//     - Account Manager : ".Auth::user()->name."
//     - Pelanggan : ".$data->nama_pelanggan."
//     - Ready for service : ".date('d F Y', strtotime($data->ready_for_service))."
//     - Nilai kontrak : ".number_format($data->nilai_kontrak)."

//         ";
$text = "ALERT!
Ada perubahan data proyek yang telah disetujui '".$data->judul."'
Dengan rincian sebagai berikut:
    ";
foreach ($changes as $key => $value) {
$text = $text.$key .":  ". $value ."\n    ";
}
        
// $text.$string[$key] .
        for ($i=1; $i<=Chatroom::count(); $i++)
        {
            $result = Chatroom::select('chat_id')->where('id', $i)->first();
            $response = Telegram::sendMessage([
                'chat_id' => $result->chat_id, 
                'text' => $text,
                'parse_mode' => 'HTML'
            ]);
        }
        $messageId = $response->getMessageId();
// 		

   //      if (!$aspek->wasRecentlyCreated) {
   // $changes = $aspek->getChanges();
   // dd($changes);
   
// } 


		return redirect()->route('index');

	}
}
<?php

namespace App\Http\Controllers\Telegram;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
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

class TelegramBotController extends Controller
{	
    public function getUpdates()
    {    
        $json = file_get_contents('https://api.telegram.org/bot849520264:AAEP75YqVbA4cREc9l6dBEY_gdqSJ_otylg/getUpdates');
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

        // ini saya pergunakan untuk menghapus kelebihan pesan spasi yang dikirim ke bot.
        $textur = preg_replace('/ss+/', ' ', $text);

        // memecah pesan dalam 2 blok array, kita ambil yang array pertama saja
        $command = explode(' ',$textur,2); //

        switch($command[0]){
            case '/time':
                $text = "Waktu lokal bot sekarang adalah :".date("d M Y")." daan Pukul ".date("H:i:s");
                return $text;
                break;
            default:
            $text = "Perintah tidak dikenali";
                return $text;
        }

 
        for ($i=1; $i<=Chatroom::count(); $i++)
        {
            $result = Chatroom::select('chat_id')->where('id', $i)->first();
            $response = Telegram::sendMessage([
                'chat_id' => $result->chat_id, 
                'text' => $text,
                'parse_mode' => 'HTML'
            ]);
            dd($response);
        }
        $messageId = $response->getMessageId();
    }
}



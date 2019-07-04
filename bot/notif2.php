<?php

/*
Pesan: baca dengan teliti, penjelasan ada di baris komentar yang disisipkan.
Bot tidak akan berjalan, jika tidak diamati coding ini sampai akhir.
*/

//db
$servername = "localhost";
$username = "root";
$password = "";
$db = "telkom";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

//isikan token dan nama botmu yang di dapat dari bapak bot :
$TOKEN = "849520264:AAFgi8lzkNfynife9Efipw4j_8lGgAM1Iq8";
$usernamebot= "@gestelkomvbot"; // sesuaikan besar kecilnya, bermanfaat nanti jika bot dimasukkan grup.

// aktifkan ini jika perlu debugging
$debug = false;

// fungsi untuk mengirim/meminta/memerintahkan sesuatu ke bot
function request_url($method)
{
    global $TOKEN;
    return "https://api.telegram.org/bot" . $TOKEN . "/". $method;
}

// fungsi untuk meminta pesan
// bagian ebook di sesi Meminta Pesan, polling: getUpdates
function get_updates($offset)
{
    $url = request_url("getUpdates")."?offset=".$offset;
    $resp = file_get_contents($url);
    $result = json_decode($resp, true);
    if ($result["ok"]==1)
        return $result["result"];
    return array();
}

// fungsi untuk mebalas pesan,
// bagian ebook Mengirim Pesan menggunakan Metode sendMessage
function send_reply($chatid, $msgid, $text)
{
    global $debug;
    $data = array(
        'chat_id' => $chatid,
        'text' => $text,
        'reply_to_message_id' => $msgid // <---- biar ada reply nya balasannya, opsional, bisa dihapus baris ini
    );
    // use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencodedrn",
            'method' => 'POST',
            'content' => http_build_query($data),
        ),
    );

    $context = stream_context_create($options);
    $result = file_get_contents(request_url('sendMessage'), false, $context);

    if ($debug)
        print_r($result);
}

// fungsi mengolahan pesan, menyiapkan pesan untuk dikirimkan

function create_response($text, $message)
{
    global $usernamebot;
    global $conn;
    // inisiasi variable hasil yang mana merupakan hasil olahan pesan
    $hasil = '';

    $fromid = $message["from"]["id"]; // variable penampung id user
    $chatid = $message["chat"]["id"]; // variable penampung id chat
    $pesanid= $message['message_id']; // variable penampung id message

    // variable penampung username nya user
    isset($message["from"]["username"])
    ? $chatuser = $message["from"]["username"]
    : $chatuser = '';

    // variable penampung nama user

    isset($message["from"]["last_name"])
    ? $namakedua = $message["from"]["last_name"]
    : $namakedua = '';
    $namauser = $message["from"]["first_name"]. ' ' .$namakedua;

    // ini saya pergunakan untuk menghapus kelebihan pesan spasi yang dikirim ke bot.
    $textur = preg_replace('/ss+/', ' ', $text);

    // memecah pesan dalam 2 blok array, kita ambil yang array pertama saja
    $command = explode(' ',$textur,2); //

    // identifikasi perintah (yakni kata pertama, atau array pertamanya)
    switch ($command[0]) {

    // jika ada pesan /id, bot akan membalas dengan menyebutkan idnya user
    case '/id':
    case '/id'.$usernamebot : //dipakai jika di grup yang haru ditambahkan @usernamebot
    $hasil = "$namauser, ID kamu adalah $fromid";
    break;

    // jika ada permintaan waktu
    case '/time':
    case '/time'.$usernamebot :
    $hasil = "$namauser, waktu lokal bot sekarang adalah :"
    . date("d M Y")." Pukul ".date("H:i:s");
    break;

    case '/help':
    case '/help'.$usernamebot :
    $hasil = "Berikut adalah daftar command yang dapat digunakan:
    /time - Untuk mengetahui waktu lokal
    /ongoing - Untuk melihat daftar proyek yang sedang berjalan
    /thisweek - Untuk melihat daftar proyek yang akan selesai dalam kurun waktu 1 minggu (ready for service)";
    break;

    case '/thisweek':
    case '/thisweek'.$usernamebot :

    $thisweek = "SELECT id_proyek, judul, ready_for_service, ready_for_service-CURDATE() as total
    			FROM proyek
    			WHERE ready_for_service-CURDATE()<=7 AND ready_for_service-CURDATE()>0;";
    $result = $conn->query($thisweek);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $hasil = 
            "ALERT!
    Proyek '". $row["judul"]. "'  akan selesai dalam ". $row["total"]. " hari
    Ready For Service: ".$row["ready_for_service"]." ";
        }
    } else {
        $hasil = "0 results";
    }
    break;

    case '/ongoing':
    case '/ongoing'.$usernamebot :

    $ongoing = "SELECT id_proyek, judul, ready_for_service, ready_for_service-CURDATE() as total
    			FROM proyek
    			WHERE status_pengajuan=0;";
    $result = $conn->query($ongoing);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $hasil = 
            "ALERT!
    Proyek '". $row["judul"]. "'  akan selesai dalam ". $row["total"]. " hari
    Ready For Service: ".$row["ready_for_service"]." ";
        }
    } else {
        $hasil = "0 results";
    }
    break;

    // balasan default jika pesan tidak di definisikan
    default:
    $hasil = 'Perintah tidak dikenali';
    break;	
    }

    return $hasil;
}

// jebakan token, klo ga diisi akan mati
// boleh dihapus jika sudah mengerti
if (strlen($TOKEN)<20)
die("Token mohon diisi dengan benar!n");

// fungsi pesan yang sekaligus mengupdate offset
// biar tidak berulang-ulang pesan yang di dapat
function process_message($message)
{
    $updateid = $message["update_id"];
    $message_data = $message["message"];
        if (isset($message_data["text"])) {
            $chatid = $message_data["chat"]["id"];
            $message_id = $message_data["message_id"];
            $text = $message_data["text"];
            $response = create_response($text, $message_data);

            if (!empty($response))
                send_reply($chatid, $message_id, $response);
        }
    return $updateid;
}

// hapus baris dibawah ini, jika tidak dihapus berarti kamu kurang teliti!

// hanya untuk metode poll
// fungsi untuk meminta pesan
// baca di ebooknya, yakni ada pada proses 1
function process_one()
{
    global $debug;
    $update_id = 0;
    echo "-";

    if (file_exists("last_update_id"))
        $update_id = (int)file_get_contents("last_update_id");

    $updates = get_updates($update_id);

    // jika debug=0 atau debug=false, pesan ini tidak akan dimunculkan
    if ((!empty($updates)) and ($debug) ) {
        echo "rn===== isi diterima rn";
        print_r($updates);
    }

    foreach ($updates as $message {
        echo '+';
        $update_id = process_message($message);
    }

    // update file id, biar pesan yang diterima tidak berulang
    file_put_contents("last_update_id", $update_id + 1);
}

// metode poll
// proses berulang-ulang
// sampai di break secara paksa
// tekan CTRL+C jika ingin berhenti
while (true) {
process_one();
sleep(1);
}

$conn->close();

// metode webhook
// secara normal, hanya bisa digunakan secara bergantian dengan polling
// aktifkan ini jika menggunakan metode webhook

// $entityBody = file_get_contents('php://input');
// $pesanditerima = json_decode($entityBody, true);
// process_message($pesanditerima);


/*
* -----------------------
* Grup @botphp
* Jika ada pertanyaan jangan via PM
* langsung ke grup saja.
* ----------------------

* Just ask, not asks for ask..

Sekian.

*/

?>
<?php
 
namespace App\Exports;
 
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
use Maatwebsite\Excel\Concerns\FromCollection;
 
class ProyekExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $proyek = DB::table('proyek') 
            ->leftjoin('users','users.id','=','proyek.id_users') 
            ->leftjoin('aspek_bisnis', 'aspek_bisnis.id_proyek', '=', 'proyek.id_proyek') 
            ->leftjoin('pelanggan', 'pelanggan.id_pelanggan', '=', 'proyek.id_pelanggan') 
            ->leftjoin('mitra','mitra.id_mitra','=','proyek.id_mitra') 
            ->leftjoin('unit_kerja','unit_kerja.id_unit_kerja','=','proyek.id_unit_kerja') 
            ->get()->toArray(); 
          // dd($proyek);
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    protected $table = 'proyek';
    protected $primaryKey = 'id_proyek';
    protected $fillable = ['id_mitra','id_users','id_pelanggan','id_unit_kerja','id_mitra_2','keterangan_mitra_1','keterangan_mitra_2','judul','masa_kontrak','alamat_delivery','mekanisme_pembayaran','rincian_pembayaran','skema_bisnis','ready_for_service','saat_penggunaan','pemasukan_dokumen','status_pengajuan','keterangan_proyek','file_p0','file_p1','bukti_scan_p0','bukti_scan_p1'];
    public $incrementing = true;
    public $timestamp = true;

    public function proyek()
    {
    	return $this->hasmany('App\Proyek', 'id_proyek', 'id_proyek');
    }

    public function mitra()
    {
    	return $this->belongsTo('App\Mitra', 'id_mitra', 'id_mitra');
    }

    public function user()
    {
    	return $this->belongsTo('App\User', 'id_users', 'id');
    }

    public function pelanggan()
    {
    	return $this->belongsTo('App\Pelanggan', 'id_pelanggan', 'id_pelanggan');
    }

    public function unit_kerja()
    {
        return $this->belongsTo('App\User', 'id_unit_kerja', 'id_unit_kerja');
    }

    public function delete()
    {
        $this->checks()->delete();
        $this->results()->delete();
        parent::delete();
    }
}

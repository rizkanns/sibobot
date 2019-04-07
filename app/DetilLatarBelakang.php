<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetilLatarBelakang extends Model
{
    protected $table = 'detil_latar_belakang';
    protected $primaryKey = 'id_detil_latar_belakang';
    protected $fillable = ['id_latar_belakang', 'id_proyek'];
    public $incrementing = true;
    public $timestamp = true;

    public function latar_belakang()
    {
    	return $this->belongsTo('App\LatarBelakang', 'id_latar_belakang', 'id_latar_belakang');
    }

    public function proyek()
    {
    	return $this->belongsTo('App\Proyek', 'id_proyek', 'id_id_proyek');
    }
}

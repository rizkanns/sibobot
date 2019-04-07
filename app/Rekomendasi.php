<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{
    protected $table = 'rekomendasi';
    protected $primaryKey = 'id_rekomendasi';
    protected $fillable = ['id_rumus', 'id_proyek'];
    public $incrementing = true;
    public $timestamp = true;

    public function rumus()
    {
    	return $this->belongsTo('App\Rumus', 'id_rumus', 'id_rumus');
    }

    public function proyek()
    {
    	return $this->belongsTo('App\Proyek', 'id_proyek', 'id_id_proyek');
    }
}

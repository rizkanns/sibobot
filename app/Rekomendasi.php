<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{
    protected $table = 'rekomendasi';
    protected $primaryKey = 'id_rekomendasi';
    protected $fillable = ['fk_id_rumus', 'fk_id_proyek'];
    public $incrementing = true;
    public $timestamp = true;

    public function rumus()
    {
    	return $this->belongsTo('App\Rumus', 'fk_id_rumus', 'id_rumus');
    }

    public function proyek()
    {
    	return $this->belongsTo('App\Proyek', 'fk_id_proyek', 'id_id_proyek');
    }
}

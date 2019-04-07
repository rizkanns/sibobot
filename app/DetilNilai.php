<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetilNilai extends Model
{
    protected $table = 'detil_nilai';
    protected $primaryKey = 'id_detil_nilai';
    protected $fillable = ['id_nilai', 'id_rumus'];
    public $incrementing = true;
    public $timestamp = true;

    public function nilai()
    {
    	return $this->belongsTo('App\Nilai', 'id_nilai', 'id_nilai');
    }
    
    public function rumus()
    {
    	return $this->belongsTo('App\Rumus', 'id_rumus', 'id_rumus');
    }

}

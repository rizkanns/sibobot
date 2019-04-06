<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetilNilai extends Model
{
    protected $table = 'detil_nilai';
    protected $primaryKey = 'id_detil_nilai';
    protected $fillable = ['fk_id_nilai', 'fk_id_rumus'];
    public $incrementing = true;
    public $timestamp = true;

    public function nilai()
    {
    	return $this->belongsTo('App\Nilai', 'fk_id_nilai', 'id_nilai');
    }
    
    public function rumus()
    {
    	return $this->belongsTo('App\Rumus', 'fk_id_rumus', 'id_rumus');
    }

}

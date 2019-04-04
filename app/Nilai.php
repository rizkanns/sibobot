<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';
    protected $fillable = ['nilai_pc'];
    public $incrementing = true;
    public $timestamp = true;

    public function nilai()
    {
    	return $this->hasmany('App\Nilai', 'id_nilai', 'id_nilai');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LatarBelakang extends Model
{
    protected $table = 'latar_belakang';
    protected $primaryKey = 'id_latar_belakang';
    protected $fillable = ['latar_belakang'];
    public $incrementing = true;
    public $timestamp = true;

    public function latar_belakang()
    {
    	return $this->hasmany('App\LatarBelakang', 'id_latar_belakang', 'id_latar_belakang');
    }

}

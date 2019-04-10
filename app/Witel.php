<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Witel extends Model
{
    protected $table = 'witel';
    protected $primaryKey = 'id_witel';
    protected $fillable = ['nama_witel'];
    public $incrementing = true;
    public $timestamp = true;

    public function witel()
    {
        return $this->hasMany('App\Witel', 'id_witel', 'id_witel');
    }

}
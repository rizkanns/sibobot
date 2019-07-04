<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $table = 'Wilayah';
    protected $primaryKey = 'id_wilayah';
    protected $fillable = ['nama_wilayah'];
    public $incrementing = true;
    public $timestamp = true;

    public function user()
    {
    	return $this->belongsTo('App\User', 'se', 'id');
    }


}

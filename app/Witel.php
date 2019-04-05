<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Witel extends Model
{
    protected $table = 'witel';
    protected $primaryKey = 'id_witel';
    protected $fillable = ['nama_witel','am','se','bidding','manager','deputy','gm'];
    public $incrementing = true;
    public $timestamp = true;

    public function user()
    {
    	return $this->belongsTo('App\User', 'am', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetilParameter extends Model
{
    protected $table = 'detil_parameter';
    protected $primaryKey = 'id_detil_parameter';
    protected $fillable = ['id_parameter', 'id_rumus'];
    public $incrementing = true;
    public $timestamp = true;

    public function rumus()
    {
    	return $this->belongsTo('App\Rumus', 'id_rumus', 'id_rumus');
    }

    public function parameter()
    {
    	return $this->belongsTo('App\Parameter', 'id_parameter', 'id_parameter');
    }

}

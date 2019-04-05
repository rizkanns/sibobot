<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetilParameter extends Model
{
    protected $table = 'detil_parameter';
    protected $primaryKey = 'id_detil_parameter';
    protected $fillable = ['fk_id_parameter', 'fk_id_rumus'];
    public $incrementing = true;
    public $timestamp = true;

    public function rumus()
    {
    	return $this->belongsTo('App\Rumus', 'fk_id_rumus', 'id_rumus');
    }

    public function parameter()
    {
    	return $this->belongsTo('App\Parameter', 'fk_id_parameter', 'id_parameter');
    }

}

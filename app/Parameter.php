<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    protected $table = 'parameter';
    protected $primaryKey = 'id_parameter';
    protected $fillable = ['nama_parameter','nilai_parameter'];
    public $incrementing = true;
    public $timestamp = true;

    public function parameter()
    {
    	return $this->hasmany('App\Parameter', 'id_parameter', 'id_parameter');
    }
}

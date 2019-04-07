<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rumus extends Model
{
    protected $table = 'rumus';
    protected $primaryKey = 'id_rumus';
    protected $fillable = ['nama_rumus'];
    public $incrementing = true;
    public $timestamp = true;

    public function rumus()
    {
    	return $this->hasmany('App\Rumus', 'id_rumus', 'id_rumus');
    }
}

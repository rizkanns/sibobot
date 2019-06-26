<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    protected $primaryKey = 'id_jabatan';
    protected $fillable = ['nama_jabatan'];
    public $incrementing = true;
    public $timestamp = true;

    public function jabatan()
    {
        return $this->hasMany('App\Jabatan', 'id_jabatan','id_jabatan');
    }
}

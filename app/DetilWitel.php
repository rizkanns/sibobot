<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetilWitel extends Model
{
    protected $table = 'detil_witel';
    protected $fillable = ['id_witel', 'id_jabatan','id_users'];
    public $incrementing = true;
    public $timestamp = true;

    public function witel()
    {
        return $this->belongsTo('App\Witel', 'id_witel', 'id_witel');
    }

    public function jabatan()
    {
        return $this->belongsTo('App\Jabatan', 'id_jabatan', 'id_jabatan');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_users', 'id');
    }

}

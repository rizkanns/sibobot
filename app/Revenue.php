<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    protected $table = 'revenue';
    protected $primaryKey = 'id_revenue';
    protected $fillable = ['nama_revenue'];
    public $incrementing = true;
    public $timestamp = true;

    public function revenue()
    {
        return $this->hasMany('App\Revenue', 'id_revenue', 'id_revenue');
    }

}
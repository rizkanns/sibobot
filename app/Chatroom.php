<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
    protected $table = 'chatroom';
    protected $primaryKey = 'id_chatroom';
    protected $fillable = ['fk_id_proyek','chat_id'];
    public $incrementing = true;
    public $timestamp = true;

    public function proyek()
    {
    	return $this->belongsTo('App\Proyek', 'fk_id_proyek', 'id_proyek');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    //
    public function kategori()
    {
    	return $this->belongsTo('App\m_kategori','kategori_id');
    }
}

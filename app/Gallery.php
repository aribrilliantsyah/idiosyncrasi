<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    public function kategori()
    {
    	return $this->belongsTo('App\KategoriGallery','kategori_id');
    }
}

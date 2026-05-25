<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table('koleksi')]
#[Fillable(['nama_koleksi', 'gambar', 'id_kategori', 'id_user'])]
class Koleksi extends Model
{
    //
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}

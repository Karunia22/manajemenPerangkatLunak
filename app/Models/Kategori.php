<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table('kategori')]
#[Fillable(['jenis_kategori'])]
class Kategori extends Model
{
    //
    public function kategoriToKoleksi()
    {
        return $this->hasMany(Koleksi::class);
    }
}

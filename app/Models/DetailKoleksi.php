<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table('detail_kategori')]
#[Fillable(['deskripsi', 'sejarah', 'asal_daerah', 'id_koleksi'])]
class DetailKoleksi extends Model
{
    //

}

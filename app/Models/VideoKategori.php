<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Table('video_categories')]
#[Fillable(['nama_kategori'])]
class VideoKategori extends Model
{
    //
    public function videos()
    {
        return $this->hasMany(Video::class, 'video_category_id');
    }
}

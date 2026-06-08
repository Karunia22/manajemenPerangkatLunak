<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table('videos')]
#[Fillable([
    'user_id',
    'video_category_id',
    'title',
    'description',
    'video_url',
    'provider',
])]
class Video extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        // Diubah dari VideoCategory menjadi VideoKategori
        return $this->belongsTo(VideoKategori::class, 'video_category_id');
    }
}

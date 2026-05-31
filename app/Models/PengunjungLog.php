<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table('pengunjung_logs')]
#[Fillable(['ip_address', 'tanggal'])]
class PengunjungLog extends Model
{
    //
}

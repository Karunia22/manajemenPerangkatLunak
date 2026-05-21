<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TampilanController extends Controller
{
    //
    public function koleksi(){
        return view('user.koleksi');
    }
    public function detailKoleksi(){
        return view('user.detailkoleksi');
    }
}

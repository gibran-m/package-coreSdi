<?php

namespace App\Http\Controllers\MasterData\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    public function index(){
        $title= "DigiForSDI | verifikasi";

        return view('hrdlive.master-data.pegawai.verifikasi.index', compact('title'));
    }
}

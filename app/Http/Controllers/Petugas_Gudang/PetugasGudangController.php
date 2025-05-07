<?php

namespace App\Http\Controllers\Petugas_Gudang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PetugasGudangController extends Controller
{
  public function petugasGudang()
  {
      return view('petugas_gudang.petugasGudang');
  }
}

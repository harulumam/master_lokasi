<?php

namespace App\Http\Controllers\History_Lokasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryLokasiController extends Controller
{
  public function historyLokasi()
  {
    return view('history_lokasi.historyLokasi');
  }
}

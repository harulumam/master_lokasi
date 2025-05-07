<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $search = $request->input('search');

        $lokasi = DB::table('t_master_lokasi')
            ->when($search, function ($query, $search) {
                return $query->where('master_lokasi_name', 'like', '%' . $search . '%');
            })
            ->select('master_lokasi_name', 'latitude', 'longitude')
            ->get();

        $totalOffices = DB::table('t_master_lokasi_detail as md')
            ->join('t_master_lokasi as m', 'md.master_lokasi_id', '=', 'm.master_lokasi_id')
            ->where('md.jenis_bangunan_id', 1) // Office (jenis_bangunan_id = 1)
            ->count();

        $totalFa = DB::table('t_master_lokasi_detail as md')
            ->join('t_master_lokasi as m', 'md.master_lokasi_id', '=', 'm.master_lokasi_id')
            ->where('md.jenis_bangunan_id', 2) // FA (jenis_bangunan_id = 2)
            ->count();

        $totalLuasFa = DB::table('t_master_lokasi_detail_fiberacademy')->sum('luasan');
        $totalLuasGudang = DB::table('t_master_lokasi_detail_gudang')->sum('luasan');

        $totalGudang = DB::table('t_master_lokasi_detail as md')
            ->join('t_master_lokasi as m', 'md.master_lokasi_id', '=', 'm.master_lokasi_id')
            ->where('md.jenis_bangunan_id', 3) // Gudang (jenis_bangunan_id = 3)
            ->count();

        return view('dashboard.index', compact('lokasi', 'totalOffices', 'totalFa', 'totalGudang', 'totalLuasFa', 'totalLuasGudang'));
    }

    public function showOffice()
    {
        return view('dashboard.office');
    }

    public function viewoffice($id)
    {
        $kode_office = $id;
        return view('dashboard.view.office.office', compact('kode_office'));
    }

    public function showDetailOffice($id)
    {
        $kode_office = $id;
        return view('dashboard.view.office.detailOffice', compact('kode_office'));
    }

    public function showRuanganOffice($id)
    {
        $kode_office = $id;
        return view('dashboard.view.office.ruanganOffice', compact('kode_office'));
    }

    public function showHistoryOffice($id)
    {
        $status = 'Approve';
        $status_modal = 'Submit';
        $kode_office = $id;
        return view('dashboard.view.office.historyOffice', compact('status', 'status_modal', 'kode_office'));
    }

    public function showFiberAcademy()
    {
        return view('dashboard.fiberacademy');
    }

    public function viewFa($id)
    {
        $kode_fa = $id;
        return view('dashboard.view.fa.fa', compact('kode_fa'));
    }

    public function showRuanganFa($id)
    {
        $kode_fa = $id;
        return view('dashboard.view.fa.ruanganFa', compact('kode_fa'));
    }

    public function showDetailFa($id)
    {
        $kode_fa = $id;
        return view('dashboard.view.fa.detailFa', compact('kode_fa'));
    }

    public function showHistoryFa($id)
    {
        $status = 'Approve';
        $status_modal = 'Submit';
        $kode_fa = $id;
        return view('dashboard.view.fa.historyFa', compact('status', 'status_modal', 'kode_fa'));
    }

    public function showGudang()
    {
        return view('dashboard.gudang');
    }

    public function viewGudang($id)
    {
        $kode_gudang = $id;
        return view('dashboard.view.gudang.gudang', compact('kode_gudang'));
    }

    public function showRuanganGudang($id)
    {
        $kode_gudang = $id;
        return view('dashboard.view.gudang.ruanganGudang', compact('kode_gudang'));
    }

    public function showDetailGudang($id)
    {
        $kode_gudang = $id;
        return view('dashboard.view.gudang.detailGudang', compact('kode_gudang'));
    }

    public function showGudangRMT($id)
    {
        $kode_gudang = $id;
        return view('dashboard.view.gudang.gudangRMT', compact('kode_gudang'));
    }

    public function showHistoryGudang($id)
    {
        $status = 'Approve';
        $status_modal = 'Submit';
        $kode_gudang = $id;
        return view('dashboard.view.gudang.historyGudang', compact('status', 'status_modal', 'kode_gudang'));
    }

    public function editoffice($id)
    {
        $kode_office = $id;
        return view('dashboard.edit.office.editOffice', compact('kode_office'));
    }

    public function editDetailOffice($id)
    {
        $kode_office = $id;
        return view('dashboard.edit.office.editDetailOffice', compact('kode_office'));
    }

    public function editRuanganOffice($id)
    {
        $kode_office = $id;
        return view('dashboard.edit.office.editRuanganOffice', compact('kode_office'));
    }

    public function editFa($id)
    {
        $kode_fa = $id;
        return view('dashboard.edit.fa.editFa', compact('kode_fa'));
    }

    public function editDetailFa($id)
    {
        $kode_fa = $id;
        return view('dashboard.edit.fa.editDetailFa', compact('kode_fa'));
    }

    public function editRuanganFa($id)
    {
        $kode_fa = $id;
        return view('dashboard.edit.fa.editRuanganFa', compact('kode_fa'));
    }

    public function editGudang($id)
    {
        $kode_gudang = $id;
        return view('dashboard.edit.gudang.editGudang', compact('kode_gudang'));
    }

    public function editDetailGudang($id)
    {
        $kode_gudang = $id;
        return view('dashboard.edit.gudang.editDetailGudang', compact('kode_gudang'));
    }

    public function editRuanganGudang($id)
    {
        $kode_gudang = $id;
        return view('dashboard.edit.gudang.editRuanganGudang', compact('kode_gudang'));
    }

    public function editGudangRMT($id)
    {
        $kode_gudang = $id;
        return view('dashboard.edit.gudang.editGudangRMT', compact('kode_gudang'));
    }
}

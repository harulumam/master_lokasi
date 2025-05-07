<?php

namespace App\Http\Controllers\List_Lokasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TipeJenisBangunan;
use App\Models\Peruntukan;
use App\Models\MasterWitel;
use App\Models\MasterRegional;
use App\Models\JenisBangunan;
use App\Models\TipeRuangan;
use App\Models\KategoriBarang;
use App\Models\JenisBarang;
use App\Models\MasterProduct;
use App\Models\KategoriGudang;
use App\Models\MasterLokasi;
use App\Models\MasterLokasiDetail;
use App\Models\MasterLokasiDetailOffice;
use App\Models\MasterLokasiDetailOfficeRuangan;
use App\Models\MasterLokasiDetailOfficeRuanganAlker;
use App\Models\MasterLokasiDetailFiberAcademy;
use App\Models\MasterLokasiDetailFiberAcademyRuangan;
use App\Models\MasterLokasiDetailFiberAcademyRuanganAlker;
use App\Models\MasterLokasiDetailGudang;
use App\Models\MasterLokasiDetailGudangRuangan;
use App\Models\MasterLokasiDetailGudangRuanganAlker;
use App\Models\MasterLokasiDetailGudangRmt;
use App\Models\MasterLokasiDetailGudangRmtPic;
use App\Models\MasterLokasiDetailGudangStaff;
use App\Models\MasterLokasiDetailGudangFotoGedung;
use App\Models\MasterLokasiDetailGudangFotoDenah;
use App\Models\MasterLokasiDetailGudangFotoAlker;
use App\Models\MasterLokasiDetailOfficeFotoGedung;
use App\Models\MasterLokasiDetailOfficeFotoDenah;
use App\Models\MasterLokasiDetailOfficeFotoAlker;
use App\Models\MasterLokasiDetailFiberAcademyFotoGedung;
use App\Models\MasterLokasiDetailFiberAcademyFotoDenah;
use App\Models\MasterLokasiDetailFiberAcademyFotoAlker;
use App\Models\Naker;
use App\Models\MappingRegional;


class ListLokasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listLokasi()
    {
        $lokasi = MasterLokasi::with([
            'regional:id_regional,nama_regional',
            'witel:id_witel,nama_witel',
            'lokasiDetails'
        ])
            ->orderByDesc('master_lokasi_id')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->master_lokasi_id,
                    'lokasi' => $item->master_lokasi_name,
                    'regional' => $item->regional->nama_regional ?? '-',
                    'witel' => $item->witel->nama_witel ?? '-',
                    'gudang' => $item->lokasiDetails->where('jenis_bangunan_id', 3)->count(),
                    'fiber_academy' => $item->lokasiDetails->where('jenis_bangunan_id', 2)->count(),
                    'office' => $item->lokasiDetails->where('jenis_bangunan_id', 1)->count(),
                    'status' => $item->is_active
                ];
            });

        return view('list_lokasi.index', compact('lokasi'));

    }

    public function createLokasi()
    {
        $jenisBangunan = JenisBangunan::all();
        return view('list_lokasi.create', compact('jenisBangunan'));
    }

    public function formLokasi(Request $request)
    {
        $regionalData = MasterRegional::where('is_active', 'Y')->get();
        $witelData = MasterWitel::all();
        return view('list_lokasi.formLokasi', compact('regionalData', 'witelData'));
    }

    public function formFa(Request $request)
    {
        $tipeJenisBangunan = TipeJenisBangunan::all();
        $peruntukan = Peruntukan::all();
        $jumlah_bangunan = $request->input('jumlah_bangunan_new');
        $id_row = $request->input('id_row');
        $id_reg = $request->input('load_regional');
        $regional = MasterRegional::find($id_reg);
        $namaRegional = $regional->nama_regional ?? 'Regional tidak ditemukan';
        $idRegional = $regional->id_regional ?? 'ID Regional tidak ditemukan';
        $namaWitel = $request->input('load_witel');
        $picByReg = Naker::getPICbyReg($namaRegional);
        return view('list_lokasi.formFa', compact('tipeJenisBangunan', 'peruntukan', 'jumlah_bangunan', 'id_row', 'namaRegional', 'namaWitel', 'idRegional', 'picByReg'));
    }

    public function formFaRuangan(Request $request)
    {
        $tipeRuangan = TipeRuangan::all();
        $kategoriBarang = KategoriBarang::all();
        $jenisBarang = JenisBarang::all();
        $tipeAlker = MasterProduct::all();
        $jumlah_bangunan = $request->input('jumlah_bangunan_new');
        $id_row = $request->input('id_row');
        return view('list_lokasi.formFaRuangan', compact('tipeRuangan', 'kategoriBarang', 'jenisBarang', 'tipeAlker', 'jumlah_bangunan', 'id_row'));
    }

    public function formOffice(Request $request)
    {
        $tipeJenisBangunan = TipeJenisBangunan::all();
        $peruntukan = Peruntukan::all();
        $jumlah_bangunan = $request->input('jumlah_bangunan_new');
        $id_row = $request->input('id_row');
        $id_reg = $request->input('load_regional');
        $regional = MasterRegional::find($id_reg);
        $namaRegional = $regional->nama_regional ?? 'Regional tidak ditemukan';
        $idRegional = $regional->id_regional ?? 'ID Regional tidak ditemukan';
        $namaWitel = $request->input('load_witel');
        $picByReg = Naker::getPICbyReg($namaRegional);
        return view('list_lokasi.formOffice', compact('tipeJenisBangunan', 'peruntukan', 'jumlah_bangunan', 'id_row', 'namaRegional', 'namaWitel', 'idRegional', 'picByReg'));
    }

    public function formOfficeRuangan(Request $request)
    {
        $tipeRuangan = TipeRuangan::all();
        $kategoriBarang = KategoriBarang::all();
        $jenisBarang = JenisBarang::all();
        $tipeAlker = MasterProduct::all();
        $jumlah_bangunan = $request->input('jumlah_bangunan_new');
        $id_row = $request->input('id_row');
        return view('list_lokasi.formOfficeRuangan', compact('tipeRuangan', 'kategoriBarang', 'jenisBarang', 'tipeAlker', 'jumlah_bangunan', 'id_row'));
    }

    public function formGudang(Request $request)
    {
        $tipeJenisBangunan = TipeJenisBangunan::all();
        $peruntukan = Peruntukan::all();
        $kategoriGudang = KategoriGudang::all();
        $jumlah_bangunan = $request->input('jumlah_bangunan_new');
        $id_row = $request->input('id_row');
        $id_reg = $request->input('load_regional');
        $regional = MasterRegional::find($id_reg);
        $namaRegional = $regional->nama_regional ?? 'Regional tidak ditemukan';
        $idRegional = $regional->id_regional ?? 'ID Regional tidak ditemukan';
        $namaWitel = $request->input('load_witel');
        $picByReg = Naker::getPICbyReg($namaRegional);
        return view('list_lokasi.formGudang', compact('tipeJenisBangunan', 'peruntukan', 'kategoriGudang', 'jumlah_bangunan', 'id_row', 'namaRegional', 'namaWitel', 'idRegional', 'picByReg'));
    }

    public function formGudangRuangan(Request $request)
    {
        $tipeRuangan = TipeRuangan::all();
        $kategoriBarang = KategoriBarang::all();
        $jenisBarang = JenisBarang::all();
        $tipeAlker = MasterProduct::all();
        $kategoriGudang = KategoriGudang::all();
        $jumlah_bangunan = $request->input('jumlah_bangunan_new');
        $id_row = $request->input('id_row');
        return view('list_lokasi.formGudangRuangan', compact('tipeRuangan', 'kategoriBarang', 'jenisBarang', 'tipeAlker', 'kategoriGudang', 'jumlah_bangunan', 'id_row'));
    }

    public function formGudangRMT(Request $request)
    {
        $jumlah_bangunan = $request->input('jumlah_bangunan_new');
        $id_row = $request->input('id_row');
        $id_reg = $request->input('load_regional');
        $regional = MasterRegional::find($id_reg);
        $namaRegional = $regional->nama_regional ?? 'Regional tidak ditemukan';
        $idRegional = $regional->id_regional ?? 'ID Regional tidak ditemukan';
        $picByReg = Naker::getPICbyReg($namaRegional);
        return view('list_lokasi.formGudangRMT', compact('jumlah_bangunan', 'id_row', 'namaRegional', 'idRegional', 'picByReg'));
    }

    public function getWitelByRegional($id_regional)
    {
        try {
            $witelData = MasterWitel::getWitelData($id_regional);
            return response()->json($witelData);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan', 'message' => $e->getMessage()], 500);
        }
    }

    public function getTipeAlker($jenisBarangId)
    {
        try {
            $tipeAlker = MasterProduct::where('jenis_barang_id', $jenisBarangId)->get();
            return response()->json($tipeAlker, 200, [], JSON_UNESCAPED_UNICODE);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan', 'message' => $e->getMessage()], 500);
        }
    }

    public function getJenisAlker($id)
    {
        try {
            $jenisBarang = JenisBarang::with('kategori')
                ->where('id_jenis_barang', $id)
                ->first();

            if (!$jenisBarang) {
                return response()->json(['message' => 'Data not found'], 404);
            }

            return response()->json([
                'nama_barang' => $jenisBarang->nama_barang,
                'kategori_barang' => $jenisBarang->kategori->kategori_barang,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getKodeGudang(Request $request)
    {
        try {
            $kategori = $request->input('kategori');
            $regionalIdBaru = $request->input('regionalId');
            $regionalName = $request->input('regionalName');
            if ($kategori == '1') {
                $regionalNameBaru = MappingRegional::where('regional_id_baru', '=', $regionalIdBaru)
                    ->pluck('regional_id_baru')
                    ->toArray();
                $data = DB::table('myta.t_lokasi as t')
                    ->join('myta.t_gudang as a', 't.gudang_id', '=', 'a.gudang_id')
                    ->where('t.tipe_lokasi_id', '4')
                    ->where('a.regional_id', $regionalNameBaru)
                    ->select('a.gudang_id as kode_gudang', 'a.gudang_name as nama_gudang')
                    ->get();
            } elseif ($kategori == '2') {
                $regionalName = MappingRegional::where('regional_baru', '=', $regionalName)
                    ->pluck('regional_lama')
                    ->toArray();
                $data = DB::table('aset_ta.warehouse as t')
                    ->join('aset_ta.location as a', 't.location_id', '=', 'a.location_id')
                    ->where('t.status', 'Y')
                    ->whereIn('a.regional', $regionalName)
                    ->select('t.warehouse_id as kode_gudang', 't.warehouse_name as nama_gudang')
                    ->get();
            } elseif ($kategori == '3') {
                $mapping = [
                    'REGIONAL I' => 1,
                    'REGIONAL II' => 2,
                    'REGIONAL III' => 3,
                    'REGIONAL IV' => 4,
                    'REGIONAL V' => 5,
                ];
                $regionalNameBaru = MappingRegional::where('regional_id_baru', '=', $regionalIdBaru)->first()->regional_baru;
                $regionalNameBaru = $mapping[$regionalNameBaru] ?? null;
                $data = DB::table('alista_v3.t_gudang as t')
                    ->where('t.isactive', 'Y')
                    ->where('t.regional', $regionalNameBaru)
                    ->select('t.kode_gudang', 't.nama_gudang')
                    ->get();
            } else {
                return response()->json(['error' => false, 'message' => 'Kategori tidak valid.']);
            }

            if ($data->isNotEmpty()) {
                return response()->json(['success' => true, 'data' => $data]);
            } else {
                return response()->json(['error' => false, 'message' => 'Data tidak ditemukan.']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function create(Request $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->all();
            // var_dump($data);
            // die;
            // return response()->json([
            //     'message' => $data,
            //     // 'redirect' => route('listLokasi')
            // ]);

            $koordinatArray = explode(',', $data['koordinat_lokasi'][0]);
            $lat = trim($koordinatArray[0] ?? '');
            $long = trim($koordinatArray[1] ?? '');
            if (empty($lat) || empty($long)) {
                throw new \Exception('Koordinat lokasi tidak valid');
            }

            $lokasi = MasterLokasi::create([
                'master_lokasi_name' => $data['nama_lokasi'][0],
                'regional_id' => $data['regional'][0],
                'witel_id' => $data['witel'][0],
                'alamat' => $data['alamat_lokasi'][0],
                'latitude' => $lat,
                'longitude' => $long,
                'current_step_id' => 1,
                'group_id' => 1,
                'action_id' => 1,
                'created_by' => (string) auth()->user()->nik ?? 'Guest',
                'is_active' => 'N'
            ]);

            if (!$lokasi || !$lokasi->master_lokasi_id) {
                throw new \Exception('Gagal menyimpan lokasi, ID tidak ditemukan.');
            }

            // $id_reg = MasterLokasi::with([
            //     'regional:id_regional,nama_regional,id_regional_sap'
            // ])->where('regional_id', $data['regional'][0])->get();

            $id_reg = $lokasi->regional->id_regional_sap;
            $idLokasi = $lokasi->master_lokasi_id;
            $idAutoInc = str_pad($idLokasi, 3, '0', STR_PAD_LEFT);
            $kodeOffice = "OF{$id_reg}{$idAutoInc}";
            $kodeFa = "FA{$id_reg}{$idAutoInc}";

            foreach ($data['id_bangunan'] as $key => $jenisBangunan) {
                $lokasiDetail = MasterLokasiDetail::create([
                    'master_lokasi_id' => $idLokasi,
                    'jenis_bangunan_id' => $jenisBangunan
                ]);

                $idLokasiDetail = $lokasiDetail->master_lokasi_detail_id;

                if ($jenisBangunan == 1) { // Office
                    $koordinatArray = explode(',', $data['koordinat_office'][$key]);
                    $lat = $koordinatArray[0] ?? null;
                    $long = $koordinatArray[1] ?? null;
                    if (empty($lat) || empty($long)) {
                        throw new \Exception('Koordinat office tidak valid');
                    }

                    $office = MasterLokasiDetailOffice::create([
                        'master_lokasi_detail_id' => $idLokasiDetail,
                        'latitude' => $lat,
                        'longitude' => $long,
                        'kode_office' => $kodeOffice,
                        'nama_office' => $data['nama_office'][$key],
                        'tipe_jenis_bangunan_id' => $data['tipe_office'][$key],
                        'peruntukan_id' => $data['peruntukan_office'][$key],
                        'luasan' => $data['luasan_office'][$key],
                        'nik_penanggung_jawab' => $data['penanggung_jawab_office'][$key]
                    ]);

                    $idOffice = $office->master_lokasi_detail_office_id;

                    foreach (['Gedung' => 'public/office/foto_gedung', 'Denah' => 'public/office/foto_denah'] as $kategori => $pathFolder) {
                        $fotoKategori = $request->file("foto.$kategori")[1] ?? [];

                        if (!empty($fotoKategori)) {

                            foreach ($fotoKategori as $fotoFile) {
                                if ($fotoFile->isValid()) {
                                    $fotoPath = $fotoFile->store($pathFolder);
                                    $fotoPath = str_replace('public/', 'storage/', $fotoPath);

                                    $model = ($kategori === 'Gedung') ? MasterLokasiDetailOfficeFotoGedung::class : MasterLokasiDetailOfficeFotoDenah::class;

                                    $model::create([
                                        'master_lokasi_detail_office_id' => $idOffice,
                                        'path' => $fotoPath
                                    ]);
                                }
                            }
                        }
                    }

                    if (isset($data['ruangan_office'][$key])) {
                        foreach ($data['ruangan_office'][$key] as $ruangKey => $tipeRuangan) {
                            $ruanganOffice = MasterLokasiDetailOfficeRuangan::create([
                                'master_lokasi_detail_id' => $idLokasiDetail,
                                'tipe_ruangan_id' => $tipeRuangan,
                                'luasan' => $data['luasan_ruangan_office'][$key][$ruangKey],
                                'tipe_berbayar' => $data['tipe_bayar_office'][$key][$ruangKey]
                            ]);

                            $idRuanganOffice = $ruanganOffice->master_lokasi_detail_office_ruangan_id;

                            if (isset($data['nama_alker_office'][$key][$ruangKey])) {
                                foreach ($data['nama_alker_office'][$key][$ruangKey] as $alkerKey => $masterProductId) {
                                    $alker = MasterLokasiDetailOfficeRuanganAlker::create([
                                        'master_lokasi_detail_office_ruangan_id' => $idRuanganOffice,
                                        'master_product_id' => $masterProductId,
                                        'qty' => $data['qty_office'][$key][$ruangKey][$alkerKey]
                                    ]);

                                    $idAlker = $alker->master_lokasi_detail_office_ruangan_alker_id;

                                    $fotoKategori = $request->file("foto.Alker.1");
                                    foreach ($fotoKategori as $idFotoAlker => $fotoArray) {
                                        if (!empty($fotoKategori)) {
                                            foreach ($fotoKategori as $fotoFile) {
                                                if ($fotoFile->isValid()) {
                                                    $fotoPath = $fotoFile->store("public/office/foto_alker");
                                                    $fotoPath = str_replace('public/', 'storage/', $fotoPath);

                                                    MasterLokasiDetailOfficeFotoAlker::create([
                                                        'master_lokasi_detail_office_ruangan_alker_id' => $idAlker,
                                                        'path' => $fotoPath
                                                    ]);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                if ($jenisBangunan == 2) { // Fiber Academy
                    $koordinatArray = explode(',', $data['koordinat_fa'][$key]);
                    $lat = $koordinatArray[0] ?? null;
                    $long = $koordinatArray[1] ?? null;
                    if (empty($lat) || empty($long)) {
                        throw new \Exception('Koordinat fiberacademy tidak valid');
                    }

                    $fa = MasterLokasiDetailFiberAcademy::create([
                        'master_lokasi_detail_id' => $idLokasiDetail,
                        'latitude' => $lat,
                        'longitude' => $long,
                        'kode_fa' => $kodeFa,
                        'nama_fa' => $data['nama_fa'][$key],
                        'tipe_jenis_bangunan_id' => $data['tipe_fa'][$key],
                        'peruntukan_id' => $data['peruntukan_fa'][$key],
                        'luasan' => $data['luasan_fa'][$key],
                        'nik_penanggung_jawab' => $data['penanggung_jawab_fa'][$key],
                    ]);

                    $idFa = $fa->master_lokasi_detail_fa_id;

                    foreach (['Gedung' => 'public/fa/foto_gedung', 'Denah' => 'public/fa/foto_denah'] as $kategori => $pathFolder) {
                        $fotoKategori = $request->file("foto.$kategori")[2] ?? [];

                        if (!empty($fotoKategori)) {

                            foreach ($fotoKategori as $fotoFile) {
                                if ($fotoFile->isValid()) {
                                    $fotoPath = $fotoFile->store($pathFolder);
                                    $fotoPath = str_replace('public/', 'storage/', $fotoPath);

                                    $model = ($kategori === 'Gedung') ? MasterLokasiDetailFiberAcademyFotoGedung::class : MasterLokasiDetailFiberAcademyFotoDenah::class;

                                    $model::create([
                                        'master_lokasi_detail_fa_id' => $idFa,
                                        'path' => $fotoPath
                                    ]);
                                }
                            }
                        }
                    }

                    if (isset($data['ruangan_fa'][$key])) {
                        foreach ($data['ruangan_fa'][$key] as $ruangKey => $tipeRuangan) {
                            $ruanganFa = MasterLokasiDetailFiberacademyRuangan::create([
                                'master_lokasi_detail_id' => $idLokasiDetail,
                                'tipe_ruangan_id' => $tipeRuangan,
                                'luasan' => $data['luasan_ruangan_fa'][$key][$ruangKey],
                                'tipe_berbayar' => $data['tipe_bayar_fa'][$key][$ruangKey]
                            ]);

                            $idRuanganFa = $ruanganFa->master_lokasi_detail_fa_ruangan_id;

                            if (isset($data['nama_alker_fa'][$key][$ruangKey])) {
                                foreach ($data['nama_alker_fa'][$key][$ruangKey] as $alkerKey => $masterProductId) {
                                    $alker = MasterLokasiDetailFiberacademyRuanganAlker::create([
                                        'master_lokasi_detail_fa_ruangan_id' => $idRuanganFa,
                                        'master_product_id' => $masterProductId,
                                        'qty' => $data['qty_fa'][$key][$ruangKey][$alkerKey]
                                    ]);

                                    $idAlker = $alker->master_lokasi_detail_fa_ruangan_alker_id;

                                    $fotoKategori = $request->file("foto.Alker.2");
                                    foreach ($fotoKategori as $idFotoAlker => $fotoArray) {
                                        if (!empty($fotoKategori)) {
                                            foreach ($fotoKategori as $fotoFile) {
                                                if ($fotoFile->isValid()) {
                                                    $fotoPath = $fotoFile->store("public/fa/foto_alker");
                                                    $fotoPath = str_replace('public/', 'storage/', $fotoPath);

                                                    MasterLokasiDetailFiberAcademyFotoAlker::create([
                                                        'master_lokasi_detail_fa_ruangan_alker_id' => $idAlker,
                                                        'path' => $fotoPath
                                                    ]);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                if ($jenisBangunan == 3) { // Gudang
                    $koordinatArray = explode(',', $data['koordinat_gudang'][$key]);
                    $lat = $koordinatArray[0] ?? null;
                    $long = $koordinatArray[1] ?? null;
                    if (empty($lat) || empty($long)) {
                        throw new \Exception('Koordinat gudang detail tidak valid');
                    }

                    $kode_gudang = $data['kode_gudang'][$key];
                    $gudang = MasterLokasiDetailGudang::create([
                        'master_lokasi_detail_id' => $idLokasiDetail,
                        'latitude' => $lat,
                        'longitude' => $long,
                        'kode_gudang' => $kode_gudang,
                        'nama_gudang' => $data['nama_gudang'][$key],
                        'kategori_gudang' => $data['kat_gudang'][$key],
                        'tipe_jenis_bangunan_id' => $data['tipe_gudang'][$key],
                        'peruntukan_id' => $data['peruntukan_gudang'][$key],
                        'luasan' => $data['luasan_gudang'][$key],
                        'nik_penanggung_jawab' => $data['penanggung_jawab_gudang'][$key],
                        'nik_pic_reg' => $data['pic_reg_gudang'][$key],
                        'nik_pic_ss' => $data['pic_ss_gudang'][$key],
                        'nik_teamleader' => $data['nik_tl_gudang'][$key],
                    ]);

                    $idGudang = $gudang->master_lokasi_detail_gudang_id;
                    foreach (['Gedung' => 'public/gudang/foto_gedung', 'Denah' => 'public/gudang/foto_denah'] as $kategori => $pathFolder) {
                        $fotoKategori = $request->file("foto.$kategori")[3] ?? [];

                        if (!empty($fotoKategori)) {

                            foreach ($fotoKategori as $fotoFile) {
                                if ($fotoFile->isValid()) {
                                    $fotoPath = $fotoFile->store($pathFolder);
                                    $fotoPath = str_replace('public/', 'storage/', $fotoPath);

                                    $model = ($kategori === 'Gedung') ? MasterLokasiDetailGudangFotoGedung::class : MasterLokasiDetailGudangFotoDenah::class;

                                    $model::create([
                                        'master_lokasi_detail_gudang_id' => $idGudang,
                                        'path' => $fotoPath
                                    ]);
                                }
                            }
                        }
                    }

                    foreach ($data['staff_gudang'][$key] as $staff) {
                        foreach ($staff as $nik_staff) {
                            MasterLokasiDetailGudangStaff::create([
                                'master_lokasi_detail_gudang_id' => $idGudang,
                                'nik' => $nik_staff,
                            ]);
                        }
                    }

                    if (isset($data['ruangan_gudang'][$key])) {
                        foreach ($data['ruangan_gudang'][$key] as $ruangKey => $tipeRuangan) {
                            $ruanganGudang = MasterLokasiDetailGudangRuangan::create([
                                'master_lokasi_detail_id' => $idLokasiDetail,
                                'tipe_ruangan_id' => $tipeRuangan,
                                'luasan' => $data['luasan_ruangan_gudang'][$key][$ruangKey],
                                'kategori_gudang' => $data['kategori_ruangan'][$key][$ruangKey],
                                'tipe_berbayar' => $data['tipe_bayar_ruangan'][$key][$ruangKey]
                            ]);

                            $idRuanganGudang = $ruanganGudang->master_lokasi_detail_gudang_ruangan_id;

                            if (isset($data['nama_alker_gudang'][$key][$ruangKey])) {
                                foreach ($data['nama_alker_gudang'][$key][$ruangKey] as $alkerKey => $masterProductId) {
                                    $alker = MasterLokasiDetailGudangRuanganAlker::create([
                                        'master_lokasi_detail_gudang_ruangan_id' => $idRuanganGudang,
                                        'master_product_id' => $masterProductId,
                                        'qty' => $data['qty_gudang'][$key][$ruangKey][$alkerKey],
                                        'serial_number' => $data['serial_number'][$key][$ruangKey][$alkerKey]
                                    ]);

                                    $idAlker = $alker->master_lokasi_detail_gudang_ruangan_alker_id;
                                    $fotoKategori = $request->file("foto.Alker.3");
                                    foreach ($fotoKategori as $idFotoAlker => $fotoArray) {
                                        if (!empty($fotoKategori)) {
                                            foreach ($fotoKategori as $fotoFile) {
                                                if ($fotoFile->isValid()) {
                                                    $fotoPath = $fotoFile->store("public/gudang/foto_alker");
                                                    $fotoPath = str_replace('public/', 'storage/', $fotoPath);

                                                    MasterLokasiDetailGudangFotoAlker::create([
                                                        'master_lokasi_detail_gudang_ruangan_alker_id' => $idAlker,
                                                        'path' => $fotoPath
                                                    ]);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }

                    if (isset($data['nama_rmt'][$key])) {
                        foreach ($data['nama_rmt'][$key] as $ruangKey => $namaGudang) {
                            $alamatRmt = $data['alamat_rmt'][$key][$ruangKey] ?? null;
                            $koordinatArray = explode(',', $data['koordinat_rmt'][$key][$ruangKey]);
                            $lat = trim($koordinatArray[0]) ?? null;
                            $long = trim($koordinatArray[1]) ?? null;
                            if (empty($lat) || empty($long)) {
                                throw new \Exception('Koordinat rmt tidak valid');
                            }

                            $rmtGudang = MasterLokasiDetailGudangRmt::create([
                                'master_lokasi_detail_id' => $idLokasiDetail,
                                'nama_gudang_rmt' => $namaGudang,
                                'alamat_gudang_rmt' => $alamatRmt,
                                'latitude' => $lat,
                                'longitude' => $long,
                            ]);

                            $idRmtGudang = $rmtGudang->master_lokasi_detail_gudang_rmt_id;

                            if (isset($data['nik_tl_rmt'][$key][$ruangKey]) && is_array($data['nik_tl_rmt'][$key][$ruangKey])) {
                                foreach ($data['nik_tl_rmt'][$key][$ruangKey] as $index => $picGudang) {
                                    MasterLokasiDetailGudangRmtPic::create([
                                        'master_lokasi_detail_gudang_rmt_id' => $idRmtGudang,
                                        'nik_pic_gudang' => $picGudang,
                                    ]);
                                }
                            }
                        }
                    }
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil disimpan',
                'redirect' => route('listLokasi')
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getPicReg(Request $request)
    {
        $regionalName = $request->input('regional_name');
        $penanggungJawab = Naker::getPICbyReg($regionalName);

        return response()->json($penanggungJawab);
    }
}

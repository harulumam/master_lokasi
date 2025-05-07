@extends('layouts.admin.master')

@section('title', 'Detail Gudang')

@push('css')
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/photoswipe.css') }}">
  <link rel="stylesheet" href="https://unpkg.com/leaflet.fullscreen@1.5.0/Control.FullScreen.css" />
@endpush
@section('content')
  @yield('breadcrumb-list')
  @component('components.breadcrumb')
    @slot('breadcrumb_title')
      <h3>Slipi</h3>
    @endslot
    @slot('breadcrumb_sub_title')
      <h5>Regional Jakarta | Witel Jakarta Barat</h5>
    @endslot
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Master lokasi</a></li>
    <li class="breadcrumb-item"><a href="{{ route('gudang') }}">Dashboard Gudang</a></li>
    <li class="breadcrumb-item active">Detail Gudang</li>
  @endcomponent

  <!-- Container-fluid starts -->
  <div class="container-fluid dashboard-default-sec">
    <div class="row">
      <div class="col-md-2">
        <div class="card p-3">
          <div class="sidebar">
            <div class="row mb-3 mt-3">
              <div class="col-12">
                <label class="form-label" for="">
                  <a href="{{ route('viewGudang', ['id' => $kode_gudang]) }}">Lokasi</a>
                </label>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
                <label class="form-label d-flex justify-content-between align-items-center collapsible-header"
                  for="" style="cursor: pointer; color: #E63946">
                  Gudang
                  <i class="fa fa-angle-right ps-2 toggle-icon"></i>
                </label>
              </div>
            </div>
            <div class="row mb-3 collapsible-content" style="display: none;">
              <div class="col-12">
                <label class="form-label" for=""><a href="{{ route('detailGudang', ['id' => $kode_gudang]) }}"
                    style="color: #E63946">Detail
                    Gudang</a></label>
                <label class="form-label" for=""><a
                    href="{{ route('ruanganGudang', ['id' => $kode_gudang]) }}">Detail Ruangan</a></label>
                <label class="form-label" for=""><a href="{{ route('gudangRMT', ['id' => $kode_gudang]) }}">Detail
                    Ruangan RMT</a></label>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
                <a href="{{ route('historyGudang', ['id' => $kode_gudang]) }}">
                  <label class="form-label pointer">History Update</label>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <a href="{{ route('editDetailGudang', ['id' => $kode_gudang]) }}" class="btn btn-danger text-white text-decoration-none">
            Update Data </a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card mb-2"> {{-- Detail Gudang --}}
          <div class="card-body pb-0">
            <span class="ms-0">
              <h5 class="mb-2 text-dark fw-bold">Detail Gudang</h5>
            </span>
            <div class="col-sm-12">
              <div class="card">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <th scope="row" style="width: 150px;">Kode Gudang</th>
                        <td style="width: 300px;"><?= $kode_gudang ?></td>
                      </tr>
                      <tr>
                        <th scope="row">Nama Gudang</th>
                        <td>Office IT</td>
                      </tr>
                      <tr>
                        <th scope="row">Kategori Gudang</th>
                        <td colspan="2">Regional</td>
                      </tr>
                      <tr>
                        <th scope="row">Tipe Gudang</th>
                        <td colspan="2">Regional</td>
                      </tr>
                      <tr>
                        <th scope="row">Regional</th>
                        <td colspan="2">Regional</td>
                      </tr>
                      <tr>
                        <th scope="row">Witel</th>
                        <td colspan="2">Regional</td>
                      </tr>
                      <tr>
                        <th scope="row">Alamat Gedung</th>
                        <td colspan="2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est dolore,
                          repudiandae recusandae quos voluptatibus dolores deleniti alias eius odio commodi vitae
                          voluptatum. Nostrum iure quis veniam deserunt, repudiandae facere deleniti.</td>
                      </tr>
                      <tr>
                        <th scope="row">Luasan</th>
                        <td colspan="2">2000m</td>
                      </tr>
                      <tr>
                        <th scope="row">Peruntukan</th>
                        <td colspan="2">NTE</td>
                      </tr>
                      <tr>
                        <th scope="row">Penanggung Jawab Gudang</th>
                        <td colspan="2">NTE</td>
                      </tr>
                      <tr>
                        <th scope="row">Posisi Penanggung Jawab Gudang</th>
                        <td colspan="2">NTE</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-2"> {{-- PIC REG --}}
          <div class="card-body pb-0">
            <label class="form-label d-flex align-items-center header-table" for="" style="cursor: pointer;">
              <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
              <span class="ms-2">
                <h5 class="mb-0 text-dark fw-bold">PIC Reg</h5>
              </span>
            </label>
            <div class="row mb-3 content-table ">
              <div class="col-sm-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <th scope="row" style="width: 150px;">Nik</th>
                          <td style="width: 300px;"> nik </td>
                        </tr>
                        <tr>
                          <th scope="row">Nama</th>
                          <td colspan="2">Nama</td>
                        </tr>
                        <tr>
                          <th scope="row">Posisi jabatan</th>
                          <td>Reg</td>
                        </tr>
                        <tr>
                          <th scope="row">No Telp</th>
                          <td colspan="2">081232345432</td>
                        </tr>
                        <tr>
                          <th scope="row">Email</th>
                          <td colspan="2">abc@telkomakses.co.id</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-2"> {{-- PIC SS --}}
          <div class="card-body pb-0">
            <label class="form-label d-flex align-items-center header-table" for="" style="cursor: pointer;">
              <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
              <span class="ms-2">
                <h5 class="mb-0 text-dark fw-bold">PIC SS</h5>
              </span>
            </label>
            <div class="row mb-3 content-table ">
              <div class="col-sm-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <th scope="row" style="width: 150px;">Nik</th>
                          <td style="width: 300px;"> nik </td>
                        </tr>
                        <tr>
                          <th scope="row">Nama</th>
                          <td colspan="2">Nama</td>
                        </tr>
                        <tr>
                          <th scope="row">Posisi jabatan</th>
                          <td>Reg</td>
                        </tr>
                        <tr>
                          <th scope="row">No Telp</th>
                          <td colspan="2">081232345432</td>
                        </tr>
                        <tr>
                          <th scope="row">Email</th>
                          <td colspan="2">abc@telkomakses.co.id</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-2"> {{-- Team Leader --}}
          <div class="card-body pb-0">
            <label class="form-label d-flex align-items-center header-table" for="" style="cursor: pointer;">
              <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
              <span class="ms-2">
                <h5 class="mb-0 text-dark fw-bold">Team Leader</h5>
              </span>
            </label>
            <div class="row mb-3 content-table ">
              <div class="col-sm-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <th scope="row" style="width: 150px;">Nik</th>
                          <td style="width: 300px;"> nik </td>
                        </tr>
                        <tr>
                          <th scope="row">Nama</th>
                          <td colspan="2">Nama</td>
                        </tr>
                        <tr>
                          <th scope="row">Posisi jabatan</th>
                          <td>Reg</td>
                        </tr>
                        <tr>
                          <th scope="row">No Telp</th>
                          <td colspan="2">081232345432</td>
                        </tr>
                        <tr>
                          <th scope="row">Email</th>
                          <td colspan="2">abc@telkomakses.co.id</td>
                        </tr>
                        <tr>
                          <th scope="row">Status</th>
                          <td colspan="2">Aktif</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-2"> {{-- Staff Gudang --}}
          <div class="card-body pb-0">
            <label class="form-label d-flex align-items-center div-header-table" for=""
              style="cursor: pointer;">
              <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
              <span class="ms-2">
                <h5 class="mb-0 text-dark fw-bold">Staff Gudang</h5>
              </span>
            </label>
          </div>
          <div class="card-body pb-0 pt-0 div-content-table"> {{-- Staff Gudang 1 --}}
            <span class="ms-2">
              <h5 class="mb-2 text-dark fw-bold">Staff Gudang 1</h5>
            </span>
            <div class="row mb-3">
              <div class="col-sm-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <th scope="row" style="width: 150px;">Nik</th>
                          <td style="width: 300px;"> nik </td>
                        </tr>
                        <tr>
                          <th scope="row">Nama</th>
                          <td colspan="2">Nama</td>
                        </tr>
                        <tr>
                          <th scope="row">Posisi jabatan</th>
                          <td>Reg</td>
                        </tr>
                        <tr>
                          <th scope="row">No Telp</th>
                          <td colspan="2">081232345432</td>
                        </tr>
                        <tr>
                          <th scope="row">Email</th>
                          <td colspan="2">abc@telkomakses.co.id</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body pb-0 pt-0 div-content-table"> {{-- Staff Gudang 2 --}}
            <span class="ms-2">
              <h5 class="mb-2 text-dark fw-bold">Staff Gudang 2</h5>
            </span>
            <div class="row mb-3">
              <div class="col-sm-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <th scope="row" style="width: 150px;">Nik</th>
                          <td style="width: 300px;"> nik </td>
                        </tr>
                        <tr>
                          <th scope="row">Nama</th>
                          <td colspan="2">Nama</td>
                        </tr>
                        <tr>
                          <th scope="row">Posisi jabatan</th>
                          <td>Reg</td>
                        </tr>
                        <tr>
                          <th scope="row">No Telp</th>
                          <td colspan="2">081232345432</td>
                        </tr>
                        <tr>
                          <th scope="row">Email</th>
                          <td colspan="2">abc@telkomakses.co.id</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body pb-0 pt-0 div-content-table"> {{-- Staff Gudang 3 --}}
            <span class="ms-2">
              <h5 class="mb-2 text-dark fw-bold">Staff Gudang 3</h5>
            </span>
            <div class="row mb-3">
              <div class="col-sm-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <th scope="row" style="width: 150px;">Nik</th>
                          <td style="width: 300px;"> nik </td>
                        </tr>
                        <tr>
                          <th scope="row">Nama</th>
                          <td colspan="2">Nama</td>
                        </tr>
                        <tr>
                          <th scope="row">Posisi jabatan</th>
                          <td>Reg</td>
                        </tr>
                        <tr>
                          <th scope="row">No Telp</th>
                          <td colspan="2">081232345432</td>
                        </tr>
                        <tr>
                          <th scope="row">Email</th>
                          <td colspan="2">abc@telkomakses.co.id</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header pb-0">
            <h5>Maps Lokasi</h5>
          </div>
          <div class="card-body mb-3">
            <div id="map" style="height: 200px; width: 100%;"></div>
          </div>
        </div>
        <div class="card">
          <div class="card-header pb-0">
            <h5>Foto Gudang</h5>
          </div>
          <div class="card-body mb-3">
            <div class="gallery my-gallery row justify-content-center" itemscope="">
              <figure class="col-12 mb-3" itemprop="associatedMedia" itemscope="">
                <a href="{{ asset('uploads/wolferine.jpg') }}" itemprop="contentUrl" data-size="1600x950">
                  <img class="img-fluid" src="{{ asset('uploads/wolferine.jpg') }}" itemprop="thumbnail"
                    alt="Wolferine" />
                </a>
                <p class="text-left mt-1 mb-3 font-xs">Wolferine</p>
                <figcaption itemprop="caption description">Wolferine</figcaption>
              </figure>

              <figure class="col-12 mb-3" itemprop="associatedMedia" itemscope="">
                <a href="{{ asset('uploads/image 17.png') }}" itemprop="contentUrl" data-size="1600x950">
                  <img class="img-fluid" src="{{ asset('uploads/image 17.png') }}" itemprop="thumbnail"
                    alt="Tampak Belakang" />
                </a>
                <p class="text-left mt-1 mb-3 font-xs">Tampak Belakang</p>
                <figcaption itemprop="caption description">Tampak Belakang</figcaption>
              </figure>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header pb-0">
            <h5>Foto Denah</h5>
          </div>
          <div class="card-body mb-3">
            <div class="gallery my-gallery row justify-content-center" itemscope="">
              <figure class="col-12 mb-3" itemprop="associatedMedia" itemscope="">
                <a href="{{ asset('uploads/image 1.png') }}" itemprop="contentUrl" data-size="1600x950">
                  <img class="img-fluid" src="{{ asset('uploads/image 1.png') }}" itemprop="thumbnail"
                    alt="Keterangan Gambar" />
                </a>
                <p class="text-left mt-1 mb-3 font-xs">Keterangan Gambar</p>
                <figcaption itemprop="caption description">Keterangan Gambar</figcaption>
              </figure>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Container-fluid Ends-->
  @includeIf('dashboard.view.partials.previewImg')
  @push('scripts')
    @includeIf('dashboard.view.partials.js')
    <script>
      var map = L.map('map', {
        fullscreenControl: true,
        fullscreenControlOptions: {
          position: 'topright'
        }
      }).setView([-2.5489, 118.0149], 5);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      var locations = [{
          name: "Witel Slipi",
          lat: -6.175213,
          lng: 106.793388
        },
        {
          name: "STO Cengkareng",
          lat: -6.149694,
          lng: 106.717733
        },
        {
          name: "STO Tegal Alur",
          lat: -6.124462,
          lng: 106.723639
        }
      ];

      var markers = [];

      locations.forEach(function(location) {
        var marker = L.marker([location.lat, location.lng]).addTo(map);
        marker.bindPopup(location.name);
        markers.push(marker.getLatLng());
      });

      if (markers.length > 0) {
        var bounds = L.latLngBounds(markers);
        map.fitBounds(bounds);
      }
    </script>
  @endpush
@endsection

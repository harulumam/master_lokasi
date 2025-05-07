@extends('layouts.admin.master')

@section('title', 'Detail Gudang RMT')

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
    <li class="breadcrumb-item active">Detail Gudang RMT</li>
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
                <label class="form-label" for=""><a
                    href="{{ route('detailGudang', ['id' => $kode_gudang]) }}">Detail Gudang</a></label>
                <label class="form-label" for=""><a
                    href="{{ route('ruanganGudang', ['id' => $kode_gudang]) }}">Detail Ruangan</a></label>
                <label class="form-label" for=""><a href="{{ route('gudangRMT', ['id' => $kode_gudang]) }}"
                    style="color: #E63946">Detail
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
          <a href="{{ route('editGudangRMT', ['id' => $kode_gudang]) }}" class="btn btn-danger text-white text-decoration-none">
            Update Data </a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card"> {{-- Detail Gudang RMT --}}
          <div class="card-body pb-0">
            <label class="form-label d-flex align-items-center" for="">
              <span>
                <h5 class="mb-2 text-dark fw-bold small">Detail Gudang RMT</h5>
              </span>
            </label>
            <div class="row mb-3">
              <div class="col-sm-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                      <tbody>
                        <tr>
                          <th scope="row" style="width: 150px;">Kode Ruangan</th>
                          <td style="width: 300px;"><?= $kode_gudang ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Nama Gudang</th>
                          <td colspan="2">Gudang MRT Slipi</td>
                        </tr>
                        <tr>
                          <th scope="row">Alamat Gudang</th>
                          <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad iste nam sit. Similique possimus
                            optio facere error excepturi sunt nam esse placeat. Dolor perferendis necessitatibus
                            voluptate, inventore ad fuga a?</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <label class="form-label d-flex align-items-center" for="">
              <span>
                <h5 class="mb-2 text-dark fw-bold small">PIC Gudang 1</h5>
              </span>
            </label>
            <div class="row mb-3">
              <div class="col-sm-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                      <tbody>
                        <tr>
                          <th scope="row" style="width: 150px;">NIK</th>
                          <td style="width: 300px;"><?= $kode_gudang ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Nama Gudang</th>
                          <td colspan="2">Gudang RMT Slipi</td>
                        </tr>
                        <tr>
                          <th scope="row">Posisi Jabatan</th>
                          <td>Petugas Gudang</td>
                        </tr>
                        <tr>
                          <th scope="row">No Telp</th>
                          <td>081231234321</td>
                        </tr>
                        <tr>
                          <th scope="row">Email</th>
                          <td>abc@telkomakses.co.id</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card"> {{-- Maps Lokasi Gudang RMT --}}
          <div class="card-body pb-0">
            <label class="form-label d-flex align-items-center" for="">
              <span>
                <h5 class="mb-2 text-dark fw-bold small">Maps Lokasi Gudang RMT</h5>
              </span>
            </label>
            <div class="row mb-3 content-table">
              <div class="col-sm-12">
                <div id="map" style="height: 500px; width: 100%;"></div>
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
            <div id="mapLokasi" style="height: 200px; width: 100%;"></div>
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
      </div>
    </div>
  </div>

  <!-- Container-fluid Ends-->
  @include('dashboard.view.partials.previewImg')
  @push('scripts')
    @include('dashboard.view.partials.js')
    <script>
      var mapLokasi = L.map('mapLokasi', {
        fullscreenControl: true,
        fullscreenControlOptions: {
          position: 'topright'
        }
      }).setView([-2.5489, 118.0149], 5);

      var map = L.map('map', {
        fullscreenControl: true,
        fullscreenControlOptions: {
          position: 'topright'
        }
      }).setView([-2.5489, 118.0149], 5);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(mapLokasi);

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

      var markersLokasi = [];
      locations.forEach(function(location) {
        var marker = L.marker([location.lat, location.lng]).addTo(mapLokasi);
        marker.bindPopup(location.name);
        markersLokasi.push(marker.getLatLng());
      });

      if (markersLokasi.length > 0) {
        var boundsLokasi = L.latLngBounds(markersLokasi);
        mapLokasi.fitBounds(boundsLokasi);
      }

      var markersGudangRMT = [];
      locations.forEach(function(location) {
        var marker = L.marker([location.lat, location.lng]).addTo(map);
        marker.bindPopup(location.name);
        markersGudangRMT.push(marker.getLatLng());
      });

      if (markersGudangRMT.length > 0) {
        var boundsGudangRMT = L.latLngBounds(markersGudangRMT);
        map.fitBounds(boundsGudangRMT);
      }
    </script>
  @endpush
@endsection

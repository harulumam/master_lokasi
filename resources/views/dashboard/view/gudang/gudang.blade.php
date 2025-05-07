@extends('layouts.admin.master')

@section('title', 'View Gudang')

@push('css')
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
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
    <li class="breadcrumb-item active">View Gudang</li>
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
                  <a href="{{ route('viewGudang', ['id' => $kode_gudang]) }}" style="color: #E63946">Lokasi</a>
                </label>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
                <label class="form-label d-flex justify-content-between align-items-center collapsible-header"
                  for="" style="cursor: pointer;">
                  Gudang NTE
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
          <a href="{{ route('editGudang', ['id' => $kode_gudang]) }}" class="btn btn-danger text-white text-decoration-none">
            Update Data </a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header pb-0">
            <h5>Detail Lokasi</h5>
          </div>
          <div class="card-body">
            <div class="col-sm-12">
              <div class="card">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <th scope="row" style="width: 150px;">Nama Lokasi</th>
                        <td style="width: 300px;">Slipi</td>
                      </tr>
                      <tr>
                        <th scope="row">Regional</th>
                        <td>Jakarta</td>
                      </tr>
                      <tr>
                        <th scope="row">Witel</th>
                        <td colspan="2">Jakarta Barat</td>
                      </tr>
                      <tr>
                        <th scope="row">Alamat</th>
                        <td colspan="2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est dolore,
                          repudiandae recusandae quos voluptatibus dolores deleniti alias eius odio commodi vitae
                          voluptatum. Nostrum iure quis veniam deserunt, repudiandae facere deleniti.</td>
                      </tr>
                    </tbody>
                  </table>
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
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->
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

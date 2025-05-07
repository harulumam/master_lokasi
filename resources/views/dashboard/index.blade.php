@extends('layouts.admin.master')

@section('title', 'Dashboard')

@push('css')
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet.fullscreen@1.5.0/Control.FullScreen.css" />
@endpush
@section('content')
  @yield('breadcrumb-list')
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-6">
          <b>
            <h1>Master Lokasi</h1>
          </b>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid dashboard-default-sec">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-center mb-3">
              <form method="GET" action="{{ route('dashboard') }}" class="w-100">
                <div class="d-flex w-100">
                  <input type="text" name="search" class="form-control flex-grow-1" placeholder="Cari Nama Lokasi"
                    value="{{ request('search') }}">
                  <button class="btn btn-danger ms-2" type="submit">Search</button>
                </div>
              </form>
            </div>

            <!-- Menampilkan peta -->
            <div id="map" style="height: 400px; width: 100%;"></div>

            <div class="row mt-3">
              <div class="col-xl-4">
                <a href="{{ route('office') }}" id="officeCard" class="text-decoration-none">
                  <div class="card custom-card bg-danger text-white">
                    <div class="custom-card-body">
                      <strong>Office:</strong> <br>
                      <h3>{{ $totalOffices }}</h3> Lokasi kantor utama
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-xl-4">
                <a href="{{ route('fa') }}" id="faCard" class="text-decoration-none">
                  <div class="card custom-card bg-warning text-white">
                    <div class="custom-card-body">
                      <strong>Fiber Academy:</strong> <br>
                      <h3>{{ $totalFa }}</h3>
                      <div class="info-wrapper">
                        <p>Luas Gedung: {{ $totalLuasFa }} m²</p>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-xl-4">
                <a href="{{ route('gudang') }}" id="gudangCard" class="text-decoration-none">
                  <div class="card custom-card bg-success text-white">
                    <div class="custom-card-body">
                      <strong>Gudang:</strong> <br>
                      <h3>{{ $totalGudang }}</h3>
                      <div class="info-wrapper">
                        <p>Luas Gedung: {{ $totalLuasGudang }} m²</p>
                        <p>Jumlah PIC: 1000</p>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
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

      var lokasi = @json($lokasi);

      lokasi.forEach(function(item) {
        L.marker([parseFloat(item.latitude), parseFloat(item.longitude)]).addTo(map)
          .bindPopup(item.master_lokasi_name);
      });
    </script>
  @endpush
@endsection

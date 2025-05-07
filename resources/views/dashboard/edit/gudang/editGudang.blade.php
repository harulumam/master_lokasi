@extends('layouts.admin.master')

@section('title', 'Edit Gudang')

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
    <li class="breadcrumb-item"><a href="{{ route('viewGudang', ['id' => $kode_gudang]) }}">View Gudang</a></li>
    <li class="breadcrumb-item active">Edit Gudang</li>
  @endcomponent

  <div class="container-fluid dashboard-default-sec">
    <div class="row">
      <div class="col-md-2">
        <div class="card p-3">
          <div class="sidebar">
            <div class="row mb-3 mt-3">
              <div class="col-12 d-flex align-items-center">
                <label class="form-label me-2" for="">
                  <a href="{{ route('editGudang', ['id' => $kode_gudang]) }}" style="color: #E63946">Lokasi</a>
                </label>
                <div class="form-check form-switch ms-auto">
                  <input class="form-check-input" type="checkbox" id="toggle"
                    style="background-color: #E63946; border-color: #FFFFFF; cursor: pointer;">
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-12">
                <label class="form-label d-flex justify-content-between align-items-center collapsible-header"
                  for="" style="cursor: pointer;">
                  <span>Gudang</span>
                  <div class="form-check form-switch ms-auto">
                    <input class="form-check-input" type="checkbox" id="toggle"
                      style="background-color: #E63946; border-color: #FFFFFF; cursor: pointer;">
                  </div>
                  <i class="fa fa-angle-right ps-2 toggle-icon"></i>
                </label>
              </div>
            </div>
            <div class="row mb-3 collapsible-content" style="display: none;">
              <div class="col-12">
                <label class="form-label" for=""><a
                    href="{{ route('editDetailGudang', ['id' => $kode_gudang]) }}">Detail Gudang</a></label>
                <label class="form-label" for=""><a
                    href="{{ route('editRuanganGudang', ['id' => $kode_gudang]) }}">Detail Ruangan</a></label>
                <label class="form-label" for=""><a
                    href="{{ route('editGudangRMT', ['id' => $kode_gudang]) }}">Detail Ruangan RMT</a></label>
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
          <button class="btn btn-danger" type="button" id="tambah_gedung">Tambah Gedung</button>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header pb-0">
            <h5>Detail Lokasi</h5>
          </div>
          <div class="card-body">
            <form id="formCreateLokasi" method="POST" class="needs-validation" novalidate>
              <div class="mb-3">
                <div class="col-md-12">
                  <label class="form-label" for="nama_lokasi">Nama Lokasi</label>
                  <input class="form-control" id="nama_lokasi" name="nama_lokasi" type="text"
                    placeholder="Masukan nama lokasi" required="" />
                  <div class="invalid-feedback">Nama lokasi wajib diisi.</div>
                </div>
              </div>
              <div class="row g-2 mb-3">
                <div class="col-md-6">
                  <label class="form-label" for="regional">Regional</label>
                  <select class="form-select" id="regional" name="regional" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option value="reg1">Regional 1</option>
                    <option value="reg2">Regional 2</option>
                    <option value="reg3">Regional 3</option>
                    <option value="reg4">Regional 4</option>
                    <option value="reg5">Regional 5</option>
                    <option value="reg6">Regional 6</option>
                    <option value="reg7">Regional 7</option>
                  </select>
                  <div class="invalid-feedback">Silakan pilih regional.</div>
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="witel">Witel</label>
                  <select class="form-select" id="witel" name="witel" required="">
                    <option selected="" disabled="" value="">Choose...</option>
                    <option value="jakbar">Jakarta Barat</option>
                    <option value="jakut">Jakarta Utara</option>
                    <option value="jakpus">Jakarta Pusat</option>
                    <option value="jaksel">Jakarta Selatan</option>
                    <option value="jaktim">Jakarta Timur</option>
                  </select>
                  <div class="invalid-feedback">Silakan pilih witel.</div>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="alamat_lokasi">Alamat</label>
                <textarea class="form-control" id="alamat_lokasi" name="alamat_lokasi" placeholder="Masukan alamat" required=""></textarea>
                <div class="invalid-feedback">Alamat wajib diisi.</div>
              </div>
              <div class="mb-5">
                <label class="form-label" for="koordinat_lokasi">Koordinat Lokasi</label>
                <div class="d-flex">
                  <input class="form-control me-2" id="koordinat_lokasi" name="koordinat_lokasi" type="text"
                    placeholder="Masukan koordinat lokasi" required="" />
                  <button type="button" class="btn btn-sm btn-danger" id="search_lokasi">Search</button>
                </div>
                <div class="invalid-feedback" id="koordinat_invalid_feedback">Koordinat lokasi wajib diisi.
                </div>
              </div>
              <div class="mb-3">
                <div id="map" style="height: 400px; width: 100%;"></div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header pb-0">
            <h5>Komentar</h5>
          </div>
          <div class="card-body">
            <textarea id="comment" class="form-control" rows="4" placeholder="Masukan komentar"></textarea>
            <div class="d-flex justify-content-end mt-3">
              <button class="btn btn-outline-secondary me-2" id="cancelButton"
                onclick="goBack('{{ $kode_gudang }}')">Cancel</button>
              <button class="btn btn-danger" id="submitButton">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
    @includeIf('dashboard.edit.partials.js')
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

      function goBack(kode_gudang) {
        window.location.href = `/gudang/${kode_gudang}`;
      }
    </script>
  @endpush
@endsection

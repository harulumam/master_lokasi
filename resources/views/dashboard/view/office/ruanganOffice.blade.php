@extends('layouts.admin.master')

@section('title', 'Detail Ruangan Office')

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
    <li class="breadcrumb-item"><a href="{{ route('office') }}">Dashboard Office</a></li>
    <li class="breadcrumb-item active">Detail Ruangan Office</li>
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
                  <a href="{{ route('viewOffice', ['id' => $kode_office]) }}">Lokasi</a>
                </label>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
                <label class="form-label d-flex justify-content-between align-items-center collapsible-header"
                  for="" style="cursor: pointer; color: #E63946">
                  Office
                  <i class="fa fa-angle-right ps-2 toggle-icon"></i>
                </label>
              </div>
            </div>
            <div class="row mb-3 collapsible-content" style="display: none;">
              <div class="col-12">
                <label class="form-label" for=""><a
                    href="{{ route('detailOffice', ['id' => $kode_office]) }}">Detail Office</a></label>
                <label class="form-label" for=""><a
                    href="{{ route('ruanganOffice', ['id' => $kode_office]) }}"
                    style="color: #E63946">Detail Ruangan</a></label>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
                <a href="{{ route('historyOffice', ['id' => $kode_office]) }}">
                  <label class="form-label pointer">History Update</label>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <a href="{{ route('editRuanganOffice', ['id' => $kode_office]) }}"
            class="btn btn-danger text-white text-decoration-none">
            Update Data
          </a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body pb-0"> {{-- Ruang Indoor --}}
            <label class="form-label d-flex align-items-center header-table" for="" style="cursor: pointer;">
              <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
              <span class="ms-2">
                <h5 class="mb-0 text-dark fw-bold small">Ruang Indoor</h5>
              </span>
            </label>
            <div class="row mb-3 content-table">
              <div class="col-sm-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-bordered table-xs">
                      <tbody>
                        <tr>
                          <th scope="row" style="width: 150px;">ID Ruangan</th>
                          <td style="width: 300px;"><?= $kode_office ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Luasan</th>
                          <td colspan="2">2000m</td>
                        </tr>
                        <tr>
                          <th scope="row">Kategori Ruangan</th>
                          <td>Indoor</td>
                        </tr>
                        <tr>
                          <th scope="row">Tipe Berbayar</th>
                          <td colspan="2">Ya</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body pb-0 pt-0"> {{-- Detail Alker --}}
            <label class="form-label d-flex align-items-center header-table" for="">
              <span class="ms-0">
                <h5 class="mb-0 text-dark fw-bold small">Detail Alker</h5>
              </span>
              <span class="qty small">Qty: 2</span>
            </label>
            <label class="form-label d-flex align-items-center header-table div-content-table" for=""
              style="cursor: pointer;">
              <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
              <span class="ms-2">
                <h5 class="mb-0 text-dark fw-bold small">Timbangan</h5>
              </span>
              <span class="qty small">Qty: 2</span>
            </label>
            <div class="row content-table div-content-table">
              <div class="col-sm-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-bordered table-xs">
                      <tbody>
                        <tr>
                          <th scope="row" style="width: 150px;">Tipe</th>
                          <td style="width: 300px;">-</td>
                        </tr>
                        <tr>
                          <th scope="row">Quantity</th>
                          <td colspan="2">2</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="card-header pb-0">
                    <h5>Foto Alker</h5>
                  </div>
                  <div class="gallery my-gallery card-body row justify-content-center" itemscope="">
                    <figure class="col-xl-6 col-md-6 col-sm-12 mb-3" itemprop="associatedMedia" itemscope="">
                      <a href="{{ asset('uploads/image 1.png') }}" itemprop="contentUrl" data-size="1600x950">
                        <img class="img-thumbnail" src="{{ asset('uploads/image 1.png') }}" itemprop="thumbnail"
                          alt="Wolferine" />
                      </a>
                      <p class="text-left mt-1 mb-3 font-xs font-xs">Wolferine</p>
                      <figcaption itemprop="caption description">Wolferine</figcaption>
                    </figure>

                    <figure class="col-xl-6 col-md-6 col-sm-12 mb-3" itemprop="associatedMedia" itemscope="">
                      <a href="{{ asset('uploads/image 17.png') }}" itemprop="contentUrl" data-size="1600x950">
                        <img class="img-thumbnail" src="{{ asset('uploads/image 17.png') }}" itemprop="thumbnail"
                          alt="Tampak Belakang" />
                      </a>
                      <p class="text-left mt-1 mb-3 font-xs font-xs">Tampak Belakang</p>
                      <figcaption itemprop="caption description">Tampak Belakang</figcaption>
                    </figure>

                    <figure class="col-xl-6 col-md-6 col-sm-12 mb-3" itemprop="associatedMedia" itemscope="">
                      <a href="{{ asset('uploads/image 1.png') }}" itemprop="contentUrl" data-size="1600x950">
                        <img class="img-thumbnail" src="{{ asset('uploads/image 1.png') }}" itemprop="thumbnail"
                          alt="Tampak Denah" />
                      </a>
                      <p class="text-left mt-1 mb-3 font-xs">Tampak Denah</p>
                      <figcaption itemprop="caption description">Tampak Denah</figcaption>
                    </figure>

                    <figure class="col-xl-6 col-md-6 col-sm-12 mb-3" itemprop="associatedMedia" itemscope="">
                      <a href="{{ asset('uploads/image 17.png') }}" itemprop="contentUrl" data-size="1600x950">
                        <img class="img-thumbnail" src="{{ asset('uploads/image 17.png') }}" itemprop="thumbnail"
                          alt="Tampak Depan" />
                      </a>
                      <p class="text-left mt-1 mb-3 font-xs">Tampak Depan</p>
                      <figcaption itemprop="caption description">Tampak Depan</figcaption>
                    </figure>

                    <figure class="col-xl-6 col-md-6 col-sm-12 mb-3" itemprop="associatedMedia" itemscope="">
                      <a href="{{ asset('uploads/image 1.png') }}" itemprop="contentUrl" data-size="1600x950">
                        <img class="img-thumbnail" src="{{ asset('uploads/image 1.png') }}" itemprop="thumbnail"
                          alt="Tampak Samping" />
                      </a>
                      <p class="text-left mt-1 mb-3 font-xs">Tampak Samping</p>
                      <figcaption itemprop="caption description">Tampak Samping</figcaption>
                    </figure>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body pb-0"> {{-- Ruang Outdoor --}}
            <label class="form-label d-flex align-items-center header-table" for="" style="cursor: pointer;">
              <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
              <span class="ms-2">
                <h5 class="mb-0 text-dark fw-bold small">Ruang Outdoor</h5>
              </span>
            </label>
            <div class="row mb-3 content-table">
              <div class="col-sm-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-bordered table-xs">
                      <tbody>
                        <tr>
                          <th scope="row" style="width: 150px;">ID Ruangan</th>
                          <td style="width: 300px;"><?= $kode_office ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Luasan</th>
                          <td colspan="2">2000m</td>
                        </tr>
                        <tr>
                          <th scope="row">Kategori Ruangan</th>
                          <td>Indoor</td>
                        </tr>
                        <tr>
                          <th scope="row">Tipe Berbayar</th>
                          <td colspan="2">Ya</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body pb-0 pt-0"> {{-- Detail Alker --}}
            <label class="form-label d-flex align-items-center header-table" for="">
              <span>
                <h5 class="mb-0 text-dark fw-bold small">Detail Alker</h5>
              </span>
              <span class="qty small">Qty: 2</span>
            </label>
            <label class="form-label d-flex align-items-center header-table" for="" style="cursor: pointer;">
              <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
              <span class="ms-2">
                <h5 class="mb-0 text-dark fw-bold small">Timbangan</h5>
              </span>
              <span class="qty small">Qty: 2</span>
            </label>
            <div class="row content-table">
              <div class="col-sm-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-bordered table-xs">
                      <tbody>
                        <tr>
                          <th scope="row" style="width: 150px;">Tipe</th>
                          <td style="width: 300px;">-</td>
                        </tr>
                        <tr>
                          <th scope="row">Quantity</th>
                          <td colspan="2">2</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="card-header pb-0">
                    <h5>Foto Alker</h5>
                  </div>
                  <div class="gallery my-gallery card-body row justify-content-center" itemscope="">
                    <figure class="col-xl-6 col-md-6 col-sm-12 mb-3" itemprop="associatedMedia" itemscope="">
                      <a href="{{ asset('uploads/image 1.png') }}" itemprop="contentUrl" data-size="1600x950">
                        <img class="img-thumbnail" src="{{ asset('uploads/image 1.png') }}" itemprop="thumbnail"
                          alt="Wolferine" />
                      </a>
                      <p class="text-left mt-1 mb-3 font-xs font-xs">Wolferine</p>
                      <figcaption itemprop="caption description">Wolferine</figcaption>
                    </figure>

                    <figure class="col-xl-6 col-md-6 col-sm-12 mb-3" itemprop="associatedMedia" itemscope="">
                      <a href="{{ asset('uploads/image 17.png') }}" itemprop="contentUrl" data-size="1600x950">
                        <img class="img-thumbnail" src="{{ asset('uploads/image 17.png') }}" itemprop="thumbnail"
                          alt="Tampak Belakang" />
                      </a>
                      <p class="text-left mt-1 mb-3 font-xs font-xs">Tampak Belakang</p>
                      <figcaption itemprop="caption description">Tampak Belakang</figcaption>
                    </figure>

                    <figure class="col-xl-6 col-md-6 col-sm-12 mb-3" itemprop="associatedMedia" itemscope="">
                      <a href="{{ asset('uploads/image 1.png') }}" itemprop="contentUrl" data-size="1600x950">
                        <img class="img-thumbnail" src="{{ asset('uploads/image 1.png') }}" itemprop="thumbnail"
                          alt="Tampak Denah" />
                      </a>
                      <p class="text-left mt-1 mb-3 font-xs">Tampak Denah</p>
                      <figcaption itemprop="caption description">Tampak Denah</figcaption>
                    </figure>

                    <figure class="col-xl-6 col-md-6 col-sm-12 mb-3" itemprop="associatedMedia" itemscope="">
                      <a href="{{ asset('uploads/image 17.png') }}" itemprop="contentUrl" data-size="1600x950">
                        <img class="img-thumbnail" src="{{ asset('uploads/image 17.png') }}" itemprop="thumbnail"
                          alt="Tampak Depan" />
                      </a>
                      <p class="text-left mt-1 mb-3 font-xs">Tampak Depan</p>
                      <figcaption itemprop="caption description">Tampak Depan</figcaption>
                    </figure>

                    <figure class="col-xl-6 col-md-6 col-sm-12 mb-3" itemprop="associatedMedia" itemscope="">
                      <a href="{{ asset('uploads/image 1.png') }}" itemprop="contentUrl" data-size="1600x950">
                        <img class="img-thumbnail" src="{{ asset('uploads/image 1.png') }}" itemprop="thumbnail"
                          alt="Tampak Samping" />
                      </a>
                      <p class="text-left mt-1 mb-3 font-xs">Tampak Samping</p>
                      <figcaption itemprop="caption description">Tampak Samping</figcaption>
                    </figure>
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
            <h5>Foto Office</h5>
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
  @include('dashboard.view.partials.previewImg')
  @push('scripts')
    @include('dashboard.view.partials.js')
    <script>
      // Membuat peta dan mengatur posisi pusatnya ke Indonesia
      var map = L.map('map', {
        fullscreenControl: true,
        fullscreenControlOptions: {
          position: 'topright'
        }
      }).setView([-2.5489, 118.0149], 5);

      // Menambahkan lapisan OpenStreetMap ke dalam peta
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

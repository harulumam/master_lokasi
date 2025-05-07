@extends('layouts.admin.master')

@section('title', 'Edit Detail Fiber Academy')

@push('css')
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/photoswipe.css') }}">
  <link rel="stylesheet" href="https://unpkg.com/leaflet.fullscreen@1.5.0/Control.FullScreen.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
    <li class="breadcrumb-item"><a href="{{ route('fa') }}">Dashboard FA</a></li>
    <li class="breadcrumb-item"><a href="{{ route('detailFa', ['id' => $kode_fa]) }}">Detail FA</a></li>
    <li class="breadcrumb-item active">Edit Detail Fiber Academy</li>
  @endcomponent

  <!-- Container-fluid starts -->
  <div class="container-fluid dashboard-default-sec">
    <div class="row">
      <div class="col-md-2">
        <div class="card p-3">
          <div class="sidebar">
            <div class="row mb-3 mt-3">
              <div class="col-12 d-flex align-items-center">
                <label class="form-label me-2" for="">
                  <a href="{{ route('editFa', ['id' => $kode_fa]) }}">Lokasi</a>
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
                  <span style="color: #E63946">Fiber Academy</span>
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
                <label class="form-label" for=""><a href="{{ route('editDetailFa', ['id' => $kode_fa]) }}"
                    style="color: #E63946">Detail
                    Fiber Academy</a></label>
                <label class="form-label" for=""><a
                    href="{{ route('editRuanganFa', ['id' => $kode_fa]) }}">Detail Ruangan</a></label>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
                <a href="{{ route('historyFa', ['id' => $kode_fa]) }}">
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
            <h5>Detail Fiber Academy</h5>
          </div>
          <div class="card-body">
            <form id="formCreateFa" method="POST" class="needs-validation" novalidate>
              <div class="mb-3">
                <div class="col-md-12">
                  <label class="form-label" for="id_fa">Kode FA</label>
                  <input class="form-control" id="id_fa" name="id_fa" type="text" value="fa-123" readonly />
                </div>
              </div>
              <div class="mb-3">
                <div class="col-md-12">
                  <label class="form-label" for="nama_fa">Nama FA</label>
                  <input class="form-control" id="nama_fa" name="nama_fa" type="text"
                    placeholder="Masukan nama FA" required="" />
                  <div class="invalid-feedback">Nama FA wajib diisi.</div>
                </div>
              </div>
              <div class="mb-3">
                <div class="col-md-12">
                  <label class="form-label" for="tipe_fa">Tipe FA</label>
                  <select class="form-select" id="tipe_fa" name="tipe_fa" required="">
                    <option selected="" disabled="" value="">Pilih Tipe FA</option>
                    <option value="reg">Regional</option>
                    <option value="witel">Witel</option>
                  </select>
                  <div class="invalid-feedback">Silakan pilih tipe FA.</div>
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
              <div class="row g-2 mb-3">
                <div class="col-md-6">
                  <label class="form-label" for="peruntukan_fa">Peruntukan</label>
                  <select class="form-select" id="peruntukan_fa" name="peruntukan_fa" required="">
                    <option selected="" disabled="" value="">Pilih peruntukan</option>
                    <option value="nte">NTE</option>
                    <option value="asset">Asset</option>
                  </select>
                  <div class="invalid-feedback">Silakan pilih peruntukan.</div>
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="luasan_fa">Luasan</label>
                  <input class="form-control" id="luasan_fa" name="luasan_fa" type="text"
                    placeholder="Masukan luasan FA" required="" />
                  <div class="invalid-feedback">Luasan FA wajib diisi.</div>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukan alamat" required=""></textarea>
                <div class="invalid-feedback">Alamat wajib diisi.</div>
              </div>
              <div class="mb-5">
                <label class="form-label" for="koordinat_fa">Koordinat Lokasi</label>
                <div class="d-flex">
                  <input class="form-control me-2" id="koordinat_fa" name="koordinat_fa" type="text"
                    placeholder="Masukan koordinat lokasi" required="" />
                  <button type="button" class="btn btn-sm btn-danger" id="search_lokasi">Search</button>
                </div>
                <div class="invalid-feedback" id="koordinat_invalid_feedback">Koordinat FA wajib diisi.
                </div>
              </div>
              <div class="mb-3">
                <div id="map" style="height: 400px; width: 100%;"></div>
              </div>
              <div class="mb-3">
                <label for="foto-gedung">Foto Gedung</label>
                <div class="upload-section" id="drop-zone-gedung">
                  <i class="fas fa-upload"></i>
                  <p>Drop files here or click to upload.</p>
                  <p>Maks size 2MB &nbsp; | &nbsp; Maks 5 file</p>
                  <input type="file" id="file-input-gedung" multiple style="display: none;" accept="image/*">
                </div>
                <div class="file-list" id="file-list-gedung">
                  <div class="file-item" data-db-id="1" data-category="foto_gedung">
                    <img src="{{ asset('uploads/wolferine.jpg') }}" alt="Foto Gedung">
                    <div class="file-details">
                      <span>foto_1.jpg</span>
                      <span>10 KB</span>
                      <input type="text" placeholder="Deskripsi" value="Tampak Depan">
                    </div>
                    <button type="button" class="delete-btn"><i class="fas fa-times"></i></button>
                  </div>
                  <div class="file-item" data-db-id="2" data-category="foto_gedung">
                    <img src="{{ asset('uploads/image 17.png') }}" alt="Foto Gedung">
                    <div class="file-details">
                      <span>foto_2.jpg</span>
                      <span>10 KB</span>
                      <input type="text" placeholder="Tampak Belakang" value="Tampak Belakang">
                    </div>
                    <button type="button" class="delete-btn"><i class="fas fa-times"></i></button>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="foto-gedung">Foto Denah Gudang</label>
                <div class="upload-section" id="drop-zone-denah">
                  <i class="fas fa-upload"></i>
                  <p>Drop files here or click to upload.</p>
                  <p>Maks size 2MB &nbsp; | &nbsp; Maks 5 file</p>
                  <input type="file" id="file-input-denah" multiple style="display: none;" accept="image/*">
                </div>
                <div class="file-list" id="file-list-denah">
                  <div class="file-item" data-db-id="1" data-category="foto_denah_gudang">
                    <img src="{{ asset('uploads/image 1.png') }}" alt="Foto Gedung">
                    <div class="file-details">
                      <span>foto_1.jpg</span>
                      <span>10 KB</span>
                      <input type="text" placeholder="Deskripsi" value="Tampak Depan">
                    </div>
                    <button type="button" class="delete-btn"><i class="fas fa-times"></i></button>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <div class="mb-3">
                  <div class="col-md-12">
                    <label class="form-label" for="penanggung_jawab_fa">Penanggung Jawab Gudang</label>
                    <select class="form-select" id="penanggung_jawab_fa" name="penanggung_jawab_fa"
                      required="">
                      <option selected="" disabled="" value="">Pilih penanggung jawab</option>
                      <option value="sm">SM</option>
                      <option value="mgr">MGR</option>
                    </select>
                    <div class="invalid-feedback">Silakan pilih penanggung jawab gudang.</div>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <div class="col-md-12">
                  <label class="form-label" for="posisi_penanggung_jawab">Posisi Penanggung Jawab Gudang</label>
                  <input class="form-control" id="posisi_penanggung_jawab" name="posisi_penanggung_jawab"
                    type="text" required="" readonly />
                </div>
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
              <button class="btn btn-outline-secondary me-2" id="cancelButton" onclick="goBack('{{ $kode_fa }}')">Cancel</button>
              <button class="btn btn-danger" id="submitButton">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Container-fluid Ends-->
  @include('dashboard.view.partials.previewImg')
  @push('scripts')
    @includeIf('dashboard.edit.partials.js')
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
    <script>
      $(document).ready(function() {
        let isClicked = false;

        function handleUpload(files, target) {
          const maxFiles = 5;
          const maxSize = 2 * 1024 * 1024; // 2MB
          const fileList = $(`#file-list-${target}`);
          let currentFiles = fileList.children().length;

          // Validasi jumlah file sebelum melanjutkan
          if (currentFiles + files.length > maxFiles) {
            alert(`Maksimum 5 file.`);
            return;
          }

          Array.from(files).forEach((file) => {
            if (!file.type.startsWith("image/") || file.size > maxSize) {
              alert(`Hanya file gambar dengan ukuran maksimal 2MB yang diperbolehkan.`);
              return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
              const html = `
          <div class="file-item">
            <img src="${e.target.result}" alt="${file.name}" />
            <div class="file-details">
              <span>${file.name}</span>
              <span>${(file.size / 1024).toFixed(2)} KB</span>
              <input type="text" placeholder="Deskripsi" />
            </div>
            <button type="button" class="delete-btn"><i class="fas fa-times"></i></button>
          </div>`;
              fileList.append(html);
            };
            reader.readAsDataURL(file);
          });
        }

        // Handle drag and drop
        $(".upload-section").on("dragover", function(e) {
          e.preventDefault();
          e.stopPropagation();
          $(this).addClass("dragging");
        });

        $(".upload-section").on("dragleave", function(e) {
          e.preventDefault();
          e.stopPropagation();
          $(this).removeClass("dragging");
        });

        $(".upload-section").on("drop", function(e) {
          e.preventDefault();
          e.stopPropagation();
          $(this).removeClass("dragging");
          const files = e.originalEvent.dataTransfer.files;
          const target = $(this).attr("id").split("-")[2]; // 'gedung' or 'denah'
          handleUpload(files, target);
        });

        // Handle click upload
        $(".upload-section").on("click", function() {
          if (isClicked) return;
          isClicked = true;

          const target = $(this).attr("id").split("-")[2]; // 'gedung' or 'denah'
          $(`#file-input-${target}`).click();

          setTimeout(() => {
            isClicked = false;
          }, 200);
        });

        // Handle file input change
        $("input[type='file']").on("change", function() {
          const target = $(this).attr("id").split("-")[2]; // 'gedung' or 'denah'
          const files = this.files;
          handleUpload(files, target);
          $(this).val("");
        });

        // Delete file
        $(document).on("click", ".delete-btn", function() {
          $(this).closest(".file-item").remove();
        });
      });

      function goBack(kode_fa) {
        window.location.href = `/fa/detail/${kode_fa}`;
      }
    </script>
  @endpush
@endsection

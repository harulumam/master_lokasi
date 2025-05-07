@extends('layouts.admin.master')

@section('title', 'Edit Detail Gudang RMT')

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
    <li class="breadcrumb-item"><a href="{{ route('gudang') }}">Dashboard Gudang</a></li>
    <li class="breadcrumb-item"><a href="{{ route('gudangRMT', ['id' => $kode_gudang]) }}">View Gudang RMT</a></li>
    <li class="breadcrumb-item active">Edit Detail Gudang RMT</li>
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
                  <a href="{{ route('editGudang', ['id' => $kode_gudang]) }}">Lokasi</a>
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
                  <span style="color: #E63946">Gudang</span>
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
                    href="{{ route('editDetailGudang', ['id' => $kode_gudang]) }}">
                    Detail Gudang</a></label>
                <label class="form-label" for=""><a
                    href="{{ route('editRuanganGudang', ['id' => $kode_gudang]) }}">
                    Detail Ruangan</a></label>
                <label class="form-label" for=""><a href="{{ route('editGudangRMT', ['id' => $kode_gudang]) }}"
                    style="color: #E63946">
                    Detail Ruangan RMT</a></label>
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
          <div class="card-body">
            <div id="formContainer">
              <form id="formCreateFa" method="POST" class="needs-validation dynamic-form" novalidate>
                <div class="mb-3 form-instance" id="form_gudang_0">
                  <div class="row mb-3">
                    <label class="form-label d-flex align-items-center header-input" for=""
                      style="cursor: pointer;">
                      <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
                      <span class="ms-2">
                        <h5 class="mb-0 text-dark fw-bold small">Gudang RMT</h5>
                      </span>
                      <button class="btn btn-outline-danger small ms-auto btn-delete" type="button" id="hapus"
                        name="hapus">Hapus</button>
                    </label>
                    <div class="content-input">
                      <div class="mb-3">
                        <div class="col-md-12">
                          <label class="form-label" for="id_gudang_0">Kode Gudang</label>
                          <input class="form-control" id="id_gudang_0" name="id_gudang[]" type="text" value="gd-123"
                            readonly />
                        </div>
                      </div>
                      <div class="mb-3">
                        <div class="col-md-12">
                          <label class="form-label" for="nama_gudang_0">Nama Gudang</label>
                          <input class="form-control" id="nama_gudang_0" name="nama_gudang[]" type="text"
                            value="Gudang RMT Slipi" />
                          <div class="invalid-feedback">Nama gudang wajib diisi.</div>
                        </div>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="alamat_0">Alamat</label>
                        <textarea class="form-control" id="alamat_0" name="alamat[]" required="">Jl. Letjen S. Parman No.Kav 8 1, RT.1/RW.7, Tomang, Kec. Grogol petamburan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11440
                        </textarea>
                        <div class="invalid-feedback">Alamat wajib diisi.</div>
                      </div>
                      <div class="mb-5">
                        <label class="form-label" for="koordinat_lokasi">Koordinat Lokasi</label>
                        <div class="d-flex">
                          <input class="form-control me-2" id="koordinat_lokasi_0" name="koordinat_lokasi[]"
                            type="text" placeholder="Masukan koordinat lokasi" value="-6.175213, 106.793388"
                            required="" />
                          <button type="button" class="btn btn-sm btn-danger search_lokasi"
                            id="search_lokasi_0">Search</button>
                        </div>
                        <div class="invalid-feedback" id="koordinat_invalid_feedback_0">Koordinat lokasi wajib diisi.
                        </div>
                      </div>
                      <div class="mb-3">
                        <div id="map_0" class="maps" style="height: 400px; width: 100%;"></div>
                      </div>

                      <hr>

                      <div class="row mb-3">
                        <div class="col-md-12">
                          <label class="form-label d-flex align-items-center header-table-alker" for="">
                            <span>
                              <h5 class="mb-0 text-dark fw-bold small">PIC Gudang</h5>
                            </span>
                            <button class="btn btn-outline-danger small ms-auto" type="button" id="tambahPIC"
                              name="tambahPIC">Tambah</button>
                            <button class="btn btn-outline-danger small ms-2 btn-delete-pic" type="button"
                              id="hapusPIC" name="hapusPIC">Hapus</button>
                          </label>
                        </div>
                      </div>

                      <div id="picContainer" class="pic-container">
                        <div class="pic-instance" id="pic_form_0_0">
                          <label class="form-label d-flex align-items-center header-input-pic" for=""
                            style="cursor: pointer;">
                            <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
                            <span class="ms-2">
                              <h5 class="mb-0 text-dark fw-bold small">PIC Gudang 1</h5>
                            </span>
                          </label>

                          <div class="pic-details">
                            <div class="mb-3">
                              <label class="form-label" for="nama_pic_gudang_0_0">NIK</label>
                              <select class="form-select" id="nama_pic_gudang_0_0" name="nama_pic_gudang[]"
                                required="">
                                <option value="23940014">23940014 - Khairul Umam</option>
                              </select>
                              <div class="invalid-feedback">Silakan pilih pic.</div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="posisi_0_0">Posisi Jabatan</label>
                              <input class="form-control" id="posisi_0_0" name="posisi[]" type="text"
                                value="Petugas Gudang" readonly />
                            </div>

                            <div class="row g-2 mb-3">
                              <div class="col-md-6">
                                <label class="form-label" for="notelp_0_0">No Telepon</label>
                                <input class="form-control" id="notelp_0_0" name="notelp[]" type="text"
                                  value="081232149876" readonly />
                              </div>

                              <div class="col-md-6">
                                <label class="form-label" for="email_0_0">Email</label>
                                <input class="form-control" id="email_0_0" name="email[]" type="text"
                                  value="abvsd@telkomakses.co.id" readonly />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <hr>
                </div>
                <div class="row mb-3">
                  <div class="tambahFromGudang"></div>
                </div>
              </form>
            </div>
            <button class="btn btn-outline-danger col-md-12" type="button" id="tambahGudang"
              name="tambahGudang">Tambah Gudang</button>
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

  <!-- Container-fluid Ends-->
  @push('scripts')
    @includeIf('dashboard.edit.partials.js')
    <script>
      $(document).ready(function() {
        var maps = {};
        var markers = {};

        // Fungsi untuk memuat peta berdasarkan form ID dan koordinat
        function initializeMap(formId, lat, lng) {
          var mapId = `map_${formId}`;

          // Pastikan elemen map sudah ada di DOM
          var mapElement = document.getElementById(mapId);
          if (mapElement) {
            if (!maps[formId]) {
              var map = L.map(mapId, {
                fullscreenControl: true,
                fullscreenControlOptions: {
                  position: "topright",
                },
              }).setView([lat, lng], 21);

              L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
              }).addTo(map);

              maps[formId] = map;
            } else {
              maps[formId].setView([lat, lng], 13);
            }
          }
        }

        // Fungsi untuk memperbarui marker
        function updateMarker(lat, lng, formId) {
          if (markers[formId]) {
            maps[formId].removeLayer(markers[formId]);
          }

          // Tambahkan marker baru
          markers[formId] = L.marker([lat, lng])
            .addTo(maps[formId])
            .bindPopup(`${lat}, ${lng}`)
            .openPopup();

          maps[formId].setView([lat, lng], 21);
        }

        // Fungsi untuk memuat peta awal dari input koordinat
        function loadInitialMap(formId) {
          // Ambil nilai koordinat dari input HTML (misalnya id="koordinat_lokasi_0")
          var koordinatInput = $(`#koordinat_lokasi_${formId}`).val().trim();
          if (koordinatInput) {
            var koordinat = koordinatInput.split(',');
            if (koordinat.length === 2) {
              var lat = parseFloat(koordinat[0].trim());
              var lng = parseFloat(koordinat[1].trim());

              // Validasi koordinat dan inisialisasi peta
              if (!isNaN(lat) && !isNaN(lng) && lat >= -90 && lat <= 90 && lng >= -180 && lng <= 180) {
                initializeMap(formId, lat, lng);
                updateMarker(lat, lng, formId);
              }
            }
          }
        }

        // Muat peta untuk form pertama kali
        loadInitialMap(0); // Misalnya form pertama memiliki formId = 0

        // Event untuk tombol search lokasi berdasarkan formId
        $(document).on("click", `[id^='search_lokasi_']`, function() {
          var formId = $(this).attr('id').split('_')[2];
          var koordinatInput = $(`#koordinat_lokasi_${formId}`).val().trim();

          if (koordinatInput) {
            var koordinat = koordinatInput.split(',');
            if (koordinat.length !== 2) {
              alert('Format koordinat salah. \nPastikan menggunakan format: lat, lng');
              $(`#koordinat_lokasi_${formId}`).addClass('is-invalid');
              return;
            }

            var lat = parseFloat(koordinat[0].trim());
            var lng = parseFloat(koordinat[1].trim());

            // Validasi koordinat
            if (!isNaN(lat) && !isNaN(lng) && lat >= -90 && lat <= 90 && lng >= -180 && lng <= 180) {
              initializeMap(formId, lat, lng);
              updateMarker(lat, lng, formId);
              alert('Lokasi berhasil diperbarui.');
              $(`#koordinat_lokasi_${formId}`).addClass('is-valid');
            } else {
              alert(
                'Koordinat tidak valid. \nLatitude harus antara -90 hingga 90 dan Longitude antara -180 hingga 180.'
              );
              $(`#koordinat_lokasi_${formId}`).addClass('is-invalid');
            }
          } else {
            alert('Silakan masukkan koordinat.');
            $(`#koordinat_lokasi_${formId}`).addClass('is-invalid');
          }
        });
      });
    </script>
    </script>
    <script>
      $(document).ready(function() {
        let roomCount = $('.form-instance').length;

        $('#tambahGudang').click(function() {
          let newRoom = $('#form_gudang_0').clone();
          let newId = `form_gudang_${roomCount}`;

          newRoom.attr('id', newId);
          newRoom.find('[id]').each(function() {
            let oldId = $(this).attr('id');
            let newId = oldId.replace('_0', `_${roomCount}`);
            $(this).attr('id', newId);
            $(this).val('');
          });

          newRoom.find('[name]').each(function() {
            let oldName = $(this).attr('name');
            let newName = oldName.replace('[0]', `[${roomCount}]`);
            $(this).attr('name', newName);
          });

          newRoom.appendTo('.tambahFromGudang');
          roomCount++;
          updateDeleteButtons();
        });

        // Hapus Gudang
        $(document).on('click', '.btn-delete', function(event) {
          event.stopPropagation();

          const formId = $(this).closest('.form-instance').attr('id');

          if (formId.endsWith('_0')) {
            alert('Form Gudang ini tidak bisa dihapus!');
            return;
          }

          const formIndex = parseInt(formId.split('_')[2]);

          $(this).closest('.form-instance').remove();
          roomCount = $('.form-instance').length;

          $('.form-instance').each(function(index) {
            const oldId = $(this).attr('id');
            const newId = `form_gudang_${index}`;
            $(this).attr('id', newId); // Update ID form

            $(this).find('[id]').each(function() {
              const oldElementId = $(this).attr('id');
              const newElementId = oldElementId.replace(/_\d+$/, `_${index}`);
              $(this).attr('id', newElementId); // Update ID elemen dalam form
            });

            $(this).find('[name]').each(function() {
              const oldName = $(this).attr('name');
              const newName = oldName.replace(/\[\d+\]$/, `[${index}]`);
              $(this).attr('name', newName); // Update nama elemen input
            });
          });

          updateDeleteButtons();
        });

        // Toggle
        $(document).on('click', '.header-input, .header-input-pic', function() {
          const toggleIcon = $(this).find('.toggle-icon');
          toggleIcon.toggleClass('fa-angle-down fa-angle-right');
          $(this).next('.content-input, .pic-details').slideToggle();
        });

        // Tambah PIC
        $(document).on('click', '#tambahPIC', function() {
          let parentRoom = $(this).closest('.form-instance');
          let roomIndex = parentRoom.attr('id').split('_')[2];
          let picContainer = parentRoom.find('.pic-container');
          let picCount = picContainer.find('.pic-instance').length;

          let newPIC = parentRoom.find('.pic-instance').first().clone();

          newPIC.attr('id', `pic_form_${roomIndex}_${picCount}`);
          newPIC.find('[id]').each(function() {
            let oldId = $(this).attr('id');
            let newId = oldId.replace(/_\d+$/, `_${picCount}`);
            $(this).attr('id', newId).val('');
          });

          newPIC.find('[name]').each(function() {
            let oldName = $(this).attr('name');
            let newName = oldName.replace(/\[\d+\]$/, `[${picCount}]`);
            $(this).attr('name', newName);
          });

          newPIC.find('.header-input-pic span h5').text(`PIC Gudang ${picCount}`);
          newPIC.find('.btn-delete-pic').removeClass('d-none');

          picContainer.append(newPIC);
          updatePicCount(parentRoom);
          updateDeleteButtons();
        });


        // Hapus PIC
        $(document).on('click', '.btn-delete-pic', function(event) {
          event.stopPropagation();

          const parentRoom = $(this).closest('.form-instance');
          const picContainer = parentRoom.find('.pic-container');
          const picInstances = picContainer.find('.pic-instance');
          const picInstance = picInstances.last();

          if (picInstances.length <= 1 || picInstance.attr('id') === 'pic_form_0_0') {
            alert('PIC Gudang ini tidak bisa dihapus!');
            return;
          }

          picInstance.remove();
          updatePicCount(parentRoom);
          updateDeleteButtons();
        });

        function updateDeleteButtons() {
          var totalGudang = $('#formContainer .form-instance').length;
          var totalPIC = $('#picContainer .pic-instance').length;

          if (totalGudang <= 1) {
            $('.btn-delete').prop('disabled', true);
          } else {
            $('.btn-delete').prop('disabled', false);
          }

          if (totalPIC <= 1) {
            $('.btn-delete-pic').prop('disabled', true);
          } else {
            $('.btn-delete-pic').prop('disabled', false);
          }
        }

        function updatePicCount(roomInstance) {
          let picCount = roomInstance.find('.pic-instance').length;

          roomInstance.find('.pic-instance').each(function(index) {
            $(this)
              .find('.header-input-pic span h5')
              .text(`PIC Gudang ${index + 1}`);
          });
        }

        updateDeleteButtons();
      });

      function goBack(kode_gudang) {
        window.location.href = `/gudang/gudangRMT/${kode_gudang}`;
      }
    </script>
  @endpush
@endsection

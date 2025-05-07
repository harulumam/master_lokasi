@extends('layouts.admin.master')

@section('title', 'Edit Detail Ruangan Gudang')

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
    <li class="breadcrumb-item"><a href="{{ route('ruanganGudang', ['id' => $kode_gudang]) }}">View Ruangan</a></li>
    <li class="breadcrumb-item active">Edit Detail Ruangan Gudang</li>
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
                    href="{{ route('editDetailGudang', ['id' => $kode_gudang]) }}">Detail Gudang</a></label>
                <label class="form-label" for=""><a
                    href="{{ route('editRuanganGudang', ['id' => $kode_gudang]) }}" style="color: #E63946">
                    Detail Ruangan</a></label>
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
          <div class="card-body">
            <div id="formContainer">
              <form id="formCreateFa" method="POST" class="needs-validation dynamic-form" novalidate>
                <div class="mb-3 form-instance" id="form_ruang_0">
                  <div class="row mb-3">
                    <label class="form-label d-flex align-items-center header-input" for=""
                      style="cursor: pointer;">
                      <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
                      <span class="ms-2">
                        <h5 class="mb-0 text-dark fw-bold small">Ruang</h5>
                      </span>
                      <button class="btn btn-outline-danger small ms-auto btn-delete" type="button" id="hapus"
                        name="hapus">Hapus</button>
                    </label>
                    <div class="content-input">
                      <div class="row mb-3">
                        <div class="col-md-12">
                          <label class="form-label" for="ruangan_gudang_0">Ruangan</label>
                          <select class="form-select" id="ruangan_gudang_0" name="ruangan_gudang[]" required="">
                            <option selected="" disabled="" value="">Pilih Ruangan</option>
                            <option value="indoor">Indoor</option>
                            <option value="outdoor">Outdoor</option>
                          </select>
                          <div class="invalid-feedback">Silakan pilih ruangan.</div>
                        </div>
                      </div>

                      <div class="row g-2 mb-3">
                        <div class="col-md-5">
                          <label class="form-label" for="luasan_ruang_gudang_0">Luasan</label>
                          <input class="form-control" id="luasan_ruang_gudang_0" name="luasan_ruang_gudang[]" type="text"
                            placeholder="Masukkan luasan" required="" />
                          <div class="invalid-feedback">Luasan wajib diisi.</div>
                        </div>
                        <div class="col-md-1 d-flex align-items-end">
                          <span class="form-label">m²</span>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="tipe_bayar_gudang_0">Tipe Berbayar</label>
                          <select class="form-select" id="tipe_bayar_gudang_0" name="tipe_bayar_gudang[]" required="">
                            <option selected="" disabled="" value="">Pilih Tipe Berbayar</option>
                            <option value="0">Tidak</option>
                            <option value="1">Ya</option>
                          </select>
                          <div class="invalid-feedback">Silakan pilih tipe berbayar.</div>
                        </div>
                      </div>

                      <hr>

                      <div class="row mb-3">
                        <div class="col-md-12">
                          <label class="form-label d-flex align-items-center header-table-alker" for="">
                            <span>
                              <h5 class="mb-0 text-dark fw-bold small">Detail Alker/Sarker</h5>
                            </span>
                            <button class="btn btn-outline-danger small ms-auto" type="button" id="tambahAlker"
                              name="tambahAlker">Tambah Alker/Sarker</button>
                          </label>
                        </div>
                      </div>

                      <div id="alkerContainer" class="alker-container">
                        <div class="alker-instance" id="alker_form_0_0">
                          <label class="form-label d-flex align-items-center header-input-alker" for=""
                            style="cursor: pointer;">
                            <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
                            <span class="ms-2">
                              <h5 class="mb-0 text-dark fw-bold small">Nama Alker/Sarker</h5>
                            </span>
                            <button class="btn btn-outline-danger small ms-auto btn-delete-alker" type="button"
                              id="hapusAlker_0" name="hapusAlker">Hapus</button>
                          </label>

                          <div class="alker-details">
                            <div class="row g-2 mb-3">
                              <div class="col-md-8">
                                <label class="form-label" for="nama_alker_gudang_0_0">Nama Alker/Sarker</label>
                                <select class="form-select" id="nama_alker_gudang_0_0" name="nama_alker_gudang[]"
                                  required="">
                                  <option selected disabled value="">Pilih alker</option>
                                  <option value="0">Tidak</option>
                                  <option value="1">Ya</option>
                                </select>
                                <div class="invalid-feedback">Silakan pilih alker.</div>
                              </div>

                              <div class="col-md-4">
                                <label class="form-label" for="jenis_alker_0_0">Jenis Alker/Sarker</label>
                                <input class="form-control" id="jenis_alker_0_0" name="jenis_alker[]" type="text"
                                  value="-" readonly />
                              </div>
                            </div>

                            <div class="row g-2 mb-3">
                              <div class="col-md-9">
                                <label class="form-label" for="tipe_alker_gudang_0_0">Tipe Alker/Sarker</label>
                                <select class="form-select" id="tipe_alker_gudang_0_0" name="tipe_alker_gudang[]"
                                  required="">
                                  <option selected disabled value="">Pilih tipe alker</option>
                                  <option value="0">Tidak</option>
                                  <option value="1">Ya</option>
                                </select>
                                <div class="invalid-feedback">Silakan pilih tipe alker.</div>
                              </div>

                              <div class="col-md-3">
                                <label class="form-label" for="qty_gudang_0_0">Qty</label>
                                <input class="form-control" id="qty_gudang_0_0" name="qty_gudang[]" type="text"
                                  placeholder="Input qty" required="" />
                                <div class="invalid-feedback">Qty wajib diisi.</div>
                              </div>
                            </div>

                            <div class="row mb-3">
                              <div class="mb-3">
                                <label for="foto-alker">Foto Alker/Sarker</label>
                                <div class="upload-section" id="drop_zone_alker_0_0">
                                  <i class="fas fa-upload"></i>
                                  <p>Drop files here or click to upload.</p>
                                  <p>Maks size 2MB &nbsp; | &nbsp; Maks 5 file</p>
                                  <input type="file" id="file_input_alker_0_0" class="file-input-alker" multiple
                                    style="display: none;" accept="image/*">
                                </div>
                                <div class="file-list" id="file_list_alker_0_0">
                                  <div class="file-item" data-db-id="1" data-category="foto_alker">
                                    <img src="{{ asset('uploads/wolferine.jpg') }}" alt="Foto Alker">
                                    <div class="file-details">
                                      <span>foto_1.jpg</span>
                                      <span>10 KB</span>
                                      <input type="text" placeholder="Deskripsi" value="Tampak Depan">
                                    </div>
                                    <button type="button" class="delete-btn"><i class="fas fa-times"></i></button>
                                  </div>
                                  <div class="file-item" data-db-id="2" data-category="foto_alker">
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
                            </div>
                          </div>
                        </div>
                        <div class="tambahFormAlker"></div>
                      </div>

                    </div>
                  </div>
                  <hr>
                </div>
                <div class="row mb-3">
                  <div class="tambahFromRuangan"></div>
                </div>
              </form>
            </div>
            <button class="btn btn-outline-danger col-md-12" type="button" id="tambahRuangan"
              name="tambahRuangan">Tambah
              Ruangan</button>
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
        let roomCount = $('.form-instance').length;

        // Tambah Ruangan
        $('#tambahRuangan').click(function() {
          let newRoom = $('#form_ruang_0').clone();
          let newId = `form_ruang_${roomCount}`;

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

          newRoom.appendTo('.tambahFromRuangan');
          roomCount++;
          updateDeleteButtons();
        });

        // Hapus Ruangan
        $(document).on('click', '.btn-delete', function(event) {
          event.stopPropagation();

          const formId = $(this).closest('.form-instance').attr('id');
          if (formId.endsWith('_0')) {
            alert('Form Gudang ini tidak bisa dihapus!');
            return;
          }

          $(this).closest('.form-instance').remove();
          roomCount = $('.form-instance').length;

          $('.form-instance').each(function(index) {
            const oldId = $(this).attr('id');
            const newId = `form_ruang_${index}`;
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

        // Toggle Ruangan/Alker
        $(document).on('click', '.header-input, .header-input-alker', function() {
          const toggleIcon = $(this).find('.toggle-icon');
          toggleIcon.toggleClass('fa-angle-down fa-angle-right');
          $(this).next('.content-input, .alker-details').slideToggle();
        });

        // Tambah Alker
        let alkerCount = 0;
        $(document).on('click', '#tambahAlker', function() {
          alkerCount++;
          let parentRoom = $(this).closest('.form-instance');
          let roomIndex = parentRoom.attr('id').split('_')[2];
          let alkerContainer = parentRoom.find('.alker-container');
          let newAlker = parentRoom.find('.alker-instance').first().clone();

          newAlker.attr('id', `alker_form_${roomIndex}_${alkerCount}`);
          newAlker.find('[id]').each(function() {
            let oldId = $(this).attr('id');
            let newId = oldId.replace(/_\d+$/, `_${alkerCount}`);
            $(this).attr('id', newId);
            $(this).val('');
          });

          newAlker.find('[name]').each(function() {
            let oldName = $(this).attr('name');
            let newName = oldName.replace(/\[\d+\]$/, `[${alkerCount}]`);
            $(this).attr('name', newName);
          });

          alkerContainer.append(newAlker);
          updateDeleteButtons();
        });


        // Hapus Alker
        $(document).on('click', '.btn-delete-alker', function(event) {
          event.stopPropagation();

          const alkerId = $(this).closest('.alker-instance').attr('id');

          if (alkerId.endsWith('_0')) {
            alert('Alker/Sarker ini tidak bisa dihapus!');
            return;
          }

          $(this).closest('.alker-instance').remove();
          updateDeleteButtons();
        });

        // Upload File
        let isClicked = false;
        $(document).off('click', '.upload-section').on('click', '.upload-section', function() {
          if (isClicked) return;
          isClicked = true;

          const fileInput = $(this).find('.file-input-alker');
          fileInput.click();

          setTimeout(() => {
            isClicked = false;
          }, 200);
        });


        // Drag and Drop Upload
        $(document).on('dragover', '.upload-section', function(e) {
          e.preventDefault();
          e.stopPropagation();
          $(this).addClass('dragging');
        });

        $(document).on('dragleave', '.upload-section', function() {
          $(this).removeClass('dragging');
        });

        $(document).on('drop', '.upload-section', function(e) {
          e.preventDefault();
          e.stopPropagation();
          $(this).removeClass('dragging');
          const files = e.originalEvent.dataTransfer.files;
          handleFileUpload($(this), files);
        });

        $(document).on('change', '.file-input-alker', function() {
          console.log("File input changed"); // Debugging perubahan file input
          const files = this.files;
          if (files.length > 0) {
            handleFileUpload($(this).closest('.upload-section'), files);
          }
        });

        // Fungsi Upload File
        function handleFileUpload(uploadSection, files) {
          const fileList = uploadSection.next('.file-list');
          if (files.length + fileList.children().length > 5) {
            alert('Maksimum 5 file per form.');
            return;
          }
          for (const file of files) {
            if (!file.type.startsWith('image/') || file.size > 2 * 1024 * 1024) {
              alert('Hanya file gambar dengan ukuran maksimal 2MB yang diperbolehkan.');
              continue;
            }
            const reader = new FileReader();
            reader.onload = function(e) {
              const fileItem = `
          <div class="file-item">
            <img src="${e.target.result}" alt="Foto">
            <div class="file-details">
              <span>${file.name}</span>
              <span>${(file.size / 1024).toFixed(1)} KB</span>
              <input type="text" placeholder="Deskripsi">
            </div>
            <button type="button" class="delete-btn"><i class="fas fa-times"></i></button>
          </div>`;
              fileList.append(fileItem);
            };
            reader.readAsDataURL(file);
          }
        }

        // Update Tombol Delete
        function updateDeleteButtons() {
          var totalRuangan = $('#formContainer .form-instance').length;
          var totalAlker = $('#alkerContainer .alker-instance').length;

          $('.form-instance').each(function(index) {
            let alkerInstances = $(this).find('.alker-instance');
            alkerInstances.each(function(i) {
              const newId = `alker_form_${index}_${i}`;
              $(this).attr('id', newId);

              $(this).find('[id]').each(function() {
                const oldElementId = $(this).attr('id');
                const newElementId = oldElementId.replace(/_\d+_\d+$/, `_${index}_${i}`);
                $(this).attr('id', newElementId);
              });

              $(this).find('[name]').each(function() {
                const oldName = $(this).attr('name');
                const newName = oldName.replace(/\[\d+\]\[\d+\]$/, `[${index}][${i}]`);
                $(this).attr('name', newName);
              });
            });
          });

          if (totalRuangan <= 1) {
            $('.btn-delete').prop('disabled', true);
          } else {
            $('.btn-delete').prop('disabled', false);
          }

          if (totalAlker <= 1) {
            $('.btn-delete-alker').prop('disabled', true);
          } else {
            $('.btn-delete-alker').prop('disabled', false);
          }
        }

        // Delete uploaded file
        $(document).on('click', '.delete-btn', function() {
          $(this).closest('.file-item').remove();
        });

        updateDeleteButtons();
      });

      function goBack(kode_gudang) {
        window.location.href = `/gudang/ruangan/${kode_gudang}`;
      }
    </script>
  @endpush
@endsection

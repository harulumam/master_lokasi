<div class="card-body">
  <div id="formContainer">
    <input type="hidden" name="id_bangunan[{{ $jumlah_bangunan }}]" id="id_bangunan_{{ $jumlah_bangunan }}" value=3 />
    <input type="hidden" name="load_bangunan[{{ $id_row }}]" id="load_bangunan_{{ $id_row }}"
      value={{ $id_row }} />
    <div class="mb-3 form_gudang_instance_{{ $id_row }}" id="form_gudang_{{ $jumlah_bangunan }}_0">
      <div class="row mb-3">
        <label class="form-label d-flex align-items-center ruang_gudang_{{ $id_row }}" for=""
          style="cursor: pointer;">
          <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
          <span class="ms-2">
            <h5 class="mb-0 text-dark fw-bold small">Ruang</h5>
          </span>
          <button class="btn btn-outline-danger small ms-auto hapusGudruang_{{ $id_row }}" type="button"
            id="#hapusGudruang_{{ $id_row }}" name="#hapusGudruang_{{ $id_row }}">Hapus</button>
        </label>
        <div class="content-input">
          <div class="row mb-3">
            <div class="col-md-12">
              <label class="form-label" for="ruangan_gudang_{{ $jumlah_bangunan }}_0">Ruangan</label>
              <select class="form-select" id="ruangan_gudang_{{ $jumlah_bangunan }}_0"
                name="ruangan_gudang[{{ $jumlah_bangunan }}][0]" required="">
                <option selected="" disabled="" value="">Pilih Ruangan</option>
                @foreach ($tipeRuangan as $item)
                  <option value="{{ $item->tipe_ruangan_id }}">{{ $item->tipe_ruangan }}</option>
                @endforeach
              </select>
              <div class="invalid-feedback">Silakan pilih ruangan.</div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-12">
              <label class="form-label" for="luasan_ruangan_gudang_{{ $jumlah_bangunan }}_0">Luasan</label>
            </div>
            <div class="col-md-11">
              <input class="form-control" id="luasan_ruangan_gudang_{{ $jumlah_bangunan }}_0"
                name="luasan_ruangan_gudang[{{ $jumlah_bangunan }}][0]" type="number"
                oninput="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Masukkan luasan"
                required="" />
              <div class="invalid-feedback">Luasan wajib diisi.</div>
            </div>
            <div class="col-md-1 d-flex align-items-start justify-content-center">
              <span class="form-label">m²</span>
            </div>
          </div>

          <div class="row g-2 mb-3 d-flex align-items-center">
            <div class="col-md-6">
              <label class="form-label" for="kategori_ruangan_{{ $jumlah_bangunan }}_0">Kategori Ruangan</label>
              <select class="form-select" id="kategori_ruangan_{{ $jumlah_bangunan }}_0"
                name="kategori_ruangan[{{ $jumlah_bangunan }}][0]" required="">
                <option selected="" disabled="" value="">Pilih Kategori Ruangan</option>
                @foreach ($kategoriGudang as $item)
                  <option value="{{ $item->kategori_gudang_id }}">{{ $item->kategori_gudang }}</option>
                @endforeach
              </select>
              <div class="invalid-feedback">Silakan pilih Kategori Ruangan.</div>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="tipe_bayar_ruangan_{{ $jumlah_bangunan }}_0">Tipe Berbayar</label>
              <select class="form-select" id="tipe_bayar_ruangan_{{ $jumlah_bangunan }}_0"
                name="tipe_bayar_ruangan[{{ $jumlah_bangunan }}][0]" required="">
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
                  <h5 class="mb-0 text-dark fw-bold small">Detail Alker</h5>
                </span>
                <button class="btn btn-outline-danger small ms-auto" type="button"
                  id="gudangAlker_{{ $id_row }}" name="gudangAlker_{{ $id_row }}">Tambah Alker</button>
              </label>
            </div>
          </div>

          <!-- Ini untuk menambahkan form alker secara dinamis -->
          <div id="alkerGudangContainer" class="alker_gudang_container_{{ $id_row }}">
            <div class="alker_gudang_instance_{{ $id_row }}" id="gudang_alker_{{ $jumlah_bangunan }}_0_0">
              <label class="form-label d-flex align-items-center alker_gudruang_{{ $id_row }}" for=""
                style="cursor: pointer;">
                <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
                <span class="ms-2">
                  <h5 class="mb-0 text-dark fw-bold small">Nama Alker</h5>
                </span>
                <button class="btn btn-outline-danger small ms-auto hapusAlker_{{ $id_row }}" type="button"
                  id="hapusAlker_{{ $id_row }}" name="hapusAlker_{{ $id_row }}">Hapus</button>
              </label>

              <div class="alker-details">
                <div class="row g-2 mb-3">
                  <div class="col-md-8">
                    <label class="form-label" for="nama_alker_gudang_{{ $jumlah_bangunan }}_0_0">Nama Alker</label>
                    <select class="form-select nama-alker-gudang" id="nama_alker_gudang_{{ $jumlah_bangunan }}_0_0"
                      name="nama_alker_gudang[{{ $jumlah_bangunan }}][0][]" required="">
                      <option selected="" disabled="" value="">Pilih alker</option>
                      @foreach ($jenisBarang as $item)
                        <option value="{{ $item->id_jenis_barang }}">{{ $item->nama_barang }}</option>
                      @endforeach
                    </select>
                    <div class="invalid-feedback">Silakan pilih alker.</div>
                  </div>

                  <div class="col-md-4">
                    <label class="form-label" for="jenis_alker_gudang_{{ $jumlah_bangunan }}_0_0">Jenis Alker</label>
                    <input class="form-control" id="jenis_alker_gudang_{{ $jumlah_bangunan }}_0_0"
                      name="jenis_alker_gudang[{{ $jumlah_bangunan }}][0][]" type="text" value="-"
                      readonly />
                  </div>
                </div>

                {{-- <div class="row">
                  <div class="col-md-12">
                    <div class="form-label" id="nomorInternetContainer_gudang_{{ $jumlah_bangunan }}_0_0"
                      style="display: none;">
                      <label for="nomor_internet_gudang_{{ $jumlah_bangunan }}_0_0">Nomor Internet:</label>
                      <input class="form-control" id="nomor_internet_gudang_{{ $jumlah_bangunan }}_0_0"
                        name="nomor_internet_gudang[{{ $jumlah_bangunan }}][0][]" type="number"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                        placeholder="Masukkan Nomor Internet">
                      <div class="invalid-feedback">Nomor Internet wajib diisi untuk alker ONT.</div>
                    </div>
                  </div>
                </div> --}}

                <div class="row g-2 mb-3">
                  <div class="col-md-8">
                    <label class="form-label" for="tipe_alker_gudang_{{ $jumlah_bangunan }}_0_0">Tipe
                      Alker/Sarker</label>
                    <select class="form-select" id="tipe_alker_gudang_{{ $jumlah_bangunan }}_0_0"
                      name="tipe_alker_gudang[{{ $jumlah_bangunan }}][0][]" required="">
                      <option selected disabled value="">Pilih tipe alker</option>
                    </select>
                    <div class="invalid-feedback">Silakan pilih tipe alker.</div>
                  </div>

                  <div class="col-md-4">
                    <label class="form-label" for="qty_gudang_{{ $jumlah_bangunan }}_0_0">Qty</label>
                    <input class="form-control" id="qty_gudang_{{ $jumlah_bangunan }}_0_0"
                      name="qty_gudang[{{ $jumlah_bangunan }}][0][]" type="number"
                      oninput="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Input qty"
                      required="" />
                    <div class="invalid-feedback">Qty wajib diisi.</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-12">
                    <label class="form-label" for="serial_number_{{ $jumlah_bangunan }}_0_0">Serial Number</label>
                    <input class="form-control" id="serial_number_{{ $jumlah_bangunan }}_0_0"
                      name="serial_number[{{ $jumlah_bangunan }}][0][]" type="text"
                      placeholder="Input Serial Number" required="" />
                    <div class="invalid-feedback">SN wajib diisi.</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="mb-3">
                    <label for="foto-alker">Foto Alker/Sarker</label>
                    <div class="upload-section" id="drop_zone_alker_{{ $jumlah_bangunan }}_0_0">
                      <i class="fas fa-upload"></i>
                      <p>Drop files here or click to upload.</p>
                      <p>Maks size 2MB &nbsp; | &nbsp; Maks 1 file</p>
                      <input type="file" name="fotoAlker3[{{ $jumlah_bangunan }}][0][]"
                        id="file_gudang_alker_{{ $jumlah_bangunan }}_0_0" class="file-gudang-alker"
                        data-kategori="Alker" data-tipe="3" multiple style="display: none;" accept="image/*">
                    </div>
                    <div class="file-list" id="file_list_alker_{{ $jumlah_bangunan }}_0_0">

                    </div>
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
      <div class="gudangFromRuangan_{{ $id_row }}"></div>
    </div>
  </div>
  <button class="btn btn-outline-danger col-md-12" type="button" id="tambahRuanganGudang_{{ $id_row }}"
    name="tambahRuanganGudang_{{ $id_row }}">Tambah
    Ruangan</button>
</div>


{{-- duplikat form, toggle, hapus, upload --}}
<script>
  $(document).ready(function() {
    let bangunanGudang = {{ $jumlah_bangunan ?? 0 }};
    let ruanganGudang = $('.form_gudang_instance_{{ $id_row }}').length - 1;

    // Tambah Ruangan
    $('#tambahRuanganGudang_{{ $id_row }}').click(function() {
      ruanganGudang = $('.form_gudang_instance_{{ $id_row }}').length;
      let newGudang = $(`#form_gudang_${bangunanGudang}_0`).clone();
      let gudangId = `form_gudang_${bangunanGudang}_${ruanganGudang}`;

      newGudang.attr('id', gudangId);

      newGudang.find('[id]').each(function() {
        let oldIdGudang = $(this).attr('id');
        let updatedIdGudang = oldIdGudang.replace(/_\d+_\d+$/, `_${bangunanGudang}_${ruanganGudang}`);
        $(this).attr('id', updatedIdGudang);
        $(this).val('');
      });

      newGudang.find('[for]').each(function() {
        let oldForGudang = $(this).attr('for');
        let updatedForGudang = oldForGudang.replace(/_\d+_\d+$/, `_${bangunanGudang}_${ruanganGudang}`);
        $(this).attr('for', updatedForGudang);
      });

      newGudang.find('[name]').each(function() {
        let oldNameGudang = $(this).attr('name');
        let updatedNameGudang = oldNameGudang.replace(/\[\d+\]\[\d+\]$/,
          `[${bangunanGudang}][${ruanganGudang}]`);
        $(this).attr('name', updatedNameGudang);
      });

      newGudang.find('.alker_gudang_instance_{{ $id_row }}').not(':first').remove();
      newGudang.find('.alker_gudang_instance_{{ $id_row }}:first').find('[id], [for], [name]').each(
        function() {
          let oldId = $(this).attr('id');
          let oldName = $(this).attr('name');
          let oldFor = $(this).attr('for');

          if (oldId) {
            let updatedId = oldId.replace(/(_\d+)(_?\d+)*$/, `_${bangunanGudang}_${ruanganGudang}_0`);
            $(this).attr('id', updatedId);
          }
          if (oldFor) {
            let updatedFor = oldFor.replace(/(_\d+)(_?\d+)*$/, `_${bangunanGudang}_${ruanganGudang}_0`);
            $(this).attr('for', updatedFor);
          }
          if (oldName) {
            let updatedName = oldName.replace(/\[\d+\]\[\d+\]\[\d*\]$/,
              `[${bangunanGudang}][${ruanganGudang}][]`);
            $(this).attr('name', updatedName);
          }
        });

      newGudang.find('.file-gudang-alker').val('');
      newGudang.find('.file-list').empty();


      newGudang.appendTo('.gudangFromRuangan_{{ $id_row }}');
      ruanganGudang++;
      updateDeleteButtons();
    });

    // Hapus Ruangan
    $(document).on('click', '.hapusGudruang_{{ $id_row }}', function(event) {
      event.stopPropagation();
      const formIdGudang = $(this).closest('.form_gudang_instance_{{ $id_row }}').attr('id');
      if (formIdGudang === `form_gudang_${bangunanGudang}_0`) {
        alert('Form Ruang ini tidak bisa dihapus!');
        return;
      }

      $(this).closest('.form_gudang_instance_{{ $id_row }}').remove();
      updateDeleteButtons();
    });

    // Tambah Alker
    let alkerGudang = 0;
    $(document).on('click', '#gudangAlker_{{ $id_row }}', function() {
      let parentGudang = $(this).closest('.form_gudang_instance_{{ $id_row }}');
      let alkerGudangContainer = parentGudang.find('.alker_gudang_container_{{ $id_row }}');
      let newAlkerGudang = parentGudang.find('.alker_gudang_instance_{{ $id_row }}').first().clone();

      let parentIdParts = parentGudang.attr('id').split('_');
      let parentBangunan = parentIdParts[2];
      let parentRuangan = parentIdParts[3];
      alkerGudang = parentGudang.find('.alker_gudang_instance_{{ $id_row }}').length;

      let newAlkerId = `nama_alker_gudang_${parentBangunan}_${parentRuangan}_${alkerGudang}`;
      newAlkerGudang.attr('id', newAlkerId);

      newAlkerGudang.find('[id]').each(function() {
        let oldIdGudang = $(this).attr('id');
        $(this).attr('id', oldIdGudang.replace(/_\d+_\d+_\d+$/,
          `_${parentBangunan}_${parentRuangan}_${alkerGudang}`));
        $(this).val('');
      });

      newAlkerGudang.find('[for]').each(function() {
        const oldForGudang = $(this).attr('for');
        $(this).attr('for', oldForGudang.replace(/_\d+_\d+_\d+$/,
          `_${parentBangunan}_${parentRuangan}_${alkerGudang}`));
      });

      newAlkerGudang.find('[name]').each(function() {
        let oldNameGudang = $(this).attr('name');
        $(this).attr('name', oldNameGudang.replace(/\[\d+\]\[\d+\]\[\d*\]$/,
          `[${parentBangunan}][${parentRuangan}][]`));
      });

      newAlkerGudang.find('.file-gudang-alker').val('');
      newAlkerGudang.find('.file-list').empty();

      alkerGudangContainer.append(newAlkerGudang);
      updateDeleteButtons();
    });

    // Hapus Alker
    $(document).on('click', '.hapusAlker_{{ $id_row }}', function(event) {
      event.stopPropagation();

      const alkerIdGudang = $(this).closest('.alker_gudang_instance_{{ $id_row }}').attr('id');
      if (alkerIdGudang.endsWith('_0')) {
        alert('Alker/Sarker ini tidak bisa dihapus!');
        return;
      }

      $(this).closest('.alker_gudang_instance_{{ $id_row }}').remove();
      updateDeleteButtons();
    });

    // Update Tombol Delete
    function updateDeleteButtons() {
      $('.form_gudang_instance_{{ $id_row }}').each(function(ruanganIndex) {
        let ruanganId = `form_gudang_${bangunanGudang}_${ruanganIndex}`;
        $(this).attr('id', ruanganId);

        $(this).find('[id]').each(function() {
          let oldId = $(this).attr('id');
          $(this).attr('id', oldId.replace(/_\d+_\d+$/, `_${bangunanGudang}_${ruanganIndex}`));
        });

        $(this).find('[name]').each(function() {
          let oldName = $(this).attr('name');
          $(this).attr('name', oldName.replace(/\[\d+\]\[\d+\]/, `[${bangunanGudang}][${ruanganIndex}]`));
        });

        $(this).find('.alker_gudang_instance_{{ $id_row }}').each(function(alkerIndex) {
          let alkerId = `nama_alker_gudang_${bangunanGudang}_${ruanganIndex}_${alkerIndex}`;
          $(this).attr('id', alkerId);

          $(this).find('[id]').each(function() {
            let oldId = $(this).attr('id');
            $(this).attr('id', oldId.replace(/_\d+_\d+_\d+$/,
              `_${bangunanGudang}_${ruanganIndex}_${alkerIndex}`));
          });

          $(this).find('[name]').each(function() {
            let oldName = $(this).attr('name');
            $(this).attr('name', oldName.replace(/\[\d+\]\[\d+\]\[\d*\]$/,
              `[${bangunanGudang}][${ruanganIndex}][]`));
          });
        });
      });
    }

    // Toggle Ruangan/Alker
    $(document).on('click', '.ruang_gudang_{{ $id_row }}, .alker_gudruang_{{ $id_row }}', function() {
      event.stopPropagation();
      const toggleIcon = $(this).find('.toggle-icon');
      toggleIcon.toggleClass('fa-angle-down fa-angle-right');
      $(this).next('.content-input, .alker-details').slideToggle();
    });
  });
</script>
{{-- upload --}}
<script>
  if (typeof window.isClickedGudRuang === 'undefined') {
    window.isClickedGudRuang = false;
  }

  $(document).off('click', '.upload-section').on('click', '.upload-section', function() {
    if (window.isClickedGudRuang) return;
    window.isClickedGudRuang = true;

    const fileInput = $(this).find('.file-gudang-alker');
    fileInput.click();

    setTimeout(() => {
      window.isClickedGudRuang = false;
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

  $(document).on('change', '.file-gudang-alker', function() {
    const files = this.files;
    if (files.length > 0) {
      handleFileUpload($(this).closest('.upload-section'), files);
    }
  });

  // Fungsi Upload File
  function handleFileUpload(uploadSection, files) {
    const fileList = uploadSection.next('.file-list');
    if (files.length + fileList.children().length > 1) {
      alert('Maksimum 1 file per form.');
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
              </div>
            </div>`;
        fileList.append(fileItem);
      };
      reader.readAsDataURL(file);
    }
  }

  // Delete uploaded file
  $(document).on('click', '.delete-btn', function() {
    $(this).closest('.file-item').remove();
  });
</script>
{{-- Validasi form --}}
<script>
  function validateForm() {
    let isValid = true;

    const fields = [{
        selector: "select[id^='ruangan_gudang']",
        message: "Silakan pilih ruangan."
      },
      {
        selector: "input[id^='luasan_ruangan_gudang']",
        message: "Luasan wajib diisi."
      },
      {
        selector: "select[id^='kategori_ruangan']",
        message: "Silakan pilih Kategori Ruangan."
      },
      {
        selector: "select[id^='tipe_bayar_ruangan']",
        message: "Silakan pilih tipe berbayar."
      },
      {
        selector: "select[id^='nama_alker_gudang']",
        message: "Silakan pilih alker."
      },
      {
        selector: "select[id^='tipe_alker_gudang']",
        message: "Silakan pilih tipe alker."
      },
      {
        selector: "input[id^='qty_gudang']",
        message: "Qty wajib diisi."
      },
      {
        selector: "input[id^='serial_number']",
        message: "SN wajib diisi."
      }
    ];

    fields.forEach((field) => {
      let input = $(field.selector);
      //   console.log(`Cek Field: ${field.selector}, Ditemukan: ${input.length}`);

      input.each(function() {
        let inputValue = $(this).val();

        if (!inputValue || inputValue.trim() === "") {
          $(this).addClass("is-invalid");

          let errorMessage = $(this).siblings(".invalid-feedback");
          if (errorMessage.length === 0) {
            $(this).after(`<div class="invalid-feedback">${field.message}</div>`);
          } else {
            errorMessage.text(field.message).show();
          }

          isValid = false;
        } else {
          $(this).removeClass("is-invalid");
          $(this).siblings(".invalid-feedback").hide();
        }
      });
    });

    // $("select[id^='tipe_alker_gudang']").each(function() {
    //   let tipeAlker = $(this).val();
    //   let nomorInternetField = $(this).closest('.row').find("input[id^='nomor_internet_gudang']");

    //   if (tipeAlker === "3" && (!nomorInternetField.val().trim())) {
    //     nomorInternetField.addClass("is-invalid");
    //     let errorMessage = nomorInternetField.siblings(".invalid-feedback");

    //     if (errorMessage.length === 0) {
    //       nomorInternetField.after(
    //         `<div class="invalid-feedback">Nomor Internet wajib diisi untuk tipe alker ID 3.</div>`);
    //     } else {
    //       errorMessage.text("Nomor Internet wajib diisi untuk tipe alker ID 3.").show();
    //     }

    //     isValid = false;
    //   } else {
    //     nomorInternetField.removeClass("is-invalid");
    //     nomorInternetField.siblings(".invalid-feedback").hide();
    //   }
    // });

    // console.log("Hasil Validasi:", isValid);
    return isValid;
  }

  $(document).on("input change", "input, select", function() {
    $(this).removeClass("is-invalid");
    $(this).siblings(".invalid-feedback").hide();
  });
</script>
{{-- backend master --}}
<script>
  $(document).ready(function() {
    $(document).on('change', 'select[id^="nama_alker_gudang_"]', function() {
      var jenisBarangId = $(this).val();
      var formParts = $(this).attr('id').split('_');
      var formIndex = formParts[3];
      var gudangIndex = formParts[4];
      var alkerIndex = formParts[5];

      //   if (jenisBarangId === '3') {
      //     $('#nomorInternetContainer_gudang_' + formIndex + '_' + gudangIndex + '_' + alkerIndex).show();
      //     $('#nomor_internet_gudang_' + formIndex + '_' + gudangIndex + '_' + alkerIndex).prop('required', true);
      //   } else {
      //     $('#nomorInternetContainer_gudang_' + formIndex + '_' + gudangIndex + '_' + alkerIndex).hide();
      //     $('#nomor_internet_gudang_' + formIndex + '_' + gudangIndex + '_' + alkerIndex).val('');
      //     $('#nomor_internet_gudang_' + formIndex + '_' + gudangIndex + '_' + alkerIndex).prop('required', false);
      //   }

      if (jenisBarangId) {
        $.get('/get-jenis-alker/' + jenisBarangId, function(jenisData) {
          if (jenisData && jenisData.kategori_barang) {
            var cek = $('#jenis_alker_gudang_' + formIndex + '_' + gudangIndex + '_' + alkerIndex).val(
              jenisData
              .kategori_barang);
          } else {
            $('#jenis_alker_gudang_' + formIndex + '_' + gudangIndex + '_' + alkerIndex).val('-');
          }
          $.get('/get-tipe-alker/' + jenisBarangId, function(data) {
            var tipeAlkerSelect = $('#tipe_alker_gudang_' + formIndex + '_' + gudangIndex + '_' +
              alkerIndex);
            tipeAlkerSelect.html('');
            tipeAlkerSelect.append('<option selected disabled value="">Pilih tipe alker</option>');

            if (data.length > 0) {
              $.each(data, function(index, item) {
                tipeAlkerSelect.append('<option value="' + item.master_product_id + '">' +
                  item.product_series + ' - ' + item.nama_product + '</option>');
              });
            } else {
              tipeAlkerSelect.append('<option disabled>No tipe alker available</option>');
            }
          }).fail(function(xhr, status, error) {
            var tipeAlkerSelect = $('#tipe_alker_gudang_' + formIndex + '_' + gudangIndex + '_' +
              alkerIndex);
            tipeAlkerSelect.html('');
            tipeAlkerSelect.append('<option disabled>Error loading tipe alker</option>');
          });

        }).fail(function(xhr, status, error) {
          $('#jenis_alker_gudang_' + formIndex + '_' + gudangIndex + '_' + alkerIndex).val('-');
          var tipeAlkerSelect = $('#tipe_alker_gudang_' + formIndex + '_' + gudangIndex + '_' + alkerIndex);
          tipeAlkerSelect.html('');
          tipeAlkerSelect.append('<option disabled>No data available</option>');
        });
      } else {
        $('#tipe_alker_gudang_' + formIndex + '_' + gudangIndex + '_' + alkerIndex).empty().append(
          '<option selected disabled value="">Pilih tipe alker</option>');
      }

    });
  });
</script>

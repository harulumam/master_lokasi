<div class="card-body">
  <div id="formOfficeContainer">
    <input type="hidden" name="id_bangunan[{{ $jumlah_bangunan }}]" id="id_bangunan_{{ $jumlah_bangunan }}" value=1 />
    <input type="hidden" name="load_bangunan[{{ $id_row }}]" id="load_bangunan_{{ $id_row }}"
      value={{ $id_row }} />
    <div class="mb-3 form-office-instance_{{ $id_row }}" id="form_office_{{ $jumlah_bangunan }}_0">
      <div class="row mb-3">
        <label class="form-label d-flex align-items-center ruang_office_{{ $id_row }}" for=""
          style="cursor: pointer;">
          <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
          <span class="ms-2">
            <h5 class="mb-0 text-dark fw-bold small">Ruang</h5>
          </span>
          <button class="btn btn-outline-danger small ms-auto btn-delete" type="button" id="hapus_{{ $id_row }}"
            name="hapus_{{ $id_row }}">Hapus</button>
        </label>
        <div class="content-input">
          <div class="row mb-3">
            <div class="col-md-12">
              <label class="form-label" for="ruangan_office_{{ $jumlah_bangunan }}_0">Ruangan</label>
              <select class="form-select" id="ruangan_office_{{ $jumlah_bangunan }}_0"
                name="ruangan_office[{{ $jumlah_bangunan }}][0]" required="">
                <option selected="" disabled="" value="">Pilih Ruangan</option>
                @foreach ($tipeRuangan as $item)
                  <option value="{{ $item->tipe_ruangan_id }}">{{ $item->tipe_ruangan }}</option>
                @endforeach
              </select>
              <div class="invalid-feedback">Silakan pilih ruangan.</div>
            </div>
          </div>

          <div class="row g-2 mb-3">
            <div class="col-md-5">
              <label class="form-label" for="luasan_ruangan_office_{{ $jumlah_bangunan }}_0">Luasan</label>
              <input class="form-control" id="luasan_ruangan_office_{{ $jumlah_bangunan }}_0"
                name="luasan_ruangan_office[{{ $jumlah_bangunan }}][0]" type="number"
                oninput="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Masukkan luasan"
                required="" />
              <div class="invalid-feedback">Luasan wajib diisi.</div>
            </div>
            <div class="col-md-1 d-flex align-items-end justify-content-center">
              <span class="form-label">m²</span>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="tipe_bayar_office_{{ $jumlah_bangunan }}_0">Tipe Berbayar</label>
              <select class="form-select" id="tipe_bayar_office_{{ $jumlah_bangunan }}_0"
                name="tipe_bayar_office[{{ $jumlah_bangunan }}][0]" required="">
                <option selected="" disabled="" value="">Pilih Tipe Berbayar</option>
                <option value="Tidak">Tidak</option>
                <option value="Ya">Ya</option>
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
                <button class="btn btn-outline-danger small ms-auto" type="button"
                  id="officeAlker_{{ $id_row }}" name="officeAlker_{{ $id_row }}">Tambah
                  Alker/Sarker</button>
              </label>
            </div>
          </div>

          <div id="alkerOfficeContainer" class="alker_office_container_{{ $id_row }}">
            <div class="alker_office_instance_{{ $id_row }}" id="office_alker_{{ $jumlah_bangunan }}_0_0">
              <label class="form-label d-flex align-items-center ruang_alker_office_{{ $id_row }}" for=""
                style="cursor: pointer;">
                <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
                <span class="ms-2">
                  <h5 class="mb-0 text-dark fw-bold small">Nama Alker/Sarker</h5>
                </span>
                <button class="btn btn-outline-danger small ms-auto btn-delete-alker" type="button"
                  id="hapusAlker_{{ $id_row }}" name="hapusAlker_{{ $id_row }}">Hapus</button>
              </label>

              <div class="alker-details">
                <div class="row g-2 mb-3">
                  <div class="col-md-8">
                    <label class="form-label" for="nama_alker_office_{{ $jumlah_bangunan }}_0_0">Nama
                      Alker/Sarker</label>
                    <select class="form-select" id="nama_alker_office_{{ $jumlah_bangunan }}_0_0"
                      name="nama_alker_office[{{ $jumlah_bangunan }}][0][]" required="">
                      {{-- onchange="getAlker(this.value, this.id)"> --}}
                      <option selected disabled value="">Pilih alker</option>
                      @foreach ($jenisBarang as $item)
                        <option value="{{ $item->id_jenis_barang }}">{{ $item->nama_barang }}</option>
                      @endforeach
                    </select>
                    <div class="invalid-feedback">Silakan pilih alker.</div>
                  </div>

                  <div class="col-md-4">
                    <label class="form-label" for="jenis_alker_office_{{ $jumlah_bangunan }}_0_0">Jenis
                      Alker/Sarker</label>
                    <input class="form-control" id="jenis_alker_office_{{ $jumlah_bangunan }}_0_0"
                      name="jenis_alker_office[{{ $jumlah_bangunan }}][0][]" type="text" value="-"
                      readonly />
                  </div>
                </div>

                {{-- <div class="row">
                  <div class="col-md-12">
                    <div class="form-label" id="nomorInternetContainer_office_{{ $jumlah_bangunan }}_0_0"
                      style="display: none;">
                      <label for="nomor_internet_office_{{ $jumlah_bangunan }}_0_0">Nomor Internet:</label>
                      <input class="form-control" id="nomor_internet_office_{{ $jumlah_bangunan }}_0_0"
                        name="nomor_internet_office[{{ $jumlah_bangunan }}][0][]" type="number"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                        placeholder="Masukkan Nomor Internet">
                      <div class="invalid-feedback">Nomor Internet wajib diisi untuk alker ONT.</div>
                    </div>
                  </div>
                </div> --}}

                <div class="row g-2 mb-3">
                  <div class="col-md-8">
                    <label class="form-label" for="tipe_alker_office_{{ $jumlah_bangunan }}_0_0">Tipe
                      Alker/Sarker</label>
                    <select class="form-select" id="tipe_alker_office_{{ $jumlah_bangunan }}_0_0"
                      name="tipe_alker_office[{{ $jumlah_bangunan }}][0][]" required="">
                      <option selected disabled value="">Pilih tipe alker</option>
                    </select>
                    <div class="invalid-feedback">Silakan pilih tipe alker.</div>
                  </div>

                  <div class="col-md-4">
                    <label class="form-label" for="qty_office_{{ $jumlah_bangunan }}_0_0">Qty</label>
                    <input class="form-control" id="qty_office_{{ $jumlah_bangunan }}_0_0"
                      name="qty_office[{{ $jumlah_bangunan }}][0][]" type="number"
                      oninput="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Input qty"
                      required="" />
                    <div class="invalid-feedback">Qty wajib diisi.</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="mb-3">
                    <label for="foto-alker">Foto Alker/Sarker</label>
                    <div class="upload-section" id="drop_zone_office_{{ $jumlah_bangunan }}_0_0">
                      <i class="fas fa-upload"></i>
                      <p>Drop files here or click to upload.</p>
                      <p>Maks size 2MB &nbsp; | &nbsp; Maks 1 file</p>
                      <input type="file" name="fotoAlker1[{{ $jumlah_bangunan }}][0][]"
                        id="file_input_office_{{ $jumlah_bangunan }}_0_0" class="file-input-alker"
                        data-kategori="Alker" data-tipe="1" multiple style="display: none;" accept="image/*">
                    </div>
                    <div class="invalid-feedback">Foto Alker wajib diunggah.</div>
                    <div class="file-list" id="file_list_office_{{ $jumlah_bangunan }}_0_0">
                      {{-- <div class="file-item" data-db-id="1" data-category="foto_alker">
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
                      </div> --}}
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
      <div class="officeFromRuangan_{{ $id_row }}"></div>
    </div>
  </div>
  <button class="btn btn-outline-danger col-md-12" type="button" id="tambahRuanganOff_{{ $id_row }}"
    name="tambahRuanganOff_{{ $id_row }}">Tambah
    Ruangan</button>
</div>

{{-- duplikat form, toggle, hapus --}}
<script>
  $(document).ready(function() {
    let bangunanOffice = {{ $jumlah_bangunan ?? 0 }};
    let ruanganOffice = $('.form-office-instance_{{ $id_row }}').length - 1;

    // Tambah Ruangan
    $('#tambahRuanganOff_{{ $id_row }}').click(function() {
      ruanganOffice = $('.form-office-instance_{{ $id_row }}').length;
      let newOffice = $(`#form_office_${bangunanOffice}_0`).clone();
      let officeId = `form_office_${bangunanOffice}_${ruanganOffice}`;

      newOffice.attr('id', officeId);

      newOffice.find('[id]').each(function() {
        let oldIdOffice = $(this).attr('id');
        let updatedIdOffice = oldIdOffice.replace(/_\d+_\d+$/, `_${bangunanOffice}_${ruanganOffice}`);
        $(this).attr('id', updatedIdOffice);
        $(this).val('');
      });

      newOffice.find('[for]').each(function() {
        let oldForOffice = $(this).attr('for');
        let updatedForOffice = oldForOffice.replace(/_\d+_\d+$/, `_${bangunanOffice}_${ruanganOffice}`);
        $(this).attr('for', updatedForOffice);
      });

      newOffice.find('[name]').each(function() {
        let oldNameOffice = $(this).attr('name');
        let updatedNameOffice = oldNameOffice.replace(/\[\d+\]\[\d+\]$/,
          `[${bangunanOffice}][${ruanganOffice}]`);
        $(this).attr('name', updatedNameOffice);
      });

      newOffice.find('.alker_office_instance_{{ $id_row }}').not(':first').remove();
      newOffice.find('.alker_office_instance_{{ $id_row }}:first').find(
        '[id], [for], [name]').each(function() {
        let oldId = $(this).attr('id');
        let oldName = $(this).attr('name');
        let oldFor = $(this).attr('for');

        if (oldId) {
          let updatedId = oldId.replace(/(_\d+)(_?\d+)*$/, `_${bangunanOffice}_${ruanganOffice}_0`);
          $(this).attr('id', updatedId);
        }
        if (oldFor) {
          let updatedFor = oldFor.replace(/(_\d+)(_?\d+)*$/, `_${bangunanOffice}_${ruanganOffice}_0`);
          $(this).attr('for', updatedFor);
        }
        if (oldName) {
          let updatedName = oldName.replace(/\[\d+\]\[\d+\]\[\d*\]$/,
            `[${bangunanOffice}][${ruanganOffice}][]`);
          $(this).attr('name', updatedName);
        }
      });

      newOffice.find('.file-input-alker').val('');
      newOffice.find('.file-list').empty();

      newOffice.appendTo('.officeFromRuangan_{{ $id_row }}');
      ruanganOffice++;
      updateDeleteButtons();
    });

    // Hapus Ruangan
    $(document).on('click', '#hapus_{{ $id_row }}', function(event) {
      event.stopPropagation();

      const formIdOff = $(this).closest('.form-office-instance_{{ $id_row }}').attr('id');
      if (formIdOff === `form_office_${bangunanOffice}_0`) {
        alert('Form Ruang ini tidak bisa dihapus!');
        return;
      }

      $(this).closest('.form-office-instance_{{ $id_row }}').remove();
      updateDeleteButtons();
    });

    // Tambah Alker
    let alkerOffice = 0;
    $(document).on('click', '#officeAlker_{{ $id_row }}', function() {
      let parentOffice = $(this).closest('.form-office-instance_{{ $id_row }}');
      let alkerOfficeContainer = parentOffice.find('.alker_office_container_{{ $id_row }}');
      let newAlkerOff = parentOffice.find('.alker_office_instance_{{ $id_row }}').first().clone();

      let parentIdParts = parentOffice.attr('id').split('_');
      let parentBangunan = parentIdParts[2];
      let parentRuangan = parentIdParts[3];
      alkerOffice = parentOffice.find('.alker_office_instance_{{ $id_row }}').length;

      let newAlkerId = `nama_alker_office_${parentBangunan}_${parentRuangan}_${alkerOffice}`;
      newAlkerOff.attr('id', newAlkerId);

      newAlkerOff.find('[id]').each(function() {
        let oldIdOff = $(this).attr('id');
        $(this).attr('id', oldIdOff.replace(/_\d+_\d+_\d+$/,
          `_${parentBangunan}_${parentRuangan}_${alkerOffice}`));
        $(this).val('');
      });

      newAlkerOff.find('[for]').each(function() {
        const oldForOff = $(this).attr('for');
        $(this).attr('for', oldForOff.replace(/_\d+_\d+_\d+$/,
          `_${parentBangunan}_${parentRuangan}_${alkerOffice}`));
      });

      newAlkerOff.find('[name]').each(function() {
        let oldNameOff = $(this).attr('name');
        $(this).attr('name', oldNameOff.replace(/\[\d+\]\[\d+\]\[\d*\]$/,
          `[${parentBangunan}][${parentRuangan}][]`));
      });

      newAlkerOff.find('.file-input-alker').val('');
      newAlkerOff.find('.file-list').empty();

      alkerOfficeContainer.append(newAlkerOff);
      updateDeleteButtons();
    });

    // Hapus Alker
    $(document).on('click', '#hapusAlker_{{ $id_row }}', function(event) {
      event.stopPropagation();

      const alkerIdOff = $(this).closest('.alker_office_instance_{{ $id_row }}').attr('id');
      if (alkerIdOff.endsWith('_0')) {
        alert('Alker/Sarker ini tidak bisa dihapus!');
        return;
      }

      $(this).closest('.alker_office_instance_{{ $id_row }}').remove();
      updateDeleteButtons();
    });

    // Update Tombol Delete
    function updateDeleteButtons() {
      $('.form-office-instance_{{ $id_row }}').each(function(ruanganIndex) {
        let ruanganId = `form_office_${bangunanOffice}_${ruanganIndex}`;
        $(this).attr('id', ruanganId);

        $(this).find('[id]').each(function() {
          let oldId = $(this).attr('id');
          $(this).attr('id', oldId.replace(/_\d+_\d+$/, `_${bangunanOffice}_${ruanganIndex}`));
        });

        $(this).find('[name]').each(function() {
          let oldName = $(this).attr('name');
          $(this).attr('name', oldName.replace(/\[\d+\]\[\d+\]/, `[${bangunanOffice}][${ruanganIndex}]`));
        });

        $(this).find('.alker_office_instance_{{ $id_row }}').each(function(alkerIndex) {
          let alkerId = `nama_alker_office_${bangunanOffice}_${ruanganIndex}_${alkerIndex}`;
          $(this).attr('id', alkerId);

          $(this).find('[id]').each(function() {
            let oldId = $(this).attr('id');
            $(this).attr('id', oldId.replace(/_\d+_\d+_\d+$/,
              `_${bangunanOffice}_${ruanganIndex}_${alkerIndex}`));
          });

          $(this).find('[name]').each(function() {
            let oldName = $(this).attr('name');
            $(this).attr('name', oldName.replace(/\[\d+\]\[\d+\]\[\d*\]$/,
              `[${bangunanOffice}][${ruanganIndex}][]`));
          });
        });
      });
    }

    // Toggle Ruangan/Alker
    $(document).on('click', '.ruang_office_{{ $id_row }}, .ruang_alker_office_{{ $id_row }}',
      function() {
        event.stopPropagation();
        const toggleIcon = $(this).find('.toggle-icon');
        toggleIcon.toggleClass('fa-angle-down fa-angle-right');
        $(this).next('.content-input, .alker-details').slideToggle();
      });
  });
</script>
{{-- upload --}}
<script>
  if (typeof window.isClickedOffRuang === 'undefined') {
    window.isClickedOffRuang = false;
  }

  $(document).off('click', '.upload-section').on('click', '.upload-section', function() {
    if (window.isClickedOffRuang) return;
    window.isClickedOffRuang = true;

    const fileInput = $(this).find('.file-input-alker');
    fileInput.click();

    setTimeout(() => {
      window.isClickedOffRuang = false;
    }, 500);
  });

  // Drag and Drop Upload
  $(document).off('dragover', '.upload-section').on('dragover', '.upload-section', function(e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).addClass('dragging');
  });

  $(document).off('dragleave', '.upload-section').on('dragleave', '.upload-section', function() {
    $(this).removeClass('dragging');
  });

  $(document).off('drop', '.upload-section').on('drop', '.upload-section', function(e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).removeClass('dragging');
    const files = e.originalEvent.dataTransfer.files;
    handleFileUpload($(this), files);
  });

  $(document).off('change', '.file-input-alker').on('change', '.file-input-alker', function() {
    handleFileUpload($(this).closest('.upload-section'), this.files);
  });


  function handleFileUpload(uploadSection, files) {
    const fileList = uploadSection.siblings('.file-list');

    fileList.empty();

    if (files.length > 1) {
      alert('Maksimum 1 file per form.');
      return;
    }

    let uploadedFiles = [];

    for (const file of files) {
      if (!file.type.startsWith('image/') || file.size > 2 * 1024 * 1024) {
        alert('Hanya file gambar dengan ukuran maksimal 2MB yang diperbolehkan.');
        continue;
      }

      uploadedFiles.push(file.name);

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

  // hapus upload foto
  //   $(document).on('click', '.delete-btn', function() {
  //     const fileItem = $(this).closest('.file-item');
  //     const fileName = fileItem.find('.file-details span:first').text();
  //     uploadedFiles = uploadedFiles.filter(name => name !== fileName);
  //     fileItem.remove();
  //   });
</script>
{{-- validasi form --}}
<script>
  function validateForm() {
    let isValid = true;

    const fields = [{
        selector: "select[id^='ruangan_office']",
        message: "Silakan pilih ruangan."
      },
      {
        selector: "input[id^='luasan_ruangan_office']",
        message: "Luasan wajib diisi."
      },
      {
        selector: "select[id^='tipe_bayar_office']",
        message: "Silakan pilih tipe berbayar."
      },
      {
        selector: "select[id^='nama_alker_office']",
        message: "Silakan pilih alker."
      },
      {
        selector: "select[id^='tipe_alker_office']",
        message: "Silakan pilih tipe alker."
      },
      {
        selector: "input[id^='qty_office']",
        message: "Qty wajib diisi."
      },
      {
        selector: "input[id^='file_input_office']",
        message: "Foto Alker wajib diunggah."
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

    // $("select[id^='tipe_alker_office']").each(function() {
    //   let tipeAlker = $(this).val();
    //   let nomorInternetField = $(this).closest('.row').find("input[id^='nomor_internet_office']");

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

    $("[id^='file_input_office']").each(function() {
      if (this.files.length === 0) {
        $(this).closest(".upload-section").addClass("is-invalid");
        if ($(this).siblings(".invalid-feedback").length === 0) {
          $(this).after('<div class="invalid-feedback">Foto Alker wajib diunggah.</div>');
        }
        isValid = false;
      } else {
        $(this).closest(".upload-section").removeClass("is-invalid");
        $(this).siblings(".invalid-feedback").hide();
      }
    });

    return isValid;
  }

  $(document).on("input change", "input, select", function() {
    $(this).removeClass("is-invalid");
    $(this).siblings(".invalid-feedback").hide();
  });

  $(document).on("change", "input[type='file']", function() {
    let errorElement = $(this).closest(".mb-3").find(".invalid-feedback");
    $(this).removeClass("is-invalid");
    errorElement.hide();
  });
</script>
{{-- backend master alker jensi barang --}}
<script>
  $(document).ready(function() {
    $(document).on('change', 'select[id^="nama_alker_office_"]', function() {
      var jenisBarangId = $(this).val();
      var id = $(this).attr('id');
      var formParts = id.split('_');
      var bangunanIndex = formParts[3];
      var formIndex = formParts[4];
      var officeIndex = formParts[5];

      if (jenisBarangId) {
        $.get('/get-jenis-alker/' + jenisBarangId, function(jenisData) {
          if (jenisData && jenisData.kategori_barang) {
            var cek = $('#jenis_alker_office_' + bangunanIndex + '_' + formIndex + '_' + officeIndex).val(
              jenisData
              .kategori_barang);
          } else {
            $('#jenis_alker_office_' + bangunanIndex + '_' + formIndex + '_' + officeIndex).val('-');
          }
          $.get('/get-tipe-alker/' + jenisBarangId, function(data) {
            var tipeAlkerSelect = $('#tipe_alker_office_' + bangunanIndex + '_' + formIndex + '_' +
              officeIndex);
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
            var tipeAlkerSelect = $('#tipe_alker_office_' + bangunanIndex + '_' + formIndex + '_' +
              officeIndex);
            tipeAlkerSelect.html('');
            tipeAlkerSelect.append('<option disabled>Error loading tipe alker</option>');
          });

        }).fail(function(xhr, status, error) {
          $('#jenis_alker_office_' + bangunanIndex + '_' + formIndex + '_' + officeIndex).val('-');
          var tipeAlkerSelect = $('#tipe_alker_office_' + bangunanIndex + '_' + formIndex + '_' +
            officeIndex);
          tipeAlkerSelect.html('');
          tipeAlkerSelect.append('<option disabled>No data available</option>');
        });
      } else {
        $('#tipe_alker_office_' + bangunanIndex + '_' + formIndex + '_' + officeIndex).empty().append(
          '<option selected disabled value="">Pilih tipe alker</option>');
      }
    });
  });

  //   function getAlker(value, id) {
  //     var formParts = id.split('_');
  //     var bangunanIndex = formParts[3];
  //     var formIndex = formParts[4];
  //     var officeIndex = formParts[5];
  //     if (value === '3') {
  //       $('#nomorInternetContainer_office_' + bangunanIndex + '_' + formIndex + '_' + officeIndex).show();
  //       $('#nomor_internet_office_' + bangunanIndex + '_' + formIndex + '_' + officeIndex).prop('required',
  //         true);
  //     } else {
  //       $('#nomorInternetContainer_office_' + bangunanIndex + '_' + formIndex + '_' + officeIndex).hide();
  //       $('#nomor_internet_office_' + bangunanIndex + '_' + formIndex + '_' + officeIndex).val('');
  //       $('#nomor_internet_office_' + bangunanIndex + '_' + formIndex + '_' + officeIndex).prop('required',
  //         false);
  //     }
  //   }
</script>

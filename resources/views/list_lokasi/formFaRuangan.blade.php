<div class="card-body">
  <div id="formContainer">
    <input type="hidden" name="id_bangunan[{{ $jumlah_bangunan }}]" id="id_bangunan_{{ $jumlah_bangunan }}" value=2 />
    <input type="hidden" name="load_bangunan[{{ $id_row }}]" id="load_bangunan_{{ $id_row }}"
      value={{ $id_row }} />
    <div class="mb-3 form-fa-instance_{{ $id_row }}" id="form_fa_{{ $jumlah_bangunan }}_0">
      <div class="row mb-3">
        <label class="form-label d-flex align-items-center ruang_fa_{{ $id_row }}" for=""
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
              <label class="form-label" for="ruangan_fa_{{ $jumlah_bangunan }}_0">Ruangan</label>
              <select class="form-select" id="ruangan_fa_{{ $jumlah_bangunan }}_0"
                name="ruangan_fa[{{ $jumlah_bangunan }}][0]" required="">
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
              <label class="form-label" for="luasan_ruangan_fa_{{ $jumlah_bangunan }}_0">Luasan</label>
              <input class="form-control" id="luasan_ruangan_fa_{{ $jumlah_bangunan }}_0"
                name="luasan_ruangan_fa[{{ $jumlah_bangunan }}][0]" type="number"
                oninput="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Masukkan luasan"
                required="" />
              <div class="invalid-feedback">Luasan wajib diisi.</div>
            </div>
            <div class="col-md-1 d-flex align-items-end justify-content-center">
              <span class="form-label">m²</span>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="tipe_bayar_fa_{{ $jumlah_bangunan }}_0">Tipe Berbayar</label>
              <select class="form-select" id="tipe_bayar_fa_{{ $jumlah_bangunan }}_0"
                name="tipe_bayar_fa[{{ $jumlah_bangunan }}][0]" required="">
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
                <button class="btn btn-outline-danger small ms-auto" type="button" id="faAlker_{{ $id_row }}"
                  name="faAlker_{{ $id_row }}">Tambah
                  Alker/Sarker</button>
              </label>
            </div>
          </div>

          <div id="alkerFAContainer" class="alker_fa_container_{{ $id_row }}">
            <div class="alker_fa_instance_{{ $id_row }}" id="fa_alker_{{ $jumlah_bangunan }}_0_0">
              <label class="form-label d-flex align-items-center ruang_alker_fa_{{ $id_row }}" for=""
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
                    <label class="form-label" for="nama_alker_fa_{{ $jumlah_bangunan }}_0_0">Nama Alker/Sarker</label>
                    <select class="form-select" id="nama_alker_fa_{{ $jumlah_bangunan }}_0_0"
                      name="nama_alker_fa[{{ $jumlah_bangunan }}][0][]" required="">
                      {{-- onchange="getAlker(this.value, this.id)"> --}}
                      <option selected disabled value="">Pilih alker</option>
                      @foreach ($jenisBarang as $item)
                        <option value="{{ $item->id_jenis_barang }}">{{ $item->nama_barang }}</option>
                      @endforeach
                    </select>
                    <div class="invalid-feedback">Silakan pilih alker.</div>
                  </div>

                  <div class="col-md-4">
                    <label class="form-label" for="jenis_alker_fa_{{ $jumlah_bangunan }}_0_0">Jenis
                      Alker/Sarker</label>
                    <input class="form-control" id="jenis_alker_fa_{{ $jumlah_bangunan }}_0_0"
                      name="jenis_alker_fa[{{ $jumlah_bangunan }}][0][]" type="text" value="-" readonly />
                  </div>
                </div>

                {{-- <div class="row">
                  <div class="col-md-12">
                    <div class="form-label" id="nomorInternetContainer_fa_{{ $jumlah_bangunan }}_0_0"
                      style="display: none;">
                      <label for="nomor_internet_fa_{{ $jumlah_bangunan }}_0_0">Nomor Internet:</label>
                      <input class="form-control" id="nomor_internet_fa_{{ $jumlah_bangunan }}_0_0"
                        name="nomor_internet_fa[{{ $jumlah_bangunan }}][0][]" type="number"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                        placeholder="Masukkan Nomor Internet">
                      <div class="invalid-feedback">Nomor Internet wajib diisi untuk alker ONT.</div>
                    </div>
                  </div>
                </div> --}}

                <div class="row g-2 mb-3">
                  <div class="col-md-8">
                    <label class="form-label" for="tipe_alker_fa_{{ $jumlah_bangunan }}_0_0">Tipe
                      Alker/Sarker</label>
                    <select class="form-select" id="tipe_alker_fa_{{ $jumlah_bangunan }}_0_0"
                      name="tipe_alker_fa[{{ $jumlah_bangunan }}][0][]" required="">
                      <option selected disabled value="">Pilih tipe alker</option>
                    </select>
                    <div class="invalid-feedback">Silakan pilih tipe alker.</div>
                  </div>

                  <div class="col-md-4">
                    <label class="form-label" for="qty_fa_{{ $jumlah_bangunan }}_0_0">Qty</label>
                    <input class="form-control" id="qty_fa_{{ $jumlah_bangunan }}_0_0"
                      name="qty_fa[{{ $jumlah_bangunan }}][0][]" type="number"
                      oninput="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Input qty"
                      required="" />
                    <div class="invalid-feedback">Qty wajib diisi.</div>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="mb-3">
                    <label for="foto-alker">Foto Alker/Sarker</label>
                    <div class="upload-section" id="drop_zone_fa_{{ $jumlah_bangunan }}_0_0">
                      <i class="fas fa-upload"></i>
                      <p>Drop files here or click to upload.</p>
                      <p>Maks size 2MB &nbsp; | &nbsp; Maks 1 file</p>
                      <input type="file" name="fotoAlker2[{{ $jumlah_bangunan }}][0][]"
                        id="file_input_fa_{{ $jumlah_bangunan }}_0_0" class="file-input-alker" data-kategori="Alker"
                        data-tipe="2" multiple style="display: none;" accept="image/*">
                    </div>
                    <div class="invalid-feedback">Foto Alker wajib diunggah.</div>
                    <div class="file-list" id="file_list_fa_{{ $jumlah_bangunan }}_0_0">

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
      <div class="faFromRuangan_{{ $id_row }}"></div>
    </div>
  </div>
  <button class="btn btn-outline-danger col-md-12" type="button" id="tambahRuanganFa_{{ $id_row }}"
    name="tambahRuanganFa_{{ $id_row }}">Tambah
    Ruangan</button>
</div>

{{-- duplikat form, toggle, hapus --}}
<script>
  $(document).ready(function() {
    let bangunanFA = {{ $jumlah_bangunan ?? 0 }};
    let ruanganFA = $('.form-fa-instance_{{ $id_row }}').length - 1;

    $('#tambahRuanganFa_{{ $id_row }}').click(function() {
      ruanganFA = $('.form-fa-instance_{{ $id_row }}').length;
      let newFA = $(`#form_fa_${bangunanFA}_0`).clone();
      let faId = `form_fa_${bangunanFA}_${ruanganFA}`;

      newFA.attr('id', faId);

      newFA.find('[id]').each(function() {
        let oldIdFA = $(this).attr('id');
        let updatedIdFA = oldIdFA.replace(/_\d+_\d+$/, `_${bangunanFA}_${ruanganFA}`);
        $(this).attr('id', updatedIdFA);
        $(this).val('');
      });

      newFA.find('[for]').each(function() {
        let oldForFA = $(this).attr('for');
        let updatedForFA = oldForFA.replace(/_\d+_\d+$/, `_${bangunanFA}_${ruanganFA}`);
        $(this).attr('for', updatedForFA);
      });

      newFA.find('[name]').each(function() {
        let oldNameFA = $(this).attr('name');
        let updatedNameFA = oldNameFA.replace(/\[\d+\]\[\d+\]$/,
          `[${bangunanFA}][${ruanganFA}]`);
        $(this).attr('name', updatedNameFA);
      });

      newFA.find('.alker_fa_instance_{{ $id_row }}').not(':first').remove();
      newFA.find('.alker_fa_instance_{{ $id_row }}:first').find('[id], [for], [name]').each(function() {
        let oldId = $(this).attr('id');
        let oldName = $(this).attr('name');
        let oldFor = $(this).attr('for');

        if (oldId) {
          let updatedId = oldId.replace(/(_\d+)(_?\d+)*$/, `_${bangunanFA}_${ruanganFA}_0`);
          $(this).attr('id', updatedId);
        }
        if (oldFor) {
          let updatedFor = oldFor.replace(/(_\d+)(_?\d+)*$/, `_${bangunanFA}_${ruanganFA}_0`);
          $(this).attr('for', updatedFor);
        }
        if (oldName) {
          let updatedName = oldName.replace(/\[\d+\]\[\d+\]\[\d*\]$/,
            `[${bangunanFA}][${ruanganFA}][]`);
          $(this).attr('name', updatedName);
        }
      });

      newFA.find('.file-input-alker').val('');
      newFA.find('.file-list').empty();

      newFA.appendTo('.faFromRuangan_{{ $id_row }}');
      ruanganFA++;
      updateDeleteButtons();
    });

    // Hapus Ruangan
    $(document).on('click', '.btn-delete', function(event) {
      event.stopPropagation();

      const formIdFA = $(this).closest('.form-fa-instance_{{ $id_row }}').attr('id');
      if (formIdFA === `form_fa_${bangunanFA}_0`) {
        alert('Form Ruang ini tidak bisa dihapus!');
        return;
      }

      $(this).closest('.form-fa-instance_{{ $id_row }}').remove();
      updateDeleteButtons();
    });

    // Tambah Alker
    let alkerFA = 0;
    $(document).on('click', '#faAlker_{{ $id_row }}', function() {
      let parentFA = $(this).closest('.form-fa-instance_{{ $id_row }}');
      let alkerFAContainer = parentFA.find('.alker_fa_container_{{ $id_row }}');
      let newAlkerFA = parentFA.find('.alker_fa_instance_{{ $id_row }}').first().clone();

      let parentIdParts = parentFA.attr('id').split('_');
      let parentBangunan = parentIdParts[2];
      let parentRuangan = parentIdParts[3];
      alkerFA = parentFA.find('.alker_fa_instance_{{ $id_row }}').length;

      let newAlkerId = `nama_alker_fa_${parentBangunan}_${parentRuangan}_${alkerFA}`;
      newAlkerFA.attr('id', newAlkerId);

      newAlkerFA.find('[id]').each(function() {
        let oldIdFA = $(this).attr('id');
        $(this).attr('id', oldIdFA.replace(/_\d+_\d+_\d+$/,
          `_${parentBangunan}_${parentRuangan}_${alkerFA}`));
        $(this).val('');
      });

      newAlkerFA.find('[for]').each(function() {
        const oldForFA = $(this).attr('for');
        $(this).attr('for', oldForFA.replace(/_\d+_\d+_\d+$/,
          `_${parentBangunan}_${parentRuangan}_${alkerFA}`));
      });

      newAlkerFA.find('[name]').each(function() {
        let oldNameFA = $(this).attr('name');
        $(this).attr('name', oldNameFA.replace(/\[\d+\]\[\d+\]\[\d*\]$/,
          `[${parentBangunan}][${parentRuangan}][]`));
      });

      newAlkerFA.find('.file-input-alker').val('');
      newAlkerFA.find('.file-list').empty();

      alkerFAContainer.append(newAlkerFA);
      updateDeleteButtons();
    });

    // Hapus Alker
    $(document).on('click', '#hapusAlker_{{ $id_row }}', function(event) {
      event.stopPropagation();

      const alkerIdFA = $(this).closest('.alker_fa_instance_{{ $id_row }}').attr('id');
      if (alkerIdFA.endsWith('_0')) {
        alert('Alker/Sarker ini tidak bisa dihapus!');
        return;
      }

      $(this).closest('.alker_fa_instance_{{ $id_row }}').remove();
      updateDeleteButtons();
    });

    // Update Tombol Delete
    function updateDeleteButtons() {
      $('.form-fa-instance_{{ $id_row }}').each(function(ruanganIndex) {
        let ruanganId = `form_fa_${bangunanFA}_${ruanganIndex}`;
        $(this).attr('id', ruanganId);

        $(this).find('[id]').each(function() {
          let oldId = $(this).attr('id');
          $(this).attr('id', oldId.replace(/_\d+_\d+$/, `_${bangunanFA}_${ruanganIndex}`));
        });

        $(this).find('[name]').each(function() {
          let oldName = $(this).attr('name');
          $(this).attr('name', oldName.replace(/\[\d+\]\[\d+\]/, `[${bangunanFA}][${ruanganIndex}]`));
        });

        $(this).find('.alker_fa_instance_{{ $id_row }}').each(function(alkerIndex) {
          let alkerId = `nama_alker_fa_${bangunanFA}_${ruanganIndex}_${alkerIndex}`;
          $(this).attr('id', alkerId);

          $(this).find('[id]').each(function() {
            let oldId = $(this).attr('id');
            $(this).attr('id', oldId.replace(/_\d+_\d+_\d+$/,
              `_${bangunanFA}_${ruanganIndex}_${alkerIndex}`));
          });

          $(this).find('[name]').each(function() {
            let oldName = $(this).attr('name');
            $(this).attr('name', oldName.replace(/\[\d+\]\[\d+\]\[\d*\]$/,
              `[${bangunanFA}][${ruanganIndex}][]`));
          });
        });
      });
    }

    // Toggle Ruangan/Alker
    $(document).on('click', '.ruang_fa_{{ $id_row }}, .ruang_alker_fa_{{ $id_row }}', function() {
      const toggleIcon = $(this).find('.toggle-icon');
      toggleIcon.toggleClass('fa-angle-down fa-angle-right');
      $(this).next('.content-input, .alker-details').slideToggle();
    });
  });
</script>
{{-- upload --}}
<script>
  if (typeof window.isClickedFaRuang === 'undefined') {
    window.isClickedFaRuang = false;
  }

  $(document).off('click', '.upload-section').on('click', '.upload-section', function() {
    if (window.isClickedFaRuang) return;
    window.isClickedFaRuang = true;

    const fileInput = $(this).find('.file-input-alker');
    fileInput.click();

    setTimeout(() => {
      window.isClickedFaRuang = false;
    }, 200);
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
        selector: "select[id^='ruangan_fa']",
        message: "Silakan pilih ruangan."
      },
      {
        selector: "input[id^='luasan_ruangan_fa']",
        message: "Luasan wajib diisi."
      },
      {
        selector: "select[id^='tipe_bayar_fa']",
        message: "Silakan pilih tipe berbayar."
      },
      {
        selector: "select[id^='nama_alker_fa']",
        message: "Silakan pilih alker."
      },
      {
        selector: "select[id^='tipe_alker_fa']",
        message: "Silakan pilih tipe alker."
      },
      {
        selector: "input[id^='qty_fa']",
        message: "Qty wajib diisi."
      },
      {
        selector: "input[id^='file_input_fa']",
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

    $("[id^='file_input_fa']").each(function() {
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
{{-- backend master --}}
<script>
  $(document).ready(function() {
    $(document).on('change', 'select[id^="nama_alker_fa_"]', function() {
      var jenisBarangId = $(this).val();
      var id = $(this).attr('id');
      var formParts = id.split('_');
      var bangunanIndex = formParts[3];
      var formIndex = formParts[4];
      var faIndex = formParts[5];

      if (jenisBarangId) {
        $.get('/get-jenis-alker/' + jenisBarangId, function(jenisData) {
          if (jenisData && jenisData.kategori_barang) {
            var cek = $('#jenis_alker_fa_' + bangunanIndex + '_' + formIndex + '_' + faIndex).val(
              jenisData
              .kategori_barang);
          } else {
            $('#jenis_alker_fa_' + bangunanIndex + '_' + formIndex + '_' + faIndex).val('-');
          }
          $.get('/get-tipe-alker/' + jenisBarangId, function(data) {
            var tipeAlkerSelect = $('#tipe_alker_fa_' + bangunanIndex + '_' + formIndex + '_' +
              faIndex);
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
            var tipeAlkerSelect = $('#tipe_alker_fa_' + bangunanIndex + '_' + formIndex + '_' +
              faIndex);
            tipeAlkerSelect.html('');
            tipeAlkerSelect.append('<option disabled>Error loading tipe alker</option>');
          });

        }).fail(function(xhr, status, error) {
          $('#jenis_alker_fa_' + bangunanIndex + '_' + formIndex + '_' + faIndex).val('-');
          var tipeAlkerSelect = $('#tipe_alker_fa_' + bangunanIndex + '_' + formIndex + '_' +
            faIndex);
          tipeAlkerSelect.html('');
          tipeAlkerSelect.append('<option disabled>No data available</option>');
        });
      } else {
        $('#tipe_alker_fa_' + bangunanIndex + '_' + formIndex + '_' + faIndex).empty().append(
          '<option selected disabled value="">Pilih tipe alker</option>');
      }
    });
  });

  //   function getAlker(value, id) {
  //     var formParts = id.split('_');
  //     var bangunanIndex = formParts[3];
  //     var formIndex = formParts[4];
  //     var faIndex = formParts[5];
  //     if (value === '3') {
  //       $('#nomorInternetContainer_fa_' + bangunanIndex + '_' + formIndex + '_' + faIndex).show();
  //       $('#nomor_internet_fa_' + bangunanIndex + '_' + formIndex + '_' + faIndex).prop('required',
  //         true);
  //     } else {
  //       $('#nomorInternetContainer_fa_' + bangunanIndex + '_' + formIndex + '_' + faIndex).hide();
  //       $('#nomor_internet_fa_' + bangunanIndex + '_' + formIndex + '_' + faIndex).val('');
  //       $('#nomor_internet_fa_' + bangunanIndex + '_' + formIndex + '_' + faIndex).prop('required',
  //         false);
  //     }
  //   }
</script>

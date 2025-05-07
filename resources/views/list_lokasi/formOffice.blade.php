<div class="card-header pb-0">
  <h5>Detail Office</h5>
</div>
<div class="card-body">
  <input type="hidden" name="id_bangunan[{{ $jumlah_bangunan }}]" id="id_bangunan_{{ $jumlah_bangunan }}" value=1 />
  <input type="hidden" name="load_bangunan[{{ $id_row }}]" id="load_bangunan_{{ $id_row }}"
    value={{ $id_row }} />
  <div class="mb-3">
    <div class="col-md-12">
      <label class="form-label" for="kode_office_{{ $jumlah_bangunan }}">Kode Office</label>
      <input class="form-control" id="kode_office_{{ $jumlah_bangunan }}" name="kode_office[{{ $jumlah_bangunan }}]"
        type="text" disabled />
    </div>
  </div>
  <div class="mb-3">
    <div class="col-md-12">
      <label class="form-label" for="nama_office_{{ $jumlah_bangunan }}">Nama Office</label>
      <input class="form-control" id="nama_office_{{ $jumlah_bangunan }}" name="nama_office[{{ $jumlah_bangunan }}]"
        type="text" placeholder="Masukan nama office" required="" />
      <div class="invalid-feedback">Nama Office wajib diisi.</div>
    </div>
  </div>
  <div class="mb-3">
    <div class="col-md-12">
      <label class="form-label" for="tipe_office_{{ $jumlah_bangunan }}">Tipe Office</label>
      <select class="form-select" id="tipe_office_{{ $jumlah_bangunan }}" name="tipe_office[{{ $jumlah_bangunan }}]"
        required="">
        <option selected="" disabled="" value="">Pilih Tipe Office</option>
        @foreach ($tipeJenisBangunan as $item)
          <option value="{{ $item->tipe_jenis_bangunan_id }}">{{ $item->jenis_bangunan_id }}</option>
        @endforeach
      </select>
      <div class="invalid-feedback">Silakan pilih tipe office.</div>
    </div>
  </div>
  <div class="row g-2 mb-3">
    <div class="col-md-6">
      <label class="form-label" for="regional_form">Regional</label>
      <input type="text" class="form-select" id="regional_form_{{ $id_row }}" name="regional_form"
        value="{{ $namaRegional }}" disabled />
      <input type="hidden" class="form-select" id="regional_id_{{ $id_row }}" name="regional_id"
        value="{{ $idRegional }}" disabled />
    </div>
    <div class="col-md-6">
      <label class="form-label" for="witel_form">Witel</label>
      <input type="text" class="form-select" id="witel_form_{{ $id_row }}" name="witel_form"
        value="{{ $namaWitel }}" disabled />
    </div>
  </div>
  <div class="row g-2 mb-3">
    <div class="col-md-6">
      <label class="form-label" for="peruntukan_office_{{ $jumlah_bangunan }}">Peruntukan</label>
      <select class="form-select" id="peruntukan_office_{{ $jumlah_bangunan }}"
        name="peruntukan_office[{{ $jumlah_bangunan }}]" required="">
        <option selected="" disabled="" value="">Pilih peruntukan</option>
        @foreach ($peruntukan as $item)
          <option value="{{ $item->peruntukan_id }}">{{ $item->peruntukan }}</option>
        @endforeach
      </select>
      <div class="invalid-feedback">Silakan pilih peruntukan.</div>
    </div>
    <div class="col-md-6">
      <label class="form-label" for="luasan_office_{{ $jumlah_bangunan }}">Luasan</label>
      <input class="form-control" id="luasan_office_{{ $jumlah_bangunan }}"
        name="luasan_office[{{ $jumlah_bangunan }}]" type="number"
        oninput="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Masukan luasan office" required="" />
      <div class="invalid-feedback">Luasan office wajib diisi.</div>
    </div>
  </div>
  <div class="mb-3">
    <label class="form-label" for="alamat_office_{{ $jumlah_bangunan }}">Alamat</label>
    <textarea class="form-control" id="alamat_office_{{ $jumlah_bangunan }}" name="alamat[{{ $jumlah_bangunan }}]"
      placeholder="Masukan alamat" required=""></textarea>
    <div class="invalid-feedback">Alamat wajib diisi.</div>
  </div>
  <div class="mb-5">
    <label class="form-label" for="koordinat_office_{{ $jumlah_bangunan }}">Koordinat Lokasi</label>
    <div class="d-flex">
      <input class="form-control me-2" id="koordinat_office_{{ $jumlah_bangunan }}"
        name="koordinat_office[{{ $jumlah_bangunan }}]" data-bangunan-id="{{ $jumlah_bangunan }}" type="text"
        placeholder="Masukan koordinat lokasi" required="" />
      <button type="button" class="btn btn-sm btn-danger" id="search_lokasi_office_{{ $jumlah_bangunan }}"
        data-bangunan-id="{{ $jumlah_bangunan }}">Search</button>
    </div>
    <div class="invalid-feedback" id="koordinat_invalid_feedback">Koordinat office wajib diisi.
    </div>
  </div>
  <div class="mb-3">
    <div id="map_{{ $jumlah_bangunan }}" class="map" style="height: 400px; width: 100%;"
      data-map-id="{{ $jumlah_bangunan }}"></div>
  </div>
  <div class="mb-3">
    <label for="file-input-gedung-{{ $id_row }}">Foto Gedung</label>
    <div class="upload-section upload_office_{{ $id_row }}" id="drop-zone-gedung-{{ $id_row }}">
      <i class="fas fa-upload"></i>
      <p>Drop files here or click to upload.</p>
      <p>Maks size 2MB &nbsp; | &nbsp; Maks 5 file</p>
      <input type="file" name="fotoGedung1[{{ $jumlah_bangunan }}][]" id="file-input-gedung-{{ $id_row }}"
        data-kategori="Gedung" data-tipe="1" multiple style="display: none;" accept="image/*">
    </div>
    <div class="invalid-feedback">Foto Gedung wajib diunggah.</div>
    <div class="file-list" id="file-list-gedung-{{ $id_row }}">

    </div>
  </div>
  <div class="mb-3">
    <label for="file-input-denah-{{ $id_row }}">Foto Denah Gudang</label>
    <div class="upload-section upload_office_{{ $id_row }}" id="drop-zone-denah-{{ $id_row }}">
      <i class="fas fa-upload"></i>
      <p>Drop files here or click to upload.</p>
      <p>Maks size 2MB &nbsp; | &nbsp; Only 1 file</p>
      <input type="file" name="fotoDenah1[{{ $jumlah_bangunan }}][]" id="file-input-denah-{{ $id_row }}"
        data-kategori="Denah" data-tipe="1" multiple style="display: none;" accept="image/*">
    </div>
    <div class="invalid-feedback">Foto Denah wajib diunggah.</div>
    <div class="file-list" id="file-list-denah-{{ $id_row }}">

    </div>
  </div>
  <div class="mb-3">
    <div class="col-md-12">
      <label class="form-label" for="penanggung_jawab_office_{{ $jumlah_bangunan }}">Penanggung Jawab
        Gudang</label>
      <select class="form-control chosen-select" id="penanggung_jawab_office_{{ $jumlah_bangunan }}"
        name="penanggung_jawab_office[{{ $jumlah_bangunan }}]" required="">
        <option value="">Pilih penanggung jawab</option>
        {{ $picByReg }}
        @foreach ($picByReg as $pic)
          <option value="{{ $pic->nik }}" data-position="{{ $pic->position_name }}">
            {{ htmlspecialchars($pic->nik . ' - ' . str_replace('`', "'", $pic->name), ENT_QUOTES, 'UTF-8') }}
          </option>
        @endforeach
      </select>
      <div class="invalid-feedback">Silakan pilih penanggung jawab gudang.</div>
    </div>
  </div>
  <div class="mb-3">
    <div class="col-md-12">
      <label class="form-label" for="posisi_penanggung_jawab_{{ $jumlah_bangunan }}">Posisi Penanggung Jawab
        Gudang</label>
      <input class="form-control" id="posisi_penanggung_jawab_{{ $jumlah_bangunan }}"
        name="posisi_penanggung_jawab[{{ $jumlah_bangunan }}]" type="text" readonly />
    </div>
  </div>
</div>

{{-- validasi --}}
<script>
  $(document).ready(function() {
    $('[id^="map_"]').each(function() {
      var mapId = $(this).data('map-id');
      var map = $(this).data('map');

      if (!map) {
        map = L.map('map_' + mapId, {
          fullscreenControl: true,
          fullscreenControlOptions: {
            position: 'topright'
          }
        }).setView([-2.5489, 118.0149], 5);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        $(this).data('map', map);
      }
    });
  });

  $(document).on('click', '[id^="search_lokasi_office_"]', function(event) {
    var jumlahBangunan = $(this).data('bangunan-id');
    var koordinatInput = $('#koordinat_office_' + jumlahBangunan).val().trim();
    var koordinatLokasiInput = $('#koordinat_office_' + jumlahBangunan);

    koordinatLokasiInput.removeClass('is-invalid is-valid');

    if (!koordinatInput) {
      alert('Silakan masukkan koordinat.');
      koordinatLokasiInput.addClass('is-invalid');
      event.stopImmediatePropagation();
      return;
    }

    var koordinat = koordinatInput.split(',');
    if (koordinat.length !== 2) {
      alert('Format koordinat salah. Pastikan menggunakan format: lat, lng');
      koordinatLokasiInput.addClass('is-invalid');
      return;
    }

    var lat = parseFloat(koordinat[0].trim());
    var lng = parseFloat(koordinat[1].trim());

    if (!isNaN(lat) && !isNaN(lng) && lat >= -90 && lat <= 90 && lng >= -180 && lng <= 180) {
      var mapId = '#map_' + jumlahBangunan;
      var map = $(mapId).data('map');

      if (map && map.marker) {
        map.removeLayer(map.marker);
      }

      map.marker = L.marker([lat, lng]).addTo(map)
        .bindPopup('Lokasi yang dimasukkan: <br>' + lat + ', ' + lng).openPopup();

      map.setView([lat, lng], 17);
      map.invalidateSize(); // Memastikan ukuran peta disesuaikan setelah perubahan

      koordinatLokasiInput.addClass('is-valid');
    } else {
      alert('Koordinat tidak valid. Latitude harus antara -90 hingga 90 dan Longitude antara -180 hingga 180.');
      koordinatLokasiInput.addClass('is-invalid');
    }

    event.stopImmediatePropagation();
  });
  // Fungsi validasi form
  function validateForm() {
    let isValid = true;

    const fields = [{
        selector: "input[id^='nama_office']",
        message: 'Nama office wajib diisi.'
      },
      {
        selector: "select[id^='tipe_office']",
        message: 'Tipe office wajib diisi.'
      },
      {
        selector: "select[id^='peruntukan_office']",
        message: 'Silakan pilih peruntukan office.'
      },
      {
        selector: "input[id^='luasan_office']",
        message: 'Luasan office wajib diisi.'
      },
      {
        selector: "textarea[id^='alamat_office']",
        message: 'Alamat office wajib diisi.'
      },
      {
        selector: "input[id^='koordinat_office']",
        message: 'Koordinat office wajib diisi.'
      },
      {
        selector: "input[id^='file-input-gedung']",
        message: 'Foto gedung office wajib diunggah.'
      },
      {
        selector: "input[id^='file-input-denah']",
        message: 'Foto denah office wajib diunggah.'
      },
      {
        selector: "select[id^='penanggung_jawab_office']",
        message: 'Silakan pilih Penanggung Jawab office wajib diisi.'
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

    $("[id^='file-input-gedung']").each(function() {
      if (this.files.length === 0) {
        $(this).closest(".upload-section").addClass("is-invalid");
        if ($(this).siblings(".invalid-feedback").length === 0) {
          $(this).after('<div class="invalid-feedback">Foto Gedung wajib diunggah.</div>');
        }
        isValid = false;
      } else {
        $(this).closest(".upload-section").removeClass("is-invalid");
        $(this).siblings(".invalid-feedback").hide();
      }
    });

    $("[id^='file-input-denah']").each(function() {
      if (this.files.length === 0) {
        $(this).closest(".upload-section").addClass("is-invalid");
        if ($(this).siblings(".invalid-feedback").length === 0) {
          $(this).after('<div class="invalid-feedback">Foto Denah Gudang wajib diunggah.</div>');
        }
        isValid = false;
      } else {
        $(this).closest(".upload-section").removeClass("is-invalid");
        $(this).siblings(".invalid-feedback").hide();
      }
    });

    return isValid;
  }

  $(document).on("input change", "input, select, textarea", function() {
    $(this).removeClass("is-invalid");
    $(this).siblings(".invalid-feedback").hide();
  });

  $(document).on("change", "input[type='file']", function() {
    $(this).removeClass("is-invalid");
    $(this).closest(".mb-3").find(".invalid-feedback").hide();
  });
</script>
{{-- upload --}}
<script>
  $(document).ready(function() {
    let isClickedOff = false;

    function handleUpload(files, target, id_row) {
      const maxFiles = target === 'denah' ? 1 : 5;
      const maxSize = 2 * 1024 * 1024; // 2MB
      const fileList = $(`#file-list-${target}-${id_row}`);

      fileList.empty();

      if (files.length > maxFiles) {
        alert(target === 'denah' ? `Hanya diperbolehkan 1 file untuk denah.` : `Maksimum 5 file untuk gedung.`);
        return;
      }

      let existingFiles = [];
      $(`.file-item-${id_row} span:first-child`).each(function() {
        existingFiles.push($(this).text().trim());
      });

      Array.from(files).forEach((file) => {
        if (!file.type.startsWith("image/") || file.size > maxSize) {
          alert(`Hanya file gambar dengan ukuran maksimal 2MB yang diperbolehkan.`);
          return;
        }

        if (existingFiles.includes(file.name)) {
          alert(`File dengan nama ${file.name} sudah ada di kategori lain.`);
          return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
          const html = `
          <div class="file-item file-item-${id_row}" data-category="${target}">
            <img src="${e.target.result}" alt="${file.name}" />
            <div class="file-details">
              <span>${file.name}</span>
              <span>${(file.size / 1024).toFixed(2)} KB</span>
            </div>
          </div>`;
          fileList.append(html);
        };
        reader.readAsDataURL(file);
      });
    }

    // Handle drag and drop
    $(".upload_office_{{ $id_row }}").on("dragover", function(e) {
      e.preventDefault();
      e.stopPropagation();
      $(this).addClass("dragging");
    });

    $(".upload_office_{{ $id_row }}").on("dragleave", function(e) {
      e.preventDefault();
      e.stopPropagation();
      $(this).removeClass("dragging");
    });

    $(".upload_office_{{ $id_row }}").on("drop", function(e) {
      e.preventDefault();
      e.stopPropagation();
      $(this).removeClass("dragging");

      const files = e.originalEvent.dataTransfer.files;
      const target = $(this).attr("id").split("-")[2]; // 'gedung' or 'denah'
      const id_row = $(this).attr("id").split("-")[3]; // Ambil id_row dari ID elemen
      handleUpload(files, target, id_row);
    });

    // Handle click upload
    $(".upload_office_{{ $id_row }}").on("click", function() {
      if (isClickedOff) return;
      isClickedOff = true;

      const target = $(this).attr("id").split("-")[2]; // 'gedung' or 'denah'
      const id_row = $(this).attr("id").split("-")[3]; // Ambil id_row dari ID elemen
      $(`#file-input-${target}-${id_row}`).click();

      setTimeout(() => {
        isClickedOff = false;
      }, 200);
    });

    // Handle file input change
    $("input[type='file']").on("change", function() {
      const target = $(this).attr("id").split("-")[2]; // 'gedung' or 'denah'
      const id_row = $(this).attr("id").split("-")[3]; // Ambil id_row dari ID elemen
      const files = this.files;
      handleUpload(files, target, id_row);
    });

    // Delete file
    // $(document).on("click", ".delete-btn", function() {
    //   $(this).closest(".file-item").remove();
    // });
  });
</script>
{{-- backend --}}
<script>
  $(document).ready(function() {
    $("[id^='penanggung_jawab_office_']").each(function() {
      var selectedOption = $(this).find(":selected");
      var posisi = selectedOption.data("position");
      var jumlahBangunan = $(this).attr("id").split("_").pop();

      if (posisi) {
        $("#posisi_penanggung_jawab_" + jumlahBangunan).val(posisi);
      }
    });

    $(".chosen-select").chosen({
      allow_single_deselect: true,
      width: "100%"
    });

    $("#regional").on("change", function() {
      var regionalId = $(this).val();
      var regionalName = $("#regional option:selected").text();
      var idRow = "{{ $id_row }}";
      var jumlahBangunan = "{{ $jumlah_bangunan }}";

      $("#regional_form_" + idRow).val(regionalName);
      $("#regional_id_" + idRow).val(regionalId);

      $.ajax({
        url: "{{ route('getPicReg') }}",
        type: "GET",
        data: {
          regional_name: regionalName
        },
        success: function(data) {
          window.staffData = data;

          var selectPJ = $("#penanggung_jawab_office_" + jumlahBangunan);

          selectPJ.empty().append('<option value="">Pilih penanggung jawab</option>');

          $.each(data, function(index, item) {
            var option = '<option value="' + item.nik + '" data-position="' + item.position_name +
              '" data-notlp="' + item.no_gsm + '" data-email="' + item.email + '">' +
              item.nik + ' - ' + item.name +
              '</option>';

            selectPJ.append(option);
          });

          selectPJ.trigger("chosen:updated");

          $(".chosen-select").chosen("destroy").chosen({
            no_results_text: "Data tidak ditemukan",
            width: "100%"
          });
        },
        error: function() {
          alert("Gagal mengambil data regional.");
        },
      });
    });

    $(document).on("change", "[id^='penanggung_jawab_office_']", function() {
      var selectedOption = $(this).find(":selected");
      var posisi = selectedOption.data("position");
      var jumlahBangunan = $(this).attr("id").split("_").pop();

      $("#posisi_penanggung_jawab_" + jumlahBangunan).val(posisi);
    });
  });
</script>

<div class="card-header pb-0">
  <h5>Detail Gudang</h5>
</div>
<div class="card-body">
  <input type="hidden" name="id_bangunan[{{ $jumlah_bangunan }}]" id="id_bangunan_{{ $jumlah_bangunan }}" value=3 />
  <input type="hidden" name="load_bangunan[{{ $id_row }}]" id="load_bangunan_{{ $id_row }}"
    value={{ $id_row }} />
  <div class="mb-3">
    <div class="col-md-12">
      <label class="form-label" for="kat_gudang_{{ $jumlah_bangunan }}">Kategori Gudang</label>
      <select class="form-select" id="kat_gudang_{{ $jumlah_bangunan }}" name="kat_gudang[{{ $jumlah_bangunan }}]"
        required="">
        <option selected="" disabled="" value="">Pilih Kategori Gudang</option>
        @foreach ($kategoriGudang as $item)
          <option value="{{ $item->kategori_gudang_id }}">{{ $item->kategori_gudang }}</option>
        @endforeach
      </select>
      <div class="invalid-feedback">Silakan pilih ketegori gudang.</div>
    </div>
  </div>
  <div class="mb-3">
    <div class="col-md-12">
      <label class="form-label" for="kode_gudang_{{ $jumlah_bangunan }}">Kode Gudang</label>
      <select class="form-control chosen-select" id="kode_gudang_{{ $jumlah_bangunan }}"
        name="kode_gudang[{{ $jumlah_bangunan }}]" required>
        <option value="">Pilih Kode Gudang</option>
      </select>
      <div class="invalid-feedback">Silahkan pilih Kode Gudang.</div>
    </div>
  </div>
  <div class="mb-3">
    <div class="col-md-12">
      <input class="form-control" id="nama_gudang_{{ $jumlah_bangunan }}" name="nama_gudang[{{ $jumlah_bangunan }}]"
        type="hidden" required />
    </div>
  </div>
  <div class="mb-3">
    <div class="col-md-12">
      <label class="form-label" for="tipe_gudang_{{ $jumlah_bangunan }}">Tipe Gudang</label>
      <select class="form-select" id="tipe_gudang_{{ $jumlah_bangunan }}" name="tipe_gudang[{{ $jumlah_bangunan }}]"
        required="">
        <option selected="" disabled="" value="">Pilih Tipe Gudang</option>
        @foreach ($tipeJenisBangunan as $item)
          <option value="{{ $item->tipe_jenis_bangunan_id }}">{{ $item->jenis_bangunan_id }}</option>
        @endforeach
      </select>
      <div class="invalid-feedback">Silakan pilih tipe gudang.</div>
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
      <label class="form-label" for="peruntukan_gudang_{{ $jumlah_bangunan }}">Peruntukan</label>
      <select class="form-select" id="peruntukan_gudang_{{ $jumlah_bangunan }}"
        name="peruntukan_gudang[{{ $jumlah_bangunan }}]" required="">
        <option selected="" disabled="" value="">Pilih peruntukan</option>
        @foreach ($peruntukan as $item)
          <option value="{{ $item->peruntukan_id }}">{{ $item->peruntukan }}</option>
        @endforeach
      </select>
      <div class="invalid-feedback">Silakan pilih peruntukan.</div>
    </div>
    <div class="col-md-6">
      <label class="form-label" for="luasan_gudang_{{ $jumlah_bangunan }}">Luasan</label>
      <input class="form-control" id="luasan_gudang_{{ $jumlah_bangunan }}"
        name="luasan_gudang[{{ $jumlah_bangunan }}]" type="number"
        oninput="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Masukan luasan gudang" required="" />
      <div class="invalid-feedback">Luasan gudang wajib diisi.</div>
    </div>
  </div>
  <div class="mb-5">
    <label class="form-label" for="koordinat_gudang_{{ $jumlah_bangunan }}">Koordinat Lokasi</label>
    <div class="d-flex">
      <input class="form-control me-2" id="koordinat_gudang_{{ $jumlah_bangunan }}"
        name="koordinat_gudang[{{ $jumlah_bangunan }}]" type="text" placeholder="Masukan koordinat lokasi"
        required="" />
      <button type="button" class="btn btn-sm btn-danger"
        id="search_lokasi_gudang_{{ $id_row }}">Search</button>
    </div>
    <div class="invalid-feedback" id="koordinat_invalid_feedback">Koordinat gudang wajib diisi.
    </div>
  </div>
  <div class="mb-3">
    <div class="map" id="map_{{ $id_row }}" style="height: 400px; width: 100%;"></div>
  </div>
  <div class="mb-3">
    <label for="file-input-gedung-{{ $id_row }}">Foto Gedung</label>
    <div class="upload-section upload_gudang_{{ $id_row }}" id="drop-zone-gedung-{{ $id_row }}">
      <i class="fas fa-upload"></i>
      <p>Drop files here or click to upload.</p>
      <p>Maks size 2MB &nbsp; | &nbsp; Maks 5 file</p>
      <input type="file" name="fotoGedung3[{{ $jumlah_bangunan }}][]" id="file-input-gedung-{{ $id_row }}"
        data-kategori="Gedung" data-tipe="3" multiple style="display: none;" accept="image/*">
    </div>
    <div class="invalid-feedback">Foto Gedung wajib diunggah.</div>
    <div class="file-list" id="file-list-gedung-{{ $id_row }}">

    </div>
  </div>
  <div class="mb-3">
    <label for="file-input-denah-{{ $id_row }}">Foto Denah Gudang</label>
    <div class="upload-section upload_gudang_{{ $id_row }}" id="drop-zone-denah-{{ $id_row }}">
      <i class="fas fa-upload"></i>
      <p>Drop files here or click to upload.</p>
      <p>Maks size 2MB &nbsp; | &nbsp; Only 1 file</p>
      <input type="file" name="fotoDenah3[{{ $jumlah_bangunan }}][]" id="file-input-denah-{{ $id_row }}"
        data-kategori="Denah" data-tipe="3" multiple style="display: none;" accept="image/*">
    </div>
    <div class="invalid-feedback">Foto Denah wajib diunggah.</div>
    <div class="file-list" id="file-list-denah-{{ $id_row }}">

    </div>
  </div>
  <div class="mb-3">
    <div class="mb-3">
      <div class="col-md-12">
        <label class="form-label" for="penanggung_jawab_gudang_{{ $jumlah_bangunan }}">Penanggung Jawab
          Gudang</label>
        <select class="form-control chosen-select" id="penanggung_jawab_gudang_{{ $jumlah_bangunan }}"
          name="penanggung_jawab_gudang[{{ $jumlah_bangunan }}]" required="">
          <option value="">Pilih penanggung jawab</option>
          @foreach ($picByReg as $pic)
            <option value="{{ $pic->nik }}" data-position="{{ $pic->position_name }}">
              {{ htmlspecialchars($pic->nik . ' - ' . str_replace('`', "'", $pic->name), ENT_QUOTES, 'UTF-8') }}
            </option>
          @endforeach
        </select>
        <div class="invalid-feedback">Silakan pilih penanggung jawab gudang.</div>
      </div>
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

  <hr>

  <div class="mb-3">
    <div class="col-md-12">
      <label class="form-label d-flex align-items-center justify-content-between header-table-{{ $id_row }}"
        for="" style="cursor: pointer;">
        <span>
          <h5 class="mb-0 text-dark fw-bold">PIC Reg</h5>
        </span>
        <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
      </label>

      <div class="row mb-3 content-table">
        <div class="col-12 mb-3">
          <label class="form-label" for="pic_reg_gudang_{{ $jumlah_bangunan }}">NIK</label>
          <select class="form-control chosen-select" id="pic_reg_gudang_{{ $jumlah_bangunan }}"
            name="pic_reg_gudang[{{ $jumlah_bangunan }}]" required="">
            <option value="">Pilih pic regional gudang</option>
            @foreach ($picByReg as $pic)
              <option value="{{ $pic->nik }}" data-position="{{ $pic->position_name }}"
                data-notlp="{{ $pic->no_gsm }}" data-email="{{ $pic->email }}">
                {{ htmlspecialchars($pic->nik . ' - ' . str_replace('`', "'", $pic->name), ENT_QUOTES, 'UTF-8') }}
              </option>
            @endforeach
          </select>
          <div class="invalid-feedback">Silakan pilih pic regional.</div>
        </div>

        <div class="col-12 mb-3">
          <label class="form-label" for="posisi_reg_gudang_{{ $jumlah_bangunan }}">Posisi Jabatan</label>
          <input class="form-control" id="posisi_reg_gudang_{{ $jumlah_bangunan }}"
            name="posisi_reg_gudang[{{ $jumlah_bangunan }}]" type="text" readonly />
        </div>

        <div class="col-12">
          <div class="row g-2">
            <div class="col-sm-6">
              <label class="form-label" for="tlp_reg_gudang_{{ $jumlah_bangunan }}">No Telepon</label>
              <input class="form-control" id="tlp_reg_gudang_{{ $jumlah_bangunan }}"
                name="tlp_reg_gudang[{{ $jumlah_bangunan }}]" type="text" readonly />
            </div>
            <div class="col-sm-6">
              <label class="form-label" for="email_reg_gudang_{{ $jumlah_bangunan }}">Email</label>
              <input class="form-control" id="email_reg_gudang_{{ $jumlah_bangunan }}"
                name="email_reg_gudang[{{ $jumlah_bangunan }}]" type="text" readonly />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <hr>

  <div class="mb-3">
    <div class="col-md-12">
      <label class="form-label d-flex align-items-center justify-content-between header-table-{{ $id_row }}"
        for="" style="cursor: pointer;">
        <span>
          <h5 class="mb-0 text-dark fw-bold">PIC SS</h5>
        </span>
        <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
      </label>

      <div class="row mb-3 content-table">
        <div class="col-12 mb-3">
          <label class="form-label" for="pic_ss_gudang_{{ $jumlah_bangunan }}">NIK</label>
          <select class="form-control chosen-select" id="pic_ss_gudang_{{ $jumlah_bangunan }}"
            name="pic_ss_gudang[{{ $jumlah_bangunan }}]" required="">
            <option value="">Pilih pic ss gudang</option>
            @foreach ($picByReg as $pic)
              <option value="{{ $pic->nik }}" data-position="{{ $pic->position_name }}"
                data-notlp="{{ $pic->no_gsm }}" data-email="{{ $pic->email }}">
                {{ htmlspecialchars($pic->nik . ' - ' . str_replace('`', "'", $pic->name), ENT_QUOTES, 'UTF-8') }}
              </option>
            @endforeach
          </select>
          <div class="invalid-feedback">Silakan pilih pic ss.</div>
        </div>

        <div class="col-12 mb-3">
          <label class="form-label" for="posisi_ss_gudang_{{ $jumlah_bangunan }}">Posisi Jabatan</label>
          <input class="form-control" id="posisi_ss_gudang_{{ $jumlah_bangunan }}"
            name="posisi_ss_gudang[{{ $jumlah_bangunan }}]" type="text" readonly />
        </div>

        <div class="col-12">
          <div class="row g-2">
            <div class="col-sm-6">
              <label class="form-label" for="tlp_ss_gudang_{{ $jumlah_bangunan }}">No Telepon</label>
              <input class="form-control" id="tlp_ss_gudang_{{ $jumlah_bangunan }}"
                name="tlp_ss_gudang[{{ $jumlah_bangunan }}]" type="text" readonly />
            </div>
            <div class="col-sm-6">
              <label class="form-label" for="email_ss_gudang_{{ $jumlah_bangunan }}">Email</label>
              <input class="form-control" id="email_ss_gudang_{{ $jumlah_bangunan }}"
                name="email_ss_gudang[{{ $jumlah_bangunan }}]" type="text" readonly />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <hr>

  <div class="mb-3">
    <div class="col-md-12">
      <label class="form-label d-flex align-items-center justify-content-between header-table-{{ $id_row }}"
        for="" style="cursor: pointer;">
        <span>
          <h5 class="mb-0 text-dark fw-bold">Team Leader</h5>
        </span>
        <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
      </label>

      <div class="row mb-3 content-table">
        <div class="col-12 mb-3">
          <label class="form-label" for="nik_tl_gudang_{{ $jumlah_bangunan }}">NIK</label>
          <select class="form-control chosen-select" id="nik_tl_gudang_{{ $jumlah_bangunan }}"
            name="nik_tl_gudang[{{ $jumlah_bangunan }}]" required="">
            <option value="">Pilih Team Leader</option>
            @foreach ($picByReg as $pic)
              <option value="{{ $pic->nik }}" data-position="{{ $pic->position_name }}"
                data-notlp="{{ $pic->no_gsm }}" data-email="{{ $pic->email }}">
                {{ htmlspecialchars($pic->nik . ' - ' . str_replace('`', "'", $pic->name), ENT_QUOTES, 'UTF-8') }}
              </option>
            @endforeach
          </select>
          <div class="invalid-feedback">Silakan pilih team leader.</div>
        </div>

        <div class="col-12 mb-3">
          <label class="form-label" for="posisi_tl_gudang_{{ $jumlah_bangunan }}">Posisi Jabatan</label>
          <input class="form-control" id="posisi_tl_gudang_{{ $jumlah_bangunan }}"
            name="posisi_tl_gudang[{{ $jumlah_bangunan }}]" type="text" readonly />
        </div>

        <div class="col-12">
          <div class="row g-2">
            <div class="col-sm-6">
              <label class="form-label" for="tlp_tl_gudang_{{ $jumlah_bangunan }}">No Telepon</label>
              <input class="form-control" id="tlp_tl_gudang_{{ $jumlah_bangunan }}"
                name="tlp_tl_gudang[{{ $jumlah_bangunan }}]" type="text" readonly />
            </div>
            <div class="col-sm-6">
              <label class="form-label" for="email_tl_gudang_{{ $jumlah_bangunan }}">Email</label>
              <input class="form-control" id="email_tl_gudang_{{ $jumlah_bangunan }}"
                name="email_tl_gudang[{{ $jumlah_bangunan }}]" type="text" readonly />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <hr>

  <div class="mb-3">
    <div class="col-md-12">
      <label class="form-label d-flex align-items-center justify-content-between" for="">
        <h5 class="mb-0 text-dark fw-bold">Staff Gudang</h5>
        <button class="btn btn-outline-danger btn-sm ms-auto tambahStaf_{{ $id_row }}" type="button"
          id="tambahStaf_{{ $id_row }}" name="tambahStaf_{{ $id_row }}">Tambah</button>
        <button class="btn btn-outline-danger btn-sm ms-2 hapusGudang_{{ $id_row }}" type="button"
          id="hapusGudang_{{ $id_row }}" name="hapusGudang_{{ $id_row }}">Hapus</button>
      </label>

      <div id="gudangContainer_{{ $id_row }}">
        <div class="gudang-instance_{{ $id_row }} mb-5" id="form_staf_{{ $jumlah_bangunan }}_0">
          <label class="form-label d-flex align-items-center header-input-gudang-{{ $id_row }}" for=""
            style="cursor: pointer;">
            <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
            <span class="ms-2">
              <h5 class="mb-0 text-dark fw-bold">Staf Gudang 1</h5>
            </span>
          </label>

          <div class="gudang-details_{{ $id_row }}">
            <div class="col-12 mb-3">
              <label class="form-label" for="staff_gudang_{{ $jumlah_bangunan }}_0">NIK</label>
              <select class="form-control chosen-select" id="staff_gudang_{{ $jumlah_bangunan }}_0"
                name="staff_gudang[{{ $jumlah_bangunan }}][0][]" required>
                <option selected value="">Pilih petugas gudang</option>
                @foreach ($picByReg as $pic)
                  <option value="{{ $pic->nik }}" data-position="{{ $pic->position_name }}"
                    data-notlp="{{ $pic->no_gsm }}" data-email="{{ $pic->email }}">
                    {{ htmlspecialchars($pic->nik . ' - ' . str_replace('`', "'", $pic->name), ENT_QUOTES, 'UTF-8') }}
                  </option>
                @endforeach
              </select>
              <div class="invalid-feedback">Silakan pilih petugas gudang.</div>
            </div>

            <div class="col-12 mb-3">
              <label class="form-label" for="posisi_staff_gudang_{{ $jumlah_bangunan }}_0">Posisi Jabatan</label>
              <input class="form-control" id="posisi_staff_gudang_{{ $jumlah_bangunan }}_0"
                name="posisi_staff_gudang[{{ $jumlah_bangunan }}][0][]" type="text" readonly />
            </div>

            <div class="col-12">
              <div class="row g-2">
                <div class="col-sm-6">
                  <label class="form-label" for="tlp_staff_gudang_{{ $jumlah_bangunan }}_0">No Telepon</label>
                  <input class="form-control" id="tlp_staff_gudang_{{ $jumlah_bangunan }}_0"
                    name="tlp_staff_gudang[{{ $jumlah_bangunan }}][0][]" type="text" readonly />
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="email_staff_gudang_{{ $jumlah_bangunan }}_0">Email</label>
                  <input class="form-control" id="email_staff_gudang_{{ $jumlah_bangunan }}_0"
                    name="email_staff_gudang[{{ $jumlah_bangunan }}][0][]" type="text" readonly />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
</div>

{{-- validasi, maps --}}
<script>
  $(document).ready(function() {
    function initializeMap(mapContainer) {
      let mapId = mapContainer.attr("id");
      if (mapContainer.data("leafletMap")) {
        let oldMap = mapContainer.data("leafletMap");
        oldMap.eachLayer(layer => oldMap.removeLayer(layer));
        oldMap.remove();
        mapContainer.removeData("leafletMap");
        mapContainer.empty();
      }

      let map = L.map(mapContainer[0], {
        fullscreenControl: true,
        fullscreenControlOptions: {
          position: 'topright'
        }
      }).setView([-2.5489, 118.0149], 5);

      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: '&copy; OpenStreetMap contributors',
      }).addTo(map);

      mapContainer.data("leafletMap", map);

      setTimeout(() => map.invalidateSize(), 300);
    }

    function searchLocation(button, jumlahBangunan) {
      var indexId = button.attr('id');
      let prefix = indexId.split("_")[2];
      let idRow = indexId.split("_")[3];
      let koordinatInputId = `koordinat_${prefix}_${jumlahBangunan}`;
      let inputKoordinat = $(`#${koordinatInputId}`);
      let mapContainer = $(`#map_${idRow}`);
      let koordinat = inputKoordinat.val().trim();

      if (koordinat === "") {
        alert('Silakan masukkan koordinat.');
        inputKoordinat.addClass("is-invalid");
        return;
      }

      let coords = koordinat.split(",");
      if (coords.length !== 2) {
        alert("Format koordinat tidak valid! Gunakan format: lat,lng");
        inputKoordinat.addClass('is-invalid');
        return;
      }

      let lat = parseFloat(coords[0].trim());
      let lng = parseFloat(coords[1].trim());

      if (isNaN(lat) || isNaN(lng) || lat < -90 || lat > 90 || lng < -180 || lng > 180) {
        alert('Koordinat tidak valid.');
        inputKoordinat.addClass('is-invalid');
        return;
      }

      inputKoordinat.removeClass("is-invalid").addClass('is-valid');

      if (mapContainer.data("leafletMap")) {
        let oldMap = mapContainer.data("leafletMap");
        oldMap.eachLayer(layer => oldMap.removeLayer(layer));
        oldMap.remove();
        mapContainer.off();
        mapContainer.removeData("leafletMap");
        mapContainer.empty();
      }

      let map = L.map(mapContainer[0], {
        fullscreenControl: true,
        fullscreenControlOptions: {
          position: 'topright'
        }
      }).setView([lat, lng], 17);

      mapContainer.data("leafletMap", map);

      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: '&copy; OpenStreetMap contributors',
      }).addTo(map);

      let marker = L.marker([lat, lng]).addTo(map)
        .bindPopup(`Lokasi yang dipilih <br>${lat}, ${lng}`)
        .openPopup();

      mapContainer.data("marker", marker);

      setTimeout(() => map.invalidateSize(), 300);
    }

    // Inisialisasi semua peta yang ada di halaman
    $("[id^='map_{{ $id_row }}']").each(function() {
      initializeMap($(this));
    });

    // Event listener untuk pencarian lokasi
    $(document).on("click", "[id^='search_lokasi_gudang_{{ $id_row }}']", function() {
      searchLocation($(this), {{ $jumlah_bangunan }});
    });
  });

  function validateForm() {
    let isValid = true;

    const fields = [
      // {
      //   id: 'nama_gudang_{{ $jumlah_bangunan }}',
      //   message: 'Nama gudang wajib diisi.'
      // },
      {
        selector: "select[id^='kat_gudang']",
        message: 'Silakan pilih kategori gudang.'
      },
      {
        selector: "select[id^='kode_gudang']",
        message: 'Silakan pilih kode gudang.'
      },
      {
        selector: "select[id^='tipe_gudang']",
        message: 'Silakan pilih tipe gudang.'
      },
      {
        selector: "select[id^='peruntukan_gudang']",
        message: 'Silakan pilih peruntukan.'
      },
      {
        selector: "input[id^='luasan_gudang']",
        message: 'Luasan gudang wajib diisi.'
      },
      {
        selector: "input[id^='koordinat_gudang']",
        message: 'Koordinat gudang wajib diisi.'
      },
      {
        selector: "input[id^='file-input-gedung']",
        message: 'Foto gedung wajib diunggah.'
      },
      {
        selector: "input[id^='file-input-denah']",
        message: 'Foto denah wajib diunggah.'
      },
      {
        selector: "select[id^='penanggung_jawab_gudang']",
        message: 'Penanggung Jawab Gudang wajib diisi.'
      },
      {
        selector: "select[id^='pic_reg_gudang']",
        message: 'Silakan pilih pic regional.'
      },
      {
        selector: "select[id^='pic_ss_gudang']",
        message: 'Silakan pilih pic regional.'
      },
      {
        selector: "select[id^='nik_tl_gudang']",
        message: 'Silakan pilih team leader.'
      },
      {
        selector: "select[id^='staff_gudang']",
        message: 'Silakan pilih staff gudang.'
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

  $(document).on("input change", "input, select", function() {
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
    let isClickedGudang = false;

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
    $(".upload_gudang_{{ $id_row }}").on("dragover", function(e) {
      e.preventDefault();
      e.stopPropagation();
      $(this).addClass("dragging");
    });

    $(".upload_gudang_{{ $id_row }}").on("dragleave", function(e) {
      e.preventDefault();
      e.stopPropagation();
      $(this).removeClass("dragging");
    });

    $(".upload_gudang_{{ $id_row }}").on("drop", function(e) {
      e.preventDefault();
      e.stopPropagation();
      $(this).removeClass("dragging");

      const files = e.originalEvent.dataTransfer.files;
      const target = $(this).attr("id").split("-")[2]; // 'gedung' or 'denah'
      const id_row = $(this).attr("id").split("-")[3]; // Ambil id_row dari ID elemen
      handleUpload(files, target, id_row);
    });

    // Handle click upload
    $(".upload_gudang_{{ $id_row }}").on("click", function() {
      if (isClickedGudang) return;
      isClickedGudang = true;

      const target = $(this).attr("id").split("-")[2]; // 'gedung' or 'denah'
      const id_row = $(this).attr("id").split("-")[3]; // Ambil id_row dari ID elemen
      $(`#file-input-${target}-${id_row}`).click();

      setTimeout(() => {
        isClickedGudang = false;
      }, 200);
    });

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
{{-- toggle, staff gudang --}}
<script>
  $(document).on('click', '.header-input-gudang-{{ $id_row }}, .header-table-{{ $id_row }}', function(
    e) {
    if ($(e.target).closest('.form-check, input').length) {
      return;
    }

    var collapsibleContent = $(this).closest('.gudang-instance_{{ $id_row }}').find(
      '.gudang-details_{{ $id_row }}');
    if ($(this).hasClass('header-table-{{ $id_row }}')) {
      collapsibleContent = $(this).next('.content-table');
    }
    collapsibleContent.toggle();

    var toggleIcon = $(this).find('.toggle-icon');
    toggleIcon.toggleClass('fa-angle-right fa-angle-down');
  });

  // Tambah Staf Gudang
  $(document).off("click", "#tambahStaf_{{ $id_row }}").on("click", "#tambahStaf_{{ $id_row }}",
    function() {
      let idRow = $(this).attr("id").split("_")[1];
      let bangunanGudang = {{ $jumlah_bangunan ?? 0 }};
      let gudangContainer = `#gudangContainer_${idRow}`;
      let roomCount = $(`${gudangContainer} .gudang-instance_${idRow}`).length;
      let newStaffHtml = `
     <div class="gudang-instance_${idRow} mb-5" id="form_staf_${bangunanGudang}_${roomCount}">
       <label class="form-label d-flex align-items-center header-input-gudang-${idRow}" for=""
         style="cursor: pointer;">
         <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
         <span class="ms-2">
           <h5 class="mb-0 text-dark fw-bold">Staf Gudang ${roomCount + 1}</h5>
         </span>
       </label>

       <div class="gudang-details_${idRow}">
         <div class="col-12 mb-3">
           <label class="form-label" for="staff_gudang_${bangunanGudang}_${roomCount}">NIK</label>
           <select class="form-control chosen-select" id="staff_gudang_${bangunanGudang}_${roomCount}" name="staff_gudang[${bangunanGudang}][${roomCount}][]" required>
             <option selected value="">Pilih petugas gudang</option>
             @foreach ($picByReg as $pic)
               <option value="{{ $pic->nik }}" data-position="{{ $pic->position_name }}" data-notlp="{{ $pic->no_gsm }}" data-email="{{ $pic->email }}">
                    {{ htmlspecialchars($pic->nik . ' - ' . str_replace('`', '\`', $pic->name), ENT_QUOTES, 'UTF-8') }}
               </option>
             @endforeach
           </select>
           <div class="invalid-feedback">Silakan pilih petugas gudang.</div>
         </div>

         <div class="col-12 mb-3">
           <label class="form-label" for="posisi_staff_gudang_${bangunanGudang}_${roomCount}">Posisi Jabatan</label>
           <input class="form-control" id="posisi_staff_gudang_${bangunanGudang}_${roomCount}" name="posisi_staff_gudang[${bangunanGudang}][${roomCount}][]" type="text" readonly />
         </div>

         <div class="col-12">
           <div class="row g-2">
             <div class="col-sm-6">
               <label class="form-label" for="tlp_staff_gudang_${bangunanGudang}_${roomCount}">No Telepon</label>
               <input class="form-control" id="tlp_staff_gudang_${bangunanGudang}_${roomCount}" name="tlp_staff_gudang[${bangunanGudang}][${roomCount}][]" type="text" readonly />
             </div>
             <div class="col-sm-6">
               <label class="form-label" for="email_staff_gudang_${bangunanGudang}_${roomCount}">Email</label>
               <input class="form-control" id="email_staff_gudang_${bangunanGudang}_${roomCount}" name="email_staff_gudang[${bangunanGudang}][${roomCount}][]" type="text" readonly />
             </div>
           </div>
         </div>
       </div>
     </div>
   `;

      $(gudangContainer).append(newStaffHtml);

      var staffData = @json($picByReg);
      let newSelect = $(`#staff_gudang_${bangunanGudang}_${roomCount}`);
      newSelect.empty().append('<option value="">Pilih Staff Gudang</option>');

      $.each(staffData, function(index, item) {
        var option = `<option value="${item.nik}" data-position="${item.position_name}"
                data-notlp="${item.no_gsm}" data-email="${item.email}">
                ${item.nik} - ${item.name}
                </option>`;
        newSelect.append(option);
      });

      newSelect.chosen("destroy").chosen({
        width: "100%"
      }).trigger("chosen:updated");

      updateStaffNumbers(idRow);
      hiddenButtons(idRow);
    });

  $(document).on("click", "#hapusGudang_{{ $id_row }}", function() {
    let idRow = $(this).attr("id").split("_")[1];
    let gudangContainer = `#gudangContainer_${idRow}`;
    let totalStaff = $(`${gudangContainer} .gudang-instance_${idRow}`).length;

    if (totalStaff > 1) {
      $(`${gudangContainer} .gudang-instance_${idRow}`).last().remove();
      updateStaffNumbers(idRow);
    }
    hiddenButtons(idRow);
  });

  function updateStaffNumbers(idRow) {
    $(`#gudangContainer_${idRow} .gudang-instance_${idRow}`).each(function(index) {
      $(this).find("h5").text("Staf Gudang " + (index + 1));
    });
  }

  function hiddenButtons(idRow) {
    let totalStaff = $(`#gudangContainer_${idRow} .gudang-instance_${idRow}`).length;

    if (totalStaff <= 1) {
      $(`.hapusGudang_${idRow}`).prop("disabled", true);
    } else {
      $(`.hapusGudang_${idRow}`).prop("disabled", false);
    }
  }
</script>
{{-- backend --}}
<script>
  $(document).ready(function() {
    var staffData = [];

    $("[id^='penanggung_jawab_gudang_']").each(function() {
      var selectedOption = $(this).find(":selected");
      var posisi = selectedOption.data("position");
      var jumlahBangunan = $(this).attr("id").split("_").pop();

      if (posisi) {
        $("#posisi_penanggung_jawab_" + jumlahBangunan).val(posisi);
      }
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

          var selectPJ = $("#penanggung_jawab_gudang_" + jumlahBangunan);
          var selectPR = $("#pic_reg_gudang_" + jumlahBangunan);
          var selectSS = $("#pic_ss_gudang_" + jumlahBangunan);
          var selectTL = $("#nik_tl_gudang_" + jumlahBangunan);
          var selectStaff = $("[id^='staff_gudang_" + jumlahBangunan + "_']");

          selectPJ.empty().append('<option value="">Pilih penanggung jawab</option>');
          selectPR.empty().append('<option value="">Pilih pic regional gudang</option>');
          selectSS.empty().append('<option value="">Pilih pic ss gudang</option>');
          selectTL.empty().append('<option value="">Pilih Team Leader</option>');
          selectStaff.empty().append('<option value="">Pilih Staff Gudang</option>');

          $.each(data, function(index, item) {
            var option = '<option value="' + item.nik + '" data-position="' + item.position_name +
              '" data-notlp="' + item.no_gsm + '" data-email="' + item.email + '">' +
              item.nik + ' - ' + item.name +
              '</option>';

            selectPJ.append(option);
            selectPR.append(option);
            selectSS.append(option);
            selectTL.append(option);
            selectStaff.append(option);
          });

          selectPJ.trigger("chosen:updated");
          selectPR.trigger("chosen:updated");
          selectSS.trigger("chosen:updated");
          selectTL.trigger("chosen:updated");
          selectStaff.trigger(
            "chosen:updated");

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

    $(document).off('change', '[id^=kat_gudang_]').on('change', '[id^=kat_gudang_]', function() {
      let kategoriGudang = $(this).val();
      let regionalId = $('input[name="regional_id"]').val();
      let regionalName = $('input[name="regional_form"]').val();
      //   let match = name.match(/\b(HO|[IVXLCDM]+|\d+)\b/i);
      //   let regionalName = match ? match[1] : "";
      let nomorBangunan = $(this).attr("id").split("_").pop();
      let dropdown = $("#kode_gudang_" + nomorBangunan);

      $.ajax({
        url: "{{ route('getKodeGudang') }}",
        type: "GET",
        data: {
          kategori: kategoriGudang,
          regionalId: regionalId,
          regionalName: regionalName
        },
        success: function(response) {
          if (response.success) {
            dropdown.empty();
            dropdown.append('<option value="">Pilih Kode Gudang</option>');

            $.each(response.data, function(index, item) {
              dropdown.append('<option value="' + item.kode_gudang + '">' + item.kode_gudang +
                ' - ' +
                item.nama_gudang + '</option>');
            });

            dropdown.trigger("chosen:updated");
          } else {
            alert(response.message);
          }
        },
        error: function() {
          alert('Terjadi kesalahan saat mengambil data.');
        }
      });
    });

    $(document).on("change", "[id^=kode_gudang_]", function() {
      let nomorBangunan = $(this).attr("id").split("_").pop();
      let selectedText = $("#kode_gudang_" + nomorBangunan + " option:selected").text();

      let parts = selectedText.split(" - ");
      let namaGudang = parts.length > 1 ? parts[1] : "";

      $("#nama_gudang_" + nomorBangunan).val(namaGudang);
    });

    $(document).on("change", "[id^='penanggung_jawab_gudang_']", function() {
      var selectedOption = $(this).find(":selected");
      var posisi = selectedOption.data("position");
      var jumlahBangunan = $(this).attr("id").split("_").pop();

      $("#posisi_penanggung_jawab_" + jumlahBangunan).val(posisi);
    });

    $(document).on("change", "[id^='pic_reg_gudang_']", function() {
      var selectedOption = $(this).find(":selected");
      var posisi = selectedOption.data("position");
      var notlp = selectedOption.data("notlp");
      var email = selectedOption.data("email");
      var jumlahBangunan = $(this).attr("id").split("_").pop();

      $("#posisi_reg_gudang_" + jumlahBangunan).val(posisi);
      $("#tlp_reg_gudang_" + jumlahBangunan).val(notlp);
      $("#email_reg_gudang_" + jumlahBangunan).val(email);
    });

    $(document).on("change", "[id^='pic_ss_gudang_']", function() {
      var selectedOption = $(this).find(":selected");
      var posisi = selectedOption.data("position");
      var notlp = selectedOption.data("notlp");
      var email = selectedOption.data("email");
      var jumlahBangunan = $(this).attr("id").split("_").pop();

      $("#posisi_ss_gudang_" + jumlahBangunan).val(posisi);
      $("#tlp_ss_gudang_" + jumlahBangunan).val(notlp);
      $("#email_ss_gudang_" + jumlahBangunan).val(email);
    });

    $(document).on("change", "[id^='nik_tl_gudang_']", function() {
      var selectedOption = $(this).find(":selected");
      var posisi = selectedOption.data("position");
      var notlp = selectedOption.data("notlp");
      var email = selectedOption.data("email");
      var jumlahBangunan = $(this).attr("id").split("_").pop();

      $("#posisi_tl_gudang_" + jumlahBangunan).val(posisi);
      $("#tlp_tl_gudang_" + jumlahBangunan).val(notlp);
      $("#email_tl_gudang_" + jumlahBangunan).val(email);
    });

    $(document).on("change", "[id^='staff_gudang_']", function() {
      var selectedOption = $(this).find(":selected");
      var posisi = selectedOption.data("position");
      var notlp = selectedOption.data("notlp");
      var email = selectedOption.data("email");
      var idParts = $(this).attr("id").split("_");
      var jumlahBangunan = idParts[2];
      var idRow = idParts[3];

      $("#posisi_staff_gudang_" + jumlahBangunan + "_" + idRow).val(posisi);
      $("#tlp_staff_gudang_" + jumlahBangunan + "_" + idRow).val(notlp);
      $("#email_staff_gudang_" + jumlahBangunan + "_" + idRow).val(email);
    });

    $(".chosen-select").chosen({
      no_results_text: "Tidak ada hasil ditemukan",
      width: "100%"
    });
  });
</script>

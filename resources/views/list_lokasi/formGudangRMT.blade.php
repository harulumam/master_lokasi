<div class="card-body">
  <div id="formContainer">
    <input type="hidden" name="id_bangunan[{{ $jumlah_bangunan }}]" id="id_bangunan_{{ $jumlah_bangunan }}" value=3 />
    <input type="hidden" name="load_bangunan[{{ $id_row }}]" id="load_bangunan_{{ $id_row }}"
      value={{ $id_row }} />
    <div class="mb-3 form_rmt_instance_{{ $id_row }}" id="form_rmt_{{ $jumlah_bangunan }}_0">
      <div class="row mb-3">
        <label class="form-label d-flex align-items-center rmt_gudang_{{ $id_row }}" for=""
          style="cursor: pointer;">
          <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
          <span class="ms-2">
            <h5 class="mb-0 text-dark fw-bold small">Gudang RMT</h5>
          </span>
          <button class="btn btn-outline-danger small ms-auto hapusRMT_{{ $id_row }}" type="button"
            id="hapusRMT_{{ $id_row }}" name="hapusRMT_{{ $id_row }}">Hapus</button>
        </label>
        <div class="content_input_rmt">
          <div class="row mb-3">
            <div class="col-md-12">
              <label class="form-label" for="kode_rmt_{{ $jumlah_bangunan }}_0">Kode Gudang</label>
              <input class="form-control" id="kode_rmt_{{ $jumlah_bangunan }}_0"
                name="kode_rmt[{{ $jumlah_bangunan }}][0]" type="text" disabled />
              <input type="hidden" class="form-select" id="regional_form_{{ $id_row }}" name="regional_form"
                value="{{ $namaRegional }}" disabled />
              <input type="hidden" class="form-select" id="regional_id_{{ $id_row }}" name="regional_id"
                value="{{ $idRegional }}" disabled />
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-12">
              <label class="form-label" for="nama_rmt_{{ $jumlah_bangunan }}_0">Nama Gudang</label>
              <input class="form-control" id="nama_rmt_{{ $jumlah_bangunan }}_0"
                name="nama_rmt[{{ $jumlah_bangunan }}][0]" type="text" placeholder="Masukan nama gudang"
                required="" />
              <div class="invalid-feedback">Nama gudang rmt wajib diisi.</div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label" for="alamat_rmt_{{ $jumlah_bangunan }}_0">Alamat</label>
            <textarea class="form-control" id="alamat_rmt_{{ $jumlah_bangunan }}_0" name="alamat_rmt[{{ $jumlah_bangunan }}][0]"
              placeholder="Masukan alamat" required=""></textarea>
            <div class="invalid-feedback">Alamat wajib diisi.</div>
          </div>

          <div class="mb-5">
            <label class="form-label" for="koordinat_rmt_{{ $jumlah_bangunan }}_0">Koordinat Lokasi</label>
            <div class="d-flex">
              <input class="form-control me-2" id="koordinat_rmt_{{ $jumlah_bangunan }}_0"
                name="koordinat_rmt[{{ $jumlah_bangunan }}][0]" type="text" placeholder="Masukan koordinat lokasi"
                required="" />
              <button type="button" class="btn btn-sm btn-danger"
                id="search_lokasi_rmt_{{ $jumlah_bangunan }}_0">Search</button>
            </div>
            <div class="invalid-feedback" id="koordinat_invalid_feedback">Koordinat gudang wajib diisi.
            </div>
          </div>
          <div class="mb-3">
            <div class="map" id="map_{{ $jumlah_bangunan }}_0" style="height: 400px; width: 100%;"></div>
          </div>

          <hr>


          <div class="mb-3">
            <div class="col-md-12">
              <label class="form-label d-flex align-items-center justify-content-between" for="">
                <h5 class="mb-0 text-dark fw-bold">PIC Gudang</h5>
                <button class="btn btn-outline-danger btn-sm ms-auto tambahPIC_{{ $id_row }}" type="button"
                  id="tambahPIC_{{ $jumlah_bangunan }}_0" name="tambahPIC_{{ $id_row }}">Tambah</button>
                <button class="btn btn-outline-danger btn-sm ms-2 hapusPIC_{{ $id_row }}" type="button"
                  id="hapusPIC_{{ $jumlah_bangunan }}_0" name="hapusPIC_{{ $id_row }}">Hapus</button>
              </label>
            </div>
          </div>

          <div class="picContainer_{{ $id_row }} div-content-table" id="picContainer_{{ $jumlah_bangunan }}_0"
            data-pic-count="0">
            <div class="pic_rmt_instance_{{ $id_row }} mb-5" id="form_pic_{{ $jumlah_bangunan }}_0_0">
              <label class="form-label d-flex align-items-center pic_gudang_rmt_{{ $id_row }}" for=""
                style="cursor: pointer;">
                <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
                <span class="ms-2">
                  <h5 class="mb-0 text-dark fw-bold">PIC Gudang 1</h5>
                </span>
              </label>

              <div class="pic_details">
                <div class="col-12 mb-3">
                  <label class="form-label" for="nik_tl_rmt_{{ $jumlah_bangunan }}_0_0">NIK</label>
                  <select class="form-control chosen-select" id="nik_tl_rmt_{{ $jumlah_bangunan }}_0_0"
                    name="nik_tl_rmt[{{ $jumlah_bangunan }}][0][]" required>
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
                  <label class="form-label" for="posisi_tl_rmt_{{ $jumlah_bangunan }}_0_0">Posisi Jabatan</label>
                  <input class="form-control" id="posisi_tl_rmt_{{ $jumlah_bangunan }}_0_0"
                    name="posisi_tl_rmt[{{ $jumlah_bangunan }}][0][]" type="text" readonly />
                </div>

                <div class="col-12">
                  <div class="row g-2">
                    <div class="col-sm-6">
                      <label class="form-label" for="tlp_tl_rmt_{{ $jumlah_bangunan }}_0_0">No Telepon</label>
                      <input class="form-control" id="tlp_tl_rmt_{{ $jumlah_bangunan }}_0_0"
                        name="tlp_tl_rmt[{{ $jumlah_bangunan }}][0][]" type="text" readonly />
                    </div>
                    <div class="col-sm-6">
                      <label class="form-label" for="email_tl_rmt_{{ $jumlah_bangunan }}_0_0">Email</label>
                      <input class="form-control" id="email_tl_rmt_{{ $jumlah_bangunan }}_0_0"
                        name="email_tl_rmt[{{ $jumlah_bangunan }}][0][]" type="text" readonly />
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
      <div class="tambahFromRMT_{{ $id_row }}"></div>
    </div>
  </div>
  <button class="btn btn-outline-danger col-md-12" type="button" id="tambahRMT_{{ $id_row }}"
    name="tambahRMT_{{ $id_row }}">Tambah Gudang
    RMT</button>
</div>

{{-- validasi --}}
<script>
  function validateForm() {
    let isValid = true;

    const fields = [{
        selector: "input[id^='nama_rmt']",
        message: "Nama wajib diisi."
      },
      {
        selector: "textarea[id^='alamat_rmt']",
        message: "Alamat wajib diisi."
      },
      {
        selector: "input[id^='koordinat_rmt']",
        message: "Koordinat wajib diisi."
      },
      {
        selector: "select[id^='nik_tl_rmt']",
        message: "Silakan pilih NIK PIC Gudang."
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

    return isValid;
  }

  $(document).on("input change", "input, select, textarea", function() {
    $(this).removeClass("is-invalid");
    $(this).siblings(".invalid-feedback").hide();
  });
</script>
{{-- duplikat form, toggle, hapus --}}
<script>
  $(document).ready(function() {
    hiddenButtons();
    // Tambah RMT
    let bangunanRMT = {{ $jumlah_bangunan }};
    let ruanganRMT = $('.form_rmt_instance_{{ $id_row }}').length - 1;
    // initializeMapIfNeeded(bangunanRMT, ruanganRMT);
    // let counterMap = 0;

    // Tambah Ruangan
    $('#tambahRMT_{{ $id_row }}').click(function() {
      hiddenButtons();
      //   let idRow = $(this).attr("id").split("_")[1];
      ruanganRMT = $('.form_rmt_instance_{{ $id_row }}').length;
      //   let newRMT = $(`#form_rmt_${bangunanRMT}_0`).clone();
      let newRMT = `
      <div class="mb-3 form_rmt_instance_{{ $id_row }}" id="form_rmt_${bangunanRMT}_${ruanganRMT}">
        <div class="row mb-3">
            <label class="form-label d-flex align-items-center rmt_gudang_{{ $id_row }}" for=""
            style="cursor: pointer;">
            <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
            <span class="ms-2">
                <h5 class="mb-0 text-dark fw-bold small">Gudang RMT</h5>
            </span>
            <button class="btn btn-outline-danger small ms-auto hapusRMT_{{ $id_row }}" type="button"
                id="hapusRMT_{{ $id_row }}" name="hapusRMT_{{ $id_row }}">Hapus</button>
            </label>
            <div class="content_input_rmt">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label" for="kode_rmt_${bangunanRMT}_${ruanganRMT}">Kode Gudang</label>
                        <input class="form-control" id="kode_rmt_${bangunanRMT}_${ruanganRMT}"
                            name="kode_rmt[${bangunanRMT}][${ruanganRMT}]" type="text" disabled />
                        <input type="hidden" class="form-select" id="regional_form_{{ $id_row }}" name="regional_form"
                            value="{{ $namaRegional }}" disabled />
                        <input type="hidden" class="form-select" id="regional_id_{{ $id_row }}" name="regional_id"
                            value="{{ $idRegional }}" disabled />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label" for="nama_rmt_${bangunanRMT}_${ruanganRMT}">Nama Gudang</label>
                        <input class="form-control" id="nama_rmt_${bangunanRMT}_${ruanganRMT}"
                            name="nama_rmt[${bangunanRMT}][${ruanganRMT}]" type="text" placeholder="Masukan nama gudang"
                            required="" />
                        <div class="invalid-feedback">Nama gudang rmt wajib diisi.</div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="alamat_rmt_${bangunanRMT}_${ruanganRMT}">Alamat</label>
                    <textarea class="form-control" id="alamat_rmt_${bangunanRMT}_${ruanganRMT}" name="alamat_rmt[${bangunanRMT}][${ruanganRMT}]"
                    placeholder="Masukan alamat" required=""></textarea>
                    <div class="invalid-feedback">Alamat wajib diisi.</div>
                </div>

                <div class="mb-5">
                    <label class="form-label" for="koordinat_rmt_${bangunanRMT}_${ruanganRMT}">Koordinat Lokasi</label>
                    <div class="d-flex">
                        <input class="form-control me-2" id="koordinat_rmt_${bangunanRMT}_${ruanganRMT}"
                            name="koordinat_rmt[${bangunanRMT}][${ruanganRMT}]" type="text" placeholder="Masukan koordinat lokasi"
                            required="" />
                        <button type="button" class="btn btn-sm btn-danger"
                            id="search_lokasi_rmt_${bangunanRMT}_${ruanganRMT}">Search</button>
                    </div>
                    <div class="invalid-feedback" id="koordinat_invalid_feedback">Koordinat gudang wajib diisi.
                    </div>
                </div>
                <div class="mb-3">
                    <div class="map" id="map_${bangunanRMT}_${ruanganRMT}" style="height: 400px; width: 100%;"></div>
                </div>

                <hr>


                <div class="mb-3">
                    <div class="col-md-12">
                        <label class="form-label d-flex align-items-center justify-content-between" for="">
                            <h5 class="mb-0 text-dark fw-bold">PIC Gudang</h5>
                            <button class="btn btn-outline-danger btn-sm ms-auto tambahPIC_{{ $id_row }}" type="button"
                            id="tambahPIC_{{ $jumlah_bangunan }}_0" name="tambahPIC_{{ $id_row }}">Tambah</button>
                            <button class="btn btn-outline-danger btn-sm ms-2 hapusPIC_{{ $id_row }}" type="button"
                            id="hapusPIC_{{ $jumlah_bangunan }}_0" name="hapusPIC_{{ $id_row }}">Hapus</button>
                        </label>
                    </div>
                </div>

                <div class="picContainer_{{ $id_row }} div-content-table" id="picContainer_${bangunanRMT}_${ruanganRMT}">
                    <div class="pic_rmt_instance_{{ $id_row }} mb-5" id="form_pic_${bangunanRMT}_${ruanganRMT}_0">
                        <label class="form-label d-flex align-items-center pic_gudang_rmt_{{ $id_row }}" for=""
                            style="cursor: pointer;">
                            <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
                            <span class="ms-2">
                            <h5 class="mb-0 text-dark fw-bold">PIC Gudang 1</h5>
                            </span>
                        </label>

                        <div class="pic_details">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="nik_tl_rmt_${bangunanRMT}_${ruanganRMT}_0">NIK</label>
                                <select class="form-control chosen-select" id="nik_tl_rmt_${bangunanRMT}_${ruanganRMT}_0"
                                    name="nik_tl_rmt[${bangunanRMT}][${ruanganRMT}][]" required>
                                    <option selected value="">Pilih petugas udang</option>
                                    @foreach ($picByReg as $pic)
                                    <option value="{{ $pic->nik }}" data-position="{{ $pic->position_name }}"
                                        data-notlp="{{ $pic->no_gsm }}" data-email="{{ $pic->email }}">
                                        {{ htmlspecialchars($pic->nik . ' - ' . str_replace('`', '\`', $pic->name), ENT_QUOTES, 'UTF-8') }}
                                    </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Silakan pilih petugas udang.</div>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label" for="posisi_tl_rmt_${bangunanRMT}_${ruanganRMT}_0">Posisi Jabatan</label>
                                <input class="form-control" id="posisi_tl_rmt_${bangunanRMT}_${ruanganRMT}_0"
                                    name="posisi_tl_rmt[${bangunanRMT}][${ruanganRMT}][]" type="text" readonly />
                            </div>

                            <div class="col-12">
                                <div class="row g-2">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="tlp_tl_rmt_${bangunanRMT}_${ruanganRMT}_0">No Telepon</label>
                                        <input class="form-control" id="tlp_tl_rmt_${bangunanRMT}_${ruanganRMT}_0"
                                            name="tlp_tl_rmt[${bangunanRMT}][${ruanganRMT}][]" type="text" readonly />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="email_tl_rmt_${bangunanRMT}_${ruanganRMT}_0">Email</label>
                                        <input class="form-control" id="email_tl_rmt_${bangunanRMT}_${ruanganRMT}_0"
                                            name="email_tl_rmt[${bangunanRMT}][${ruanganRMT}][]" type="text" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        </div>`;

      //   let rmtId = `form_rmt_${bangunanRMT}_${ruanganRMT}`;

      //   newRMT.attr('id', rmtId);

      //   newRMT.find('[id]').each(function() {
      //     let oldIdRMT = $(this).attr('id');
      //     let updatedIdRMT = oldIdRMT.replace(/_\d+_\d+$/, `_${bangunanRMT}_${ruanganRMT}`);
      //     $(this).attr('id', updatedIdRMT);
      //     $(this).val('');
      //   });

      //   newRMT.find('[for]').each(function() {
      //     let oldForRMT = $(this).attr('for');
      //     let updatedForRMT = oldForRMT.replace(/_\d+_\d+$/, `_${bangunanRMT}_${ruanganRMT}`);
      //     $(this).attr('for', updatedForRMT);
      //   });

      //   newRMT.find('[name]').each(function() {
      //     let oldNameRMT = $(this).attr('name');
      //     let updatedNameRMT = oldNameRMT.replace(/\[\d+\]\[\d+\]$/,
      //       `[${bangunanRMT}][${ruanganRMT}]`);
      //     $(this).attr('name', updatedNameRMT);
      //   });

      //   newRMT.find('.pic_rmt_instance_{{ $id_row }}').not(':first').remove();
      //   newRMT.find('.pic_rmt_instance_{{ $id_row }}:first').find('[id], [for], [name]').each(function() {
      //     let oldId = $(this).attr('id');
      //     let oldName = $(this).attr('name');
      //     let oldFor = $(this).attr('for');

      //     if (oldId) {
      //       let updatedId = oldId.replace(/(_\d+)(_?\d+)*$/, `_${bangunanRMT}_${ruanganRMT}_0`);
      //       $(this).attr('id', updatedId);
      //     }
      //     if (oldFor) {
      //       let updatedFor = oldFor.replace(/(_\d+)(_?\d+)*$/, `_${bangunanRMT}_${ruanganRMT}_0`);
      //       $(this).attr('for', updatedFor);
      //     }
      //     if (oldName) {
      //       let updatedName = oldName.replace(/\[\d+\]\[\d+\]\[\d*\]$/,
      //         `[${bangunanRMT}][${ruanganRMT}][]`);
      //       $(this).attr('name', updatedName);
      //     }
      //   });

      // counterMap++;
      let newRMTElement = $(newRMT);
      let newMapId = `map_${bangunanRMT}_${ruanganRMT}`;
      //   console.log(newMapId);
      let newSearchId = `search_lokasi_rmt_${bangunanRMT}_${ruanganRMT}`;
      //   console.log(newSearchId);
      newRMTElement.find('.map').attr('id', newMapId);
      newRMTElement.find('.search_lokasi_rmt').attr('id', newSearchId);
      newRMTElement.appendTo('.tambahFromRMT_{{ $id_row }}');
      newRMTElement.find(".chosen-select").each(function() {
        let $this = $(this);

        if ($this.data('chosen')) {
          $this.chosen("destroy");
        }

        $this.chosen({
          no_results_text: "Data tidak ditemukan",
          width: "100%"
        }).trigger("chosen:updated");
      });

      initMap(bangunanRMT, ruanganRMT);

      $('[id^="koordinat_rmt_"]').removeClass('is-valid');


      //   $(".chosen-select").each(function() {
      //     console.log("Dropdown ditemukan:", $(this).attr("id"));
      //   });

      //   newRMT.find(".chosen-select").each(function() {
      //     let $this = $(this);

      //     if ($this.hasClass("chosen-initialized")) {
      //       $this.chosen("destroy").removeClass("chosen-initialized");
      //       $this.removeAttr("data-chosen");
      //     }

      //     let newId = $this.attr("id") + "_cloned_" + new Date().getTime();
      //     $this.attr("id", newId);

      //     setTimeout(function() {
      //       $this.chosen({
      //         no_results_text: "Data tidak ditemukan",
      //         width: "100%"
      //       }).addClass("chosen-initialized").trigger("chosen:updated");
      //     }, 10);
      //   });


      updateDeleteButtons();
    });

    // Hapus Ruangan
    $(document).on('click', '.hapusRMT_{{ $id_row }}', function(event) {
      event.stopPropagation();

      const formIdRMT = $(this).closest('.form_rmt_instance_{{ $id_row }}').attr('id');
      if (formIdRMT === `form_rmt_${bangunanRMT}_0`) {
        alert('Form Ruang ini tidak bisa dihapus!');
        return;
      }

      $(this).closest('.form_rmt_instance_{{ $id_row }}').remove();
      updateDeleteButtons();
    });

    // Tambah PIC Gudang
    $(document).on("click", ".tambahPIC_{{ $id_row }}", function() {
      let classList = $(this).attr("class");
      let idRow = classList.match(/\d+/)[0];
      let buttonId = $(this).attr("id");
      let idParts = buttonId.split("_");
      let bangunanRMT = idParts[1];
      let ruanganRMT = idParts[2];
      let picContainer = `#picContainer_${bangunanRMT}_${ruanganRMT}`;
      let picRMT = $(picContainer).data("pic-count") + 1;
      $(picContainer).data("pic-count", picRMT);
      let newPICHtml = `
        <div class="pic_rmt_instance_${idRow} mb-5" id="form_pic_${bangunanRMT}_${ruanganRMT}_${picRMT}">
            <label class="form-label d-flex align-items-center pic_gudang_rmt_${idRow}" for=""
            style="cursor: pointer;">
            <i class="fa fa-angle-down toggle-icon fa-lg" style="line-height: 1.5;"></i>
            <span class="ms-2">
                <h5 class="mb-0 text-dark fw-bold">PIC Gudang ${picRMT + 1}</h5>
            </span>
            </label>

            <div class="pic_details">
                <div class="col-12 mb-3">
                    <label class="form-label" for="nik_tl_rmt_${bangunanRMT}_${ruanganRMT}_${picRMT}">NIK</label>
                    <select class="form-control chosen-select" id="nik_tl_rmt_${bangunanRMT}_${ruanganRMT}_${picRMT}"
                    name="nik_tl_rmt[${bangunanRMT}][${ruanganRMT}][]" required>
                    <option selected value="">Pilih petugas udang</option>
                    @foreach ($picByReg as $pic)
                        <option value="{{ $pic->nik }}" data-position="{{ $pic->position_name }}"
                        data-notlp="{{ $pic->no_gsm }}" data-email="{{ $pic->email }}">
                        {{ htmlspecialchars($pic->nik . ' - ' . str_replace('`', '\`', $pic->name), ENT_QUOTES, 'UTF-8') }}
                        </option>
                    @endforeach
                    </select>
                    <div class="invalid-feedback">Silakan pilih petugas gudang.</div>
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label" for="posisi_tl_rmt_${bangunanRMT}_${ruanganRMT}_${picRMT}">Posisi Jabatan</label>
                    <input class="form-control" id="posisi_tl_rmt_${bangunanRMT}_${ruanganRMT}_${picRMT}"
                    name="posisi_tl_rmt[${bangunanRMT}][${ruanganRMT}][]" type="text" readonly />
                </div>

                <div class="col-12">
                    <div class="row g-2">
                        <div class="col-sm-6">
                            <label class="form-label" for="tlp_tl_rmt_${bangunanRMT}_${ruanganRMT}_${picRMT}">No Telepon</label>
                            <input class="form-control" id="tlp_tl_rmt_${bangunanRMT}_${ruanganRMT}_${picRMT}"
                            name="tlp_tl_rmt[${bangunanRMT}][${ruanganRMT}][]" type="text" readonly />
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="email_tl_rmt_${bangunanRMT}_${ruanganRMT}_${picRMT}">Email</label>
                            <input class="form-control" id="email_tl_rmt_${bangunanRMT}_${ruanganRMT}_${picRMT}"
                            name="email_tl_rmt[${bangunanRMT}][${ruanganRMT}][]" type="text" readonly />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `;

      $(newPICHtml).appendTo(picContainer);

      let newSelect = $(`#nik_tl_rmt_${bangunanRMT}_${ruanganRMT}_${picRMT}`);

      newSelect.chosen("destroy").chosen({
        no_results_text: "Data tidak ditemukan",
        width: "100%"
      });

      updateDeleteButtons();
      updateStaffNumbers();
      hiddenButtons();
    });

    // Hapus PIC Gudang
    $(document).on("click", "[id^=hapusPIC_]", function() {
      let id_row = $(this).attr("name").split("_")[1];
      let container = $(".picContainer_" + id_row);
      let instances = container.find(".pic_rmt_instance_" + id_row);

      if (instances.length <= 1) {
        return;
      }

      let lastInstance = instances.last();
      let lastSelect = lastInstance.find("select[id^=nik_tl_rmt_]");
      let lastSelectId = lastSelect.attr("id");

      if (lastSelectId && lastSelectId.endsWith("_0")) {
        alert("PIC Gudang ini tidak bisa dihapus!");
        return;
      }

      lastInstance.remove();

      updateDeleteButtons();
      updateStaffNumbers();
      hiddenButtons();
    });

    // Update Tombol Delete
    function updateDeleteButtons() {
      $('.form_rmt_instance_{{ $id_row }}').each(function(ruanganIndex) {
        let ruanganId = `form_rmt_${bangunanRMT}_${ruanganIndex}`;
        $(this).attr('id', ruanganId);

        $(this).find('[id]').each(function() {
          let oldId = $(this).attr('id');
          $(this).attr('id', oldId.replace(/_\d+_\d+$/, `_${bangunanRMT}_${ruanganIndex}`));
        });

        $(this).find('[name]').each(function() {
          let oldName = $(this).attr('name');
          $(this).attr('name', oldName.replace(/\[\d+\]\[\d+\]/, `[${bangunanRMT}][${ruanganIndex}]`));
        });

        $(this).find('.pic_rmt_instance_{{ $id_row }}').each(function(picIndex) {
          let picId = `nik_tl_rmt_${bangunanRMT}_${ruanganIndex}_${picIndex}`;
          $(this).attr('id', picId);

          $(this).find('[id]').each(function() {
            let oldId = $(this).attr('id');
            $(this).attr('id', oldId.replace(/_\d+_\d+_\d+$/,
              `_${bangunanRMT}_${ruanganIndex}_${picIndex}`));
          });

          $(this).find('[name]').each(function() {
            let oldName = $(this).attr('name');
            $(this).attr('name', oldName.replace(/\[\d+\]\[\d+\]\[\d*\]$/,
              `[${bangunanRMT}][${ruanganIndex}][]`));
          });
        });
      });
    }

    function updateStaffNumbers() {
      $('.form_rmt_instance_{{ $id_row }}').each(function(roomIndex) {
        $(this).find('.pic_rmt_instance_{{ $id_row }}').each(function(picIndex) {
          $(this).find('h5').text('PIC Gudang ' + (picIndex + 1));
        });
      });
    }

    function hiddenButtons() {
      var picGudang = $('.pic_rmt_instance_{{ $id_row }}').length;
      if (picGudang <= 1) {
        $('.hapusPIC_{{ $id_row }}').prop('disabled', true);
      } else {
        $('.hapusPIC_{{ $id_row }}').prop('disabled', false);
      }
    }

    // Toggle Ruangan/PIC Gudang
    $(document).on('click', '.rmt_gudang_{{ $id_row }}, .pic_gudang_rmt_{{ $id_row }}', function() {
      event.stopPropagation();
      const toggleIcon = $(this).find('.toggle-icon');
      toggleIcon.toggleClass('fa-angle-down fa-angle-right');
      $(this).next('.content_input_rmt, .pic_details').slideToggle();
    });
  });
</script>
{{-- Maps --}}
<script>
  // Inisialisasi peta Leaflet
  function initMap(jumlah_bangunan, ruanganRMT) {
    let mapElementId = 'map_' + jumlah_bangunan + '_' + ruanganRMT;
    // console.log(mapElementId);

    let mapElement = $("#" + mapElementId);

    if (!mapElement) {
      console.error(`Map container not found: ${mapElementId}`);
      return;
    }

    let map = L.map(mapElementId, {
      fullscreenControl: true,
      fullscreenControlOptions: {
        position: 'topright'
      }
    }).setView([-2.5489, 118.0149], 5);

    // Menambahkan layer peta OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    mapElement.data("leafletMap", map);

    // Menangani perubahan input dan mencari lokasi
    $('#search_lokasi_rmt_' + jumlah_bangunan + '_' + ruanganRMT).click(function() {
      let inputKoordinat = $('#koordinat_rmt_' + jumlah_bangunan + '_' + ruanganRMT);
      let coordinates = inputKoordinat.val();
      var coordsArray = coordinates.split(',');

      if (coordsArray.length == 2) {
        var lat = parseFloat(coordsArray[0].trim());
        var lng = parseFloat(coordsArray[1].trim());

        if (isNaN(lat) || isNaN(lng) || lat < -90 || lat > 90 || lng < -180 || lng > 180) {
          alert('Koordinat tidak valid.');
          inputKoordinat.addClass('is-invalid');
          return;
        }

        inputKoordinat.removeClass("is-invalid").addClass('is-valid');

        if (mapElement.data("leafletMap")) {
          let oldMap = mapElement.data("leafletMap");
          oldMap.eachLayer(layer => oldMap.removeLayer(layer));
          oldMap.remove();
          mapElement.removeData("leafletMap");
          mapElement.empty();
        }

        let mapRMT = L.map(mapElementId, {
          fullscreenControl: true,
          fullscreenControlOptions: {
            position: 'topright'
          }
        }).setView([lat, lng], 17);

        mapElement.data("leafletMap", mapRMT);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
          attribution: '&copy; OpenStreetMap contributors',
        }).addTo(mapRMT);

        let marker = L.marker([lat, lng]).addTo(mapRMT)
          .bindPopup(`Lokasi yang dipilih <br>${lat}, ${lng}`)
          .openPopup();

        mapRMT.invalidateSize()
      } else {
        alert('Format koordinat salah!');
        inputKoordinat.addClass('is-invalid');
      }
    });
  }

  // Memanggil fungsi initMap saat halaman siap
  $(document).ready(function() {
    initMap({{ $jumlah_bangunan }}, 0);
  });
</script>
{{-- backend --}}
<script>
  $(document).ready(function() {
    var picRMTData = [];
    $("#regional").on("change", function() {
      var regionalId = $(this).val();
      var regionalName = $("#regional option:selected").text();
      var jumlahBangunan = "{{ $jumlah_bangunan }}";
      var idRow = "{{ $id_row }}";

      $("#regional_form_" + idRow).val(regionalName);
      $("#regional_id_" + idRow).val(regionalId);

      $.ajax({
        url: "{{ route('getPicReg') }}",
        type: "GET",
        data: {
          regional_name: regionalName
        },
        success: function(data) {
          window.picRMTData = data;

          var picRMT = $(".chosen-select");
          picRMT.each(function() {
            $(this).empty().append('<option value="">Pilih petugas gudang</option>');

            $.each(window.picRMTData, function(index, item) {
              var option = '<option value="' + item.nik + '" data-position="' + item
                .position_name +
                '" data-notlp="' + item.no_gsm + '" data-email="' + item.email + '">' +
                item.nik + ' - ' + item.name +
                '</option>';

              $(this).append(option);
            }.bind(this));

            $(this).trigger("chosen:updated");
          });

          $(".chosen-select").each(function() {
            $(this).trigger("chosen:updated");
          });
        },
        error: function() {
          alert("Gagal mengambil data regional.");
        },
      });
    })

    $(document).on("change", "[id^='nik_tl_rmt_']", function() {
      var selectedOption = $(this).find(":selected");
      var posisi = selectedOption.data("position");
      var notlp = selectedOption.data("notlp");
      var email = selectedOption.data("email");
      var idParts = $(this).attr("id").split("_");
      var jumlahBangunan = {{ $jumlah_bangunan }};
      var parentRuangan = idParts[4];
      var picRMTcount = idParts[5];

      $("#posisi_tl_rmt_" + jumlahBangunan + "_" + parentRuangan + "_" + picRMTcount).val(posisi);
      $("#tlp_tl_rmt_" + jumlahBangunan + "_" + parentRuangan + "_" + picRMTcount).val(notlp);
      $("#email_tl_rmt_" + jumlahBangunan + "_" + parentRuangan + "_" + picRMTcount).val(email);
    });

    $(".chosen-select").chosen({
      no_results_text: "Tidak ada hasil ditemukan",
      width: "100%"
    });
  });
</script>

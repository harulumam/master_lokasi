<div class="card-header pb-0">
  <h5>Detail Lokasi</h5>
</div>
<div class="card-body">
  <div class="mb-3">
    <div class="col-md-12">
      <label class="form-label" for="nama_lokasi">Nama Lokasi</label>
      <input class="form-control" id="nama_lokasi" name="nama_lokasi[]" type="text" placeholder="Masukan nama lokasi"
        required="" />
      <div class="invalid-feedback">Nama lokasi wajib diisi.</div>
    </div>
  </div>
  <div class="row g-2 mb-3">
    <div class="col-md-6">
      <label class="form-label" for="regional">Regional</label>
      <select class="form-select" id="regional" name="regional[]" required="">
        <option selected="" disabled="" value="">Choose...</option>
        @foreach ($regionalData as $regional)
          <option value="{{ $regional->id_regional }}">
            {{ $regional->nama_regional }}
          </option>
        @endforeach
      </select>
      <div class="invalid-feedback">Silakan pilih regional.</div>
    </div>

    <div class="col-md-6">
      <label class="form-label" for="witel">Witel</label>
      <select class="form-select" id="witel" name="witel[]" required="">
        <option selected="" disabled="" value="">Choose...</option>
      </select>
      <div class="invalid-feedback">Silakan pilih witel.</div>
    </div>
  </div>

  <div class="mb-3">
    <label class="form-label" for="alamat_lokasi">Alamat</label>
    <textarea class="form-control" id="alamat_lokasi" name="alamat_lokasi[]" placeholder="Masukan alamat" required=""></textarea>
    <div class="invalid-feedback">Alamat wajib diisi.</div>
  </div>
  <div class="mb-5">
    <label class="form-label" for="koordinat_lokasi">Koordinat Lokasi</label>
    <div class="d-flex">
      <input class="form-control me-2" id="koordinat_lokasi" name="koordinat_lokasi[]" type="text"
        placeholder="Masukan koordinat lokasi" required="" />
      <button type="button" class="btn btn-sm btn-danger" id="search_lokasi">Search</button>
    </div>
    <div class="invalid-feedback" id="koordinat_invalid_feedback">Koordinat lokasi wajib diisi.
    </div>
  </div>
  <div class="mb-3">
    <div id="map" class="map" style="height: 400px; width: 100%;"></div>
  </div>
</div>

<script>
  $('#regional').change(function() {
    var regionalId = $(this).val();
    var regionalName = $('#regional').find('option:selected').prop('label');
    if (regionalId) {
      $.get('/witel/' + regionalId, function(data) {

        var witelSelect = $('#witel');
        witelSelect.empty();
        witelSelect.append('<option selected disabled value="">Choose...</option>');

        $.each(data, function(index, witel) {
          witelSelect.append('<option value="' + witel.id_witel + '">' + witel.nama_witel + '</option>');
        });
      }).fail(function(xhr, status, error) {
        console.log("Terjadi error: ", error);
      });
      // ubah all form regional
      i = 1;
      $('.jumlah_card').each(function() {
        $('#regional_form_' + i).val(regionalName);
        $('#regional_id_' + i).val(regionalId);
        i++;
      });
    } else {
      $('#witel').empty();
      $('#witel').append('<option selected disabled value="">Choose...</option>');
    }
  });
  $('#witel').change(function() {
    var witelName = $('#witel').find('option:selected').prop('label');
    i = 1;
    $('.jumlah_card').each(function() {
      $('#witel_form_' + i).val(witelName);
      i++;
    });
  });
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

  var marker;

  let isKoordinatValid = false;

  // validasi koordinat
  document.getElementById('search_lokasi').addEventListener('click', function() {
    var koordinatInput = document.getElementById('koordinat_lokasi').value.trim();
    var koordinatLokasiInput = document.getElementById('koordinat_lokasi');

    isKoordinatValid = false;
    koordinatLokasiInput.classList.remove('is-invalid');
    koordinatLokasiInput.classList.remove('is-valid');

    if (koordinatInput) {
      // Cek apakah input sesuai dengan format latitude,longitude
      var koordinat = koordinatInput.split(',');
      if (koordinat.length !== 2) {
        alert('Format koordinat salah. \nPastikan menggunakan format: lat, lng');
        koordinatLokasiInput.classList.add('is-invalid');
        return;
      }

      // Memisahkan koordinat menjadi lat dan lng
      var lat = parseFloat(koordinat[0].trim());
      var lng = parseFloat(koordinat[1].trim());

      // Memeriksa apakah lat dan lng adalah angka yang valid
      if (!isNaN(lat) && !isNaN(lng) && lat >= -90 && lat <= 90 && lng >= -180 && lng <= 180) {
        if (marker) {
          map.removeLayer(marker);
        }

        marker = L.marker([lat, lng]).addTo(map)
          .bindPopup('Lokasi yang dimasukkan: <br>' + lat + ', ' + lng).openPopup();

        map.setView([lat, lng], 17);

        isKoordinatValid = true;
        koordinatLokasiInput.classList.add('is-valid');
      } else {
        alert(
          'Koordinat tidak valid. \nLatitude harus antara -90 hingga 90 dan \nLongitude antara -180 hingga 180.'
        );
        koordinatLokasiInput.classList.add('is-invalid');
      }
    } else {
      alert('Silakan masukkan koordinat.');
      koordinatLokasiInput.classList.add('is-invalid');
    }
  });


  document.getElementById('nama_lokasi').addEventListener('change', function() {
    this.classList.remove('is-invalid');
    this.nextElementSibling.textContent = '';
  });

  document.getElementById('regional').addEventListener('change', function() {
    this.classList.remove('is-invalid');
    this.nextElementSibling.textContent = '';
  });

  document.getElementById('witel').addEventListener('change', function() {
    this.classList.remove('is-invalid');
    this.nextElementSibling.textContent = '';
  });

  document.getElementById('alamat_lokasi').addEventListener('input', function() {
    this.classList.remove('is-invalid');
    this.nextElementSibling.textContent = '';
  });

  document.getElementById('koordinat_lokasi').addEventListener('input', function() {
    this.classList.remove('is-invalid');
    document.getElementById('koordinat_invalid_feedback').textContent = '';
  });

  // Fungsi validasi form
  function validateForm() {
    const fields = [{
        id: 'nama_lokasi',
        message: 'Nama lokasi wajib diisi.'
      },
      {
        id: 'regional',
        message: 'Silakan pilih regional.'
      },
      {
        id: 'witel',
        message: 'Silakan pilih witel.'
      },
      {
        id: 'alamat_lokasi',
        message: 'Alamat wajib diisi.'
      },
      {
        id: 'koordinat_lokasi',
        message: 'Koordinat lokasi wajib diisi.'
      },
    ];

    let isValid = true;

    fields.forEach((field) => {
      const input = document.getElementById(field.id);
      if (input.value.trim() === '') {
        input.classList.add('is-invalid');
        if (field.id === 'koordinat_lokasi') {
          document.getElementById('koordinat_invalid_feedback').textContent = field
            .message;
        } else {
          input.nextElementSibling.textContent = field.message;
        }
        isValid = false;
      } else {
        input.classList.remove('is-invalid');
        if (field.id === 'koordinat_lokasi') {
          document.getElementById('koordinat_invalid_feedback').textContent =
            '';
        } else {
          input.nextElementSibling.textContent = '';
        }
      }
    });

    return isValid;
  }
</script>

@extends('layouts.admin.master')

@section('title', 'Create Lokasi')

@push('css')
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/photoswipe.css') }}">
  <link rel="stylesheet" href="https://unpkg.com/leaflet.fullscreen@1.5.0/Control.FullScreen.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" />
@endpush
@section('content')
  @yield('breadcrumb-list')
  @component('components.breadcrumb')
    {{-- @slot('breadcrumb_title')
    <h3>Slipi</h3>
    @endslot
    @slot('breadcrumb_sub_title')
    <h5>Regional Jakarta | Witel Jakarta Barat</h5>
    @endslot --}}
    <li class="breadcrumb-item"><a href="{{ route('listLokasi') }}">List lokasi</a></li>
    <li class="breadcrumb-item active">Create</li>
  @endcomponent

  <!-- Container-fluid starts -->
  <div class="container-fluid dashboard-default-sec">
    <div class="row">
      <div class="col-md-2">
        <div class="card p-3">
          <div class="sidebar">
            <div class="row mb-3 mt-3">
              <div class="col-12">
                <label class="form-label" for="" id="formLokasi" style="cursor: pointer; color: #E63946">
                  Lokasi</label>
              </div>
            </div>
            <div class="dropdownModal"></div>
          </div>
        </div>

        <div class="card">
          <button class="btn btn-danger" type="button" id="hapus_gedung">Hapus Gedung</button>
        </div>
        <div class="card">
          <button class="btn btn-danger" type="button" id="tambah_gedung">Tambah Gedung</button>
        </div>
      </div>
      {{-- <input type="hidden" name="id_lokasi" id="id_lokasi" /> --}}
      <input type="hidden" name="jumlah_bangunan" id="jumlah_bangunan" value=0 />
      <div class="col-md-7">
        <form id="formCreate" method="POST" class="needs-validation" novalidate enctype="multipart/form-data"
          action="{{ route('create') }}">
          @csrf
          <table id="tabel_lokasi" style="width: 100%">
            <tr>
              <td>
                <div class="card jumlah_card" id="card_form_0">
                </div>
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div class="col-md-3">
        <div class="card p-3">
          <div class="mb-3 d-flex flex-wrap justify-content-center">
            <a class="btn btn-outline-danger mx-2 mb-2" id="cancelGedung" href="{{ route('listLokasi') }}">Cancel</a>
            <button class="btn btn-danger mx-2 mb-2" type="button" id="submitGedung">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Tambah Gedung -->
  <div class="modal fade" id="modalTambahGedung" tabindex="-1" aria-labelledby="modalTambahGedungLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <form id="formTambahGedung">
            <div class="mb-3">
              <label for="fungsiGedung" class="form-label">Fungsi Gedung</label>
              <select class="form-select" id="fungsiGedung" name="fungsiGedung" required>
                <option selected>Pilih</option>
                @foreach ($jenisBangunan as $jenis)
                  <option value="{{ $jenis->jenis_bangunan_id }}">{{ $jenis->jenis_bangunan }}</option>
                @endforeach
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" form="formTambahGedung" class="btn btn-danger">Submit</button>
        </div>
      </div>
    </div>
  </div>



  <!-- Container-fluid Ends-->
  @push('scripts')
    @include('list_lokasi.partials.js')
    <script>
      $(document).ready(function() {
        loadFormLokasi();

        // $(document).on('click', '.form-label', function(event) {
        //   event.preventDefault();
        //   $('.form-label').css('color', '');
        //   $(this).css('color', '#E63946');
        // });
      });

      function loadFormLokasi() {
        $.ajax({
          type: 'POST',
          url: '{{ route('formLokasi') }} ',
          dataType: 'html',
          data: {
            _token: $('meta[name="csrf-token"]').attr('content')
          },
          success: function(data) {
            $('#card_form_0').html(data);
          }
        });
      }
    </script>
    {{-- modal --}}
    <script>
      $(document).ready(function() {
        $('#formLokasi').on('click', function(event) {
          event.preventDefault();

          $('.jumlah_card').each(function() {
            $(this).attr('hidden', 'hidden');
          });

          $('#card_form_0').removeAttr('hidden');
        });

        $('#formTambahGedung').submit(function(event) {
          event.preventDefault();

          var fungsiGedung = $('#fungsiGedung').val();
          if (fungsiGedung === 'Pilih') {
            alert('Silahkan pilih fungsi gedung');
            return;
          }

          var jumlah_bangunan = parseInt($('#jumlah_bangunan').val(), 10) || 0;
          var jumlah_bangunan_new = jumlah_bangunan + 1;
          $('#jumlah_bangunan').val(jumlah_bangunan_new);

          var lokasiContainer = $('.dropdownModal');
          var newContent = '';
          if (fungsiGedung === '3') { // gudang
            var tbl = document.getElementById("tabel_lokasi");
            var id_row = tbl.rows.length;
            var id_row2 = id_row + 1;
            var id_row3 = id_row2 + 1;
            newContent = `
              <div class="row mb-3 section" id='menu_${id_row3}'>
              <div class="col-12">
              <label class="form-label d-flex justify-content-between align-items-center collapsible-header" style="cursor: pointer;">
              Gudang
              <div class="d-flex justify-content-end align-items-center">
              <i class="fa fa-angle-right toggle-icon"></i>
              </div>
              </label>
              </div>
              </div>
              <div class="row mb-3 collapsible-content" id='sub_menu_${id_row3}' style="display: none;">
              <input type="hidden" name="navbar" id="navbar_${id_row3}" value=3 />
              <div class="col-12">
              <label class="form-label" onclick="loadGudang(event, ${id_row}, ${jumlah_bangunan_new})" id="navGudangDetail" style="cursor: pointer;">Detail Gudang</label>
              <label class="form-label" onclick="loadGudangRuang(event, ${id_row2}, ${jumlah_bangunan_new})" id="navGudangRuangan" style="cursor: pointer;">Detail Ruangan</label>
              <label class="form-label" onclick="loadGudangRMT(event, ${id_row3}, ${jumlah_bangunan_new})" id="navGudangRMT" style="cursor: pointer;">Detail Gudang RMT</label>
              </div>
              </div>
              `;
            // insert tabel
            var tbl = document.getElementById("tabel_lokasi");

            var row = tbl.rows.length;
            var x = tbl.insertRow(row);
            var td = x.insertCell(0);
            var jumlah_card = 0;
            $('.jumlah_card').each(function() {
              jumlah_card++;
            });
            var isi = "<tr><td><div class='card jumlah_card' id='card_form_" + jumlah_card + "'></div></td></tr>";
            td.innerHTML = isi;

            // insert tabel
            var tbl = document.getElementById("tabel_lokasi");

            var row = tbl.rows.length;
            var x = tbl.insertRow(row);
            var td = x.insertCell(0);
            var jumlah_card = 0;
            $('.jumlah_card').each(function() {
              jumlah_card++;
            });
            var isi = "<tr><td><div class='card jumlah_card' id='card_form_" + jumlah_card + "'></div></td></tr>";
            td.innerHTML = isi;

            // insert tabel
            var tbl = document.getElementById("tabel_lokasi");

            var row = tbl.rows.length;
            var x = tbl.insertRow(row);
            var td = x.insertCell(0);
            var jumlah_card = 0;
            $('.jumlah_card').each(function() {
              jumlah_card++;
            });
            var isi = "<tr><td><div class='card jumlah_card' id='card_form_" + jumlah_card + "'></div></td></tr>";
            td.innerHTML = isi;

          } else if (fungsiGedung === '2') { // fa
            var tbl = document.getElementById("tabel_lokasi");

            var id_row = tbl.rows.length;
            var id_row2 = id_row + 1;
            newContent = `
              <div class="row mb-3 section" id='menu_${id_row2}'>
              <div class="col-12">
              <label class="form-label d-flex justify-content-between align-items-center collapsible-header" style="cursor: pointer;">
              Fiber Academy
              <div class="d-flex justify-content-end align-items-center">
              <i class="fa fa-angle-right toggle-icon"></i>
              </div>
              </label>
              </div>
              </div>
              <div class="row mb-3 collapsible-content" id='sub_menu_${id_row2}' style="display: none;">
              <input type="hidden" name="navbar" id="navbar_${id_row2}" value=2 />
              <div class="col-12">
              <label class="form-label" onclick="loadFA(event, ${id_row}, ${jumlah_bangunan_new})" id="navFa" style="cursor: pointer;">Detail Fiber Academy</label>
              <label class="form-label" onclick="loadFAruangan(event, ${id_row2}, ${jumlah_bangunan_new})" id="navFaRuangan" style="cursor: pointer;">Detail Ruangan</label>
              </div>
              </div>
              `;
            var tbl = document.getElementById("tabel_lokasi");

            var row = tbl.rows.length;
            var x = tbl.insertRow(row);
            var td = x.insertCell(0);
            var jumlah_card = 0;
            $('.jumlah_card').each(function() {
              jumlah_card++;
            });
            var isi = "<tr><td><div class='card jumlah_card' id='card_form_" + jumlah_card + "'></div></td></tr>";
            td.innerHTML = isi;

            var tbl = document.getElementById("tabel_lokasi");

            var row = tbl.rows.length;
            var x = tbl.insertRow(row);
            var td = x.insertCell(0);
            var jumlah_card = 0;
            $('.jumlah_card').each(function() {
              jumlah_card++;
            });
            var isi = "<tr><td><div class='card jumlah_card' id='card_form_" + jumlah_card + "'></div></td></tr>";
            td.innerHTML = isi;

          } else if (fungsiGedung === '1') { // office
            var tbl = document.getElementById("tabel_lokasi");

            var id_row = tbl.rows.length;
            var id_row2 = id_row + 1;
            newContent = `
              <div class="row mb-3 section" id='menu_${id_row2}'>
              <div class="col-12">
              <label class="form-label d-flex justify-content-between align-items-center collapsible-header" style="cursor: pointer;">
              Office
              <div class="d-flex justify-content-end align-items-center">
              <i class="fa fa-angle-right toggle-icon"></i>
              </div>
              </label>
              </div>
              </div>
              <div class="row mb-3 collapsible-content" id='sub_menu_${id_row2}' style="display: none;">
              <input type="hidden" name="navbar" id="navbar_${id_row2}" value=1 />
              <div class="col-12">
              <label class="form-label" onclick="loadOffice(event, ${id_row}, ${jumlah_bangunan_new})" id="navOffice" style="cursor: pointer;">Detail Office</label>
              <label class="form-label" onclick="loadOfficeRuangan(event, ${id_row2}, ${jumlah_bangunan_new})" id="navOfficeRuangan" style="cursor: pointer;">Detail Ruangan</label>
              </div>
              </div>
              `;

            // insert tabel
            var tbl = document.getElementById("tabel_lokasi");

            var row = tbl.rows.length;
            var x = tbl.insertRow(row);
            var td = x.insertCell(0);
            var jumlah_card = 0;
            $('.jumlah_card').each(function() {
              jumlah_card++;
            });
            var isi = "<tr><td><div class='card jumlah_card' id='card_form_" + jumlah_card + "'></div></td></tr>";
            td.innerHTML = isi;

            // insert tabel
            var tbl = document.getElementById("tabel_lokasi");

            var row = tbl.rows.length;
            var x = tbl.insertRow(row);
            var td = x.insertCell(0);
            var jumlah_card = 0;
            $('.jumlah_card').each(function() {
              jumlah_card++;
            });
            var isi = "<tr><td><div class='card jumlah_card' id='card_form_" + jumlah_card + "'></div></td></tr>";
            td.innerHTML = isi;

          }


          lokasiContainer.append(newContent);

          $('.collapsible-header').off('click').on('click', function() {
            var collapsibleContent = $(this).closest('.row').next('.collapsible-content');
            collapsibleContent.toggle();
            $(this).find('.toggle-icon').toggleClass('fa-angle-right fa-angle-down');
          });

          var modal = bootstrap.Modal.getInstance($('#modalTambahGedung')[0]);
          if (modal) {
            modal.hide();
          }
        });

        $('#submitGedung').on('click', function(event) {
          event.preventDefault();
          if (!validateForm()) {
            alert('Mohon lengkapi semua data sebelum mengirim form.');
            event.stopPropagation();
            return;
          }

          // let data = $('#formCreate').serialize();
          // var formData = new FormData($('#formCreate')[0]);
          var formData = new FormData();
          $('#formCreate').serializeArray().forEach(({
            name,
            value
          }) => {
            formData.append(name, value);
          });

          $("input[type='file']").filter(function() {
            return this.files.length > 0;
          }).each(function(index, input) {
            let kategori = $(input).data("kategori");
            let tipe = $(input).data("tipe");

            Array.from(input.files).forEach(file => {
              if (file.size > 0) {
                formData.append(`foto[${kategori}][${tipe}][]`, file);
              }
            });
          });

          let token = $('meta[name="csrf-token"]').attr('content');
          $.ajax({
            url: $('#formCreate').attr('action'),
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            headers: {
              'X-CSRF-TOKEN': token
            },
            success: function(response) {
              alert(response.message);
              // window.location.href = response.redirect;
            },
            error: function(xhr, status, error) {
              // console.log('XHR: ', xhr.responseText);
              alert("Terjadi kesalahan: " + xhr.responseText);
            }
          });
        });

        // $('.dropdownModal').on('click', '.delete-section', function() {
        //   var section = $(this).closest('.section');
        //   var fungsiGedung = section.find('.collapsible-header').text().trim().toLowerCase();

        //   $('#fungsiGedung option').each(function() {
        //     if ($(this).text().trim().toLowerCase() === fungsiGedung) {
        //       $(this).prop('disabled', false);
        //     }
        //   });

        //   section.next('.collapsible-content').remove();
        //   section.remove();
        // });
      });


      $('#tambah_gedung').on('click', function(event) {
        event.preventDefault();
        // if (!validateForm()) {
        //   event.stopPropagation();
        //   return;
        // }
        $('#modalTambahGedung').modal('show');
      });

      const hapusGedungButton = document.getElementById('hapus_gedung');
      hapusGedungButton.addEventListener('click', function() {
        var tbl = document.getElementById("tabel_lokasi");
        var idrow = tbl.rows.length;
        var idrow2 = idrow - 1;
        if (idrow2 == 0) {
          alert('Tidak diperbolehkan hapus detail lokasi');
        } else {
          var id_bangunan = $("#navbar_" + idrow2).val();
          if (id_bangunan == 1) {
            tbl.deleteRow(idrow2);
            tbl.deleteRow(idrow2 - 1);
            document.getElementById("menu_" + idrow2).remove();
            document.getElementById("sub_menu_" + idrow2).remove();
            var jumlah_bangunan = $('#jumlah_bangunan').val();
            var jumlah_bangunan_new = jumlah_bangunan - 1;
            $('#jumlah_bangunan').val(jumlah_bangunan_new);
          } else if (id_bangunan == 2) {
            tbl.deleteRow(idrow2);
            tbl.deleteRow(idrow2 - 1);
            document.getElementById("menu_" + idrow2).remove();
            document.getElementById("sub_menu_" + idrow2).remove();
            var jumlah_bangunan = $('#jumlah_bangunan').val();
            var jumlah_bangunan_new = jumlah_bangunan - 1;
            $('#jumlah_bangunan').val(jumlah_bangunan_new);
          } else if (id_bangunan == 3) {
            tbl.deleteRow(idrow2);
            tbl.deleteRow(idrow2 - 1);
            tbl.deleteRow(idrow2 - 2);
            document.getElementById("menu_" + idrow2).remove();
            document.getElementById("sub_menu_" + idrow2).remove();
            var jumlah_bangunan = $('#jumlah_bangunan').val();
            var jumlah_bangunan_new = jumlah_bangunan - 1;
            $('#jumlah_bangunan').val(jumlah_bangunan_new);
          }
        }
      });

      function loadOffice(event, id_row, jumlah_bangunan_new) {
        event.preventDefault();
        var i = 0;
        $('.jumlah_card').each(function() {
          $('#card_form_' + i).attr('hidden', true);
          i++;
        });

        var load_bangunan = $('#load_bangunan_' + id_row).val();
        var load_regional = $('#regional').val();
        var load_witel = $('#witel').find('option:selected').prop('label');
        if (!load_bangunan) {
          $.ajax({
            type: 'POST',
            url: '{{ route('formOffice') }}',
            dataType: 'html',
            data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
              id_row: id_row,
              load_regional: load_regional,
              load_witel: load_witel,
              jumlah_bangunan_new: jumlah_bangunan_new
            },
            success: function(data) {
              $('#card_form_' + id_row).html(data);
              $('#card_form_' + id_row).removeAttr('hidden');
            },
            error: function(xhr, status, error) {
              console.error('Error:', error);
              alert('Terjadi kesalahan saat memuat data office.');
            }
          });
        } else {
          $('#card_form_' + id_row).attr('hidden', false);
        }
      }


      function loadOfficeRuangan(event, id_row, jumlah_bangunan_new) {
        event.preventDefault();
        var i = 0;
        $('.jumlah_card').each(function() {
          $('#card_form_' + i).attr('hidden', true);
          i++;
        });

        var load_bangunan = $('#load_bangunan_' + id_row).val();
        if (!load_bangunan) {
          $.ajax({
            type: 'POST',
            url: '{{ route('formOfficeRuangan') }}',
            dataType: 'html',
            // cache: false,
            data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
              id_row: id_row,
              jumlah_bangunan_new: jumlah_bangunan_new
            },
            success: function(data) {
              $('#card_form_' + id_row).html(data);
              $('#card_form_' + id_row).removeAttr('hidden');
            },
            error: function(xhr, status, error) {
              console.error('Error:', error);
              alert('Terjadi kesalahan saat memuat data office.');
            }
          });
        } else {
          $('#card_form_' + id_row).attr('hidden', false);
        }
      }

      function loadFA(event, id_row, jumlah_bangunan_new) {
        event.preventDefault();
        var i = 0;
        $('.jumlah_card').each(function() {
          $('#card_form_' + i).attr('hidden', true);
          i++;
        });

        var load_bangunan = $('#load_bangunan_' + id_row).val();
        var load_regional = $('#regional').val();
        var load_witel = $('#witel').find('option:selected').prop('label');
        if (!load_bangunan) {
          $.ajax({
            type: 'POST',
            url: '{{ route('formFa') }}',
            dataType: 'html',
            data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
              id_row: id_row,
              load_regional: load_regional,
              load_witel: load_witel,
              jumlah_bangunan_new: jumlah_bangunan_new
            },
            success: function(data) {
              $('#card_form_' + id_row).html(data);
              $('#card_form_' + id_row).removeAttr('hidden');
            },
            error: function(xhr, status, error) {
              console.error('Error:', error);
              alert('Terjadi kesalahan saat memuat data fa.');
            }
          });
        } else {
          $('#card_form_' + id_row).attr('hidden', false);
        }
      }

      function loadFAruangan(event, id_row, jumlah_bangunan_new) {
        event.preventDefault();
        var i = 0;
        $('.jumlah_card').each(function() {
          $('#card_form_' + i).attr('hidden', true);
          i++;
        });

        var load_bangunan = $('#load_bangunan_' + id_row).val();
        if (!load_bangunan) {
          $.ajax({
            type: 'POST',
            url: '{{ route('formFaRuangan') }}',
            dataType: 'html',
            data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
              id_row: id_row,
              jumlah_bangunan_new: jumlah_bangunan_new
            },
            success: function(data) {
              $('#card_form_' + id_row).html(data);
              $('#card_form_' + id_row).removeAttr('hidden');
            },
            error: function(xhr, status, error) {
              console.error('Error:', error);
              alert('Terjadi kesalahan saat memuat data fa.');
            }
          });
        } else {
          $('#card_form_' + id_row).attr('hidden', false);
        }
      }

      function loadGudang(event, id_row, jumlah_bangunan_new) {
        event.preventDefault();
        var i = 0;
        $('.jumlah_card').each(function() {
          $('#card_form_' + i).attr('hidden', true);
          i++;
        });

        var load_bangunan = $('#load_bangunan_' + id_row).val();
        var load_regional = $('#regional').val();
        var load_witel = $('#witel').find('option:selected').prop('label');
        if (!load_bangunan) {
          $.ajax({
            type: 'POST',
            url: '{{ route('formGudang') }}',
            dataType: 'html',
            data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
              id_row: id_row,
              load_regional: load_regional,
              load_witel: load_witel,
              jumlah_bangunan_new: jumlah_bangunan_new
            },
            success: function(data) {
              $('#card_form_' + id_row).html(data);
              $('#card_form_' + id_row).removeAttr('hidden');
            },
            error: function(xhr, status, error) {
              console.error('Error:', error);
              alert('Terjadi kesalahan saat memuat data detail gudang.');
            }
          });
        } else {
          $('#card_form_' + id_row).attr('hidden', false);
        }
      }

      function loadGudangRuang(event, id_row, jumlah_bangunan_new) {
        event.preventDefault();
        var i = 0;
        $('.jumlah_card').each(function() {
          $('#card_form_' + i).attr('hidden', true);
          i++;
        });

        var load_bangunan = $('#load_bangunan_' + id_row).val();
        if (!load_bangunan) {
          $.ajax({
            type: 'POST',
            url: '{{ route('formGudangRuangan') }}',
            dataType: 'html',
            data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
              id_row: id_row,
              jumlah_bangunan_new: jumlah_bangunan_new
            },
            success: function(data) {
              $('#card_form_' + id_row).html(data);
              $('#card_form_' + id_row).removeAttr('hidden');
            },
            error: function(xhr, status, error) {
              console.error('Error:', error);
              alert('Terjadi kesalahan saat memuat data ruangan gudang.');
            }
          });
        } else {
          $('#card_form_' + id_row).attr('hidden', false);
        }
      }

      function loadGudangRMT(event, id_row, jumlah_bangunan_new) {
        event.preventDefault();
        var i = 0;
        $('.jumlah_card').each(function() {
          $('#card_form_' + i).attr('hidden', true);
          i++;
        });

        var load_bangunan = $('#load_bangunan_' + id_row).val();
        var load_regional = $('#regional').val();
        if (!load_bangunan) {
          $.ajax({
            type: 'POST',
            url: '{{ route('formGudangRMT') }}',
            dataType: 'html',
            data: {
              _token: $('meta[name="csrf-token"]').attr('content'),
              id_row: id_row,
              load_regional: load_regional,
              jumlah_bangunan_new: jumlah_bangunan_new
            },
            success: function(data) {
              $('#card_form_' + id_row).html(data);
              $('#card_form_' + id_row).removeAttr('hidden');
            },
            error: function(xhr, status, error) {
              console.error('Error:', error);
              alert('Terjadi kesalahan saat memuat data gudang rmt.');
            }
          });
        } else {
          $('#card_form_' + id_row).attr('hidden', false);
        }
      }
    </script>
  @endpush
@endsection

@extends('layouts.admin.master')

@section('title', 'Office')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jsgrid.css') }}">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet.fullscreen@1.5.0/Control.FullScreen.css" />
@endpush
@section('content')
  @yield('breadcrumb-list')
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-4">
          <div class="card bg-danger text-white">
            <div class="card-body text-left">
              <strong>Office:</strong> <br>
              <h3>1200</h3>
              Lokasi kantor utama
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid dashboard-default-sec">
    <div class="row">
      <div class="col-md-9">
        <div class="card">
          <div class="card-body">
            <div class="card-header pb-4">
            </div>
            <div class="tabbed-card">
              <ul class="pull-right nav nav-pills nav-danger" id="pills-clrtab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-clrhome-tab" data-bs-toggle="pill" href="#pills-clrhome"
                    role="tab" aria-controls="pills-clrhome" aria-selected="true"><i
                      class="fa fa-map-marker"></i>Maps</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-clrtable-tab" data-bs-toggle="pill" href="#pills-clrprofile"
                    role="tab" aria-controls="pills-clrprofile" aria-selected="false">
                    <i class="fa fa-table"></i>Table
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-clrcontact-tab" data-bs-toggle="pill" href="#pills-clrcontact"
                    role="tab" aria-controls="pills-clrcontact" aria-selected="false">
                    <i class="fa fa-file-excel-o"></i>Excel
                  </a>
                </li>
              </ul>
              <div class="div"></div>
              <div class="tab-content" id="pills-clrtabContent">
                <div class="tab-pane fade show active" id="pills-clrhome" role="tabpanel"
                  aria-labelledby="pills-clrhome-tab">
                  <div id="map" style="height: 400px; width: 100%;"></div>
                </div>
                <div class="tab-pane fade" id="pills-clrprofile" role="tabpanel" aria-labelledby="pills-clrprofile-tab">
                  <div class="col-sm-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="display no-wrap-table" id="dataTable">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Kode Office</th>
                                <th>Nama Office</th>
                                <th>Reg</th>
                                <th>Lokasi</th>
                                <th>Witel</th>
                                <th>Alamat</th>
                                <th>Luasan</th>
                                <th>Luasan</th>
                                <th>Luasan</th>
                                <th>Luasan</th>
                                <th>Luasan</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>
                                  <a href="{{ route('viewOffice', ['id' => 'off-123']) }}"
                                    style="display: block; text-decoration: none; color: inherit;">
                                    Off-123
                                  </a>
                                </td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                                <td>Jl. Georgina</td>
                                <td>200000</td>
                                <td>200000</td>
                                <td>200000</td>
                                <td>200000</td>
                                <td>200000</td>
                              </tr>
                              <tr>
                                <td>2</td>
                                <td>
                                  <a href="{{ route('viewOffice', ['id' => 'off-12345']) }}"
                                    style="display: block; text-decoration: none; color: inherit;">
                                    Off-12345
                                  </a>
                                </td>
                                <td>Tokyo</td>
                                <td>63</td>
                                <td>2011/07/25</td>
                                <td>$170,750</td>
                                <td>Jl. Cristiano Lorem ipsum dolor sit amet consectetur
                                  adipisicing elit.
                                </td>
                                <td>100000</td>
                                <td>100000</td>
                                <td>100000</td>
                                <td>100000</td>
                                <td>-</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="sidebar">
            <div class="card-body animate-chk">
              <label class="card-title">Data Filter </label> <br>

              <a class="header-tipe header-table form-label d-flex justify-content-between align-items-center pointer">
                <span>Tipe</span>
                <i class="fa fa-angle-down ps-2 toggle-icon"></i>
              </a>
              <ul class="chk-tipe content-table">
                <li>
                  <label class="d-block" for="chk-tipe-ho">
                    <input class="checkbox_animated" id="chk-tipe-ho" type="checkbox">HO
                  </label>
                </li>
                <li>
                  <label class="d-block" for="chk-tipe-reg">
                    <input class="checkbox_animated" id="chk-tipe-reg" type="checkbox">Regional
                  </label>
                </li>
                <li>
                  <label class="d-block" for="chk-tipe-so">
                    <input class="checkbox_animated" id="chk-tipe-so" type="checkbox">SO
                  </label>
                </li>
                <li>
                  <label class="d-block" for="chk-tipe-witel">
                    <input class="checkbox_animated" id="chk-tipe-witel" type="checkbox">Witel
                  </label>
                </li>
              </ul>

              <br>

              <a
                class="header-peruntukan header-table form-label d-flex justify-content-between align-items-center pointer">
                <span>Peruntukan</span>
                <i class="fa fa-angle-down ps-2 toggle-icon"></i>
              </a>
              <ul class="chk-peruntukan content-table">
                <li>
                  <label class="d-block" for="chk-nte">
                    <input class="checkbox_animated" id="chk-nte" type="checkbox">NTE
                  </label>
                </li>
                <li>
                  <label class="d-block" for="chk-ioan">
                    <input class="checkbox_animated" id="chk-ioan" type="checkbox">IOAN
                  </label>
                </li>
                <li>
                  <label class="d-block" for="chk-nonte">
                    <input class="checkbox_animated" id="chk-nonte" type="checkbox">Non NTE
                  </label>
                </li>
                <li>
                  <label class="d-block" for="chk-nonioan">
                    <input class="checkbox_animated" id="chk-nonioan" type="checkbox">Non IOAN
                  </label>
                </li>
              </ul>

              <br>

              <a class="header-reg header-table form-label d-flex justify-content-between align-items-center pointer">
                <span>Regional</span>
                <i class="fa fa-angle-down ps-2 toggle-icon"></i>
              </a>
              <ul class="chk-reg content-table">
                <li>
                  <label class="d-block" for="chk-reg1">
                    <input class="checkbox_animated" id="chk-reg1" type="checkbox">Regional 1
                  </label>
                </li>
                <li>
                  <label class="d-block" for="chk-reg2">
                    <input class="checkbox_animated" id="chk-reg2" type="checkbox">Regional 2
                  </label>
                </li>
                <li>
                  <label class="d-block" for="chk-reg3">
                    <input class="checkbox_animated" id="chk-reg3" type="checkbox">Regional 3
                  </label>
                </li>
                <li>
                  <label class="d-block" for="chk-reg4">
                    <input class="checkbox_animated" id="chk-reg4" type="checkbox">Regional 4
                  </label>
                </li>
                <li>
                  <label class="d-block" for="chk-reg5">
                    <input class="checkbox_animated" id="chk-reg5" type="checkbox">Regional 5
                  </label>
                </li>
                <li>
                  <label class="d-block" for="chk-reg6">
                    <input class="checkbox_animated" id="chk-reg6" type="checkbox">Regional 6
                  </label>
                </li>
                <li>
                  <label class="d-block" for="chk-reg7">
                    <input class="checkbox_animated" id="chk-reg7" type="checkbox">Regional 7
                  </label>
                </li>
              </ul>

              <br>
              <div class="card btn-filter">
                <button type="button" class="btn btn-sm btn-danger" id="filter">Filter</button> <br>
                <button type="button" class="btn btn-sm btn-danger" id="reset-filter">Reset</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Container-fluid Ends-->
  @push('scripts')
    @includeIf('dashboard.view.partials.js')
    <script>
      var map = L.map('map', {
        fullscreenControl: true,
        fullscreenControlOptions: {
          position: 'topright'
        }
      }).setView([-2.5489, 118.0149], 5);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      L.marker([-6.200000, 106.816666]).addTo(map)
        .bindPopup('Ini Jakarta')
        .openPopup();

      // load table
      $(document).ready(function() {
        $('#dataTable').DataTable({
          "paging": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "pageLength": 10
        });
      });

      // excel download
      $('#pills-clrcontact-tab').on('click', function() {
        window.location.href = '/path/to/your/excel/download';
      });

      // reset filter
      document.getElementById("reset-filter").addEventListener("click", function() {
        const checkboxes = document.querySelectorAll(".sidebar input[type='checkbox']");

        checkboxes.forEach((checkbox) => {
          checkbox.checked = false;
        });

        const collapsibles = document.querySelectorAll(".content-table");
        collapsibles.forEach((content) => {
          content.style.display = "block";
        });

        const icons = document.querySelectorAll(".toggle-icon");
        icons.forEach((icon) => {
          icon.classList.remove("fa-angle-right");
          icon.classList.add("fa-angle-down");
        });
      });
    </script>
  @endpush
@endsection

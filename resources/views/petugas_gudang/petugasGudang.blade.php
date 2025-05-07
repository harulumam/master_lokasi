@extends('layouts.admin.master')

@section('title', 'Gudang')

@push('css')
  {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}"> --}}
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endpush
@section('content')
  @yield('breadcrumb-list')
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-6">
          <b>
            <h1>Petugas Gudang</h1>
          </b>
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
            <div class="table-responsive">
              <table class="display no-wrap-table" id="dataTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Regional</th>
                    <th>Witel</th>
                    <th>Lokasi</th>
                    <th>Tipe Gudang</th>
                    <th>Kategori Gudang</th>
                    <th>PIC REG NIK</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>PIC SS NIK</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Staff Gudang NIK</th>
                    <th>Nama</th>
                    <th>Posisi HRMISTA</th>
                    <th>Telepon</th>
                    <th>Email</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td data-label="No">1</td>
                    <td data-label="Regional">Regional 2</td>
                    <td data-label="Witel">Jakarta Barat</td>
                    <td data-label="Lokasi">Slipi</td>
                    <td data-label="Tipe Gudang">Regional</td>
                    <td data-label="Kategori Gudang">Asset</td>
                    <td data-label="NIK REG">20134353</td>
                    <td data-label="Nama REG">Dwiky</td>
                    <td data-label="Telepon REG">081243215432</td>
                    <td data-label="Email REG">abc@telkomakses.co.id</td>
                    <td data-label="NIK SS">20134353</td>
                    <td data-label="Nama SS">Kulum</td>
                    <td data-label="Telpon SS">0857432198765</td>
                    <td data-label="Email SS">abc@telkomakses.co.id</td>
                    <td data-label="NIK Staff">20140976</td>
                    <td data-label="Nama Staff">Maksum</td>
                    <td data-label="Posisi HR">Petugas Gudang</td>
                    <td data-label="Telepon Staff">085167850987</td>
                    <td data-label="Email Staff">abc@telkomakses.co.id</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Regional 1</td>
                    <td>Sumatera</td>
                    <td>Palembang</td>
                    <td>Regional</td>
                    <td>Asset</td>
                    <td>20134353</td>
                    <td>Kris</td>
                    <td>081243215432</td>
                    <td>abc@telkomakses.co.id</td>
                    <td>20134353</td>
                    <td>Kulum</td>
                    <td>0857432198765</td>
                    <td>abc@telkomakses.co.id</td>
                    <td>20140976</td>
                    <td>Maksum</td>
                    <td>Petugas Gudang</td>
                    <td>085167850987</td>
                    <td>abc@telkomakses.co.id</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Regional 5</td>
                    <td>Surabaya</td>
                    <td>Tambak Wedi</td>
                    <td>Regional</td>
                    <td>Asset</td>
                    <td>20134353</td>
                    <td>Dwiky</td>
                    <td>081243215432</td>
                    <td>abc@telkomakses.co.id</td>
                    <td>20134353</td>
                    <td>Kulum</td>
                    <td>0857432198765</td>
                    <td>abc@telkomakses.co.id</td>
                    <td>20140976</td>
                    <td>Maksum</td>
                    <td>Petugas Gudang</td>
                    <td>085167850987</td>
                    <td>abc@telkomakses.co.id</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Regional 5</td>
                    <td>Surabaya</td>
                    <td>Tambak Wedi</td>
                    <td>Regional</td>
                    <td>Asset</td>
                    <td>20134353</td>
                    <td>Dwiky</td>
                    <td>081243215432</td>
                    <td>abc@telkomakses.co.id</td>
                    <td>20134353</td>
                    <td>Kulum</td>
                    <td>0857432198765</td>
                    <td>abc@telkomakses.co.id</td>
                    <td>20140976</td>
                    <td>Maksum</td>
                    <td>Petugas Gudang</td>
                    <td>085167850987</td>
                    <td>abc@telkomakses.co.id</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Regional 5</td>
                    <td>Surabaya</td>
                    <td>Tambak Wedi</td>
                    <td>Regional</td>
                    <td>Asset</td>
                    <td>20134353</td>
                    <td>Dwiky</td>
                    <td>081243215432</td>
                    <td>abc@telkomakses.co.id</td>
                    <td>20134353</td>
                    <td>Kulum</td>
                    <td>0857432198765</td>
                    <td>abc@telkomakses.co.id</td>
                    <td>20140976</td>
                    <td>Maksum</td>
                    <td>Petugas Gudang</td>
                    <td>085167850987</td>
                    <td>abc@telkomakses.co.id</td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>Regional 5</td>
                    <td>Surabaya</td>
                    <td>Tambak Wedi</td>
                    <td>Regional</td>
                    <td>Asset</td>
                    <td>20134353</td>
                    <td>Dwiky</td>
                    <td>081243215432</td>
                    <td>abc@telkomakses.co.id</td>
                    <td>20134353</td>
                    <td>Kulum</td>
                    <td>0857432198765</td>
                    <td>abc@telkomakses.co.id</td>
                    <td>20140976</td>
                    <td>Maksum</td>
                    <td>Petugas Gudang</td>
                    <td>085167850987</td>
                    <td>abc@telkomakses.co.id</td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>Regional 5</td>
                    <td>Surabaya</td>
                    <td>Tambak Wedi</td>
                    <td>Regional</td>
                    <td>Asset</td>
                    <td>20134353</td>
                    <td>Dwiky</td>
                    <td>081243215432</td>
                    <td>abc@telkomakses.co.id</td>
                    <td>20134353</td>
                    <td>Kulum</td>
                    <td>0857432198765</td>
                    <td>abc@telkomakses.co.id</td>
                    <td>20140976</td>
                    <td>Maksum</td>
                    <td>Petugas Gudang</td>
                    <td>085167850987</td>
                    <td>abc@telkomakses.co.id</td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td>Regional 5</td>
                    <td>Surabaya</td>
                    <td>Tambak Wedi</td>
                    <td>Regional</td>
                    <td>Asset</td>
                    <td>20134353</td>
                    <td>Dwiky</td>
                    <td>081243215432</td>
                    <td>abc@telkomakses.co.id</td>
                    <td>20134353</td>
                    <td>Kulum</td>
                    <td>0857432198765</td>
                    <td>abc@telkomakses.co.id</td>
                    <td>20140976</td>
                    <td>Maksum</td>
                    <td>Petugas Gudang</td>
                    <td>085167850987</td>
                    <td>abc@telkomakses.co.id</td>
                  </tr>
                  <tr>
                    <td>9</td>
                    <td>Regional 5</td>
                    <td>Surabaya</td>
                    <td>Tambak Wedi</td>
                    <td>Regional</td>
                    <td>Asset</td>
                    <td>20134353</td>
                    <td>Dwiky</td>
                    <td>081243215432</td>
                    <td>abc@telkomakses.co.id</td>
                    <td>20134353</td>
                    <td>Kulum</td>
                    <td>0857432198765</td>
                    <td>abc@telkomakses.co.id</td>
                    <td>20140976</td>
                    <td>Maksum</td>
                    <td>Petugas Gudang</td>
                    <td>085167850987</td>
                    <td>abc@telkomakses.co.id</td>
                  </tr>
                  <tr>
                    <td>10</td>
                    <td>Regional 5</td>
                    <td>Surabaya</td>
                    <td>Tambak Wedi</td>
                    <td>Regional</td>
                    <td>Asset</td>
                    <td>20134353</td>
                    <td>Dwiky</td>
                    <td>081243215432</td>
                    <td>abc@telkomakses.co.id</td>
                    <td>20134353</td>
                    <td>Kulum</td>
                    <td>0857432198765</td>
                    <td>abc@telkomakses.co.id</td>
                    <td>20140976</td>
                    <td>Maksum</td>
                    <td>Petugas Gudang</td>
                    <td>085167850987</td>
                    <td>abc@telkomakses.co.id</td>
                  </tr>
                  <tr>
                    <td>11</td>
                    <td>Regional 5</td>
                    <td>Surabaya</td>
                    <td>Tambak Wedi</td>
                    <td>Regional</td>
                    <td>Asset</td>
                    <td>20134353</td>
                    <td>Dwiky</td>
                    <td>081243215432</td>
                    <td>abc@telkomakses.co.id</td>
                    <td>20134353</td>
                    <td>Kulum</td>
                    <td>0857432198765</td>
                    <td>abc@telkomakses.co.id</td>
                    <td>20140976</td>
                    <td>Maksum</td>
                    <td>Petugas Gudang</td>
                    <td>085167850987</td>
                    <td>abc@telkomakses.co.id</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="sidebar">
            <div class="card-body animate-chk">
              <label class="card-title">Data Filter </label>

              <br>

              <a class="header-tipe header-table form-label d-flex justify-content-between align-items-center pointer">
                <span>Kategori Gudang</span>
                <i class="fa fa-angle-down ps-2 toggle-icon"></i>
              </a>
              <ul class="chk-kat content-table">
                <li>
                  <label class="d-block" for="chk-kat-asset">
                    <input class="checkbox_animated" id="chk-kat-asset" type="checkbox">Asset
                  </label>
                </li>
                <li>
                  <label class="d-block" for="chk-kat-material">
                    <input class="checkbox_animated" id="chk-kat-material" type="checkbox">Material
                  </label>
                </li>
                <li>
                  <label class="d-block" for="chk-kat-nte">
                    <input class="checkbox_animated" id="chk-kat-nte" type="checkbox">NTE
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

              <a class="header-tipe header-table form-label d-flex justify-content-between align-items-center pointer">
                <span>Tipe Gudang</span>
                <i class="fa fa-angle-down ps-2 toggle-icon"></i>
              </a>
              <ul class="chk-tipe content-table">
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

              <a class="header-reg  header-table form-label d-flex justify-content-between align-items-center pointer">
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
      $(document).ready(function() {
        $('#dataTable').DataTable({
          "paging": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "pageLength": 10
        });
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

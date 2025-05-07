@extends('layouts.admin.master')

@section('title', 'History Lokasi')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/prism.css') }}">
@endpush
@section('content')
  @yield('breadcrumb-list')
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-6">
          <b>
            <h1>History Lokasi</h1>
          </b>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid dashboard-default-sec">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="display no-wrap-table" id="dataTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Lokasi</th>
                    <th>Regional</th>
                    <th>Witel</th>
                    <th>Created By</th>
                    <th>Last Update</th>
                    <th>History</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Jakarta Barat</td>
                    <td>Regional 2</td>
                    <td>Slipi</td>
                    <td>20431234</td>
                    <td>11/11/2024</td>
                    <td>
                      <a class="pointer" href="#" data-bs-toggle="modal" data-bs-target="#statusModal"
                        style="color: red; font-weight: bold;">
                        <i class="fa fa-dot-circle-o"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Jakarta Barat</td>
                    <td>Regional 2</td>
                    <td>Slipi</td>
                    <td>20431234</td>
                    <td>11/11/2024</td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Jakarta Barat</td>
                    <td>Regional 2</td>
                    <td>Slipi</td>
                    <td>20431234</td>
                    <td>11/11/2024</td>
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
  <!-- Container-fluid Ends-->
  {{-- modal --}}
  <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tableModalLabel">History Lokasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Tabel yang Cantik -->
          <div class="table-responsive">
            <table class="table table-striped table-hover align-middle no-wrap-table">
              <thead class="table-primary">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Lokasi</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Create By</th>
                  <th scope="col">Create Date</th>
                  <th scope="col">Approval</th>
                  <th scope="col">Approval Date</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Jakarta Barat</td>
                  <td>Update Gudang</td>
                  <td>NIK-Nama</td>
                  <td>11/11/2024</td>
                  <td>NIK-Nama</td>
                  <td>11/11/2024</td>
                  <td><span class="badge bg-success">Approved</span></td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jakarta Barat</td>
                  <td>Update Gudang</td>
                  <td>NIK-Nama</td>
                  <td>11/11/2024</td>
                  <td>NIK-Nama</td>
                  <td>11/11/2024</td>
                  <td><span class="badge bg-warning">Pending</span></td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Jakarta Barat</td>
                  <td>Update Gudang</td>
                  <td>NIK-Nama</td>
                  <td>11/11/2024</td>
                  <td>NIK-Nama</td>
                  <td>11/11/2024</td>
                  <td><span class="badge bg-danger">Rejected</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

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

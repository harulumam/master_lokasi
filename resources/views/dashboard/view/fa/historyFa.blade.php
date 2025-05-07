@extends('layouts.admin.master')

@section('title', 'History Update Fiber Academy')

@push('css')
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
@endpush

@section('content')
  @yield('breadcrumb-list')
  @component('components.breadcrumb')
    @slot('breadcrumb_title')
      <h3>Slipi</h3>
    @endslot
    @slot('breadcrumb_sub_title')
      <h5>Regional Jakarta | Witel Jakarta Barat</h5>
    @endslot
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Master lokasi</a></li>
    <li class="breadcrumb-item"><a href="{{ route('fa') }}">Dashboard Fiber Academy</a></li>
    <li class="breadcrumb-item active">History Update</li>
  @endcomponent

  <!-- Container-fluid starts -->
  <div class="container-fluid dashboard-default-sec">
    <div class="row">
      <div class="col-md-2">
        <div class="card p-3">
          <div class="sidebar">
            <div class="row mb-3 mt-3">
              <div class="col-12">
                <label class="form-label" for="">
                  <a href="{{ route('viewFa', ['id' => $kode_fa]) }}">Lokasi</a>
                </label>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
                <label class="form-label d-flex justify-content-between align-items-center collapsible-header"
                  for="" style="cursor: pointer;">
                  Fiber Academy
                  <i class="fa fa-angle-right ps-2 toggle-icon"></i>
                </label>
              </div>
            </div>
            <div class="row mb-3 collapsible-content" style="display: none;">
              <div class="col-12">
                <label class="form-label" for=""><a
                    href="{{ route('detailFa', ['id' => $kode_fa]) }}">Detail Fiber Academy</a></label>
                <label class="form-label" for=""><a
                    href="{{ route('ruanganFa', ['id' => $kode_fa]) }}">Detail Ruangan</a></label>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
                <a href="{{ route('historyFa', ['id' => $kode_fa]) }}">
                  <label class="form-label pointer" style="color: #E63946">History Update</label>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <a href="{{ route('editFa', ['id' => $kode_fa]) }}" class="btn btn-danger text-white text-decoration-none">
            Update Data </a>
        </div>
      </div>
      <div class="col-md-10">
        <div class="card">
          <div class="card-body">
            <div class="col-sm-12">
              <div class="card">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Create By</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Last Update</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>NIK - Creator</td>
                        <td>Update Gudang NTE</td>
                        <td>28/10/2024</td>
                        <td>
                          @if ($status === 'Approve')
                            <a class="pointer" href="#" data-bs-toggle="modal" data-bs-target="#statusModal"
                              style="color: green; font-weight: bold;">{{ $status }}</a>
                          @else
                            <a class="pointer" href="#" data-bs-toggle="modal" data-bs-target="#statusModal"
                              style="color: red; font-weight: bold;">Tidak Approve</a>
                          @endif
                        </td>
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

  <!-- Container-fluid Ends-->
  {{-- modal --}}
  <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="statusModalLabel">History Approval</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Konten Modal -->
          <div class="card-body">
            <div class="col-sm-12">
              <div class="card">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Create By</th>
                        <th scope="col">Status</th>
                        <th scope="col">Komentar</th>
                        <th scope="col">Create Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>NIK - Nama</td>
                        <td>
                          @if ($status_modal === 'Approve')
                            <label for="" style="color: green; font-weight: bold;">
                              {{ $status_modal }}
                            </label>
                          @elseif ($status_modal === 'Submit')
                            <label for="" style="color: blue; font-weight: bold;">
                              {{ $status_modal }}
                            </label>
                          @else
                            <label for="" style="color: red; font-weight: bold;">
                              Tidak Approve
                            </label>
                          @endif
                        </td>
                        <td>-</td>
                        <td>02/10/2024</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>NIK - Nama</td>
                        <td>
                          @if ($status_modal === 'Approve')
                            <label for="" style="color: green; font-weight: bold;">

                              {{ $status_modal }}
                            </label>
                          @elseif ($status_modal === 'Submit')
                            <label for="" style="color: blue; font-weight: bold;">
                              {{ $status_modal }}
                            </label>
                          @else
                            <label for="" style="color: red; font-weight: bold;">
                              Tidak Approve
                            </label>
                          @endif
                        </td>
                        <td>OK</td>
                        <td>02/10/2024</td>
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
  @push('scripts')
    @includeIf('dashboard.view.partials.js')
  @endpush
@endsection

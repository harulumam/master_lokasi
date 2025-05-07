@extends('layouts.admin.master')

@section('title', 'List Lokasi')

@push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
@endpush
@section('content')
  @yield('breadcrumb-list')
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">
        <div class="col-sm-6">
          <b>
            <h1>List Lokasi</h1>
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
          <div class="card-body" style="padding-bottom: 0;">
            <div class="text-right" style="padding-top: 10px;">
              <a href="{{ route('listLokasi.create') }}" id="listCreateCard">
                <button class="btn btn-danger pull-right">Create Lokasi</button>
              </a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="display dataTable" id="basic-3">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Lokasi</th>
                    <th>Regional</th>
                    <th>Witel</th>
                    <th>Gudang</th>
                    <th>Fiber Academy</th>
                    <th>Office</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($lokasi as $item)
                    <tr>
                      <td>{{ $item['id'] }}</td>
                      <td>{{ $item['lokasi'] }}</td>
                      <td>{{ $item['regional'] }}</td>
                      <td>{{ $item['witel'] }}</td>
                      <td>{{ $item['gudang'] }}</td>
                      <td>{{ $item['fiber_academy'] }}</td>
                      <td>{{ $item['office'] }}</td>
                      <td>{{ $item['status'] == 'Y' ? 'Active' : 'Inactive' }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Container-fluid Ends-->
  @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
      // Membuat peta dan mengatur posisi pusatnya ke Indonesia
      var map = L.map('map').setView([-2.5489, 118.0149], 5);

      // Menambahkan lapisan OpenStreetMap ke dalam peta
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      // Menambahkan marker pada Jakarta
      L.marker([-6.200000, 106.816666]).addTo(map)
        .bindPopup('Ini Jakarta')
        .openPopup();
    </script>
  @endpush
@endsection

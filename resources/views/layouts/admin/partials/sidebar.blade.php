<header class="main-nav">
  <div class="sidebar-user text-center">
    <img class="img-90 rounded-circle" src="{{ $foto }}" alt="" />
    <a>
      <p class="mb-0 font-roboto">{{ $nik }}</p>
      <h6 class="mt-3 f-14 f-w-600">{{ $name }}</h6>
    </a>
    <p class="mb-0 font-roboto">{{ $position }}</p>
  </div>
  <nav>
    <div class="main-navbar">
      <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
      <div id="mainnav">
        <ul class="nav-menu custom-scrollbar">
          <li class="back-btn">
            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
            </div>
          </li>
          <li class="dropdown">
            <a class="nav-link menu-title {{ prefixActive(['/dashboard', '/list-lokasi', '/petugas-gudang', '/history-lokasi']) }}"
              href="javascript:void(0)">
              <i data-feather="home"></i><span>Master Lokasi</span>
            </a>

            <ul class="nav-submenu menu-content"
              style="display: {{ prefixBlock(['/dashboard', '/list-lokasi', '/petugas-gudang', '/history-lokasi']) }};">
              <li><a href="{{ route('dashboard') }}" class="{{ routeActive('dashboard') }}">Master Lokasi</a></li>
              <li><a href="{{ route('listLokasi') }}" class="{{ routeActive('listLokasi') }}">List Lokasi</a></li>
              <li><a href="{{ route('petugasGudang') }}" class="{{ routeActive('petugasGudang') }}">Petugas Gudang</a>
              </li>
              <li><a href="{{ route('historyLokasi') }}" class="{{ routeActive('historyLokasi') }}">History Lokasi</a>
              </li>
              {{-- <li><a href="{{ route('index') }}" class="{{ routeActive('index') }}">Default</a></li> --}}
            </ul>

          </li>
        </ul>
      </div>
      <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </div>
  </nav>
</header>

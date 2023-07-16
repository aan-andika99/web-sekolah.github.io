{{ date_default_timezone_set('Asia/Jakarta'); }}
<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="/Assets/"
  data-template="vertical-menu-template-free"
>

  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <title>{{ $title }}</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{ $icon }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/Assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="/Assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/Assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/Assets/css/demo.css" />
    <link rel="stylesheet" href="/Assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/Assets/vendor/libs/apex-charts/apex-charts.css" />
    <script src="/Assets/vendor/js/helpers.js"></script>
    <script src="/Assets/js/config.js"></script>
  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="{{ $icon }}" style="width:5%" alt="">
              </span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>
          <div class="menu-inner-shadow"></div>
          <ul class="menu-inner py-1">
            <li class="menu-item {{ request()->is('dashboard') ? 'active' : ''}}">
              <a href="{{ url('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            {{-- @can('isSiswa')
            @elsecan('isGuru')
            @elsecan('isAdmin')
            @endcan --}}

            
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Pendaftaran</span></li>
            <li class="menu-item {{ request()->is('pendaftaran') ? 'active' : ''}}">
              <a href="{{ url('pendaftaran') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book"></i>
                <div data-i18n="Form Elements">Pendaftaran</div>
              </a>
              <li class="menu-item {{ request()->is('data_siswa') ? 'active' : ''}}">
                <a href="{{ url('data_siswa') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-user"></i>
                  <div data-i18n="Basic Inputs">Data Siswa</div>
                </a>
              </li>
              <li class="menu-item {{ request()->is('data_orangtua') ? 'active' : ''}}">
                <a href="{{  url('data_orangtua') }}" class="menu-link">
                  <i class="menu-icon tf-icons"><iconify-icon icon="bx:male-female"></iconify-icon></i>
                  <div data-i18n="Input groups">Data Orangtua</div>
                </a>
              </li>
              <li class="menu-item {{ request()->is('data_pendukung') ? 'active' : ''}}">
                <a href="{{ url('data_pendukung') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-file"></i>
                  <div data-i18n="Input groups">Berkas Pendukung</div>
                </a>
              </li>
              <li class="menu-item {{ request()->is('validasi') ? 'active' : ''}}">
                <a href="{{ url('validasi') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-check-square"></i>
                  <div data-i18n="Input groups">Validasi</div>
                </a>
              </li>
            </li>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Cetak Berkas</span></li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <div data-i18n="Form Elements">Pendaftaran</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item {{ request()->is('data_siswa') ? 'active' : ''}}">
                  <a href="{{ url('data_siswa') }}" class="menu-link">
                    <div data-i18n="Basic Inputs">Data Siswa</div>
                  </a>
                </li>
                <li class="menu-item {{ request()->is('data_orangtua') ? 'active' : ''}}">
                  <a href="{{  url('data_orangtua') }}" class="menu-link">
                    <div data-i18n="Input groups">Data Orangtua</div>
                  </a>
                </li>
                <li class="menu-item {{ request()->is('data_pendukung') ? 'active' : ''}}">
                  <a href="{{ url('data_pendukung') }}" class="menu-link">
                    <div data-i18n="Input groups">Berkas Pendukung</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="forms-input-groups.html" class="menu-link">
                    <div data-i18n="Input groups">Validasi</div>
                  </a>
                </li>
                <li class="menu-item {{ request()->is('daftar_guru') ? 'active' : ''}}">
                  <a href="{{ url('daftar_guru') }}" class="menu-link">
                    <div data-i18n="Input groups">Daftar Guru</div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </aside>
        <div class="layout-page">
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>
            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">{{ date('d  M  y / H:i'); }}
              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{ url('/profile') }}">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{ route('actionlogout') }}">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
            @yield('content')
          <footer class="content-footer footer bg-footer-theme">
          <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            <div class="mb-2 mb-md-0"></div>
          </div>
          </footer>
          <div class="content-backdrop fade"></div>
        </div>
      </div>
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <script src="/Assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/Assets/vendor/libs/popper/popper.js"></script>
    <script src="/Assets/vendor/js/bootstrap.js"></script>
    <script src="/Assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/Assets/vendor/js/menu.js"></script>
    <script src="/Assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="/Assets/js/mainadmin.js"></script>
    <script src="/Assets/js/dashboards-analytics.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>

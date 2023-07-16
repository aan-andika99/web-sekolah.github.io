@extends('layouts.back_admin')
@section('content')
    

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

              <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row">
                  <div class="col-lg-12 mb-4 order-0">
                    <div class="card">
                      <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                          <div class="card-body">
                            @can('isSiswa')
                              <h5 class="card-title text-primary">Selamat Datang <b>{{Auth::user()->name}}</b></h5>
                              <h6 class="card-title text-seccondary">Mohon Isi Data Pendaftaran, Dan Cek Secara Berkala Untuk Menghindari Kesalahan Data Diri Anda</h6>
                            @elsecan('isGuru')
                              <h5 class="card-title text-primary">Selamat Datang <b>{{Auth::user()->name}}</b></h5>
                            @elsecan('isAdmin')
                              <h5 class="card-title text-primary">Anda Login Sebagai <b>{{Auth::user()->name}}</b></h5>
                            @endcan

                          </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                          <div class="card-body pb-0 px-0 px-md-4">
                            <img
                              src="../assets/img/illustrations/man-with-laptop-light.png"
                              height="140"
                              alt="View Badge User"
                              data-app-dark-img="illustrations/man-with-laptop-dark.png"
                              data-app-light-img="illustrations/man-with-laptop-light.png"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
            <!-- / Content -->

@endsection
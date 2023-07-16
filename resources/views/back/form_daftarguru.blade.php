@extends('layouts.back_admin')
@section('content')
<!-- Content wrapper -->
  <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-body">
            @if(session('message'))
              <div class="alert alert-success">
                  {{session('message')}}
              </div>
              @endif
            <div class="content-wrapper">
            <form id="formAuthentication" class="mb-3" action="{{route('actionregisterGuru')}}" method="POST">
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="tgl">Nama Guru</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" id="basic-default-name" placeholder=" Masukkan Nama" @required(true) />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="jenis_kelamin">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <input name="jenis_kelamin" class="form-check-input" type="radio" value="Laki-Laki" id="defaultRadio1" checked />
                    <label class="form-check-label" for="defaultRadio1"> Laki-Laki </label>
                    <input name="jenis_kelamin" class="form-check-input" type="radio" value="Perempuan" id="defaultRadio2" />
                    <label class="form-check-label" for="defaultRadio2"> Perempuan </label>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="email">E-Mail</label>
                <div class="col-sm-4">
                  <div class="input-group input-group-merge" hidden>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan E-Mail" @required(true)/>
                  </div>
                </div>
                <label class="col-sm-2 col-form-label" for="password">Password</label>
                <div class="col-sm-4">
                  <div class="input-group input-group-merge">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password" @required(true)/>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="n">nomor Hp</label>
                <div class="col-sm-4">
                  <input type="text" id="no_telp" class="form-control phone-mask" placeholder="Jika Ada"  name="no_telp" />
                </div>
                <label class="col-sm-2 col-form-label" for="n">Ketik Ulang Password</label>
                <div class="col-sm-4">
                  <input type="password2" id="password2" class="form-control phone-mask" placeholder="Ketik Ulang Password" name="password2" required/>
                </div>
              </div>
              <input type="hidden" name="role" value="guru" id="">
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="Back/js/wilayah.js"></script>
  <!-- / Content -->
@endsection
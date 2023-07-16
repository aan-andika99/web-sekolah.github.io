{{-- @extends('layouts.back_admin') --}}
@extends('layouts.back_settingProfile')
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
                <label class="col-sm-2 col-form-label" for="tgl">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" id="basic-default-name" value="{{ Auth::user()->name }}" placeholder=" Masukkan Nama" @readonly(true) />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="jenis_kelamin">Jenis Kelamin</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="jenis_kelamin" id="basic-default-name" value="{{ Auth::user()->jenis_kelamin }}" placeholder=" Masukkan Nama" @readonly(true) />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="email">E-Mail</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <input type="email" id="email" name="email" value="{{ auth::user()->email }}" class="form-control" placeholder="Masukkan E-Mail" @required(true)/>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="n">nomor Hp</label>
                <div class="col-sm-10">
                  <input type="text" id="no_hp" value="{{ auth::user()->no_hp }}" class="form-control phone-mask" placeholder="Jika Ada"  name="no_telp" />
                </div>
              </div>
              <input type="hidden" name="role" value="guru" id="">
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Edit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="name" class="col-form-label">Nama:</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Jenis Kelamin:</label>
            <select class="form-control" name="jenis_kelamin">
              <option value="Perempuan">Perempuan</option>
              <option value="Laki-Laki">Laki-Laki</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="name" class="col-form-label">E-Mail:</label>
            <input type="text" class="form-control" name="email">
          </div>
          <div class="mb-3">
            <label for="name" class="col-form-label">No Hp:</label>
            <input type="text" class="form-control" name="no_hp">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
  <script src="Back/js/wilayah.js"></script>
  <!-- / Content -->
@endsection
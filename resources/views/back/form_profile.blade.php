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
              <div class="row mb-3">
                
                @if(session('success'))
                <div class="alert alert-success">
                  {{session('success')}}
                </div>
                @elseif(session('error'))
                <div class="alert alert-warning">
                  {{session('error')}}
                </div>
              @endif
                <h5 class="card-header">Profile Details</h5>
                <form action="{{ route('updatefoto') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                <input type="hidden" value="{{$user->id_user}}.{{$user->fname}}-{{$user->lname}}" name="name_file">
                <input type="hidden" value="{{$user->avatar}}" name="old">
                <div class="card-body">
                  <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="../Upload.FotoProfil/{{ $user->avatar }}" alt="user-avatar" class="d-block rounded" height="151px" width="113px" id="uploadedAvatar">
                    <div class="button-wrapper">
                      <label for="upload" class="btn me-2 mb-4" tabindex="0">
                        <input type="file"  name="file_foto" class="form-control" accept="image/png, image/gif, image/jpeg"  @required(false)/>
                        {{-- <input type="file" value="file_foto" accept="image/jpg" > --}}
                      </label>
                        <button type="submit" class="btn btn-primary me-2 mb-4">
                        <span class="d-none d-sm-block"> Edit Photo</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        </button>
                      </form>

                      <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                      </button>
                      <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                    </div>
                  </div>
                </div>
                <hr class="my-0">
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="tgl">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" id="basic-default-name" value="{{ Auth::user()->fname }} {{ Auth::user()->mname }} {{ Auth::user()->lname }}" placeholder=" Masukkan Nama" @readonly(true) />
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
                    <input type="email" id="email" name="email" value="{{ auth::user()->email }}" class="form-control" placeholder="Masukkan E-Mail" @readonly(true)/>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="n">nomor Hp</label>
                <div class="col-sm-10">
                  <input type="text" id="no_hp" value="0{{ auth::user()->no_hp }}" class="form-control phone-mask" placeholder="Jika Ada"  name="no_telp" @readonly(true) />
                </div>
              </div>
              <input type="hidden" name="role" value="guru" id="">
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Edit</button>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Profil</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('updateuser') }}">
          @csrf
          <div class="mb-3">
            <input type="hidden" class="form-control" name="id_user"  value="{{ Auth::user()->id_user}}">
            <input type="hidden" class="form-control" name="status"  value="{{ Auth::user()->status}}">
          </div>
          <div class="mb-3">
            <label for="name" class="col-form-label">Nama Depan:</label>
            <input type="text" class="form-control" name="fname" value="{{ Auth::user()->fname }}">
          </div>
          <div class="mb-3">
            <label for="name" class="col-form-label">Nama Tengah:</label>
            <input type="text" class="form-control" name="mname" value="{{ Auth::user()->mname }}">
          </div>
          <div class="mb-3">
            <label for="name" class="col-form-label">Nama Belakang:</label>
            <input type="text" class="form-control" name="lname" value="{{ Auth::user()->lname }}">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Jenis Kelamin:</label>
            <select class="form-control" name="jenis_kelamin" value="{{ auth::user()->jenis_kelamin }}" @required(true)>
              <option value="Perempuan">Perempuan</option>
              <option value="Laki-Laki">Laki-Laki</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="name" class="col-form-label">E-Mail:</label> 
            <input type="text" class="form-control" name="email" value="{{ auth::user()->email }}" @required(true)>
          </div>
          <div class="mb-3">
            <label for="name" class="col-form-label">No Hp:</label>
            <input type="text" class="form-control" name="no_hp" value="0{{ auth::user()->no_hp }}" @required(true)>
          </div>
          
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button >
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
  <script src="Back/js/wilayah.js"></script>
  <!-- / Content -->
@endsection
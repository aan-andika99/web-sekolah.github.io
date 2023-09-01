@extends('layouts.back_admin')
@section('content') 
{{-- {{ date_default_timezone_set('Asia/Jakarta'); }} --}}
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-4">
         
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Upload Berkas</h5>
              <small class="text-muted float-end">Scan terlebih dahulu dokumen dan upload filenya berupa PDF pada Form ini</small>
            </div>
            <div class="card-body">
              @if(session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
              @endif

              @if(session('error'))
                  <div class="alert alert-danger">
                      {{ session('error') }}
                  </div>
              @endif
              <div class="content-wrapper">         
                {{-- ijazah --}}
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="tgl">ijazah</label>
                  <div class="col-sm-5">
                    {{-- <input type="button" class="form-control" name="file_ijazah" accept="application/pdf" value="{{ $files->ijazah }}"  @required(false)/> --}}
                    <a href="{{ route('download', ['filename' => $files->ijazah,'id_user'=> Auth::user()->id_user]) }}">
                      <div class="input-group">
                        <span class="input-group-text tf-icons bx bx-file" id="basic-addon11"></span>
                        <span class="form-control" aria-label="Username" aria-describedby="basic-addon11">{{ $files->ijazah }}</span>
                      </div>
                    </a>
                  </div>
                  <div class="col-sm-2">
                    <div class="btn-group" role="group" aria-label="First group">
                      <button type="button" class="btn btn-icon btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#uploadijazah" data-bs-whatever="@mdo">
                        <span class="tf-icons bx bx-upload"></span>
                      </button>                
                    </div>
                  </div>
                </div>
                {{-- End Ijazah --}}
                {{-- akta --}}
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="pekerjaan-ayah">Akta</label>
                  <div class="col-sm-5">
                    {{-- <div class="input-group input-group-merge"> --}}
                      {{-- <input type="button" class="form-control" name="file_ijazah" accept="application/pdf" value="{{ $files->akta }}"  @required(false)/> --}}
                      <a href="{{ route('downloadakta', ['filename' => $files->akta,'id_user'=> Auth::user()->id_user]) }}">
                        <div class="input-group">
                          <span class="input-group-text tf-icons bx bx-file" id="basic-addon11"></span>
                          <span class="form-control" aria-label="Username" aria-describedby="basic-addon11">{{ $files->akta }}</span>
                        </div>
                      </a>
                    {{-- </div> --}}
                  </div>
                  @can('isProcess')
                  <div class="col-sm-5">
                    <div class="btn-group" role="group" aria-label="First group">
                      <button type="button" class="btn btn-icon btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#uploadakta" data-bs-whatever="@mdo">
                        <span class="tf-icons bx bx-upload"></span>
                      </button>
                    </div>
                  </div>
                  @elsecan('isSuccess')
                  @endcan
                </div>
                {{-- End Akta --}}
                {{-- Kartu Keluarga --}}
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="pekerjaan-ayah">Kartu Keluarga</label>
                  <div class="col-sm-5">
                    {{-- <div class="input-group input-group-merge"> --}}
                      {{-- <input type="button" class="form-control" name="file_ijazah" accept="application/pdf" value="{{ $files->kk }}"  @required(false)/> --}}
                      <a href="{{ route('downloadkk', ['filename' => $files->kk,'id_user'=> $files->id_user]) }}">
                        <div class="input-group">
                          <span class="input-group-text tf-icons bx bx-file" id="basic-addon11"></span>
                          <span class="form-control" aria-label="Username" aria-describedby="basic-addon11">{{ $files->kk }}</span>
                        </div>
                      </a>
                    {{-- </div> --}}
                  </div>
                  @can('isProcess')
                  <div class="col-sm-5">
                    <div class="btn-group" role="group" aria-label="First group">
                      <button type="button" class="btn btn-icon btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#uploadkk" data-bs-whatever="@mdo">
                        <span class="tf-icons bx bx-upload"></span>
                      </button>
                    </div>
                  </div>
                  @elsecan('isSuccess')
                  @endcan
                </div>
                {{-- End Kartu Keluarga --}}
                <!-- Toast with Placements -->
                <div
                  class="bs-toast toast toast-placement-ex m-2"
                  role="alert"
                  aria-live="assertive"
                  aria-atomic="true"
                  data-delay="2000"
                >
                  <div class="toast-header">
                    <i class="bx bx-bell me-2"></i>
                    <div class="me-auto fw-semibold">Bootstrap</div>
                    <small>11 mins ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                  </div>
                  <div class="toast-body">Fruitcake chocolate bar tootsie roll gummies gummies jelly beans cake.</div>
                </div>
                <!-- Toast with Placements -->
                <!-- Bootstrap Toasts with Placement -->
                    
                <!--/ Bootstrap Toasts with Placement -->

                {{-- <input type="hidden" id="selectTypeOpt" value="bg-primary">
                <input type="hidden" id="selectPlacement" value="bottom-0 end-0"> --}}
                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <div class="btn-toolbar demo-inline-spacing" role="toolbar" aria-label="Toolbar with button groups">
                      <div class="btn-group" role="group" aria-label="First group">
                        @can('isProcess')
                        {{-- <button type="button" class="btn btn-outline-secondary">
                          <span class="tf-icons bx bx-save"></span>&nbsp; Simpan
                        </button> --}}
                        @elsecan('isSuccess')
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalEdit" data-bs-whatever="@mdo">
                          <span class="tf-icons bx bx-pencil"></span>&nbsp; Edit
                        </button>
                        @endcan
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        
         

    

       <!--/ Bootstrap Toasts Styles -->
      </div>
    </div>
  </div>
</div>
          


{{-- Mosdals --}}
{{-- Ijazah--}}
<div class="modal fade" id="uploadijazah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Ijazah</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('uploadijazah') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="ijazah" value="{{ Auth::user()->fname}}_{{ Auth::user()->mname}}_{{ Auth::user()->lname}}">
          <input type="hidden" name="old" value="{{ $files->ijazah }}">
          <input type="hidden" name="id_user" value="{{ Auth::user()->id_user}}">
        <div class="card-body">
          <div class="content-wrapper">
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="tgl">ijazah</label>
              <div class="col-sm-8">
                <input type="file" class="form-control" name="file_ijazah" accept="application/pdf"  @required(false)/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- end --}}

{{-- akta--}}
<div class="modal fade" id="uploadakta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Akta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('uploadakta') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="akta" value="{{ Auth::user()->fname}}_{{ Auth::user()->mname}}_{{ Auth::user()->lname}}">
          <input type="hidden" name="old" value="{{ $files->akta }}">
          <input type="hidden" name="id_user" value="{{ Auth::user()->id_user}}">
        <div class="card-body">
          <div class="content-wrapper">
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="tgl">akta</label>
              <div class="col-sm-8">
                <input type="file" class="form-control" name="file_akta" accept="application/pdf"  @required(true)/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- end --}}

{{-- kk--}}
<div class="modal fade" id="uploadkk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Kartu Keluarga</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('uploadkk') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="kk" value="{{ Auth::user()->fname}}_{{ Auth::user()->mname}}_{{ Auth::user()->lname}}">
          <input type="hidden" name="old" value="{{ $files->kk }}">
          <input type="hidden" name="id_user" value="{{ Auth::user()->id_user}}">
        <div class="card-body">
          <div class="content-wrapper">
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="tgl">Kartu Keluarga</label>
              <div class="col-sm-8">
                <input type="file" class="form-control" name="file_kk" accept="application/pdf"  @required(true)/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
{{-- end --}}

@endsection
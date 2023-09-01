@extends('layouts.back_admin')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <!-- Basic Layout & Basic with Icons -->
    <section id="ayah">
      <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Data Orang Tua : Ayah</h5>
              <small class="text-muted float-end">Data Ayah Kandung</small>
            </div>
            <div class="card-body">
              <form action="{{route('dataOrangtuaAyah')}}" method="POST">
                @csrf
                @if(session('message_ayah'))
                  <div class="alert alert-success">
                    {{session('message_ayah')}}
                  </div>
                @endif
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="nama-lengkap">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="id_user" value="{{ Auth::user()->id_user }}">
                    <input type="text" class="form-control" name="nama_ayah" id="basic-default-name" value="{{ $users->nama_ayah }}" placeholder="Masukkan Nama Lengkap"  onkeyup="this.value = this.value.toUpperCase()" @required(true) />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="disabilitas_ayah">Berkebutuhan Khusus</label>
                  <div class="col-sm-10">
                    <select type="text" class="form-control" name="disabilitas_ayah" id="basic-default-name" placeholder="Masukkan Nama Lengkap" @required(true)>
                      <option value="{{ $users->disabilitas_ayah }}">{{ $users->disabilitas_ayah }}</option>
                      <option value="Ya">Ya</option>
                      <option value="Tidak">Tidak</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="Pendidikan_ayah">Pendidikan</label>
                  <div class="col-sm-10">
                    <input type="text" id="pendidikan_ayah" name="pendidikan_ayah" value="{{ $users->pendidikan_ayah }}" class="form-control" placeholder="Pendidikan Terakhir                            " @required(true)/>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="pekerjaan-ayah">Pekerjaan</label>
                  <div class="col-sm-5">
                    <div class="input-group input-group-merge">
                      <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{ $users->pekerjaan_ayah }}" class="form-control" placeholder="Masukkan Pekerjaan Ayah" @required(true)/>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="input-group input-group-merge">
                      <input type="number" id="penghasilan_ayah" name="penghasilan_ayah" value="{{ $users->penghasilan_ayah }}" class="form-control" placeholder="Penghasilan Ayah Perbulan - Contoh : 3000000" @required(true)/>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Send</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="ibu">
      <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Data Orang Tua : Ibu</h5>
              <small class="text-muted float-end">Data Ibu Kandung</small>
            </div>
            <div class="card-body">
              <form action="{{ route('dataOrangtuaIbu') }}" method="POST">
                @csrf
                @if(session('message_ibu'))
                  <div class="alert alert-success">
                    {{session('message_ibu')}}
                  </div>
                @endif
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="nama-lengkap">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="hidden" name="id_user" value="{{ Auth::user()->id_user }}">
                    <input type="text" class="form-control" name="nama_ibu" value="{{ $users->nama_ibu }}" id="basic-default-name" placeholder="Masukkan Nama Lengkap" @required(true) />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="disabilitas_ayah">Berkebutuhan Khusus</label>
                  <div class="col-sm-10">
                    <select type="text" class="form-control" name="disabilitas_ibu" id="basic-default-name" placeholder="Masukkan Nama Lengkap" @required(true)>
                      <option value="{{ $users->disabilitas_ibu }}">{{ $users->disabilitas_ibu }}</option>
                      <option value="Ya">Ya</option>
                      <option value="Tidak">Tidak</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="Pendidikan_ibu">Pendidikan</label>
                  <div class="col-sm-10">
                    <input type="text" id="pendidikan_ibu" name="pendidikan_ibu" value="{{ $users->pendidikan_ibu }}" class="form-control" placeholder="Pendidikan Terakhir                            " @required(true)/>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="pekerjaan-ibu">Pekerjaan ibu</label>
                  <div class="col-sm-5">
                    <div class="input-group input-group-merge">
                      <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{ $users->pekerjaan_ibu }}" class="form-control" placeholder="Masukkan Pekerjaan ibu" @required(true)/>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="input-group input-group-merge">
                      <input type="number" id="penghasilan_ibu" name="penghasilan_ibu" value="{{ $users->penghasilan_ibu }}" class="form-control" placeholder="Penghasilan ibu Perbulan - Contoh : 3000000" @required(true)/>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Send</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="wali">
      <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Data Wali</h5>
              <small class="text-muted float-end">Data Wali Murid</small>
            </div>
            <div class="card-body">
              <form action="{{ route('dataOrangtuaWali') }}" method="POST">
                @csrf
                @if(session('message_wali'))
                    <div class="alert alert-success">
                      {{session('message_wali')}}
                    </div>
                  @endif
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="nama-lengkap">Nama Lengkap</label>
                  <input type="hidden" value="{{ Auth::user()->id_user }}" name="id_user">
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_wali" id="basic-default-name" value="{{ $users->nama_wali }}" placeholder="Masukkan Nama Lengkap" @required(true) />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="pekerjaan-wali">Pekerjaan wali</label>
                  <div class="col-sm-5">
                    <div class="input-group input-group-merge">
                      <input type="text" id="pekerjaan_wali" name="pekerjaan_wali" value="{{ $users->pekerjaan_wali }}" class="form-control" placeholder="Masukkan Pekerjaan wali" @required(true)/>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="input-group input-group-merge">
                      <input type="number" id="penghasilan_wali" name="penghasilan_wali" value="{{ $users->penghasilan_wali }}"" class="form-control" placeholder="Penghasilan wali Perbulan - Contoh : 3000000" @required(true)/>
                    </div>
                  </div>
                </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="Pendidikan_wali">Pendidikan</label>
                    <div class="col-sm-10">
                      <input type="text" id="pendidikan_wali" name="pendidikan_wali" value="{{ $users->pendidikan_wali }}" class="form-control" placeholder="Pendidikan Terakhir                            " @required(true)/>
                    </div>
                  </div>
                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Send</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

</div>
  <script src="Back/js/wilayah.js"></script>
  <!-- / Content -->
@endsection
@extends('layouts.back_admin')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-body">
            <form>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="nama-lengkap">Nama Lengkap</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_lengkap" id="basic-default-name" placeholder="Masukkan Nama Lengkap" @required(true) />
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="jenis-kelamin">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <input name="jenis_kelamin" class="form-check-input" type="radio" value="Laki-Laki" id="defaultRadio1" checked />
                    <label class="form-check-label" for="defaultRadio1"> Laki-Laki </label>
                    <input name="jenis_kelamin" class="form-check-input" type="radio" value="Perempuan" id="defaultRadio2" />
                    <label class="form-check-label" for="defaultRadio2"> Perempuan </label>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="tempat-lahir">tempat, tanggal lahir</label>
                <div class="col-sm-5">
                  <div class="input-group input-group-merge">
                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" @required(true)/>
                  </div>
                </div>
                <div class="col-sm-5">
                  <div class="input-group input-group-merge">
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" placeholder="Masukkan NISN" @required(true)/>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="agama">agama</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <input type="text" id="agama" name="agama" class="form-control" placeholder="Masukkan agama" @required(true)/>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="nik">nik</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <input type="text" id="nik" name="nik" class="form-control" placeholder="Masukkan nik" @required(true)/>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="sekolah asal">Data Sekolah Asal</label>
                <div class="col-sm-5">
                  <div class="input-group input-group-merge">
                    <input type="text" id="nama_sekolah_asal" name="nama_sekolah_asal" class="form-control" placeholder="Masukkan Nama Sekolah Asal" @required(true)/>
                  </div>
                </div>
                <div class="col-sm-5">
                  <div class="input-group input-group-merge">
                    <input type="text" id="npsn_sekolah_asal" name="npsn_sekolah_asal" class="form-control" placeholder="Masukkan NPSN Sekolah Asal" @required(true)/>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="nisn">nisn</label>
                <div class="col-sm-4">
                  <div class="input-group input-group-merge">
                    <input type="text" id="nisn" name="nisn" class="form-control" placeholder="Masukkan NISN" @required(true)/>
                  </div>
                </div>
                <label class="col-sm-2 col-form-label" for="nisn">nis</label>
                <div class="col-sm-4">
                  <div class="input-group input-group-merge">
                    <input type="text" id="nis" name="nis" class="form-control" placeholder="Masukkan NIS" @required(true)/>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="n">nomor Telephone</label>
                <div class="col-sm-4">
                  <input type="text" id="no_telp" class="form-control phone-mask" placeholder="Jika Ada"  name="no_telp" />
                </div>
                <label class="col-sm-2 col-form-label" for="n">nomor hp</label>
                <div class="col-sm-4">
                  <input type="text" id="no_hp" class="form-control phone-mask" placeholder="6289142387645" value="62" name="no_hp" required/>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="email">email</label>
                <div class="col-sm-10">
                  <input type="email" id="email" class="form-control phone-mask" value="{{Auth::user()->email}}" name="email" @readonly(true)/>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="alamat">jalan</label>
                <div class="col-sm-10">
                  <textarea
                    id="alamat"
                    class="form-control"
                    placeholder="Hi, Do you have a moment to talk Joe?"
                    aria-label="Hi, Do you have a moment to talk Joe?"
                    aria-describedby="basic-icon-default-message2"
                  ></textarea>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="provinsi">provinsi</label>
                <div class="col-sm-10">
                  <select name="provinsi" id="provinsi" class="form-control">
                    <option type="text" id="provinsi" class="form-control phone-mask " name="provinsi"></option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="kota">kota</label>
                <div class="col-sm-10">
                  <select name="kota" id="kota" class="form-control">
                    <option type="text" id="kota" class="form-control phone-mask" name="kota"></option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="kecamatan">kecamatan</label>
                <div class="col-sm-4">
                  <select name="kecamatan" id="kecamatan" class="form-control">
                    <option type="text" id="kecamatan" class="form-control phone-mask" name="kecamatan"></option>
                  </select>
                </div>
                <label class="col-sm-2 col-form-label" for="kelurahan">kelurahan</label>
                <div class="col-sm-4">
                  <select name="kelurahan" id="kelurahan" class="form-control">
                    <option type="text" id="kelurahan" class="form-control phone-mask" name="kelurahan"></option>
                  </select>
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
  </div>
  <script src="Back/js/wilayah.js"></script>
  <!-- / Content -->
@endsection
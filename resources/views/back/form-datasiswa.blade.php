@extends('layouts.back_admin')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Siswa /</span> Tabel Siswa</h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
    <!-- Data Diri Peserta Didik -->
    @can('isSiswa')
      <section id="data_diri">
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Biodata</h5>
              <small class="text-muted float-end">Data Diri Calon Peserta Didik</small>
            </div>
            <div class="card-body">
              <form action="{{route('actionubahdatasiswa')}}" method="POST">
                @csrf
                @if(session('message_datadiri'))
                  <div class="alert alert-success">
                    {{session('message_datadiri')}}
                  </div>
                @endif
                {{-- Hidden --}}
                <input type="hidden" value="{{ Auth::User()->id_user }}" name="id_user">
                {{-- end hidden --}}
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="nama-lengkap">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_lengkap" id="basic-default-name" value="{{Auth::user()->fname}} {{Auth::user()->mname}} {{Auth::user()->lname}}" @readonly(false) />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="jenis-kelamin">Jenis Kelamin</label>
                  <div class="col-sm-10">
                      <select name="jenis_kelamin" class="form-control">
                        <option value="{{ Auth::user()->jenis_kelamin }}">{{ Auth::user()->jenis_kelamin }}
                        </option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="tempat-lahir">tempat, tanggal lahir</label>
                  <div class="col-sm-5">
                    <div class="input-group input-group-merge">
                      <input type="text" id="tmpt_lahir" name="tmpt_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" value="{{ $users
                      ->tmpt_lahir }}" @required(false)/>
                    </div>
                  </div>
                  <div class="col-sm-5">
                    <div class="input-group input-group-merge">
                      <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{ $users->tgl_lahir }}" class="form-control"  @required(false)/>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="agama">agama</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <input type="text" id="agama" name="agama" class="form-control" placeholder="Masukkan agama" value="{{ $users->agama }}" @required(false)/>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="nik">nik</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <input type="text" id="nik" name="nik" class="form-control" placeholder="Masukkan nik" value="{{ $users->nik }}" @required(false)/>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="n">nomor Telephone</label>
                  <div class="col-sm-4">
                    <input type="text" id="telp" class="form-control phone-mask" placeholder="Jika Ada" value="{{ $users->telp }}"  name="telp" />
                  </div>
                  <label class="col-sm-2 col-form-label" for="n">nomor hp</label>
                  <div class="col-sm-4">
                    <input type="text" id="no_hp" class="form-control phone-mask" placeholder="089142387645"  value="{{ Auth::User()->no_hp }}" name="no_hp" required/>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="email">email</label>
                  <div class="col-sm-10">
                    <input type="email" id="email" class="form-control phone-mask" value="{{Auth::user()->email}}" name="email" @readonly(false)/>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="alamat">Alamat lengkap tempat tinggal</label>
                  <div class="col-sm-10">
                    <textarea id="alamat_rmh" name="alamat_rmh" class="form-control" p value="{{ $users->alamat_rmh }}"
                    >{{ $users->alamat_rmh }}</textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="provinsi">provinsi</label> 
                  <div class="col-sm-10"> 
                    <select name="provinsi" id="provinsi" class="form-control">
                      <option type="text" id="provinsi" class="form-control phone-mask" name="provinsi" ></option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="kota">Kabupaten</label>
                  <div class="col-sm-10">
                    <select name="kab" id="kota" class="form-control">
                      <option type="text" id="kota" class="form-control phone-mask" name="kab" value="{{ $users->kab }}"></option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="kecamatan">kecamatan</label>
                  <div class="col-sm-4">
                    <select name="kec" id="kecamatan" class="form-control">
                      <option type="text" id="kecamatan" class="form-control phone-mask" name="kec" value="{{ $users->kec }}"></option>
                    </select>
                  </div>
                  <label class="col-sm-2 col-form-label" for="kelurahan">kelurahan</label>
                  <div class="col-sm-4">
                    <select name="kel" id="kelurahan" class="form-control">
                      <option type="text" id="kelurahan" class="form-control phone-mask" name="kel" value="{{ $users->kel }}"></option>
                    </select>
                  </div>
                </div>
                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    <!-- End Data Diri Peserta Didik -->
    <!-- Data Pendidikan Peserta Didik -->
      <section id="pendidikan">
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Data Pendidikan</h5>
              <small class="text-muted float-end">Data Pendidikan Sebelumnya</small>
            </div>
            <div class="card-body">
              <form action="{{route('actionubahdatapendidikan')}}" method="POST">
                @csrf
                @if(session('message_pendidikan'))
                  <div class="alert alert-success">
                    {{session('message_pendidikan')}}
                  </div>
                @endif
                <div class="row mb-3">
                  <input type="hidden" value="{{ Auth::User()->id_user }}" name="id_user">
                  
                  <label class="col-sm-2 col-form-label" for="no_ijazah">No Ijazah</label>
                  <div class="col-sm-10 mb-3">
                    <input id="no_ijazah" name="no_ijazah" class="form-control" placeholder="Masukkan Nomor IJAZAH" value="{{ $users->no_ijazah }}"
                    >
                  </div>
                  <label class="col-sm-2 col-form-label" for="nama-lengkap">Asal Sekolah</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="sekolah_asal" placeholder="Nama Sekolah Asal" id="basic-default-name" value="{{ $users->sekolah_asal }}" @required(false) />
                  </div>
                  <label class="col-sm-2 col-form-label" for="nama-lengkap">NPSN Sekolah</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="npsn_terdahulu" placeholder="NPSN Sekolah Asal" id="basic-default-name" value="{{ $users->npsn_terdahulu }}" @required(false) />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="nisn">nisn</label>
                  <div class="col-sm-4">
                    <div class="input-group input-group-merge">
                      <input type="text" id="nisn" name="nisn" class="form-control" value="{{ $users->nisn }}" placeholder="Masukkan NISN" @required(false)/>
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label" for="nisn">nis</label>
                  <div class="col-sm-4">
                    <div class="input-group input-group-merge">
                      <input type="text" id="nis" name="nis" class="form-control" value="{{ $users->nis }}" placeholder="Masukkan NIS" @required(false)/>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="nisn">no skhun</label>
                  <div class="col-sm-4">
                    <div class="input-group input-group-merge">
                      <input type="text" id="no_skhun" name="no_skhun" class="form-control" value="{{ $users->no_skhun }}" placeholder="Masukkan Nomor SKHUN" @required(false)/>
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label" for="no_un">No Ujian Nasional</label>
                  <div class="col-sm-4">
                    <div class="input-group input-group-merge">
                      <input type="text" id="no_un" name="no_un" class="form-control" value="{{ $users->no_un }}" placeholder="Masukkan Nomor Ujian Nasional" @required(false)/>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    <!-- End Data Diri Peserta Didik -->
    <!-- Data Penunjang Peserta Didik -->
      <section id="penunjang">
        <div class="col-xxl">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Data Penunjang</h5>
              <small class="text-muted float-end">Data Penunjang Calon Peserta Didik</small>
            </div>
            <div class="card-body">
              <form action="{{route('updatepenunjang')}}" method="POST">
                @csrf
                @if(session('message_penunjang'))
                  <div class="alert alert-success">
                    {{session('message_penunjang')}}
                  </div>
                @endif
                <div class="row mb-3">
                  <input type="hidden" value="{{ Auth::User()->id_user }}" name="id_user">
                  <label class="col-sm-2 col-form-label" for="noreg_akta">No Registrasi Akta</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="noreg_akta" id="basic-default-name" value="{{$users->noreg_akta}}" @readonly(false) />
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="tempat-lahir">Penerima KIP</label>
                  <div class="col-sm-2">
                    <div class="input-group input-group-merge">
                      <select name="ket_kip" id="ket_kip" class="form-control">
                        <option type="text" id="ket_kip" class="form-control phone-mask" name="ket_kip" value="{{ $users->ket_kip }}">*{{ $users->ket_kip }}</option>
                        <option type="text" id="ket_kip" class="form-control phone-mask" name="ket_kip" value="Ya">Ya</option>
                        <option type="text" id="ket_kip" class="form-control phone-mask" name="ket_kip" value="Tidak">Tidak</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="input-group input-group-merge">
                      <input type="text" id="nama_kip" name="nama_kip" value="{{ $users->nama_kip }}" placeholder="Nama Sesuai KIP" class="form-control"  @required(false)/>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="input-group input-group-merge">
                      <input type="text" id="kip" name="kip" class="form-control" placeholder="Masukkan Nomor KIP" value="{{ $users->kip }}" @required(false)/>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="agama">No KKS</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <input type="text" id="no_kks" name="no_kks" class="form-control" placeholder="Masukkan Nomor KKS" value="{{ $users->no_kks }}" @required(false)/>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="kps">No KPS</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <input type="text" id="kps" name="kps" class="form-control" placeholder="Masukkan KPS" value="{{ $users->kps }}" @required(false)/>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="sekolah asal">Usulan PIP</label>
                  <div class="col-sm-2">
                    <select name="usulan_pip" id="usulan_pip" class="form-control">
                      <option type="text" id="usulan_pip" class="form-control phone-mask" name="usulan_pip" value="{{ $users->usulan_pip }}">*{{ $users->ket_kip }}</option>
                      <option type="text" id="usulan_pip" class="form-control phone-mask" name="usulan_pip" value="Ya">Ya</option>
                      <option type="text" id="usulan_pip" class="form-control phone-mask" name="usulan_pip" value="Tidak">Tidak</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="alat_transport">Alat Transportasi</label>
                  <div class="col-sm-4">
                    <div class="input-group input-group-merge">
                      <input type="text" id="alat_transport" name="alat_transport" class="form-control" value="{{ $users->alat_transport }}" placeholder="Jenis Transportasi Yang Digunakan Untuk Ke Sekolah" @required(false)/>
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label" for="disabilitas">Bekebutuhan Khusus</label>
                  <div class="col-sm-4">
                    <div class="input-group input-group-merge">
                      <select name="disabilitas" id="disabilitas" class="form-control">
                        <option type="text" id="disabilitas" class="form-control phone-mask" name="disabilitas" value="{{ $users->disabilitas }}">*{{ $users->disabilitas }}</option>
                        <option type="text" id="disabilitas" class="form-control phone-mask" name="disabilitas" value="Ya">Ya</option>
                        <option type="text" id="disabilitas" class="form-control phone-mask" name="disabilitas" value="Tidak">Tidak</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="j_tinggal">Jenis Tinggal</label>
                  <div class="col-sm-4">
                    <input type="text" id="j_tinggal" class="form-control phone-mask" placeholder="Jika Ada" value="{{ $users->j_tinggal }}"  name="j_tinggal" />
                  </div>
                  <label class="col-sm-2 col-form-label" for="lintang">Garis Lintang</label>
                  <div class="col-sm-4">
                    <input type="text" id="lintang" class="form-control phone-mask" placeholder="089142387645"  value="{{ $users->lintang }}" name="lintang"/>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="bujur">Garis Bujur</label>
                  <div class="col-sm-10">
                    <input type="bujur" id="bujur" class="form-control phone-mask" value="{{$users->bujur}}" name="bujur" @readonly(false)/>
                  </div>
                </div>
                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    <!-- End Penunjang Peserta Didik -->
    @elsecan('isAdmin')
    
    @foreach ($collection as $item)
    @endforeach
        <div class="card">
          <h5 class="card-header">Data Peserta Didik Baru</h5>
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Tanggal Daftar</th>
                  <th>file pendukung</th>
                  <th>status</th>
                  <th>aksi</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <tr class="table-default">
                  <td><i class="fab fa-sketch fa-lg text-warning me-3"></i> <strong>Sketch Project</strong></td>
                  <td>Ronnie Shane</td>
                  <td>
                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                      <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller" >
                        <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                      </li>
                      <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson" >
                        <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                      </li>
                      <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker" >
                        <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                      </li>
                    </ul>
                  </td>
                  <td><span class="badge bg-label-primary me-1">Active</span></td>
                  <td>
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0);"
                          ><i class="bx bx-edit-alt me-1"></i> Edit</a
                        >
                        <a class="dropdown-item" href="javascript:void(0);"
                          ><i class="bx bx-trash me-1"></i> Delete</a
                        >
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      <!--/ Contextual Classes -->
      @endcan

      
    </div>
  </div>
</div>
  <!-- / Content -->
  {{-- <script src="/Assets/js/wilayah.js"></script> --}}

<script>        
    fetch(`https://aan-andika99.github.io/api-wilayah-indonesia/api/provinces.json`)
        .then((response) => response.json())
        .then((provinces) => {
            var data = provinces;
            var tampung = `<option>` + `{{ $users->provinsi  }}` + `</option>`;
            var kabu = `<option>` + `{{ $users->kab  }}` + `</option>`;
            var keca = `<option>` + `{{ $users->kec  }}` + `</option>`;
            var kelu = `<option>` + `{{ $users->kel  }}` + `</option>`;
            data.forEach((element) => {
                tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
            });
            document.getElementById("provinsi").innerHTML = tampung;
            document.getElementById("kota").innerHTML = kabu;
            document.getElementById("kecamatan").innerHTML = keca;
            document.getElementById("kelurahan").innerHTML = kelu;
        });

    const selectProvinsi = document.getElementById("provinsi");
    const selectKota = document.getElementById("kota");
    const selectKecamatan = document.getElementById("kecamatan");
    const selectKelurahan = document.getElementById("kelurahan");

    selectProvinsi.addEventListener("change", (e) => {
        var provinsi = e.target.options[e.target.selectedIndex].dataset.prov;
        fetch(
            `https://aan-andika99.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`
        )
            .then((response) => response.json())
            .then((regencies) => {
                var data = regencies;
                var tampung = `<option>Pilih</option>`;
                document.getElementById("kota").innerHTML = "<option></option>";
                document.getElementById("kecamatan").innerHTML =
                    "<option></option>";
                document.getElementById("kelurahan").innerHTML =
                    "<option></option>";
                data.forEach((element) => {
                    tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById("kota").innerHTML = tampung;
            });
    });

    selectKota.addEventListener("change", (e) => {
        var kota = e.target.options[e.target.selectedIndex].dataset.prov;
        fetch(
            `https://aan-andika99.github.io/api-wilayah-indonesia/api/districts/${kota}.json`
        )
            .then((response) => response.json())
            .then((districts) => {
                var data = districts;
                var tampung = `<option>Pilih</option>`;
                document.getElementById("kecamatan").innerHTML =
                    "<option></option>";
                document.getElementById("kelurahan").innerHTML =
                    "<option></option>";
                data.forEach((element) => {
                    tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById("kecamatan").innerHTML = tampung;
            });
    });
    selectKecamatan.addEventListener("change", (e) => {
        var kecamatan = e.target.options[e.target.selectedIndex].dataset.prov;
        fetch(
            `https://aan-andika99.github.io/api-wilayah-indonesia/api/villages/${kecamatan}.json`
        )
            .then((response) => response.json())
            .then((villages) => {
                var data = villages;
                var tampung = `<option>Pilih</option>`;
                document.getElementById("kelurahan").innerHTML =
                    "<option></option>";
                data.forEach((element) => {
                    tampung += `<option data-prov="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById("kelurahan").innerHTML = tampung;
            });
    });

</script>

@endsection
@extends('layouts.back_auth')
@section('content')
              <h4 class="mb-2">Buat Akun Dulu Yuk 🚀</h4>
              @if(session('message'))
              <div class="alert alert-success">
                  {{session('message')}}
              </div>
              @endif
              <form id="formAuthentication" class="mb-3" action="{{route('actionregister')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <input type="hidden" name="status" value="pending">
                  <label for="name" class="form-label">Nama Lengkap</label>
                  <input
                    type="text"
                    class="form-control mb-3"
                    id="name"
                    name="fname"
                    placeholder="Masukkan Nama Depan"
                    autofocus required
                  />
                  <input
                    type="text"
                    class="form-control mb-3"
                    id="name"
                    name="mname"
                    placeholder="Masukkan Nama Tengah Jika Ada"
                    
                  />
                  <input
                    type="text"
                    class="form-control mb-3"
                    id="name"
                    name="lname"
                    placeholder="Masukkan Nama Belakang"
                    
                  />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" required autofocus/>
                </div>
                <div class="mb-3">
                  <label for="no_hp" class="form-label">No Hp</label>
                  <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor Hp" required/>
                </div>
                <div class="mb-3">
                  <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                  <select class="form-control" name="jenis_kelamin">
                    <option value=" ">Pilih Jenis Kelamin</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <input type="hidden" name="role" value="siswa">
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                    <label class="form-check-label" for="terms-conditions">
                      Saya Setuju Dengan
                      <a href="javascript:void(0);"> Kebijakan Privasi & Persyaratan</a>
                    </label>
                  </div>
                </div>
                <button class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="{{ url('/login') }}">
                  <span>Sign in instead</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>
    
    @endsection
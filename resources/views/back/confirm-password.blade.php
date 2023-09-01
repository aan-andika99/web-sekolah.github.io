@extends('layouts.back_auth')
@section('content')
   
              <!-- /Logo -->
              <h4 class="mb-2">Lupa Password ? 🔒</h4>
              <p class="mb-4">Masukkan Email kamu dan buka email untuk melakukan proses reset password.<p>
              @if(session('message'))
              <div class="alert alert-success">
                  {{session('message')}}
              </div>
              @endif
              <form class="mb-3" action="{{ route('recovery') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    value="{{ $user->email }}"
                    placeholder="Email"
                    readonly
                  />
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password baru</label>
                  <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    placeholder="Password Baru"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">ulangi Password</label>
                  <input
                    type="password"
                    class="form-control"
                    id="password2"
                    name="password2"
                    placeholder="Ulangi Password"
                    required
                  />
                </div>
                <button class="btn btn-primary d-grid w-100">Simpan</button>
              </form>
              <div class="text-center">
                <a href="{{ url('/login') }}" class="d-flex align-items-center justify-content-center">
                  <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                  Back to login
                </a>
              </div>
            </div>
          </div>
          <!-- /Forgot Password -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    @endsection
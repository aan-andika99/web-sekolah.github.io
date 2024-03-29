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
              
              <form class="mb-3" action="{{ route('resetpassword') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Email"
                    autofocus
                  />
                </div>
                <button class="btn btn-primary d-grid w-100">Kirim Link Via Email</button>
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
@extends('layouts.back_admin')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">

    <!-- Basic Bootstrap Table -->
    <div class="card">
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Kelas Yang Diambil</th>
              <th>File</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($siswa as $data)
            <tr>
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $data->fname }}</strong></td>
              <td>{{ $data->kelas }}</td>
              {{-- <td>{{ $data->ijazah }}{{ $data->akta }}{{ $data->kk }}</td> --}}
              <td>
                <a href="{{ route('download', ['filename' => $data->ijazah]) }}">
                  <button type="button" class="btn rounded-pill btn-outline-secondary">&nbsp;Ijazah
                  </button>
                </a>
                <a href="{{ route('download', ['filename' => $data->akta]) }}">
                  <button type="button" class="btn rounded-pill btn-outline-secondary">&nbsp;Akta
                  </button>
              </a>
                <a href="{{ route('download', ['filename' => $data->kk]) }}">
                  <button type="button" class="btn rounded-pill btn-outline-secondary">&nbsp;Kartu Keluarga
                  </button>
                </a>
              </td>
              <td>
                @if ($data->status == 'sukses')
                  <span class="badge bg-label-success">Diterima</span>
                @elseif($data->status == 'perbaikan')
                  <span class="badge bg-label-warning">Perbaikan</span>
                @elseif($data->status == 'ditolak')
                  <span class="badge bg-label-danger">Di Tolak</span>
                @else
                  <span class="badge bg-label-primary">Belum Di Periksa</span>
                @endif
              </td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:void(0);"
                      ><i class="bx bxs-check-square me-1"></i> Verifikasi</a
                    >
                    <a class="dropdown-item" href="javascript:void(0);"
                      ><i class="bx bxs-comment-edit me-1"></i> Perbaikan</a
                    >
                    <a class="dropdown-item" href="javascript:void(0);"
                      ><i class="bx bxs-x-square me-1"></i> Tolak</a
                    >
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
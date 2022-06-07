@extends('templates.app')
@section('title', 'Admin')
@section('content')
  <div class="card mt-3">
    <div class="card-header">
      <h3 class="card-title">Dashboard</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fa-solid fa-user-group"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Guru</span>
              <span class="info-box-number">{{ $totalGuru }}</span>
            </div>

          </div>

        </div>

        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fa-solid fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Siswa</span>
              <span class="info-box-number">{{ $totalSiswa }}</span>
            </div>

          </div>

        </div>

        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Kelas</span>
              <span class="info-box-number">13,648</span>
            </div>

          </div>

        </div>

        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Pelanggaran</span>
              <span class="info-box-number">93,139</span>
            </div>

          </div>

        </div>

      </div>
    </div>
  </div>
@endsection

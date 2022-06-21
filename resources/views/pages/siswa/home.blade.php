@extends('templates.app')
@section('title', 'Siswa')
@section('content')
  <div class="card mt-3">
    <div class="card-header">
      <h3 class="card-title">Dashboard</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-12">
          <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Pelanggaran</span>
              <span class="info-box-number">{{ auth()->user()->siswa->trxkasus_count }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

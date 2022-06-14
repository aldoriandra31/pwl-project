@extends('templates.app')
@section('content')
  <div class="row mt-3">
    <div class="col">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Tambah Pelanggaran</h3>
        </div>
        <form action="{{ route('pelanggaran.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label>Siswa</label>
              <select class="form-control" name="siswa_id">
                @foreach ($siswas as $siswa)
                  <option value="{{ $siswa->id }}" {{ old('siswa_id') == $siswa->id ? 'selected' : '' }}>{{ $siswa->nama }}</option>
                @endforeach
              </select>
              @error('siswa_id')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label>Guru</label>
              <select class="form-control" name="guru_id">
                @foreach ($gurus as $guru)
                  <option value="{{ $guru->id }}" {{ old('guru_id') == $guru->id ? 'selected' : '' }}>{{ $guru->nama }}</option>
                @endforeach
              </select>
              @error('guru_id')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label>Pelanggaran</label>
              <select class="form-control" name="kasus_id">
                @foreach ($kasuses as $kasus)
                  <option value="{{ $kasus->id }}" {{ old('kasus_id') == $kasus->id ? 'selected' : '' }}>{{ $kasus->nama_kasus }}</option>
                @endforeach
              </select>
              @error('kasus_id')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="kejadian">Tanggal Kejadian</label>
              <div class="input-group date">
                <input type="date" class="form-control" id="kejadian" name="tanggal_pelanggaran" value="{{ old('tanggal_kejadian') }}">
              </div>
              @error('tanggal_kejadian')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="gambar">Bukti Kejadian</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="gambar" name="gambar">
                  <label class="custom-file-label" for="gambar">Pilih file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
              @error('gambar')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

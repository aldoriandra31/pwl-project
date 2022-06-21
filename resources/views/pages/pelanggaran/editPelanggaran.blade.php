@extends('templates.app')
@section('content')
  <div class="row mt-3">
    <div class="col">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Pelanggaran</h3>
        </div>
        <form action="{{ route('pelanggaran.update', $kasuss->id) }}" method="post" enctype="multipart/form-data">
          @method('patch')
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label>Siswa</label>
              <select class="form-control" name="siswa_id">
                @foreach ($siswas as $siswa)
                  <option value="{{ $siswa->id }}" {{ old('siswa_id', $kasuss->kasus_id) == $siswa->id ? 'selected' : '' }}>
                    {{ $siswa->nama }}</option>
                @endforeach
              </select>
              @error('siswa_id')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            @if (auth()->user()->user_role->role->name == 'admin')
              <div class="form-group">
                <label>Guru</label>
                <select class="form-control" name="guru_id">
                  @foreach ($gurus as $guru)
                    <option value="{{ $guru->id }}" {{ old('guru_id', $kasuss->guru_id) == $guru->id ? 'selected' : '' }}>
                      {{ $guru->nama }}</option>
                  @endforeach
                </select>
                @error('guru_id')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            @else
              <input type="hidden" name="guru_id" value="{{ auth()->user()->guru->id }}">
            @endif
            <div class="form-group">
              <label>Pelanggaran</label>
              <select class="form-control" name="kasus_id">
                @foreach ($kasuses as $kasus)
                  <option value="{{ $kasus->id }}" {{ old('kasus_id', $kasuss->kasus_id) == $kasus->id ? 'selected' : '' }}>
                    {{ $kasus->nama_kasus }}</option>
                @endforeach
              </select>
              @error('kasus_id')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="kejadian">Tanggal Kejadian</label>
              <div class="input-group date">
                <input type="date" class="form-control" id="kejadian" name="tanggal_pelanggaran"
                  value="{{ old('tanggal_pelanggaran', $kasuss->tanggal_pelanggaran->format('Y-m-d')) }}">
              </div>
              @error('tanggal_pelanggaran')
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
              </div>
              @error('gambar')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

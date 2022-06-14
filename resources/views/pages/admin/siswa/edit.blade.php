@extends('templates.app')
@section('content')
<div class="row mt-3">
  <div class="col">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit siswa</h3>
      </div>
      <form action="{{ route('siswa.update', $siswa) }}" method="post">
        @method('put')
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="nis">Nis</label>
            <input type="text" class="form-control" id="nis" name="nis" placeholder="Enter Nis" value="{{ old('nis', $siswa->nis) }}">
            @error('nis')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Nama siswa" value="{{ old('nama', $siswa->nama) }}">
            @error('nama')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="{{ old('alamat', $siswa->alamat) }}">
            @error('alamat')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
              <input type="date" class="form-control" id="tgl_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
            </div>
            @error('tanggal_lahir')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin_id">
              @foreach ($jenis_kelamin as $jk)
                <option value="{{ $jk->id }}" {{ old('jenis_kelamin_id', $siswa->jenis_kelamin_id) == $jk->id ? 'selected' : '' }}>{{ $jk->gender }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
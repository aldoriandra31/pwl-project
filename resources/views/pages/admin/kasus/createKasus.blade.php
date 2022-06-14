@extends('templates.app')
@section('content')
<div class="row mt-3">
  <div class="col">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah kasus</h3>
      </div>
      <form action="{{ route('kasus.store') }}" method="post">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="kode_kasus" class="text-capitalize">kode kasus</label>
            <input type="text" class="form-control" id="kode_kasus" name="kode_kasus" placeholder="Enter Kode Kasus" value="{{ old('kode_kasus') }}">
            @error('kode_kasus')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="nama_kasus" class="text-capitalize">nama kasus</label>
            <input type="text" class="form-control" id="nama_kasus" name="nama_kasus" placeholder="Enter nama Kasus" value="{{ old('nama_kasus') }}">
            @error('nama_kasus')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label for="poin_kasus" class="text-capitalize">poin kasus</label>
            <input type="text" class="form-control" id="poin_kasus" name="poin_kasus" placeholder="Poin Kasus" value="{{ old('poin_kasus') }}">
            @error('poin_kasus')
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
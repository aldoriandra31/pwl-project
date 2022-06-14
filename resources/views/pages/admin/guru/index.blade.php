@extends('templates.app')
@section('content')
  <div class="row mt-3">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Guru</h3>
        </div>
        <div class="card-body">
          <a href="{{ route('guru.create') }}" class="btn btn-primary mb-2"><i class="fa-solid fa-plus"></i> Tambah Guru</a>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px" class="text-center col-1">No</th>
                <th class="col-2">Nip</th>
                <th class="col-2">Nama</th>
                <th class="col-2">Email</th>
                <th class="col-2">Tanggal Lahir</th>
                <th class="col-2">Alamat</th>
                <th colspan="2" class="text-center col-1">Action</th>
              </tr>
            </thead>
            <tbody>
							@forelse ($gurus as $guru)
              {{-- {{ guru }} --}}
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td>{{ $guru->user->guru->nip }}</td>
                  <td>{{ $guru->user->guru->nama }}</td>
                  <td>{{ $guru->user->email }}</td>
                  <td>{{ $guru->user->guru->tanggal_lahir }}</td>
                  <td>{{ $guru->user->guru->alamat }}</td>
                  <td class="text-center"><a href="{{ route('guru.edit', $guru->user->guru) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>
                  <td class="text-center"><a onclick="document.getElementById('guruDelete{{ $guru->user->id }}').submit()" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a></td>
                </tr>
                <form action="{{ route('guru.destroy', $guru->user->guru) }}" method="post" id="guruDelete{{ $guru->user->id }}">
                  @method('delete')
                  @csrf
                </form>
							@empty
								
							@endforelse
              
            </tbody>
          </table>
        </div>

        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-right">
            {{ $gurus->links() }}
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection

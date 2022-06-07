@extends('templates.app')
@section('content')
  <div class="row mt-3">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Siswa</h3>
        </div>
        <div class="card-body">
          <a href="{{ route('siswa.create') }}" class="btn btn-primary mb-2"><i class="fa-solid fa-plus"></i> Tambah Siswa</a>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px" class="text-center col-1">No</th>
                <th class="col-2 text-center">Nis</th>
                <th class="col-2 text-center">Nama</th>
                <th class="col-2 text-center">Email</th>
                <th class="col-2 text-center">Tanggal Lahir</th>
                <th class="col-2 text-center">Alamat</th>
                <th colspan="2" class="text-center col-1">Action</th>
              </tr>
            </thead>
            <tbody>
              {{-- {{ dd($siswas) }} --}}
							@forelse ($siswas as $siswa)
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td>{{ $siswa->user->siswa->nis }}</td>
                  <td>{{ $siswa->user->siswa->nama }}</td>
                  <td>{{ $siswa->user->email }}</td>
                  <td>{{ $siswa->user->siswa->tanggal_lahir }}</td>
                  <td>{{ $siswa->user->siswa->alamat }}</td>
                  <td class="text-center"><a href="{{ route('siswa.edit', $siswa->user->siswa) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>
                  <td class="text-center"><a onclick="document.getElementById('guruDelete{{ $siswa->user->id }}').submit()" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a></td>
                </tr>
                <form action="{{ route('siswa.destroy', $siswa->user->siswa) }}" method="post" id="guruDelete{{ $siswa->user->id }}">
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
            {{ $siswas->links() }}
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection

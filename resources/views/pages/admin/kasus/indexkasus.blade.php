@extends('templates.app')
@section('content')
  <div class="row mt-3">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar kasus</h3>
        </div>
        <div class="card-body">
          <a href="{{ route('kasus.create') }}" class="btn btn-primary mb-2"><i class="fa-solid fa-plus"></i> Tambah kasus</a>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center col-1">No</th>
                <th class="col-1 text-center">Kode</th>
                <th class="col-7 text-center">Nama Kasus</th>
                <th class="col-1 text-center">Poin</th>
                <th colspan="2" class="text-center col-1">Action</th>
              </tr>
            </thead>
            <tbody>
							@forelse ($kasuses as $kasus)
              {{-- {{ kasus }} --}}
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td class="text-center text-capitalize">{{ $kasus->kode_kasus }}</td>
                  <td class="text-capitalize">{{ $kasus->nama_kasus }}</td>
                  <td class="text-center">{{ $kasus->poin_kasus }}</td>
                  <td class="text-center"><a href="{{ route('kasus.edit', $kasus) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a></td>
                  <td class="text-center"><a onclick="document.getElementById('kasusDelete{{ $kasus->id }}').submit()" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a></td>
                </tr>
                <form action="{{ route('kasus.destroy', $kasus) }}" method="post" id="kasusDelete{{ $kasus->id }}">
                  @method('delete')
                  @csrf
                </form>
							@empty
								<p>Hatata</p>
							@endforelse
              
            </tbody>
          </table>
        </div>

        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-right">
            {{ $kasuses->links() }}
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection

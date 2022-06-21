@extends('templates.app')
@section('content')
  <div class="row mt-3">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Daftar Pelanggaran</h3>
        </div>
        {{-- {{ dd($total) }} --}}
        <div class="card-body">
          @if (!(auth()->user()->user_role->role->name == 'siswa'))
            <a href="{{ route('pelanggaran.create') }}" class="btn btn-primary mb-2"><i class="fa-solid fa-plus"></i>
              Tambah pelanggaran
            </a>
          @else
          <div class="d-flex justify-content-between mb-1">
            <a href="{{ route('export.pdf') }}" class="btn btn-primary">Download PDF</a>
            <h5 class="">Total Poin = {{ $total }}</h5>
          </div>
          @endif
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="col-1 text-center">NIS</th>
                <th class="col-2">Nama Siswa</th>
                <th class="col-2">Pelanggaran</th>
                <th class="col-2 text-center">Tanggal Kejadian</th>
                <th class="col-1 text-center">Bukti</th>
                <th class="col-1 text-center">Poin</th>
                <th class="col-2">Penanggung Jawab</th>
                @if (!(auth()->user()->user_role->role->name == 'siswa'))
                  <th colspan="2" class="text-center col-1">Action</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @forelse ($trxkasus as $kasus)
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td class="text-center">{{ $kasus->siswa->nis }}</td>
                  <td class="text-capitalize">{{ $kasus->siswa->nama }}</td>
                  <td class="text-capitalize">{{ $kasus->kasus->nama_kasus }}</td>
                  <td class="text-center">{{ $kasus->tanggal_pelanggaran->format('d-M-Y') }}</td>
                  <td class="text-center"><img src="{{ asset('storage/Kasus/' . $kasus->gambar) }}" alt="default"
                      width="80">
                  </td>
                  <td class="text-center">{{ $kasus->kasus->poin_kasus }}</td>
                  <td class="text-capitalize">{{ $kasus->guru->nama }}</td>
                  @if (!(auth()->user()->user_role->role->name == 'siswa'))
                    <td class="text-center"><a href="{{ route('pelanggaran.edit', $kasus) }}"
                        class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                    <td class="text-center"><a
                        onclick="document.getElementById('guruDelete{{ $kasus->id }}').submit()"
                        class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                  @endif
                </tr>
                @if (!(auth()->user()->user_role->role->name == 'siswa'))
                  <form action="{{ route('pelanggaran.destroy', $kasus) }}" method="post"
                    id="guruDelete{{ $kasus->id }}">
                    @method('delete')
                    @csrf
                  </form>
                @endif
              @empty
                <tr>
                  <td colspan="8" class="text-center">Data Kosong</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-right">
            <li>{{ $trxkasus->links() }}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection

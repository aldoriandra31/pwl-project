<!DOCTYPE html>
<html>

<head>
  <title>Laporan Pelanggaran</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <style type="text/css">
    table tr td,
    table tr th {
      font-size: 10pt;
    }
  </style>
</head>

<body>
  <div class="row mt-3">
    <div class="col">
      <h1 class="text-center">SMAN 1 AMBUNTEN</h1>
      <h4 class="text-center m-3">Laporan Pelanggaran Siswa</h4>
			<table class="mb-3">
				<tr>
					<td style="width: 45px"><h6>NIS</h6></td>
					<td style="width: 10px"><h6>:</h6></td>
					<td><h6>{{ $trxkasus[0]->siswa->nis }}</h6></td>
				</tr>
				<tr>
					<td><h6>Nama</h6></td>
					<td><h6>:</h6></td>
					<td class="text-capitalize"><h6>{{ $trxkasus[0]->siswa->nama }}</h6></td>
				</tr>
				<tr>
					<td><h6>Total Poin</h6></td>
					<td><h6>:</h6></td>
					<td><h6>{{ $total }}</h6></td>
				</tr>
			</table>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th style="width: 200px">Pelanggaran</th>
            <th class="text-center" style="width: 120px">Kejadian</th>
            <th class="text-center">Bukti</th>
            <th class="text-center">Poin</th>
						<th style="width: 135px">Penanggung Jawab</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($trxkasus as $kasus)
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
							<td class="text-capitalize">{{ $kasus->kasus->nama_kasus }}</td>
              <td class="text-center">{{ $kasus->tanggal_pelanggaran->format('d F Y') }}</td>
              <td class="text-center"><img src="{{ asset('storage/Kasus/' . $kasus->gambar) }}" alt="default"
                  width="80">
              </td>
              <td class="text-center">{{ $kasus->kasus->poin_kasus }}</td>
              <td class="text-capitalize">{{ $kasus->guru->nama }}</td>

            </tr>
          @empty
            <tr>
              <td colspan="8" class="text-center">Data Kosong</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  </div>
</body>

</html>

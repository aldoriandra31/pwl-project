<?php

namespace App\Http\Controllers\Siswa;

use App\Models\TrxKasus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\PDF;

class SiswaController extends Controller
{
    public function index()
    {
        return view('pages.siswa.home');
    }

    public function pelanggaran()
    {
        return view('pages.pelanggaran.indexPelanggaran', [
            'trxkasus' => TrxKasus::whereSiswaId(auth()->user()->siswa->id)->with('siswa', 'guru', 'kasus')->simplePaginate(4),
            'total' => TrxKasus::whereSiswaId(auth()->user()->siswa->id)->withSum('kasus', 'poin_kasus')->get()->sum('kasus_sum_poin_kasus')

        ]);
    }

    public function cetakPdf()
    {
        // return view('pages.siswa.cetak', [
        //     'trxkasus' => TrxKasus::whereSiswaId(auth()->user()->siswa->id)->with('siswa', 'guru', 'kasus')->simplePaginate(4),
        //     'total' => TrxKasus::whereSiswaId(auth()->user()->siswa->id)->withSum('kasus', 'poin_kasus')->get()->sum('kasus_sum_poin_kasus')
        // ]);
        $trxkasus = TrxKasus::whereSiswaId(auth()->user()->siswa->id)->with('siswa', 'guru', 'kasus')->get();
        $total = TrxKasus::whereSiswaId(auth()->user()->siswa->id)->withSum('kasus', 'poin_kasus')->get()->sum('kasus_sum_poin_kasus');
        // $pdf = PDF::loadview('pages.siswa.cetak', [
        //     'trxKasus' => $trxkasus,
        // ]);
        $pdf = PDF::loadView('pages.siswa.cetak', [
            'trxkasus' => $trxkasus,
            'total' => $total
        ])->setPaper('letter');
        return $pdf->download(auth()->user()->siswa->nis . time() . '.pdf');
    }
}

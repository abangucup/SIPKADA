<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Kriteria;
use App\Models\Penerima;
use App\Models\Subkriteria;
// use Barryvdh\DomPDF\PDF;
use PDF;

class LaporanController extends Controller
{
    public function cetak_penerima()
    {
        $kelurahan = Kelurahan::where('nama', auth()->user()->kelurahan->nama)->first();
        $penerimas = Penerima::where('kelurahan_id', auth()->user()->kelurahan_id)->get();
        $kriterias = Kriteria::all();
        $pdf = PDF::loadview('kelurahan.penerima.pdf_detail', compact('penerimas', 'kriterias', 'kelurahan'));
        return $pdf->download('detail-penerima.pdf');
    }

    public function laporan_penerima()
    {
        $penerimas = Penerima::where('kelurahan_id', auth()->user()->kelurahan_id)->get()->sortByDesc('rangking');
        return view('kelurahan.laporan.laporan', compact('penerimas'));
    }

    public function cetak_laporan_penerima()
    {
        $kelurahan = Kelurahan::where('nama', auth()->user()->kelurahan->nama)->first();
        $penerimas = Penerima::where('kelurahan_id', auth()->user()->kelurahan_id)->get()->sortByDesc('rangking');
        $pdf = PDF::loadview('kelurahan.laporan.pdf-laporan', compact('penerimas', 'kelurahan'));
        return $pdf->download('laporan-penerima.pdf');
    }

    public function cetak_rank()
    {
        $kelurahans = Kelurahan::all();
        $penerimas = Penerima::all();
        $kriterias = Kriteria::all();
        $min = Subkriteria::min('subbobot');
        $max = Subkriteria::max('subbobot');
        $sum = Kriteria::sum('bobot');
        $rankings = Penerima::all()->sortByDesc('rangking');

        $pdf = PDF::loadview('admin.survey.pdf-rank', compact('penerimas', 'kelurahans', 'kriterias', 'min', 'max', 'rankings', 'sum'));
        return $pdf->download('detail-perhitungan-data-penerima');
    }
}

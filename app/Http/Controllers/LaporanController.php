<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Kriteria;
use App\Models\Penerima;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
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
        $penerimas = Penerima::where('kelurahan_id', auth()->user()->kelurahan_id)->get();
        return view('kelurahan.laporan.laporan', compact('penerimas'));
    }

    public function cetak_laporan_penerima()
    {
        $kelurahan = Kelurahan::where('nama', auth()->user()->kelurahan->nama)->first();
        $penerimas = Penerima::where('kelurahan_id', auth()->user()->kelurahan_id)->get();
        $pdf = PDF::loadview('kelurahan.laporan.pdf-laporan', compact('penerimas', 'kelurahan'));
        return $pdf->download('laporan-penerima.pdf');
    }

    public function cetak_rank()
    {
        $kelurahans = Kelurahan::all();
        $penerimas = Penerima::all();
        $kriterias = Kriteria::all();
        $subkriterias = Subkriteria::all();

        // NILAI MAX DAN MIN
        foreach ($subkriterias as $sub) {
            $min = $sub->min('subbobot');
            $max = $sub->max('subbobot');
        }

        $pdf = PDF::loadview('admin.survey.pdf-rank', compact('penerimas', 'kelurahans', 'kriterias', 'min', 'max'));
        return $pdf->download('detail-perhitungan-data-penerima.pdf');
    }
}

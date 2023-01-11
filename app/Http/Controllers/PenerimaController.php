<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Kriteria;
use App\Models\Penerima;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;

class PenerimaController extends Controller
{
    // Menu Detail
    /*
        menampilkan detail perhitungan setiap penerima sesuai kelurahannya
    */
    public function detail()
    {
        $penerimas = Penerima::where('kelurahan_id', auth()->user()->kelurahan_id)->get()->sortByDesc('rangking');
        $kriterias = Kriteria::all();
        $min = Subkriteria::min('subbobot');
        $max = Subkriteria::max('subbobot');
        $sum = Kriteria::sum('bobot');

        $rankings = $penerimas->sortByDesc('rangking');

        return view('kelurahan.penerima.detail', compact([
            'kriterias',
            'penerimas',
            'min',
            'max',
            'sum',
            'rankings'
        ]));
    }

    public function index()
    {
        $count = Penerima::all()->count();
        $penerimas = Penerima::where('kelurahan_id', auth()->user()->kelurahan_id)->get();
        return view('kelurahan.penerima.index', compact(['penerimas', 'count']));
    }

    public function create()
    {
        $kelurahan = Kelurahan::where('id', auth()->user()->kelurahan_id)->first();
        return view('kelurahan.penerima.create', compact(['kelurahan']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|numeric',
            'nama' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'kelurahan' => 'required'
        ]);

        $cek_nik = Penerima::where('nik', $request->nik)->first();
        if ($cek_nik) {
            toast('NIK ' . $request->nik . ' Sudah Ada', 'info');
            return back();
        }

        $penerima = new Penerima();
        $penerima->nik = $request->nik;
        $penerima->nama = $request->nama;
        $penerima->jk = $request->jk;
        $penerima->alamat = $request->alamat;
        $penerima->kelurahan_id = $request->kelurahan;
        $penerima->save();

        toast('Penerima ' . $request->nama . ' Berhasil Ditambahkan', 'success');
        return to_route('penerima.index');
    }

    public function edit(Penerima $penerima)
    {
        return view('kelurahan.penerima.edit', compact('penerima'));
    }

    public function update(Request $request, Penerima $penerima)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'kelurahan' => 'required'
        ]);

        // $cek_nik = Penerima::where('nik', $request->nik)->first();
        if ($request->nik != $penerima->nik) {
            $validate = Validator::make($request->all(), [
                'nik' => 'required|unique:penerimas',
            ]);

            if ($validate->fails()) {
                toast('NIK ' . $request->nik . ' Sudah Ada', 'info');
                return back();
            }
        }

        $penerima->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'kelurahan_id' => $request->kelurahan
        ]);

        toast('Penerima ' . $penerima->nama . ' Berhasil DiEdit', 'success');
        return to_route('penerima.index');
    }

    public function destroy(Penerima $penerima)
    {
        $penerima->delete();
        toast('Penerima ' . $penerima->nama . ' Berhasil Dihapus', 'success');
        return back();
    }
}

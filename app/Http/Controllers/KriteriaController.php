<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Subkriteria;
use App\Models\Survey;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $sum = Kriteria::sum('bobot');
        $kriterias = Kriteria::all();
        return view('admin.kriteria.index', compact(['kriterias', 'sum']));
    }

    public function create()
    {
        $count = count(Kriteria::all());
        return view('admin.kriteria.create', compact(['count']));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'kode' => 'required',
            'nama' => 'required',
            'bobot' => 'required',
            'keterangan' => 'required',
            'jenis' => 'required',
        ]);

        $kriteria = new Kriteria();
        $kriteria->kode = $request->kode;
        $kriteria->nama = $request->nama;
        $kriteria->bobot = $request->bobot;
        $kriteria->keterangan = $request->keterangan;
        $kriteria->jenis = $request->jenis;
        $kriteria->save();

        toast('Berhasil Menambahkan Kriteria', 'success');
        return to_route('kriteria.index');

    }

    public function show(Kriteria $kriterium)
    {
        // $sum = Subkriteria::withS('bobot');
        $sum = Subkriteria::where('id', $kriterium->id)->sum('bobot');
        $kriteria = Kriteria::where('id', $kriterium->id)->first();
        return view('admin.kriteria.detail', compact(['kriteria', 'kriterium', 'sum']));
    }

    public function edit(Kriteria $kriterium)
    {
        return view('admin.kriteria.edit', compact('kriterium'));
    }

    public function update(Request $request, Kriteria $kriterium)
    {
        // dd($request->all());
        $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required',
            'bobot' => 'required',
            'keterangan' => 'required',
            'jenis' => 'required'
        ]);

        $kriterium->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'bobot' => $request->bobot,
            'keterangan' => $request->keterangan,
            'jenis' => $request->jenis,
        ]);

        toast('Berhasil Update Kriteria', 'success');
        return to_route('kriteria.index');
    }
    
    public function destroy(Kriteria $kriterium)
    {
        $kriterium->delete();
        toast('Kriteria Berhasil Dihapus', 'success');
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Subkriteria;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class KriteriaController extends Controller
{
    public function index()
    {
        $sum = Kriteria::sum('bobot');
        $kriterias = Kriteria::all();
        foreach ($kriterias as $kriteria) {
            $normalisasi[] = $kriteria->bobot/$sum;
        }
        $collection = new Collection(
            $normalisasi ?? null
        );
        $sumnormal = $collection->sum();
        // dd($sumnormal);

        return view('admin.kriteria.index', compact(['kriterias', 'sum', 'sumnormal']));
    }

    public function create()
    {
        $kriterias = Kriteria::all();
        $count = count(Kriteria::all());
        return view('admin.kriteria.create', compact(['count'], 'kriterias'));
    }

    public function store(Request $request)
    {
        $sum = Kriteria::sum('bobot');

        $this->validate($request,[
            'kode' => 'required',
            'kriteria' => 'required',
            'bobot' => 'required',
        ]);

        $kriteria = new Kriteria();
        $kriteria->kode = $request->kode;
        $kriteria->kriteria = $request->kriteria;
        $kriteria->bobot = $request->bobot;
        // $kriteria->normalisasi = $request->bobot / $sum;
        $kriteria->save();

        toast('Berhasil Menambahkan Kriteria', 'success');
        return to_route('kriteria.index');

    }

    // public function refresh(Kriteria $kriterium)
    // {
    //     // $sum = Kriteria::sum('bobot');
    //     // $refresh = Kriteria::where('id', $kriterium->id)->first();
    //     // $kriterium->update([
    //     //     'normalisasi' => $refresh->bobot / $sum,
    //     // ]);
    //     // return back();
        
    // }

    public function show(Kriteria $kriterium)
    {
        $sum = Kriteria::sum('bobot');
        $kriteria = Kriteria::where('id', $kriterium->id)->first();
        return view('admin.kriteria.detail', compact(['kriteria', 'kriterium', 'sum']));
    }

    public function edit(Kriteria $kriterium)
    {
        return view('admin.kriteria.edit', compact('kriterium'));
    }

    public function update(Request $request, Kriteria $kriterium)
    {
        // $sum = Kriteria::sum('bobot');
        $this->validate($request, [
            'kode' => 'required',
            'kriteria' => 'required',
            'bobot' => 'required',
        ]);

        $kriterium->update([
            'kode' => $request->kode,
            'kriteria' => $request->kriteria,
            'bobot' => $request->bobot,
            // 'normalisasi' => $request->bobot / $sum,
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

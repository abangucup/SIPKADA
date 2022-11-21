<?php

namespace App\Http\Controllers;

use App\Models\SubKriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'kriteria_id' => 'required',
            'sub' => 'required',
            'bobot' => 'required',
        ]);

        $sub = new SubKriteria();
        $sub->kriteria_id = $request->kriteria_id;
        $sub->sub = $request->sub;
        $sub->bobot = $request->bobot;
        $sub->save();

        toast('Berhasil Menambahkan Sub Kriteria', 'success');
        return back();
    }
    
    public function update(Request $request, SubKriteria $sub)
    {

        // dd($request->all());
        $this->validate($request,[
            'kriteria_id' => 'required',
            'sub' => 'required',
            'bobot' => 'required',
        ]);

        $sub->update([
            'kriteria_id' => $request->kriteria_id,
            'sub' => $request->sub,
            'bobot' => $request->bobot,
        ]);

        toast('Berhasil Update Sub Kriteria', 'success');
        return back();
    }

    public function destroy(SubKriteria $sub)
    {
        $sub->delete();
        toast('Sub Kriteria Berhasil Dihapus', 'success');
        return back();
    }
}

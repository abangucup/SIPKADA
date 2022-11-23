<?php

namespace App\Http\Controllers;

use App\Models\Subkriteria;
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

        $sub = new Subkriteria();
        $sub->kriteria_id = $request->kriteria_id;
        $sub->sub = $request->sub;
        $sub->bobot = $request->bobot;
        $sub->save();

        toast('Berhasil Menambahkan Sub Kriteria', 'success');
        return back();
    }
    
    public function update(Request $request, Subkriteria $sub)
    {
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

    public function destroy(Subkriteria $sub)
    {
        $sub->delete();
        toast('Sub Kriteria Berhasil Dihapus', 'success');
        return back();
    }
}

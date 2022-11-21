<?php

namespace App\Http\Controllers;

use App\Models\SubKriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    public function store(Request $request)
    {
        dd($request->all());
    }
    
    public function update(Request $request, SubKriteria $sub)
    {

    }

    public function destroy(SubKriteria $sub)
    {
        $sub->delete();
        toast('Sub Kriteria Berhasil Dihapus', 'success');
        return back();
    }
}

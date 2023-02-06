<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::with('kategori')->get();
        $kategoris = Kategori::all();
        return view('admin.kategori.index', compact('kategoris', 'kriterias'));
    }

    public function create()
    {
        $kriterias=Kriteria::all();
        $count = count(Kategori::all());
        return view('admin.kategori.create', compact(['count'], 'kriterias'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama_kategori' => 'required',
            'kriteria_id' => 'required|array'
        ]);

        $kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        $kategori->kriteria()->attach($request->kriteria_id);

        return redirect()->route('kategori.index');
    }
}

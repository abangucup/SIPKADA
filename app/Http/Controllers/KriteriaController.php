<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('admin.kriteria.index', compact(['kriterias']));
    }

    public function create()
    {
        return view('admin.kriteria.create');
    }

    public function edit(Kriteria $kriteria)
    {
        return view('admin.kriteria.edit', compact(['kriteria']));
    }
}

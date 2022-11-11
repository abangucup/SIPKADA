<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use Illuminate\Http\Request;

class PenerimaController extends Controller
{
    public function index()
    {
        $penerimas = Penerima::all();
        return view('kelurahan.penerima.index', compact(['penerimas']));
    }

    public function create()
    {
        return view('kelurahan.penerima.create');
    }

    public function edit($id)
    {
        return view('kelurahan.penerima.edit');
    }
}

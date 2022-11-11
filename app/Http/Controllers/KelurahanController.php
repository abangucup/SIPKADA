<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function index()
    {
        $kelurahans = Kelurahan::all();
        return view('admin.kelurahan.index', compact(['kelurahans']));
    }

    public function create()
    {
        return view('admin.kelurahan.create');
    }

    public function edit($id)
    {
        return view('admin.kelurahan.edit');
    }
}

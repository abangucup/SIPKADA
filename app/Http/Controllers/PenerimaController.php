<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenerimaController extends Controller
{
    public function indexKantor()
    {
        return view('admin.penerima.index');
    }
}

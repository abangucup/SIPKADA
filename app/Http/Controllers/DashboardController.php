<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Penerima;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $penerima = Penerima::all()->count();
        $kelurahan = Kelurahan::all()->count();
        return view('admin.dashboard', compact(['kelurahan', 'penerima']));
    }

    public function kelurahan()
    {
        $penerimas = Penerima::all();
        return view('kelurahan.dashboard', compact(['penerimas']));
    }
}

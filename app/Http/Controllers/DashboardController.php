<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Penerima;
use App\Models\User;
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
        $penerimas = Penerima::where('kelurahan_id', auth()->user()->kelurahan_id)->get();
        return view('kelurahan.dashboard', compact(['penerimas']));
    }
}

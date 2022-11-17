<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Penerima;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function hitung()
    {
        return view('admin.survey.hitung');
    }

    public function rank()
    {
        return view('admin.survey.rank');
    }
    public function index()
    {
        $kriterias = Kriteria::all();
        $penerimas = Penerima::all();
        return view('admin.survey.index', compact(['kriterias', 'penerimas']));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Penerima;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        $penerimas = Penerima::all();
        return view('admin.survey.index', compact(['kriterias', 'penerimas']));
    }
}

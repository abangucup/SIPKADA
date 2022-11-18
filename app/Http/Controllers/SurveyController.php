<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Penerima;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function hitung()
    {
        /*
        RUMUS:
        W => bobot stiap kriteria
        M => jumlah bobot dari smua kriteria
        */
        // variable jumlah bobot kriteria
        $sum = Kriteria::select('bobot')->get()->sum('bobot');

        // $bobots = Kriteria::all();
        // // dd(response()->json($bobots));

        // $normalisasi = array();
        // // dd(response()->json($bobots));

        // $normalisasi = array();
        // // dd(response()->json($bobots));

        // $normalisasi = array();

        // dd(sizeof());
        // foreach ($bobots as $data) {
        //     // dd($data->all());
        //     $item = strlen($data['bobot']);
        //     // dd($item);
        //     for ($i = 0; $i < $item; $i++) {
        //         $normal = substr($data['bobot'], $i) / $sum;
        //         arr
        //     }

        //     $result = array('normalisasi' => $normalisasi);
        // }

        // dd($result);

        // for($i = 0; $i < sizeof($data['bobot']); $i++) {
        // 	$temp_normal = 0;
        // 	$temp_normal = $data['bobot'][$i] / $jum;
        // 	array_push($normalisasi, $temp_normal);
        // }


        $kriterias = Kriteria::all();
        return view('admin.survey.hitung', compact(['kriterias', 'sum']));
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

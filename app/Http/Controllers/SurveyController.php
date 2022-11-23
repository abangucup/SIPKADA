<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Penerima;
use App\Models\Subkriteria;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function hitung()
    {
        // $surveys = Survey::all();
        $penerimas = Penerima::with('survey.subkriteria')->get();
        $bobot = Kriteria::all()->map(function ($item) {

            // variable jumlah bobot kriteria
            $sum = Kriteria::sum('bobot');

            return ([
                /*
                RUMUS:
                N = W/M
                W => bobot stiap kriteria
                M => jumlah bobot dari smua kriteria
                */
                'normalisasi' => $item->bobot / $sum,

                // Get Data Kriteria
                'kriteria' => $item->nama,
                'bobot' => $item->bobot,
                'kode' => $item->kode,
                'keterangan' => $item->keterangan,
                'jenis' => $item->jenis,
                'total' => $item->sum('bobot'),
            ]);
        });

        return view('admin.survey.hitung', compact(['bobot', 'penerimas']));
    }

    public function rank()
    {
        return view('admin.survey.rank');
    }
    public function index()
    {
        $penerimas = Penerima::all();
        $kriterias = Kriteria::all();
        return view('admin.survey.index', compact(['kriterias', 'penerimas']));
    }

    public function store(Request $request)
    {

            for ($i = 0; $i < count($request->subkriteria_id); $i++) {

                $survey[] = [
                    'penerima_id' => $request->penerima_id,
                    'subkriteria_id' => $request->subkriteria_id[$i],
                    'status' => $request->status,
                    'created_at' => now(),
                    'updated_at' => now(),

                ];
            }
            Survey::insert($survey);

        toast('Survey Selesai', 'success');
        return back();
    }
}

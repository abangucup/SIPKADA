<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Kriteria;
use App\Models\Penerima;
use App\Models\Subkriteria;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{

    public function rank()
    {
        $kelurahans = Kelurahan::all();
        $penerimas = Penerima::all();
        $kriterias = Kriteria::all();
        $subkriterias = Subkriteria::all();

        // NILAI MAX DAN MIN
        foreach ($subkriterias as $sub) {
            $min = $sub->min('subbobot');
            $max = $sub->max('subbobot');
        }

        $rankings = Penerima::all()->sortByDesc('rangking');

        return view('admin.survey.rank', compact([
            'kriterias',
            'penerimas',
            'kelurahans',
            'min',
            'max',
            'rankings'
        ]));
    }
    public function filter_rank(Request $request)
    {
        if($request->kelurahan == 0){
            $rankings = Penerima::all();
            $penerimas = Penerima::all();
        } else {
            $rankings = Penerima::where('kelurahan_id', $request->kelurahan)->get()->sortByDesc('rangking');
            $penerimas = Penerima::where('kelurahan_id', $request->kelurahan)->get();
        }
        $kelurahans = Kelurahan::all();
        $filter = Kelurahan::where('id', $request->kelurahan)->first();

        $kriterias = Kriteria::all();
        $subkriterias = Subkriteria::all();

        // NILAI MAX DAN MIN
        foreach ($subkriterias as $sub) {
            $min = $sub->min('subbobot');
            $max = $sub->max('subbobot');
        }

        return view('admin.survey.rank', compact([
            'kriterias',
            'penerimas',
            'kelurahans',
            'min',
            'max',
            'rankings',
            'filter'
        ]));
    }

    public function index()
    {
        $penerimas = Penerima::all();
        $kelurahans = Kelurahan::all();
        $kriterias = Kriteria::all();
        return view('admin.survey.index', compact(['kriterias', 'kelurahans', 'penerimas']));
    }

    public function filter(Request $request)
    {
        $penerimas = Penerima::where('kelurahan_id', $request->kelurahan)->get();
        $kelurahans = Kelurahan::all();
        // $filter = Kelurahan::where('id', $request->kelurahan)->first();
        $kriterias = Kriteria::all();
        return view('admin.survey.index', compact(['kriterias', 'kelurahans', 'penerimas']));
    }


    public function store(Request $request)
    {
        $subkriterias = Subkriteria::all();

        // NILAI MAX DAN MIN
        foreach ($subkriterias as $sub) {
            $min = $sub->min('subbobot');
            $max = $sub->max('subbobot');
        }

        $kriterias = Kriteria::all();
        foreach($kriterias as $kriteria){
            $k[] = $kriteria->normalisasi;
        }

        $count = $request->subkriteria_id;

        if ($count != null) {
            $count = count($request->subkriteria_id);
            for ($i = 0; $i < $count; $i++) {
                $data[] = $sub->where('id', $request->subkriteria_id[$i])->first();
                $survey[] = [
                    'penerima_id' => $request->penerima_id,
                    'subkriteria_id' => $request->subkriteria_id[$i],
                    'nilai' => $data[$i]->subbobot,
                    'utility' => ($data[$i]->subbobot - $min) / ($max - $min) * 100,
                    'hitung' => (($data[$i]->subbobot - $min) / ($max - $min) * 100) * $k[$i],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            Survey::insert($survey);

            // Survey::update($hitungs);
            $coba = Survey::where('penerima_id', $request->penerima_id)->get();

            $penerimas = Penerima::where('id', $request->penerima_id)->first();

            $penerimas->update([
                'rangking' => $coba->sum('hitung'),
            ]);

            toast('Survey Selesai', 'success');
        } else {

            alert()->info('Required Kriteria', 'Harap Inputkan Kriteria dan SubKriteria Dahulu');
        }

        return back();
    }
}

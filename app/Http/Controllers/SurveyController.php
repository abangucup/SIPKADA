<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Kriteria;
use App\Models\Penerima;
use App\Models\Subkriteria;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class SurveyController extends Controller
{

    public function hitung()
    {

        $penerimas = Penerima::with('survey.subkriteria.kriteria')->get();

        // Mencari Nilai Terkecil Dan Terbesai
        // filter data hanya menampilkan subbobot dan sub dari table sub kriteria dan kode dari kriteria
        $filter = DB::table('kriterias')
            ->join('subkriterias', 'kriterias.id', '=', 'subkriterias.kriteria_id')
            ->join('surveys', 'surveys.subkriteria_id', '=', 'subkriterias.id')
            ->get(['subbobot', 'sub', 'kode']);
        // Membuat Variabel Data Sesusai Kode Kriteria
        $data = $filter->groupBy('kode');
        // Batas

        // Mencari Normalisasi
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
                'kriteria' => $item->kriteria,
                'bobot' => $item->bobot,
                'kode' => $item->kode,
                'keterangan' => $item->keterangan,
                'jenis' => $item->jenis,
                'total' => $item->sum('bobot'),
            ]);
        });
        // Batas

        return view('admin.survey.hitung', compact(['bobot', 'penerimas', 'data']));
    }

    public function rank()
    {
        $kelurahans = Kelurahan::all();
        // $penerimas = Penerima::with('survey.subkriteria.kriteria')->get();
        $penerimas = Penerima::all();

        // Mencari Nilai Terkecil Dan Terbesai
        // filter data hanya menampilkan subbobot dan sub dari table sub kriteria dan kode dari kriteria
        // $filter = DB::table('kriterias')
        //     ->join('subkriterias', 'kriterias.id', '=', 'subkriterias.kriteria_id')
        //     ->join('surveys', 'surveys.subkriteria_id', '=', 'subkriterias.id')
        //     ->get(['subbobot', 'sub', 'kode']);
        // // Membuat Variabel Data Sesusai Kode Kriteria
        // $data = $filter->groupBy('kode');
        // Batas

        // Mencari Normalisasi
        // $bobot = Kriteria::all()->map(function ($item) {
        //     // variable jumlah bobot kriteria
        //     $sum = Kriteria::sum('bobot');
        //     return ([
        //         /*
        //         RUMUS:
        //         N = W/M
        //         W => bobot stiap kriteria
        //         M => jumlah bobot dari smua kriteria
        //         */
        //         'normalisasi' => $item->bobot / $sum,
        //         // Get Data Kriteria
        //         'kriteria' => $item->kriteria,
        //         'bobot' => $item->bobot,
        //         'kode' => $item->kode,
        //         'keterangan' => $item->keterangan,
        //         'jenis' => $item->jenis,
        //         'total' => $item->sum('bobot'),
        //     ]);
        // });
        $kriterias = Kriteria::all();

        return view('admin.survey.rank', compact(['kriterias', 'penerimas', 'kelurahans']));
    }
    public function filter_rank(Request $request)
    {
        $kelurahans = Kelurahan::all();
        $penerimas = Penerima::where('kelurahan_id', $request->kelurahan)->get();
        $kriterias = Kriteria::all();
        return view('admin.survey.rank', compact(['kriterias', 'penerimas', 'kelurahans']));
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
        $kriterias = Kriteria::all();
        return view('admin.survey.index', compact(['kriterias', 'kelurahans', 'penerimas']));
    }


    public function store(Request $request)
    {
        $count = $request->subkriteria_id;

        if ($count != null) {
            $count = count($request->subkriteria_id);
            for ($i = 0; $i < $count; $i++) {
                $survey[] = [
                    'penerima_id' => $request->penerima_id,
                    'subkriteria_id' => $request->subkriteria_id[$i],
                    // 'status' => $request->status,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            Survey::insert($survey);

            toast('Survey Selesai', 'success');
        } else {
            // toast('Harap Masukan Kriteria dan Sub Kriteria Dulu', 'info');
            alert()->info('Required Kriteria', 'Harap Inputkan Kriteria dan SubKriteria Dahulu');
        }

        return back();
    }
}

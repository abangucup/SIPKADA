@extends('admin.layouts.app')

@section('title', 'Penerima')

@section('content')
<div class="page-header mt-5">
    <section class="comp-section">
        <div class="card">
            <div class="row">

                <div class="card-body col-md-6 col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <h4 class="breadcrumb-item pl-4"><a href="{{ route('dashboard')}}"
                                    class="text-primary ps-4">Dashboard</a></h4>
                            <h4 class="breadcrumb-item active" aria-current="dashbaord">Detail Perhitungan</h4>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </section>

    <div class="row">

        {{-- Normalisasi Kriteria --}}
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Normalisasi Kriteria</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead class="thead-light">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Bobot</th>
                                    <th>Normalisasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriterias as $kriteria)
                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$kriteria->kode}}</td>
                                    <td>{{$kriteria->bobot}}</td>
                                    <td>{{$kriteria->normalisasi}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Normaliasasi Kriteria --}}

        {{-- Nilai Alternatif (Bobot atau Nilai Penerima Berdasarkan Setiap Kriteria) --}}
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Nilai Parameter Alternatif</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr class="table-primary text-center">
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Alternatif</th>
                                    <th colspan="{{$kriterias->count()}}" class="text-center">Kriteria</th>
                                </tr>
                                <tr class="text-center">
                                    @foreach ($kriterias as $kriteria)
                                    <th>{{$kriteria->kode}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($penerimas as $key => $penerima)
                                @if (!$penerima->survey->isEmpty())

                                <tr class="text-center">
                                    <td>{{$i++}}</td>
                                    <td>{{$penerima->nama}}</td>
                                    @foreach ($penerima->survey as $survey)
                                    <td>{{$survey->nilai}}</td>
                                    @endforeach
                                </tr>
                                @elseif ($penerima->survey->isEmpty())
                                <tr class="text-center">
                                    <td>{{$i++}}</td>
                                    <td>{{$penerima->nama}}</td>
                                    <td colspan="{{$kriterias->count()}}">Belum Survey</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" class="text-center">MIN</th>
                                    <th colspan="3">{{$min}}</th>
                                </tr>
                                <tr>
                                    <th colspan="4" class="text-center">MAX</th>
                                    <th colspan="3">{{$max}}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Nilai Alternatif --}}

        {{-- Nilai Utility Setiap Alternatif --}}
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Nilai Utility Alternatif</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr class="table-primary text-center">
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Alternatif</th>
                                    <th colspan="{{$kriterias->count()}}" class="text-center">Utility</th>
                                </tr>
                                <tr class="text-center">
                                    @foreach ($kriterias as $kriteria)
                                    <th>{{$kriteria->kode}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($penerimas as $penerima)
                                @if (!$penerima->survey->isEmpty())
                                
                                <tr class="text-center">
                                    <td>{{$i++}}</td>
                                    <td>{{$penerima->nama}}</td>
                                    @foreach ($penerima->survey as $survey)
                                    <td>{{$survey->utility}}</td>
                                    @endforeach
                                </tr>
                                @elseif ($penerima->survey->isEmpty())
                                <tr class="text-center">
                                    <td>{{$i++}}</td>
                                    <td>{{$penerima->nama}}</td>
                                    <td colspan="{{$kriterias->count()}}">Belum Survey</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Nilai Utility --}}

        {{-- RANKING ALTERNATIF BERDASARAKAN NILAI UTILITY --}}
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Perengkingan Nilai Akhir</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr class="table-primary text-center">
                                    <th>Alternatif</th>
                                    <th>Nilai Akhir</th>
                                    <th>Rangking</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach ($rankings as $rank)
                                @if (!$rank->survey->isEmpty())
                                <tr class="text-center">
                                    <td>{{$rank->nama}}</td>
                                    <td>{{$rank->rangking}}</td>
                                    <td>Rangking {{$i++}}</td>
                                </tr>

                                @elseif ($penerima->survey->isEmpty())
                                <tr class="text-center">
                                    <td>{{$penerima->nama}}</td>
                                    <td colspan="2">Belum Ada Nilai</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- End RANGKING --}}

    </div>
</div>
@endsection
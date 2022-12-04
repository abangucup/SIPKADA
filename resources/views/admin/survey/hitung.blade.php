@extends('admin.layouts.app')

@section('title', 'Perhitungan')

@section('content')
<div class="page-header mt-5">
    <section class="comp-section">
        <div class="card">
            <div class="row">

                <div class="card-body col-md-6 col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <h5 class="breadcrumb-item pl-4"><a href="{{ route('dashboard')}}"
                                    class="text-primary ps-4">Dashboard</a></h5>
                            <h5 class="breadcrumb-item active" aria-current="dashbaord">Hasil Perhitungan</h5>
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
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Kriteria</th>
                                    <th class="text-center">Bobot</th>
                                    <th class="text-center">Normalisasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bobot as $item)
                                <tr>
                                    <td class="font-weight-bold">{{$loop->iteration}}</td>
                                    <td>{{$item['kode'] ?? 'Data Kosong'}}</td>
                                    <td>{{$item['kriteria'] ?? 'Data Kosong'}}</td>
                                    <td class="text-center">{{$item['bobot'] ?? 'Data Kosong'}}</td>
                                    <td class="text-center">{{round($item['normalisasi'], 4) ?? 'Data Kosong'}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="thead-light text-center">
                                    <th colspan="3">TOTAL NILAI</th>
                                    <th>{{$item['total'] ?? 'Data Kosong'}}</th>
                                    <th>{{$bobot->sum('normalisasi') ?? 'Data Kosong'}}</th>
                                </tr>
                            </tfoot>
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
                    <h4 class="card-title">Data Penerima (Nilai Alternatif)</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Penerima</th>
                                    @foreach ($bobot as $item)
                                    <th>{{$item['kode'] ?? 'Data Kosong'}}</th>
                                    @endforeach
                                    {{-- <th>Total</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penerimas as $penerima)
                                @if(!$penerima->survey->isEmpty())
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$penerima->nama ?? 'Data Kosong'}}</td>
                                    @foreach ($penerima->survey as $survey)
                                    <td>{{$survey->subkriteria->subbobot ?? 'Data Kosong'}}</td>
                                    @endforeach
                                    {{-- <td>{{$penerima->survey->sum('subkriteria.subbobot')}}</td> --}}
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="thead-light text-center">
                                    <th colspan="2" class="text-center">MIN</th>
                                    @foreach ($data as $item)
                                    <th class="text-left">{{$item->min('subbobot') ?? 'Data Kosong'}}</th>
                                    @endforeach
                                    {{-- <th></th> --}}
                                </tr>
                                <tr class="thead-light">
                                    <th colspan="2" class="text-center">MAX</th>
                                    @foreach ($data as $item)
                                    <th class="text-left">{{$item->max('subbobot') ?? 'Data Kosong'}}</th>
                                    @endforeach
                                    {{-- <th></th> --}}
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Nilai Alternatif --}}


        {{-- Normalisasi Nilai Alternatif --}}
        {{-- <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Normalisasi Data Penerima (Nilai Alternatif)</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Kriteria</th>
                                    <th class="text-center">Bobot</th>
                                    <th class="text-center">Normalisasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bobot as $item)
                                <tr>
                                    <td class="font-weight-bold">{{$loop->iteration}}</td>
                                    <td>{{$item['kode']}}</td>
                                    <td>{{$item['kriteria']}}</td>
                                    <td class="text-center">{{$item['bobot']}}</td>
                                    <td class="text-center">{{round($item['normalisasi'], 4)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="thead-light text-center">
                                    <th colspan="3">TOTAL NILAI</th>
                                    <th>{{$item['total']}}</th>
                                    <th>{{$bobot->sum('normalisasi')}}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- End Normalisasi Nilai Alternatif --}}
    </div>
</div>
@endsection
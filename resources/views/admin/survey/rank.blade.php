@extends('admin.layouts.app')

@section('title', 'Rangking')

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

    {{-- Menu Filter --}}
    <div class="card-body">
        <form action="{{ url('dashboard/rank/filter') }}" method="POST">
            @csrf
            @method('POST')
            <div class="row float-right">
                <div class="p-2">
                    <select name="kelurahan" class="form-control" id="kelurahan" name="kelurahan">
                        <option value="">Pilih Kelurahan</option>
                        @foreach ($kelurahans as $kelurahan)
                        <option value="{{ $kelurahan->id }}">{{ $kelurahan->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="p-2 pr-4">
                    <button type="submit" id="filter" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>
    <a class="btn btn-danger mb-3" href="{{route('rank.cetak')}}" target="_blank">CETAK PDF</a>
    {{-- End FIlter --}}

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
                                @foreach ($penerimas as $key => $penerima)
                                @if (!$penerima->survey->isEmpty())

                                <tr class="text-center">
                                    <td>{{$i++}}</td>
                                    <td>{{$penerima->nama}}</td>
                                    @foreach ($penerima->survey as $survey)
                                    <td>{{$survey->utility}}</td>
                                    @endforeach
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
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($rankings as $penerima)
                                    
                                    @if (!$penerima->survey->isEmpty())
                                        <tr class="text-center">
                                            <td>{{$penerima->nama}}</td>
                                            <td>{{$penerima->rangking}}</td>
                                            <td>Rangking {{$i++}}</td>
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
@endsection;
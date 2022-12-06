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
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <a class="btn btn-danger" href="{{route('penerima.cetak')}}" target="_blank">CETAK PDF</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-primary text-center">
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">NIK</th>
                                    <th rowspan="2">Nama</th>
                                    <th colspan="{{$kriterias->count()}}" class="text-center">Kriteria</th>
                                    <th rowspan="2">Rangking</th>
                                </tr>
                                <tr class="text-center">
                                    @foreach ($kriterias as $kriteria)
                                    <th>{{$kriteria->kode}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penerimas as $key => $penerima)
                                <tr class="text-center">
                                    <td>{{++$key}}</td>
                                    <td>{{$penerima->nik}}</td>
                                    <td>{{$penerima->nama}}</td>
                                    @foreach ($penerima->survey as $survey)
                                    <td>{{$survey->subkriteria->bobot ?? '-'}}</td>
                                    @endforeach
                                    @foreach ($kriterias as $kriteria)
                                    <td>{{$kriteria->kode}}</td>
                                    @endforeach
                                    <td>{{++$key}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
    <div class="row">
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
                                    <th>Bobot</th>
                                    <th>Normalisasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriterias as $kriteria)
                                    
                                <tr>
                                    <td class="font-weight-bold">{{$loop->iteration}}</td>
                                    <td>{{$kriteria->kode}}</td>
                                    <td>{{$kriteria->nama}}</td>
                                    <td>{{$kriteria->bobot}}</td>
                                    <td>{{$kriteria->bobot/$sum}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="thead-light">
                                    <th colspan="3" class="text-center">TOTAL NILAI</th>
                                    <th>{{$kriteria->sum('bobot')}}</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
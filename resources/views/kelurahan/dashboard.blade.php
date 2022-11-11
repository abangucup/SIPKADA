@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-sm-12 mt-5">
            <h3 class="page-title mt-3">Selamat Datang {{ auth()->user()->name}}</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard Kelurahan</li>
            </ul>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-6">
        <div class="card card-chart">
            <div class="card-header">
                <h4 class="card-title">Penerima Bantuan Pertahun</h4>
            </div>
            <div class="card-body">
                <div id="line-chart"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-6">
        <div class="card card-chart">
            <div class="card-header">
                <h4 class="card-title">Nama Penerima Bantuan</h4>
            </div>
            {{-- <div class="card-body">
                <div id="donut-chart"></div>
            </div> --}}
            {{-- <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-stripped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>


                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                    <td>#</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>#</td>
                            <td>#</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
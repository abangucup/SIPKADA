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
                <h4 class="card-title">Nama Penerima Bantuan Di {{ auth()->user()->kelurahan->nama}}</h4>
            </div>
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
                        @foreach ($penerimas as $penerima)
                            
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $penerima->nik}}</td>
                            <td>{{ $penerima->nama}}</td>
                            <td>{{ $penerima->alamat}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
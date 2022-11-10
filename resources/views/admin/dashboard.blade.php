@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-sm-12 mt-5">
            <h3 class="page-title mt-3">Selamat Datang {{ auth()->user()->name}}</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6 col-sm-6 col-12">
        <div class="card board1 fill">
            <div class="card-body">
                <div class="dash-widget-header">
                    <div>
                        <h3 class="card_widget_header">200</h3>
                        <h6 class="text-bold">Total Penerima Batuan</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        {{-- <span class="opacity-7 text-muted"> --}}
                            <div class="widget-icon">
                                <div class="icon h1" data-color="#00eccf">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                </div>
                            </div>
                            {{--
                        </span> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-sm-6 col-12">
        <div class="card board1 fill">
            <div class="card-body">
                <div class="dash-widget-header">
                    <div>
                        <h3 class="card_widget_header">180</h3>
                        <h6 class="text-bold">Total Kelurahan</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted">
                            <div class="widget-icon">
                                <div class="icon h1" data-color="#00eccf">
                                    <i class="icon-copy fa fa-building" aria-hidden="true"></i>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-6">
        <div class="card card-chart">
            <div class="card-header">
                <h4 class="card-title">VISITORS</h4>
            </div>
            <div class="card-body">
                <div id="line-chart"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-6">
        <div class="card card-chart">
            <div class="card-header">
                <h4 class="card-title">ROOMS BOOKED</h4>
            </div>
            <div class="card-body">
                <div id="donut-chart"></div>
            </div>
        </div>
    </div>
</div>

@endsection
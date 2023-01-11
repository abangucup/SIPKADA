@extends('admin.layouts.app')

@section('title', 'Edit Kriteria')

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
                            <h5 class="breadcrumb-item active" aria-current="dashbaord"><a href="{{ route('kelurahan.index')}}"
                                class="text-primary ps-4">Kelurahan</a></h5>
                            <h5 class="breadcrumb-item active" aria-current="dashbaord">Edit Kelurahan <b>{{$kelurahan->nama}}</b></h5>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <form action="{{ route('kelurahan.update', $kelurahan->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Kelurahan</label>
                            <input class="form-control" type="text" placeholder="Nama Kelurahan" name="nama" value="{{ old('nama', $kelurahan->nama)}}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Kecamatan</label>
                            <input class="form-control" type="text" placeholder="Lokasi / Tempat Kelurahan" name="lokasi" value="{{ old('lokasi', $kelurahan->lokasi)}}" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Edit Kelurahan</button>
            </form>
        </div>
    </div>
</div>
@endsection
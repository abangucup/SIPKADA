@extends('admin.layouts.app')

@section('title', 'Tambah Kelurahan')

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
                            <h5 class="breadcrumb-item active" aria-current="dashbaord"><a
                                    href="{{ route('kelurahan.index')}}" class="text-primary ps-4">Kelurahan</a></h5>
                            <h5 class="breadcrumb-item active" aria-current="dashbaord">Tambah Kelurahan</h5>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <form action="{{ route('kelurahan.store')}}" method="POST">
                @csrf
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Kelurahan</label>
                            <input class="form-control" type="text" placeholder="Nama Kelurahan" name="nama" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Lokasi</label>
                            <input class="form-control" type="text" placeholder="Lokasi / Tempat Kelurahan" name="lokasi" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Kelurahan</button>
            </form>
        </div>
    </div>
</div>
@endsection
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
                                    href="{{ route('penerima.index')}}" class="text-primary ps-4">Penerima</a></h5>
                            <h5 class="breadcrumb-item active" aria-current="dashbaord">Tambah Penerima</h5>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <form action="{{ route('penerima.store')}}" method="POST">
                @csrf
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">NIK</label>
                            <input class="number form-control" type="number" placeholder="NIK" name="nik" value="{{ old('nik') }}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Nama</label>
                            <input class="form-control" type="text" placeholder="Nama Penerima" name="nama" value="{{ old('nama') }}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Jenis Kelamin</label>
                            <select class="form-control" name="jk">
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Kelurahan</label>
                                <select class="form-control" name="kelurahan">
                                    <option value="{{$kelurahan->id}}">{{$kelurahan->nama}}</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Alamat</label>
                            <input class="form-control" type="text" placeholder="Alamat Penerima"
                                name="alamat" value="{{ old('alamat') }}" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Penerima</button>
            </form>
        </div>
    </div>
</div>
@endsection
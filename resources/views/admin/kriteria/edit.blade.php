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
                            <h5 class="breadcrumb-item active" aria-current="dashbaord"><a href="{{ route('kriteria.index')}}"
                                class="text-primary ps-4">Kriteria</a></h5>
                            <h5 class="breadcrumb-item active" aria-current="dashbaord">Edit Kriteria</h5>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <form>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Kriteria</label>
                            <input class="form-control" type="text" placeholder="Kritieria" name="nama" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="font-weight-bold">Bobot Kriteria</label>
                            <input class="form-control" type="number" placeholder="Bobot" name="bobot" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Keterangan</label>
                            <textarea class="form-control" rows="5" name="keterangan" placeholder="Keterangan Kriteria" required></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Edit Kriteria</button>
            </form>
        </div>
    </div>
</div>
@endsection
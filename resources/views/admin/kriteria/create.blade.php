@extends('admin.layouts.app')

@section('title', 'Tambah Kriteria')

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
                                    href="{{ route('kriteria.index')}}" class="text-primary ps-4">Kriteria</a></h5>
                            <h5 class="breadcrumb-item active" aria-current="dashbaord">Tambah Kriteria</h5>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10">
            <form action="{{ route('kriteria.store')}}" method="POST">
                @csrf
                <div class="row mt-3 justify-content-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Kode <span class="text-danger">*
                                </span></label>
                            <input class="form-control" type="text" placeholder="Kritieria" name="kode" value="{{"
                                K".$count+1}}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Kriteria <span class="text-danger">*
                                </span></label>
                            <input class="form-control" type="text" placeholder="Contoh : Kewarganegaraan"
                                name="kriteria" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Bobot Kriteria <span class="text-danger">*
                                </span></label>
                            <input class="number form-control" type="number" placeholder="0-100" name="bobot" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2 font-weight-bold">Kriteria</label>
                            <div class="col-md-4">
                                <div class="checkbox p-2">
                                    @foreach ($kriterias as $kriteria)
                                    <label class="pl-4">
                                        <input type="checkbox" name="kriteria[]" value="{{$kriteria->id}}">{{$kriteria->kriteria}}
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary justify-content-center">Tambah Kriteria</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection
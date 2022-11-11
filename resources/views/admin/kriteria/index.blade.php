@extends('admin.layouts.app')

@section('title', 'Kriteria')

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
                            <h4 class="breadcrumb-item active" aria-current="dashbaord">Kriteria</h4>
                        </ol>
                    </nav>
                </div>
                <div class="card-body col-md-6 col-sm-12">
                    {{-- <button class="btn btn-primary">Tambah User</button> --}}
                    <a href="{{ route('kriteria.create')}}" class="btn btn-primary float-right veiwbutton"><i class="fas fa-plus pr-2"></i> Tambah Kriteria</a>
                </div>

            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-stripped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kriteria</th>
                                    <th>Bobot</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriterias as $kriteria)
                                <tr>


                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $kriteria->nama}}</td>
                                    <td>{{ $kriteria->bobot}}</td>
                                    <td>{{ $kriteria->keterangan}}</td>
                                    <td>
                                        <a href="{{ route('kriteria.edit', $kriteria->id)}}" class="pr-3"><i class="fas fa-edit"></i> Edit</a>
                                        <a href=""><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
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
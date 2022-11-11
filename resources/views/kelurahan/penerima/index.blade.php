@extends('admin.layouts.app')

@section('title', 'Penerima')

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
                            <h4 class="breadcrumb-item active" aria-current="dashbaord">Penerima Bantuan</h4>
                        </ol>
                    </nav>
                </div>
                <div class="card-body col-md-6 col-sm-12">
                    <a href="{{ route('penerima.create')}}" class="btn btn-primary float-right veiwbutton"><i class="fas fa-plus pr-2"></i> Tambah Penerima</a>
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
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penerimas as $penerima)
                                <tr>


                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $penerima->nik}}</td>
                                    <td>{{ $penerima->nama}}</td>
                                    <td>{{ $penerima->jk}}</td>
                                    <td>{{ $penerima->alamat}}</td>
                                    <td>
                                        <a href="{{ route('penerima.edit', $penerima->id)}}" class="pr-3"><i class="fas fa-edit"></i> Edit</a>
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
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
                {{-- @if ($count <= 15) --}}
                <div class="card-body col-md-6 col-sm-12">
                    <a href="{{ route('penerima.create')}}" class="btn btn-primary float-right veiwbutton"><i class="fas fa-plus pr-2"></i> Tambah Penerima</a>
                </div>
                {{-- @endif --}}

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
                                    <th class="text-center">Action</th>
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
                                    <td class="text-center">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false"><i
                                                    class="fas fa-ellipsis-v ellipse_color"></i></a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                <a class="dropdown-item"
                                                    href="{{ route('penerima.edit', $penerima->id) }}"><i
                                                        class="fas fa-pencil-alt m-r-5"></i>
                                                    Edit</a>
                                                <form action="{{ route('penerima.destroy', $penerima->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item"><i
                                                            class="fas fa-trash-alt m-r-5"></i> Hapus</button>
                                                </form>
                                            </div>
                                        </div>
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
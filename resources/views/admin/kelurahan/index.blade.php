@extends('admin.layouts.app')

@section('title', 'Kelurahan')

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
                            <h5 class="breadcrumb-item active" aria-current="dashbaord">Kelurahan</h5>
                        </ol>
                    </nav>
                </div>
                <div class="card-body col-md-6 col-sm-12">
                    {{-- <button class="btn btn-primary">Tambah User</button> --}}
                    <a href="{{ route('kelurahan.create')}}" class="btn btn-primary float-right veiwbutton"><i
                            class="fas fa-plus pr-2"></i>Tambah Kelurahan</a>
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
                                    <th>Kelurahan</th>
                                    <th>Admin Kelurahan</th>
                                    <th>Lokasi</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelurahans as $kelurahan)
                                <tr>


                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $kelurahan->nama}}</td>
                                    <td>{{ $kelurahan->user->name ?? 'Belum Ada User'}}</td>
                                    <td>{{ $kelurahan->lokasi}}</td>

                                    <td class="text-center">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false"><i
                                                    class="fas fa-ellipsis-v ellipse_color"></i></a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                <a class="dropdown-item"
                                                    href="{{ route('kelurahan.edit', $kelurahan->id)}}"><i
                                                        class="fas fa-pencil-alt m-r-5"></i>
                                                    Edit</a>
                                                <form action="{{ route('kelurahan.destroy', $kelurahan->id) }}"
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
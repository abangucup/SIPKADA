@extends('admin.layouts.app')

@section('title', 'Kategori')

@section('content')
<div class="page-header mt-5">
    <section class="comp-section">
        <div class="card">
            <div class="row">

                <div class="card-body col-md-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <h5 class="breadcrumb-item pl-4"><a href="{{ route('dashboard')}}"
                                    class="text-primary ps-4">Dashboard</a></h5>
                            <h5 class="breadcrumb-item active" aria-current="dashbaord">Kategori</h5>
                        </ol>
                    </nav>
                </div>
                <div class="card-body col-md-6">
                    <button type="button" class="ml-4 btn btn-primary veiwbutton float-right" data-toggle="modal"
                        data-target="#exampleModal">
                        Tambah Kategori
                    </button>

                    @include('admin.kategori.create')
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>List Kriteria</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- perulangan kategori -->

                                @foreach ($kategoris as $kategori)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $kategori->nama_kategori}}</td>
                                    <td>
                                        @forelse ($kategori->kriteria as $kriteria)
                                        <ul>
                                            <li>{{$kriteria->kriteria}}</li>
                                        </ul>
                                        @empty
                                        <a href="{{ route('kriteria.show', $kriteria->id)}}"><i
                                                class="fas fa-plus mr-2"></i>
                                            Tambah kategori</a>
                                        @endforelse
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false"><i
                                                    class="fas fa-ellipsis-v ellipse_color"></i></a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                <a class="dropdown-item"
                                                    href="{{ route('kriteria.show', $kriteria->id)}}"><i
                                                        class="fas fa-eye mr-2"></i>
                                                    Detail</a>
                                                <form action="{{route('kategori.destroy', $kategori->id)}}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                                        class="dropdown-item"><i class="fas fa-trash mr-2"></i>
                                                        Hapus</button>
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
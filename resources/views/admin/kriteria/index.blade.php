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
                            <h5 class="breadcrumb-item pl-4"><a href="{{ route('dashboard')}}"
                                    class="text-primary ps-4">Dashboard</a></h5>
                            <h5 class="breadcrumb-item active" aria-current="dashbaord">Kriteria</h5>
                        </ol>
                    </nav>
                </div>
                <div class="card-body col-md-6 col-sm-12">
                    <a href="{{ route('kriteria.create')}}" class="btn btn-primary float-right veiwbutton"><i
                            class="fas fa-plus pr-2"></i> Tambah Kriteria</a>
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
                                    <th>Kode</th>
                                    <th>Kriteria</th>
                                    <th>Bobot</th>
                                    <th>Normalisasi</th>
                                    <th>Sub Kriteria</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($kriterias as $kriteria)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $kriteria->kode}}</td>
                                    <td>{{ $kriteria->kriteria}}</td>
                                    <td>{{ $kriteria->bobot}}</td>
                                    <td>{{ round($kriteria->normalisasi, 1)}}</td>
                                    <td>
                                        @foreach ($kriteria->subkriteria as $subkriteria)
                                            <ul>
                                                <li>{{$subkriteria->sub}}</li>
                                            </ul>
                                        @endforeach
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
                                                <a class="dropdown-item"
                                                    href="{{ route('kriteria.refresh', $kriteria->id)}}"><i
                                                        class="fas fa-sync mr-2"></i>
                                                    Refresh</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('kriteria.edit', $kriteria->id)}}"><i
                                                        class="fas fa-pencil-alt mr-2"></i>
                                                    Edit</a>
                                                <form action="{{ route('kriteria.destroy', $kriteria->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item"><i
                                                            class="fas fa-trash mr-2"></i> Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="thead-light">
                                    <th colspan="3" class="text-center">Total Bobot</th>
                                    <th colspan="0">{{$sum}}</th>
                                    <th colspan="3">{{round($kriterias->sum('normalisasi'), 1)}}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
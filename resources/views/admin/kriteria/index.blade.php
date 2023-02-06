@extends('admin.layouts.app')

@section('title', 'Kriteria')

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
                            <h5 class="breadcrumb-item active" aria-current="dashbaord">Kriteria</h5>
                        </ol>
                    </nav>
                </div>
                <div class="card-body col-md-6">
                    <a href="{{ route('kriteria.create')}}" class="ml-4 btn btn-primary veiwbutton float-right"><i
                            class="fas fa-plus pr-2"></i> Tambah Kriteria</a>
                    {{-- <form action="kritria.refresh" method="post">
                        @csrf
                        @method('POST')

                    </form> --}}
                    {{-- <a href="{{ route('kriteria.refresh')}}" class="float-right"><i class="fas fa-sync mr-2"></i>
                        Refresh</a> --}}

                </div>
                {{-- <div class="card-body col-md-3">

                </div> --}}

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
                                    <th>Kode</th>
                                    <th>Kriteria</th>
                                    <th>Bobot</th>
                                    <th>Normalisasi</th>
                                    <th>Sub Kriteria</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategoris as $kategori)
                                <td rowspan="{{ count($kategori->kriteria)}}">{{$loop->iteration}}</td>
                                <td class="text-center" rowspan="{{ count($kategori->kriteria)}}">
                                    {{$kategori->nama_kategori}}</td>

                                    @foreach ($kategori->kriteria as $kriteria)
                                    <td>{{$kriteria->kode}}</td>
                                    <td>{{$kriteria->kriteria}}</td>
                                    <td>{{$kriteria->bobot}}</td>
                                    <td>{{round($kriteria->bobot/$sum, 4)}}</td>
                                    <td>
                                        @forelse ($kriteria->subkriteria as $subkriteria)
                                        <ul>
                                            <li>{{$subkriteria->sub}}</li>
                                        </ul>
                                        @empty
                                        <a href="{{ route('kriteria.show', $kriteria->id)}}"><i
                                                class="fas fa-plus mr-2"></i>
                                            Tambah Subkiriteria</a>
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
                                    @if (!$loop->last)
                                    <tr>
                                        @endif
                                        @endforeach
                                @endforeach

                                    {{-- @foreach ($kriterias as $kriteria)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $kriteria->kode}}</td>
                                    <td>{{ $kriteria->kriteria}}</td>
                                    <td>{{ $kriteria->bobot}}</td>
                                    <td>{{ round($kriteria->bobot/$sum,4)}}</td>
                                    <td>
                                        @forelse ($kriteria->subkriteria as $subkriteria)
                                        <ul>
                                            <li>{{$subkriteria->sub}}</li>
                                        </ul>
                                        @empty
                                        <a href="{{ route('kriteria.show', $kriteria->id)}}"><i
                                                class="fas fa-plus mr-2"></i>
                                            Tambah Subkiriteria</a>
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
                                @endforeach --}}
                            </tbody>
                            <tfoot>
                                <tr class="thead-light">
                                    <th colspan="3" class="text-center">Total Bobot</th>
                                    <th colspan="0">{{$sum}}</th>
                                    <th colspan="3">{{round($sumnormal,1)}}</th>
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
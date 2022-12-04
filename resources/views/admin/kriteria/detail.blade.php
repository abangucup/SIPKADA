@extends('admin.layouts.app')

@section('title', 'Detail Kriteria')

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
                            <h5 class="breadcrumb-item active" aria-current="dashbaord">Detail Kriteria</h5>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </section>

    {{-- Detail Kriteria --}}
    <div class="row  d-flex justify-content-center">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header bg-info">
                    <h6 class="float-left col-md-9">
                        {{$kriterium->kriteria}}
                    </h6>
                    <div class="float-right col-md-3">
                        <a href="#" class="float-right btn btn-primary veiwbutton" data-toggle="modal"
                            data-target="#createsub">
                            <i class="fas fa-plus pr-2"></i> Tambah Sub Kriteria</a>
                    </div>

                    @include('admin.kriteria.sub.modal_create')
                </div>

                <div class="card-body">

                    <div class="login-right-wrap">
                        <div>

                            <label>Kode Kriteria</label>
                            <input class="form-control" type="text" value="{{$kriterium->kode}}" readonly>
                        </div>
                        <div class="mt-2">
                            <label>Kriteria</label>
                            <input class="form-control" type="text" value="{{$kriterium->kriteria}}" readonly>
                        </div>
                        <div class="mt-2">
                            <label>Bobot Kriteria</label>
                            <input class="form-control" type="text" value="{{$kriterium->bobot}}" readonly>
                        </div>
                        <div class="mt-2">
                            <label>Jenis Kriteria</label>
                            <input class="form-control" type="text" value="{{$kriterium->jenis}}" readonly>
                        </div>
                        <div class="mt-2">
                            <label>Keterangan</label>
                            <input class="form-control" type="text" value="{{$kriterium->keterangan}}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Detail Kriteria --}}

    {{-- DETAIL SUB KRITERIA --}}
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Sub Kriteria</th>
                                    <th>Bobot</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($kriteria->subkriteria as $sub)
                                <tr>
                                    
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $sub->sub}}</td>
                                    <td>{{ $sub->subbobot}}</td>
                                    <td class="text-center">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false"><i
                                                    class="fas fa-ellipsis-v ellipse_color"></i></a>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#editsub-{{$sub->id}}"><i
                                                        class="fas fa-pencil-alt mr-2"></i>
                                                    Edit</a>
                                                <form action="{{ route('sub.destroy', $sub->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item"><i
                                                            class="fas fa-trash mr-2"></i> Hapus</button>
                                                </form>

                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                @include('admin.kriteria.sub.modal_edit')

                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="thead-light">
                                    <th colspan="2" class="text-center">Total Bobot Sub Kriteria</td>
                                    <th colspan="2">{{$kriteria->subkriteria->sum('subbobot')}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END DETAIL SUB KRITERIA --}}
</div>
@endsection

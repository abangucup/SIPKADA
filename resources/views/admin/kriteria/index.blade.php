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
                    {{-- <button class="btn btn-primary">Tambah User</button> --}}
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
                                    <th>Jenis</th>
                                    <th>Keterangan</th>
                                    <th>Bobot</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($kriterias as $kriteria)
                                <tr>


                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $kriteria->kode}}</td>
                                    <td>{{ $kriteria->nama}}</td>
                                    <td>{{ Str::ucfirst($kriteria->jenis) }}</td>
                                    <td>{{ Str::ucfirst($kriteria->keterangan)}}</td>
                                    <td>{{ $kriteria->bobot}}</td>
                                    <td>
                                        <a href="{{ route('kriteria.edit', $kriteria->id)}}" class="col-sm-5 float-left btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                        <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="col-sm-6 btn btn-danger float-right"><i class="fas fa-trash"></i> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="thead-light">
                                    <th colspan="5" class="text-center">Total Bobot</td>
                                    <th colspan="2">{{$sum}}</td>
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

{{-- @push('scripts')
<link href="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.css" rel="stylesheet">
<script src="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.js"></script>
<script>
    function idFormatter(data, footerValue) {
      return footerValue
    }
  
    function nameFormatter(data, footerValue) {
      return footerValue
    }
  
    function priceFormatter(data, footerValue) {
      return footerValue
    }
</script>
@endpush --}}
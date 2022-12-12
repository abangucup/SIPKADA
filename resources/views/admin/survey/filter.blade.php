@extends('admin.layouts.app')

@section('title', 'Survey')

@section('content')
    <div class="page-header mt-5">
        <section class="comp-section">
            <div class="card">
                <div class="row">

                    <div class="card-body col-md-6 col-sm-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <h5 class="breadcrumb-item pl-4"><a href="{{ route('dashboard') }}"
                                        class="text-primary ps-4">Dashboard</a></h5>
                                <h5 class="breadcrumb-item active" aria-current="dashbaord">Survey</h5>
                            </ol>
                        </nav>
                    </div>

                    {{-- Menu Filter --}}
                    <div class="card-body">
                        <form action="{{ route('filter') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="row float-right">
                                <div class="p-2">
                                    <select name="kelurahan" class="form-control" id="kelurahan" name="kelurahan">
                                        <option value="">Pilih Kelurahan</option>
                                        <option value="0">Semua</option>
                                        @foreach ($kelurahans as $kelurahan)

                                            <option value="{{ $kelurahan->id }}">{{ $kelurahan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="p-2 pr-4">
                                    <button type="submit" id="filter" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- End FIlter --}}

                </div>
            </div>
        </section>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="filterTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Kelurahan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penerimas as $penerima)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $penerima->nik }}</td>
                                            <td>{{ $penerima->nama }}</td>
                                            <td>{{ $penerima->jk }}</td>
                                            <td>{{ $penerima->alamat }}</td>
                                            <td>{{ $penerima->kelurahan->nama }}</td>
                                            <td>
                                                @if ($penerima->survey->isEmpty())
                                                    <button class=" btn btn-success" type="button" data-toggle="modal"
                                                        data-target="#survey-{{ $penerima->id }}">Survey</button>
                                                @else
                                                    <button class="btn btn-danger" disabled>Selesai Survey</button>
                                                @endif
                                            </td>
                                        </tr>
                                        @include('admin.survey.modal')
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

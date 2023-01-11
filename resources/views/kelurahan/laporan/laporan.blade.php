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
                            <h4 class="breadcrumb-item active" aria-current="dashbaord">Detail Perhitungan</h4>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <a class="btn btn-danger" href="{{route('cetak_laporan_penerima')}}" target="_blank">CETAK PDF</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-primary text-center">
                                    <th>NO</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Nilai</th>
                                    <th>Rangking</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                    $i = 1;
                                @endphp
                                @foreach ($penerimas as $key => $penerima)
                                <tr>

                                    <td class="text-center">{{$no++}}</td>
                                    <td>{{$penerima->nik}}</td>
                                    <td>{{$penerima->nama}}</td>
                                    <td>{{$penerima->jk}}</td>
                                    <td>{{$penerima->alamat}}</td>
                                    <td>{{$penerima->rangking ?? 'Nilai Kosong'}}</td>
                                    @if ($penerima->rangking !== null)
                                    <td class="text-center">Rangking {{$i++}}</td>
                                    @else
                                    <td class="text-ceter">Tidak Ada Rangking</td>
                                    @endif

                                    
                                    @if ($penerima->rangking < 60)
                                    <td class="text-center text-danger">Bukan Penerima</td>
                                    @else
                                    <td class="text-center text-info">Penerima Bantuan</td>
                                    @endif
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
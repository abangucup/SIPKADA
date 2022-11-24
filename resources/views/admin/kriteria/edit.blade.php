@extends('admin.layouts.app')

@section('title', 'Edit Kriteria')

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
                            <h5 class="breadcrumb-item active" aria-current="dashbaord"><a href="{{ route('kriteria.index')}}"
                                class="text-primary ps-4">Kriteria</a></h5>
                            <h5 class="breadcrumb-item active" aria-current="dashbaord">Edit Kriteria</h5>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <form action="{{ route('kriteria.update', $kriterium->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mt-3 justify-content-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Kode <span class="text-danger">*
                            </span></label>
                            <input class="form-control" type="text" placeholder="Kritieria" name="kode" 
                            value="{{old('kode',$kriterium->kode)}}">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Kriteria <span class="text-danger">*
                                </span></label>
                            <input class="form-control" type="text" placeholder="Contoh : Kewarganegaraan" name="kriteria" value="{{ old('kriteria', $kriterium->kriteria)}}" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Keterangan <span class="text-danger">*
                                </span></label>
                            <textarea class="form-control" rows="5" name="keterangan" placeholder="Keterangan Kriteria"
                                required>{{old('keterangan', $kriterium->keterangan)}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-weight-bold">Bobot Kriteria <span class="text-danger">*
                                </span></label>
                            <input class="number form-control" type="number" placeholder="0-100" name="bobot" value="{{old('bobot', $kriterium->bobot)}}" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Jenis Kriteria</label>
                            <select class="form-control" name="jenis">
                                <option value="{{old('jenis', $kriterium->jenis)}}">{{Str::ucfirst($kriterium->jenis)}}</option>
                                <option value="benefit">Benefit</option>
                                <option value="cost">Cost</option>
                            </select>
                            {{-- <span class="font-weight">Keterangan :</span> <br> --}}
                            <span class="text-danger">*benefit : kriteria berdasarkan keuntungan <br>(makin besar, lebih baik)</span><br>
                            <span class="text-danger">*cost : kriteria berdasarkan biaya <br>(makin kecil, lebih baik)</span>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Edit Kriteria</button>
            </form>
        </div>
    </div>
</div>
@endsection
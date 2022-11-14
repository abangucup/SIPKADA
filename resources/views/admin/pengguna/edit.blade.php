@extends('admin.layouts.app')

@section('title', 'Tambah Kelurahan')

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
                                    href="{{ route('user.index')}}" class="text-primary ps-4">User</a></h5>
                            <h5 class="breadcrumb-item active" aria-current="dashbaord">Edit User <b>{{$user->username}}</b></h5>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <form action="{{ route('user.update', $user->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Nama</label>
                            <input class="form-control" type="text" placeholder="Nama Pengguna" name="name" value="{{ $user->name}}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Username</label>
                            <input class="form-control" type="text" placeholder="Username" name="username" value="{{ $user->username}}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Password</label>
                            <input class="form-control" type="text" placeholder="Password" name="password" value="{{ $user->password}}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="font-weight-bold">Kelurahan</label>
                            <select class="form-control" name="kelurahan_id">
                                <option value="{{$user->kelurahan_id}}">{{ $user->kelurahan->nama ?? '-'}}</option>
                                 @foreach ($kelurahans as $kelurahan)
                                 @if ($kelurahan->user == null)
                                 <option value="{{$kelurahan->id}}">{{ $kelurahan->nama}}</option>
                                 @endif
                                 @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Edit Kelurahan</button>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('admin.layouts.app')

@section('title', 'User')

@section('content')


<div class="page-header mt-5">
    <section class="comp-section">
        <div class="card">
            <div class="row">

                <div class="card-body col-md-6 col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <h4 class="breadcrumb-item pl-4"><a href="{{ route('dashboard')}}" class="text-primary ps-4">Dashboard</a></h4>
                            <h4 class="breadcrumb-item active" aria-current="dashbaord">User</h4>
                        </ol>
                    </nav>
                </div>
                <div class="card-body col-md-6 col-sm-12 text-right">
                    <button class="btn btn-primary">Tambah User</button>
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
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($users as $user)


                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->username}}</td>
                                    <td>{{ $user->role}}</td>
                                    <td>
                                        <a href="" class="pr-3"><i class="fas fa-edit"></i> Edit</a>
                                        <a href=""><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
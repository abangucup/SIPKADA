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
    <div class="row">
        <div class="col-lg-12">
            <form>
                <div class="row formtype">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Booking ID</label>
                            <input class="form-control" type="text" value="BKG-0001"> </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Name</label>
                            <select class="form-control" id="sel1" name="sellist1">
                                <option>Select</option>
                                <option>Jennifer Robinson</option>
                                <option>Terry Baker</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Room Type</label>
                            <select class="form-control" id="sel2" name="sellist1">
                                <option>Select</option>
                                <option>Single</option>
                                <option>Double</option>
                                <option>Quad</option>
                                <option>King</option>
                                <option>Suite</option>
                                <option>Villa</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Total Members</label>
                            <select class="form-control" id="sel3" name="sellist1">
                                <option>Select</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Date</label>
                            <div class="cal-icon">
                                <input type="text" class="form-control datetimepicker"> </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Time</label>
                            <div class="time-icon">
                                <input type="text" class="form-control" id="datetimepicker3"> </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Arrival Date</label>
                            <div class="cal-icon">
                                <input type="text" class="form-control datetimepicker"> </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Depature Date</label>
                            <div class="cal-icon">
                                <input type="text" class="form-control datetimepicker"> </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email ID</label>
                            <input type="text" class="form-control" id="usr"> </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" id="usr1"> </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>File Upload</label>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="customFile" name="filename">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary buttonedit1">Create Booking</button>
            </form>
        </div>
    </div>
</div>
@endsection
<!-- Modal Survey-->
<div class="modal fade" id="editsub-{{$sub->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Sub Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('sub.update', $sub->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group notification-list mb-4">
                                <li>
                                    <div class="form-group">
                                        <label for="">Kriteria ID</label>
                                        <input type="text" class="form-control" name="kriteria_id" value="{{old('kriteria_id', $sub->kriteria_id)}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Sub Kriteria</label>
                                        <input type="text" class="form-control" name="sub" value="{{old('sub', $sub->sub)}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Bobot Subkriteria</label>
                                        <input type="text" class="form-control" name="subbobot" value="{{old('subbobot', $sub->subbobot)}}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </li>
                            </ul>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Survey --}}
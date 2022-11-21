<!-- Modal Survey-->
<div class="modal fade" id="createsub" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Sub Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('sub.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group notification-list mb-4">
                                <li>
                                    <div class="form-group">
                                        <label for="">Sub Kriteria</label>
                                        <input type="text" class="form-control" value="{{old('sub')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Bobot</label>
                                        <input type="text" class="form-control" value="{{old('bobot')}}">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>

                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Survey --}}
<!-- Modal Survey-->
<div class="modal fade" id="createkriteria" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kriteria.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="font-weight-bold">Kode <span class="text-danger">*
                                    </span></label>
                                <input class="form-control" type="text"
                                    name="kode" value="{{'K'.$count+1}}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Kriteria <span class="text-danger">*
                                    </span></label>
                                <input class="form-control" type="text" placeholder="Contoh : Kewarganegaraan"
                                    name="kriteria" required>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Bobot Kriteria <span class="text-danger">*
                                    </span></label>
                                <input class="number form-control" type="number" placeholder="0-100" name="bobot" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>

                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Survey --}}
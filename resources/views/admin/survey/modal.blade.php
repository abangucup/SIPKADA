<!-- Modal Survey-->
<div class="modal fade" id="survey-{{$penerima->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Survey Penerima </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('survey.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group notification-list mb-4">
                                <li>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama Penerima</label>
                                        <input type="text" class="form-control" value="{{$penerima->nama}}" readonly>
                                    </div>
                                </li>
                                @foreach ($kriterias as $kriteria)
                                <li class="list-group-item">
                                    <div class="d-flex flex-row float-left col-sm-7">
                                        <div class="p-2"><i class="fas fa-eye mr-3" data-toggle="tooltip"
                                                data-placement="left"
                                                title="Bobot : {{$kriteria->bobot}}, Normalisasi : {{$kriteria->normalisasi}}"></i>
                                        </div>
                                        <div class="p-2">{{$kriteria->kriteria}}</div>
                                    </div>

                                    <div class="d-flex flex-row-reverse float-right col-sm-5">
                                        <div class="p-2">
                                            <div class="form-group">
                                                <select class="form-control" name="subkriteria_id[]" required>
                                                    @foreach ($kriteria->subkriteria as $sub)
                                                    <option value="{{$sub->id}}">
                                                        {{$sub->sub}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                <li>
                                    <div class="form-group">
                                        <label class="font-weight-bold mt-4">Sudah Pernah Menerima 10 Tahun
                                            Terakhir?</label>
                                        <select name="status_pernah_menerima" class="form-control">
                                            <option value="sudah">Sudah Pernah</option>
                                            <option value="belum">Belum Pernah</option>
                                        </select>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="penerima_id" value="{{$penerima->id}}">Simpan
                        Survey</button>

                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Survey --}}
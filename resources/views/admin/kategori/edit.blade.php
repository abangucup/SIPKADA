<!-- Modal -->
<div class="modal fade" id="exampleModal-{{ $kategori->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('kategori.update', $kategori->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" value="{{ $kategori->nama_kategori }}"
                            name="nama_kategori" placeholder="Nama Kategori" readonly>
                    </div>
                    <div class="form-group">
                        <select id="choices-multiple-remove-button" placeholder="Pilih Kriteria" name="kriteria_id[]"
                            multiple>
                            @foreach ($kriterias as $kriteria)
                            @if ($kriteria->kategori->isEmpty())
                            <option value="{{$kriteria->id}}">{{$kriteria->kriteria}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
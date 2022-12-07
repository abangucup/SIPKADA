<!DOCTYPE html>
<html>

<head>
    <title>RANGKING</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Perengkingan Data Penerima Bantuan</h4>
    </center>

    <div class="row">

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Normalisasi Kriteria</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead class="thead-light">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Bobot</th>
                                    <th>Normalisasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriterias as $kriteria)
                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$kriteria->kode}}</td>
                                    <td>{{$kriteria->bobot}}</td>
                                    <td>{{$kriteria->normalisasi}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Nilai Parameter Alternatif</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr class="table-primary text-center">
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Alternatif</th>
                                    <th colspan="{{$kriterias->count()}}" class="text-center">Kriteria</th>
                                </tr>
                                <tr class="text-center">
                                    @foreach ($kriterias as $kriteria)
                                    <th>{{$kriteria->kode}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($penerimas as $key => $penerima)
                                @if (!$penerima->survey->isEmpty())

                                <tr class="text-center">
                                    <td>{{$i++}}</td>
                                    <td>{{$penerima->nama}}</td>
                                    @foreach ($penerima->survey as $survey)
                                    <td>{{$survey->subkriteria->subbobot}}</td>
                                    @endforeach
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" class="text-center">MIN</th>
                                    <th colspan="3">70</th>
                                </tr>
                                <tr>
                                    <th colspan="4" class="text-center">MAX</th>
                                    <th colspan="3">90</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
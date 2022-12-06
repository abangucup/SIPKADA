<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
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
        <h5>Detail Perhitungan Penerima Bantuan Kelurahan {{$kelurahan->nama}}</h4>
    </center>
     
    <table class='table table-bordered'>
        <thead>
            <tr class="table-primary text-center">
                <th rowspan="2">No</th>
                <th rowspan="2">NIK</th>
                <th rowspan="2">Nama</th>
                <th colspan="{{$kriterias->count()}}" class="text-center">Kriteria</th>
                <th rowspan="2">Rangking</th>
            </tr>
            <tr class="text-center">
                @foreach ($kriterias as $kriteria)
                <th>{{$kriteria->kode}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($penerimas as $key => $penerima)
            <tr class="text-center">
                <td>{{++$key}}</td>
                <td>{{$penerima->nik}}</td>
                <td>{{$penerima->nama}}</td>
                @foreach ($penerima->survey as $survey)
                <td>{{$survey->subkriteria->bobot ?? '-'}}</td>
                @endforeach
                @foreach ($kriterias as $kriteria)
                <td>{{$kriteria->kode}}</td>
                @endforeach
                <td>{{++$key}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
     
</body>

</html>
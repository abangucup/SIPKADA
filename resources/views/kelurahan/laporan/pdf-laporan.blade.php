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
        <h5>Laporan Data Penerima Kelurahan {{$kelurahan->nama}}</h4>
    </center>
     
    <table class='table table-bordered'>
        <thead>
            <tr class="table-primary text-center">
                <th>NO</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Rangking</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
                $i = 1;
            @endphp
            @foreach ($penerimas as $key => $penerima)
            <tr>

                <td class="text-center">{{$no++}}</td>
                <td>{{$penerima->nik}}</td>
                <td>{{$penerima->nama}}</td>
                <td>{{$penerima->jk}}</td>
                <td>{{$penerima->alamat}}</td>
                @if ($penerima->rangking != null)    
                <td class="text-center">{{$i++}}</td>
                @else
                <td class="text-center">Tidak Ada Rangking</td>
                @endif
                @if ($penerima->rangking < 60)
                <td class="text-center text-danger">Bukan Penerima</td>
                @else
                <td class="text-center text-info">Penerima Bantuan</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
     
</body>

</html>
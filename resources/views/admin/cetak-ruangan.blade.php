<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .kop {
            text-align: center;
            margin-bottom: 20px;
        }

        .kop h1,
        .kop h2,
        .kop p {
            margin: 0;
        }

        .kop img {
            width: 100px;
            height: auto;
            margin-bottom: 10px;
        }

        .kop hr {
            border: 1px solid black;
            margin-top: 10px;
        }

        table {

            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        th {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="kop">
        <img src="https://upload.wikimedia.org/wikipedia/id/6/61/Unper.png" alt="Institution Logo">
        <h2>Biro Administrasi Akademik dan Kemahasiswaan (BAAK) <br> Universitas Perjuangan Tasikmalaya</h2>
        <br>
        <hr>
    </div>


    <table id="datatablesSimple">
        <h3>Laporan Peminjaman Ruangan BAAK</h3>
        <thead>
            <tr>
                <th>ID</th>
                <th>Organisasi</th>
                <th>Nama Barang</th>
                <th>Nama Peminjam</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pinjamRuangan as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->organisasi }}</td>
                    <td>
                        @php
                            $values = json_decode($item->nama_barang);
                            sort($values);
                        @endphp
                        @foreach ($values as $value)
                            <span>{{ $value }}</span>
                            @if (!$loop->last)
                                <span>,<br></span>
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tgl_pinjam)->format('d F Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tgl_kembali)->format('d F Y') }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>

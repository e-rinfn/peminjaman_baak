@extends('admin.layoutAdmin.template')

@section('title')
    <title>P BAAK | Laporan Peminjaman Barang</title>
@endsection

{{-- sidebar --}}
@section('sidenav')
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading  ">Halaman Utama</div>
                    <a class="nav-link " href="{{ url('/admin') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Daftar Barang Ruangan</div>
                    <a class="nav-link" href="{{ url('/daftar-barang') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i></div>
                        Daftar Barang
                    </a>
                    <a class="nav-link" href="{{ url('daftar-ruangan') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                        Daftar Ruangan
                    </a>

                    <div class="sb-sidenav-menu-heading">Laporan</div>
                    <a class="nav-link active bg-primary" href="{{ url('laporan') }}">
                        <div class="sb-nav-link-icon"><i class="fa-regular fa-clipboard"></i></div>
                        Laporan Peminjaman
                    </a>
                    <div class="sb-sidenav-menu-heading">Akun</div>
                    <a class="nav-link" href="{{ url('akun') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                        Kelola Akun
                    </a>
                    <div class="d-flex justify-content-center mt-5">
                        <form onsubmit="return confirm('Apakah anda yakin untuk keluar?')" action="/logout" method="post">
                            @csrf
                            <button type="submit" class="btn btn-block btn-danger">KELUAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </div>
@endsection



{{-- Konten Admin --}}
@section('konten')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Selamat Datang : {{ Auth::user()->name }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Laporan</li>
            </ol>
            <hr>
            <div class="d-flex justify-content-between">
                <form action="{{ route('filter.by.date') }}" method="GET" class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="start_date">Tanggal Awal <i>(Bulan/Tanggal/Tahun)</i></label>
                            <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}"
                                required>
                        </div>
                        <div class="col">
                            <label for="end_date">Tanggal Akhir <i>(Bulan/Tanggal/Tahun)</i></label>
                            <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}"
                                required>
                        </div>
                        <div class="col d-flex align-items-end">
                            <button type="submit" class="btn btn-primary me-2">Filter</button>
                            <a href="{{ route('reset.filter') }}" class="btn btn-secondary">Reset</a>
                        </div>
                    </div>
                </form>
                <div class="mb-3 p-3">
                    <div class="mt-2">
                        <a href="laporan"><button type="submit" class="btn btn-block btn-secondary">Laporan Pinjam
                                Barang</button></a>
                    </div>
                    <div class="mt-2">
                        <a href="laporan-ruangan"><button type="submit" class="btn btn-block btn-primary">Laporan Pinjam
                                Ruangan</button></a>
                    </div>
                </div>
            </div>

            {{-- Tabel Laoporan Peminjaman --}}
            <div class="card mb-4">
                <div class="card-header">
                    <h3 align=center>Laporan Peminjaman Barang</h3>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Organisasi</th>
                                <th>Nama Barang</th>
                                <th>Nama Peminjam</th>
                                <th>Tgl Pinjam</th>
                                <th>Tgl Kembali</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pinjamBarang as $item)
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
                                    <td>
                                        @if ($item->status == 'Pending')
                                            <div class="btn btn-warning">{{ $item->status }}</div>
                                        @elseif($item->status == 'Dipinjam')
                                            <div class="btn btn-success">{{ $item->status }}</div>
                                        @elseif($item->status == 'Ditolak')
                                            <div class="btn btn-danger">{{ $item->status }}</div>
                                        @else
                                            <div class="btn btn-secondary">{{ $item->status }}</div>
                                        @endif
                                    </td>
                                    <td> <a
                                            href="{{ url('lihat-pinjam-barang-admin/' . $item->id . '/edit') }}"class="btn btn-primary">Check</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </main>
    </div>
@endsection

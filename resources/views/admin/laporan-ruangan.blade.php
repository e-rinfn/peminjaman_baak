@extends('admin.layoutAdmin.template')

@section('topNav')
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-success">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">PINJAM BAAK</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
    </nav>
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



{{-- konten admin --}}
@section('konten')
    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Selamat Datang Admin : <i> {{ Auth::user()->name }}</i></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            {{-- pesan berhasil menambah data barang --}}

            <hr>
            <div class="d-flex justify-content-center">
                <div class="mb-3 p-3">
                    <a href="pinjam-barang"><button type="submit" class="btn btn-block btn-primary">Laporan Pinjam
                            Barang</button></a>
                </div>
                <div class="mb-3 p-3">
                    <a href="pinjam-ruangan"><button type="submit" class="btn btn-block btn-primary">Laporan Pinjam
                            Ruangan</button></a>
                </div>
            </div>

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
                            @foreach ($Ruangan as $item)
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
                                                <span><br></span>
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
                                            href="{{ url('lihat-pinjam-ruangan-admin/' . $item->id . '/edit') }}"class="btn btn-primary">Check</a>
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
    {{-- main admin end --}}
    </div>
@endsection

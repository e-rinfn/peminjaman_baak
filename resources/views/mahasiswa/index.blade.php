@extends('mahasiswa.layoutMahasiswa.template')

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
                    <a class="nav-link active bg-primary" href="#">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                        Beranda Pengguna
                    </a>
                    <div class="sb-sidenav-menu-heading">Daftar Barang Ruangan</div>
                    <a class="nav-link" href="{{ url('/daftar-barang-mahasiswa') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i></div>
                        Daftar Barang
                    </a>
                    <a class="nav-link" href="{{ url('/daftar-ruangan-mahasiswa') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                        Daftar Ruangan
                    </a>
                    <div class="sb-sidenav-menu-heading">Daftar Peminjaman</div>
                    <a class="nav-link" href="{{ url('/daftar-pinjam-barang-mahasiswa') }}">
                        <div class="sb-nav-link-icon "><i class="fa-solid fa-box"></i> | <i
                                class="fa-solid fa-handshake"></i></div>
                        Pinjam Barang
                    </a>
                    <a class="nav-link" href="{{ url('/daftar-pinjam-ruangan-mahasiswa') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i> | <i
                                class="fa-solid fa-handshake"></i></div>
                        Pinjam Ruangan
                    </a>

                    <div class="sb-sidenav-menu-heading">Akun</div>
                    <a class="nav-link" href="{{ url('/akun') }}">
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
            <h1 class="mt-4">Selamat Datang : <br> <i> {{ Auth::user()->name }}</i></h1>
            <p>Email Anda: {{ Auth::user()->email }}</p>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Beranda Pengguna</li>
            </ol>
            <hr>

            <h2>DAFTAR PENGAJUAN PINJAM BARANG</h2>
            <hr>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Barang</th>
                            <th>Status</th>
                            <th>Pesan Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pinjamBarang->where('email', Auth::user()->email)->whereIn('status', ['Pending', 'Ditolak', 'Dipinjam']) as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    @php
                                        $values = json_decode($item->nama_barang);
                                        sort($values);
                                    @endphp
                                    @foreach ($values as $value)
                                        <span>{{ $value }}</span>
                                        @if (!$loop->last)
                                            <span>, <br></span>
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $item->status }}</td>
                                <td>{{ $item->pesan_admin }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    {{-- main admin end --}}
    </div>
@endsection

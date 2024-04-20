@extends('mahasiswa.layoutMahasiswa.template')


{{-- sidebar --}}
@section('sidenav')
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading  ">Halaman Utama</div>
                    <a class="nav-link " href="#">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                        Beranda Pengguna
                    </a>
                    <div class="sb-sidenav-menu-heading">Daftar Barang Ruangan</div>
                    <a class="nav-link active bg-primary" href="{{ url('/daftar-barang-mahasiswa') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i></div>
                        Daftar Barang
                    </a>
                    <a class="nav-link" href="{{ url('daftar-ruangan') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                        Daftar Ruangan
                    </a>
                    <div class="sb-sidenav-menu-heading">Daftar Peminjaman</div>
                    <a class="nav-link" href="{{ url('/mahasiswa/tambah-pinjam-barang') }}">
                        <div class="sb-nav-link-icon "><i class="fa-solid fa-box"></i> | <i
                                class="fa-solid fa-handshake"></i></div>
                        Pinjam Barang
                    </a>
                    <a class="nav-link" href="index.html">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i> | <i
                                class="fa-solid fa-handshake"></i></div>
                        Pinjam Ruangan
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
            <h1 class="mt-4">SELAMAT DATANG MAHASISWA</h1>
            <p>Email Anda: {{ Auth::user()->email }}</p>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>

            {{-- bagian card dari halaman dashboard admin --}}
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Barang BAAK
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $item)
                                <tr>
                                    <td>{{ $item->kode_barang }}</td>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>Hahaha gak bisa edit dan hapus barang</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
@endsection

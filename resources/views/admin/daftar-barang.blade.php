@extends('admin.layoutAdmin.template')

@section('title')
    <title>P BAAK | Daftar Barang</title>
@endsection

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
                    <a class="nav-link " href="{{ url('admin') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Daftar Barang Ruangan</div>
                    <a class="nav-link active bg-primary" href="#">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i></div>
                        Daftar Barang
                    </a>
                    <a class="nav-link" href="{{ url('admin/daftar-ruangan') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                        Daftar Ruangan
                    </a>
                    {{-- <div class="sb-sidenav-menu-heading">Daftar Peminjaman</div>
                    <a class="nav-link" href="index.html">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i> | <i
                                class="fa-solid fa-handshake"></i></div>
                        Pinjam Barang
                    </a>
                    <a class="nav-link" href="index.html">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i> | <i
                                class="fa-solid fa-handshake"></i></div>
                        Pinjam Ruangan
                    </a> --}}
                    <div class="sb-sidenav-menu-heading">Laporan</div>
                    <a class="nav-link" href="{{ url('admin/laporan') }}">
                        <div class="sb-nav-link-icon"><i class="fa-regular fa-clipboard"></i></div>
                        Laporan Peminjaman
                    </a>
                    <div class="sb-sidenav-menu-heading">Akun</div>
                    <a class="nav-link" href="{{ url('admin/akun') }}">
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
            <h1 class="mt-4">Halaman Daftar Barang BAAK</h1>



            {{-- pesan berhasil menambah data barang --}}
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            {{-- pesan error saat menambahkan data barang --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('daftar-barang') }}" method="POST">
                @csrf
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <div class="mb-3 row">
                        <label for="kode_barang" class="col-sm-2 col-form-label">Kode Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ Session::get('kode_barang') }}"
                                name="kode_barang" id="kode_barang">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ Session::get('nama_barang') }}"
                                name="nama_barang" id="nama_barang">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_barang" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="submit">Simpan Barang</button>
                        </div>
                    </div>
                </div>
            </form>
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
                                    <td>
                                        <a
                                            href="{{ url('daftar-barang/' . $item->kode_barang . '/edit') }}"class="btn btn-primary">EDIT</a>
                                        {{-- tombol delete barang --}}
                                        <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data tersebut')"
                                            class="d-inline" action="{{ url('barang/' . $item->kode_barang) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" name="submit" class="btn btn-danger">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
@endsection

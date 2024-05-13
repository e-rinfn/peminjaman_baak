@extends('admin.layoutAdmin.template')

@section('title')
    <title>P BAAK | Daftar Ruangan</title>
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
                    <a class="nav-link" href={{ url('daftar-barang') }}>
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i></div>
                        Daftar Barang
                    </a>
                    <a class="nav-link active bg-primary" href="#">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-house"> </i></div>
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
                    <a class="nav-link" href="{{ url('laporan') }}">
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
            <h1 class="mt-4">HALAMAN DAFTAR RUANGAN</h1>
            <hr>

            {{-- pesan berhasil menambah data ruangan --}}
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            {{-- pesan error saat menambahkan data ruangan --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="d-flex mb-5">
                {{-- bagian card dari halaman dashboard admin --}}
                <div class="container">
                    <div class="card-header">
                        <h3 align=center>Data Ruangan</h3>
                        <hr>
                    </div>
                    <div class="continer">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Kode Ruangan</th>
                                    <th>Nama Ruangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ruangan as $item)
                                    <tr>
                                        <td>{{ $item->kode_ruangan }}</td>
                                        <td>{{ $item->nama_ruangan }}</td>

                                        <td>
                                            <a
                                                href="{{ url('daftar-ruangan/' . $item->kode_ruangan . '/edit') }}"class="btn btn-primary">EDIT</a>
                                            {{-- tombol delete ruangan --}}
                                            <form
                                                onsubmit="return confirm('Apakah anda yakin ingin menghapus data tersebut')"
                                                class="d-inline" action="{{ url('daftar-ruangan/' . $item->kode_ruangan) }}"
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
                <form action="{{ url('daftar-ruangan') }}" method="POST">
                    @csrf
                    <div class="p-3 bg-body rounded shadow-sm">
                        <h3 align=center>Tambah Data Ruangan</h3>
                        <hr>
                        <div class="mb-3 row">
                            <label for="kode_ruangan" class="col-form-label">Kode Ruangan</label>
                            <div>
                                <input type="text" class="form-control" value="{{ Session::get('kode_ruangan') }}"
                                    name="kode_ruangan" id="kode_ruangan">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_ruangan" class="col-form-label">Nama Ruangan</label>
                            <div>
                                <input type="text" class="form-control" value="{{ Session::get('nama_ruangan') }}"
                                    name="nama_ruangan" id="nama_ruangan">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_ruangan" class="col-form-label"></label>
                            <div>
                                <button type="submit" class="btn btn-primary" name="submit">Simpan Ruangan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection

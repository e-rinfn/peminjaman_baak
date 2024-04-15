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


{{-- sidebar admin --}}
@section('sidebar')
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Halaman Utama</div>
                    <a class="nav-link" href="index.html">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Daftar Barang Ruangan</div>
                    <a class="nav-link" href="index.html">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i></div>
                        Daftar Barang
                    </a>
                    <a class="nav-link" href="index.html">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                        Daftar Ruangan
                    </a>
                    <div class="sb-sidenav-menu-heading">Daftar Peminjaman</div>
                    <a class="nav-link" href="index.html">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i> | <i
                                class="fa-solid fa-handshake"></i></div>
                        Pinjam Barang
                    </a>
                    <a class="nav-link" href="index.html">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i> | <i
                                class="fa-solid fa-handshake"></i></div>
                        Pinjam Ruangan
                    </a>
                    <div class="sb-sidenav-menu-heading">Riwayat</div>
                    <a class="nav-link" href="index.html">
                        <div class="sb-nav-link-icon"><i class="fa-regular fa-clipboard"></i></div>
                        Riwayat Peminjaman
                    </a>
                    <div class="sb-sidenav-menu-heading">Akun</div>
                    <a class="nav-link" href="index.html">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                        Kelola Akun
                    </a>
                </div>

            </div>
            <div class="d-flex justify-content-center mb-5">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-block btn-danger">KELUAR</button>
                </form>
            </div>
        </nav>
    </div>
@endsection


{{-- konten admin --}}
@section('konten')
    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Selamat Datang Admin</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-black mb-4">
                        <div class="card-body d-flex">
                            <div class="col d-flex align-items-center"><b>TOTAL AKUN</b></div>
                            <div class="col d-flex justify-content-center bg-light">
                                <h3>12</h3>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Lihat Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-black mb-4">
                        <div class="card-body d-flex">
                            <div class="col d-flex align-items-center"><b>PINJAM BARANG</b></div>
                            <div class="col d-flex justify-content-center bg-light">
                                <h3>23</h3>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Lihat Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-black mb-4">
                        <div class="card-body d-flex">
                            <div class="col d-flex align-items-center"><b>PINJAM RUANGAN</b></div>
                            <div class="col d-flex justify-content-center bg-light">
                                <h3>12</h3>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Lihat Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-black mb-4">
                        <div class="card-body d-flex">
                            <div class="col d-flex align-items-center"><b>RIWAYAT PINJAM</b></div>
                            <div class="col d-flex justify-content-center bg-light">
                                <h3>10</h3>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Lihat Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- tombol untuk tambah data barang --}}
            <div class="pb-3">
                <a href="{{ url('admin/create') }}" class="btn btn-primary">Tambah Banyak Barang</a>
            </div>

            {{-- berhasil menambah data barang --}}
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

            <form action="{{ url('barang') }}" method="POST">
                @csrf
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <div class="mb-3 row">
                        <label for="kode" class="col-sm-2 col-form-label">Kode Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ Session::get('kode') }}" name="kode"
                                id="kode">
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
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>
                                        <a
                                            href="{{ url('barang/' . $item->kode . '/edit') }}"class="btn btn-primary">Edit</a>
                                        {{-- tombol delete barang --}}
                                        <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data tersebut')"
                                            class="d-inline" action="{{ url('barang/' . $item->kode) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" name="submit" class="btn btn-danger">Delete</button>
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
    {{-- main admin end --}}
    </div>
@endsection

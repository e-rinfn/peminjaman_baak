@extends('admin.layoutAdmin.template')

@section('title')
    <title>P BAAK | Dashboard</title>
@endsection

{{-- sidebar --}}
@section('sidenav')
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading  ">Halaman Utama</div>
                    <a class="nav-link active bg-primary" href="{{ url('/admin') }}">
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
            <h1 class="mt-4">Selamat Datang Admin : {{ Auth::user()->name }}</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <hr>
            {{-- pesan berhasil menambah data barang --}}
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-black mb-4">
                        <div class="card-body d-flex">
                            <div class="col d-flex align-items-center"><b>Status Pending <br> (Barang)</b></div>
                            <div class="col d-flex align-items-center justify-content-center bg-light">
                                {{-- <h3>{{ \App\Models\User::where('role_id', 3)->count() }}</h3> --}}
                                <h3>{{ \App\Models\PinjamBarang::where('status', 'Pending')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-black mb-4">
                        <div class="card-body d-flex">
                            <div class="col d-flex align-items-center"><b>Status Dipinjam <br> (Barang)</b></div>
                            <div class="col d-flex align-items-center justify-content-center bg-light">
                                <h3>{{ \App\Models\PinjamBarang::where('status', 'Dipinjam')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-black mb-4">
                        <div class="card-body d-flex">
                            <div class="col d-flex align-items-center"><b>Status Pending <br>(Ruangan)</b></div>
                            <div class="col d-flex align-items-center justify-content-center bg-light">
                                <h3>{{ \App\Models\PinjamRuangan::where('status', 'Pending')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-black mb-4">
                        <div class="card-body d-flex">
                            <div class="col d-flex align-items-center"><b>Status Dipinjam <br>(Ruangan)</b></div>
                            <div class="col d-flex align-items-center justify-content-center bg-light">
                                <h3>{{ \App\Models\PinjamRuangan::where('status', 'Dipinjam')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-center">
                    <div class="mb-3 p-3">
                        <a href="pinjam-barang"><button type="submit" class="btn btn-block btn-primary">Pinjam
                                Barang</button></a>
                    </div>
                    <div class="mb-3 p-3">
                        <a href="pinjam-ruangan"><button type="submit" class="btn btn-block btn-primary">Pinjam
                                Ruangan</button></a>
                    </div>
                </div>
            </div>
        </div>

    </main>
    {{-- main admin end --}}
    </div>
@endsection

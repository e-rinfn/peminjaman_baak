@extends('mahasiswa.layoutMahasiswa.template')

@section('title')
    <title>P BAAK | Lihat Peminjaman Ruangan</title>
@endsection

{{-- sidebar --}}
@section('sidenav')
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading  ">Halaman Utama</div>
                    <a class="nav-link " href="{{ url('mahasiswa') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                        Beranda Pengguna
                    </a>
                    <div class="sb-sidenav-menu-heading">Daftar Barang Ruangan</div>
                    <a class="nav-link" href="{{ url('daftar-barang-mahasiswa') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i></div>
                        Daftar Barang
                    </a>
                    <a class="nav-link" href="{{ url('daftar-ruangan-mahasiswa') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                        Daftar Ruangan
                    </a>
                    <div class="sb-sidenav-menu-heading">Daftar Peminjaman</div>
                    <a class="nav-link" href="{{ url('daftar-pinjam-barang-mahasiswa') }}">
                        <div class="sb-nav-link-icon "><i class="fa-solid fa-box"></i> | <i
                                class="fa-solid fa-handshake"></i></div>
                        Pinjam Barang
                    </a>
                    <a class="nav-link   active bg-primary" href="{{ url('daftar-pinjam-ruangan-mahasiswa') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i> | <i
                                class="fa-solid fa-handshake"></i></div>
                        Pinjam Ruangan
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

@section('konten')
    <div class="container-fluid px-4">

        <h1 class="mt-4">INFORMASI PEMINJAMAN RUANGAN</h1>
        <hr>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-3 ">
            <label for="nama_ruangan" class="col-sm-2 col-form-label"></label>
            <div>
                <button onclick="history.back()" class="btn btn-warning">Kembali</button>
            </div>
        </div>
        <form action="{{ url('tambah-pinjam-barang') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h3 align=center>STATUS PEMINJMAN</h3>
                <hr>
                <div class="mb-3 row">
                    <label for="surat_peminjaman" class="col-sm-2 col-form-label">Surat Peminjaman</label>
                    <div class="col-sm-10">
                        @if ($pinjamRuangan->surat_peminjaman)
                            <a class="btn btn-primary" href="{{ asset('storage/' . $pinjamRuangan->surat_peminjaman) }}"
                                target="_blank">Lihat
                                Surat
                                Peminjaman</a>
                        @else
                            <p>Surat belum ada</p>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <div class="border form-control">
                            {{ $pinjamRuangan->status }}
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="pesan_admin" class="col-sm-2 col-form-label">Pesan Admin</label>
                    <div class="col-sm-10">
                        <div class="border form-control">
                            {{ $pinjamRuangan->pesan_admin }}
                        </div>
                    </div>
                </div>

            </div>

            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h3 align=center>IDENTITAS PEMINJAMAN</h3>
                <hr>
                <div class="mb-3 row">
                    <label for="organisasi" class="col-sm-2 col-form-label">Organisasi</label>
                    <div class="col-sm-10">
                        <div class="border form-control">
                            {{ $pinjamRuangan->organisasi }}
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <div class="border form-control">
                            {{ $pinjamRuangan->nim }}
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <div class="border form-control">
                            {{ $pinjamRuangan->nama }}
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <div class="border form-control">
                            {{ $pinjamRuangan->email }}
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
                    <div class="col-sm-10">
                        <div class="border form-control">
                            {{ $pinjamRuangan->no_hp }}
                        </div>
                    </div>
                </div>

            </div>

            <h3 align=center>IDENTITAS RUANGAN</h3>
            <hr>
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-3 row">
                    <label for="nama_ruangan" class="col-form-label">Nama Ruangan</label>
                    <div class="col-sm-12">
                        <ul class="border p-2 list-unstyled">
                            @php
                                $namaRuangan = json_decode($pinjamRuangan->nama_ruangan);
                                sort($namaRuangan);
                            @endphp
                            @foreach ($namaRuangan as $value)
                                <li>{{ $value }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tgl_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                    <div class="col-sm-10">
                        <div class="border form-control">
                            {{ \Carbon\Carbon::parse($pinjamRuangan->tgl_pinjam)->format('d F Y') }}
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tgl_kembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                    <div class="col-sm-10">
                        <div class="border form-control">
                            {{ \Carbon\Carbon::parse($pinjamRuangan->tgl_kembali)->format('d F Y') }}
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="alasan" class="col-sm-2 col-form-label">Alasan</label>
                    <div class="col-sm-10">
                        <div class="border form-control">
                            {{ $pinjamRuangan->alasan }}
                        </div>
                    </div>
                </div>
            </div>

    </div>
    </form>
@endsection

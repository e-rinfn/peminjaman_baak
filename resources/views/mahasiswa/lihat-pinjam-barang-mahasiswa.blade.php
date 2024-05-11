@extends('mahasiswa.layoutMahasiswa.template')

@section('topNav')
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-success">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">PINJAM BAAK</a>
        <!-- Sidebar Toggle-->
    </nav>
@endsection


@section('konten')
    <div class="container-fluid px-4">

        <h1 class="mt-4">INFORMASI PEMINJAMAN BARANG</h1>
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
            <label for="nama_barang" class="col-sm-2 col-form-label"></label>
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
                        @if ($pinjamBarang->surat_peminjaman)
                            <a class="btn btn-primary" href="{{ asset('storage/' . $pinjamBarang->surat_peminjaman) }}"
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
                            {{ $pinjamBarang->status }}
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="pesan_admin" class="col-sm-2 col-form-label">Pesan Admin</label>
                    <div class="col-sm-10">
                        <div class="border form-control">
                            {{ $pinjamBarang->pesan_admin }}
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
                            {{ $pinjamBarang->organisasi }}
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <div class="border form-control">
                            {{ $pinjamBarang->nim }}
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <div class="border form-control">
                            {{ $pinjamBarang->nama }}
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <div class="border form-control">
                            {{ $pinjamBarang->email }}
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
                    <div class="col-sm-10">
                        <div class="border form-control">
                            {{ $pinjamBarang->no_hp }}
                        </div>
                    </div>
                </div>

            </div>

            <h3 align=center>IDENTITAS BARANG</h3>
            <hr>
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-3 row">
                    <label for="nama_barang" class="col-form-label">Nama Barang</label>
                    <div class="col-sm-12">
                        <ul class="border p-2 list-unstyled">
                            @php
                                $namaBarang = json_decode($pinjamBarang->nama_barang);
                                sort($namaBarang);
                            @endphp
                            @foreach ($namaBarang as $value)
                                <li>{{ $value }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tgl_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                    <div class="col-sm-10">
                        <div class="border form-control">
                            {{ \Carbon\Carbon::parse($pinjamBarang->tgl_pinjam)->format('d F Y') }}
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tgl_kembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                    <div class="col-sm-10">
                        <div class="border form-control">
                            {{ \Carbon\Carbon::parse($pinjamBarang->tgl_kembali)->format('d F Y') }}
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="alasan" class="col-sm-2 col-form-label">Alasan</label>
                    <div class="col-sm-10">
                        <div class="border form-control">
                            {{ $pinjamBarang->alasan }}
                        </div>
                    </div>
                </div>
            </div>

    </div>
    </form>
@endsection

@extends('admin.layoutAdmin.template')


@section('title')
    <title>P BAAK | Pinjam Ruangan</title>
@endsection

{{-- Sidebar --}}
@section('sidenav')
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading  ">Halaman Utama</div>
                    <a class="nav-link  active bg-primary" href="#">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Daftar Barang Ruangan</div>
                    <a class="nav-link" href="{{ url('/daftar-barang') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i></div>
                        Daftar Barang
                    </a>
                    <a class="nav-link " href="{{ url('daftar-ruangan') }}">
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

        {{-- Form Ubah Data --}}
        <form action="{{ url('lihat-pinjam-ruangan-admin/' . $pinjamRuangan->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="d-flex justify-content-around">
                <div class="p-5 bg-body rounded shadow-sm">
                    <h3 align=center>IDENTITAS PEMINJAM</h3>
                    <hr>
                    <div class="mb-3 row">
                        <label for="organisasi" class="col-form-label">Organisasi</label>
                        <div>
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
                        <label for="no_hp" class="col-sm-3 col-form-label">No HP</label>
                        <div class="col-sm-9">
                            <div class="border form-control">
                                {{ $pinjamRuangan->no_hp }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-5 bg-body rounded shadow-sm">
                    <h3 align=center>IDENTITAS RUANGAN</h3>
                    <hr>
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
                        <label for="tgl_pinjam" class="col-sm-5 col-form-label">Tgl Pinjam</label>
                        <div class="col-sm-7">
                            <div class="border form-control">
                                {{ \Carbon\Carbon::parse($pinjamRuangan->tgl_pinjam)->format('d F Y') }}
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tgl_kembali" class="col-sm-5 col-form-label">Tgl Kembali</label>
                        <div class="col-sm-7">
                            <div class="border form-control">
                                {{ \Carbon\Carbon::parse($pinjamRuangan->tgl_kembali)->format('d F Y') }}
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alasan" class=" col-form-label">Alasan</label>
                        <div class="border form-control">
                            {{ $pinjamRuangan->alasan }}
                        </div>
                    </div>
                    <div class="mb-3 row" hidden>
                        <label for="surat_peminjaman" class="col-sm-2 col-form-label">Surat Peminjaman</label>
                        <div class="col-sm-10">
                            {{ $pinjamRuangan->surat_peminjaman }}
                        </div>
                    </div>
                </div>
                <div class="p-5 bg-body rounded shadow-sm">
                    <h3 align=center>STATUS PEMINJMAN</h3>
                    <hr>
                    <div class="mb-3 row">
                        <label for="surat_peminjaman" class=" col-form-label">Surat Peminjaman</label>
                        <div>
                            @if ($pinjamRuangan->surat_peminjaman)
                                <a class="btn btn-warning"
                                    href="{{ asset('storage/' . $pinjamRuangan->surat_peminjaman) }}" target="_blank">Lihat
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
                            <select class="form-control" name="status" id="status">
                                <option value="Pending" {{ $pinjamRuangan->status == 'Pending' ? 'selected' : '' }}>
                                    Pending
                                </option>
                                <option value="Dipinjam" {{ $pinjamRuangan->status == 'Dipinjam' ? 'selected' : '' }}>
                                    Dipinjam
                                </option>
                                <option value="Dikembalikan"
                                    {{ $pinjamRuangan->status == 'Dikembalikan' ? 'selected' : '' }}>
                                    Dikembalikan</option>
                                <option value="Ditolak" {{ $pinjamRuangan->status == 'Ditolak' ? 'selected' : '' }}>
                                    Ditolak
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pesan_admin" class="col-form-label">Pesan Admin</label>
                        <div>
                            <input type="text" class="form-control" value="{{ $pinjamRuangan->pesan_admin }}"
                                name="pesan_admin" id="pesan_admin" autofocus>
                        </div>
                    </div>
                    <div class="mb-3 mt-2 ">
                        <label for="nama_ruangan" class="col-sm-2 col-form-label"></label>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </div>
    </form>
@endsection

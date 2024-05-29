@extends('mahasiswa.layoutMahasiswa.template')

<!-- Pastikan jQuery telah dimuat sebelum plugin Select2 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

@section('title')
    <title>P BAAK | Tambah Pinjam Ruangan</title>
@endsection

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
                    <a class="nav-link" href="{{ url('/daftar-barang-mahasiswa') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i></div>
                        Daftar Barang
                    </a>
                    <a class="nav-link" href="{{ url('/daftar-ruangan-mahasiswa') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                        Daftar Ruangan
                    </a>
                    <div class="sb-sidenav-menu-heading">Daftar Peminjaman</div>
                    <a class="nav-link " href="{{ url('/daftar-pinjam-barang-mahasiswa') }}">
                        <div class="sb-nav-link-icon "><i class="fa-solid fa-box"></i> | <i
                                class="fa-solid fa-handshake"></i></div>
                        Pinjam Barang
                    </a>
                    <a class="nav-link  active bg-primary" href="index.html">
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

        <h1 class="mt-4">FORM PINJAM RUANGAN</h1>
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
        <form action="{{ url('tambah-pinjam-ruangan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="my-3 p-3 bg-body rounded shadow-sm">

                <h3 align=center>IDENTITAS PEMINJAM</h3>
                <hr>
                <div class="mb-3 row">
                    <label for="organisasi" class="col-sm-2 col-form-label">Organisasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ Auth::user()->organisasi }}" name="organisasi"
                            id="organisasi" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ Auth::user()->email }}" name="email"
                            id="email" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" value="{{ old('nim') }}" name="nim"
                            id="nim">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ old('nama') }}" name="nama"
                            id="nama">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ old('no_hp') }}" name="no_hp"
                            id="no_hp">
                    </div>
                </div>

            </div>

            <div class="my-3 p-3 bg-body rounded shadow-sm">

                <h3 align=center>IDENTITAS RUANGAN</h3>
                <hr>
                <div class="mb-3 row">
                    <label for="nama_ruangan" class="col-sm-2 col-form-label">Pilih Ruangan</label>
                    <div class="col-sm-10">
                        <select class="form-control select2-multi" name="nama_ruangan[]" id="nama_ruangan"
                            multiple="multiple">
                            @foreach ($ruangan as $item)
                                <option value="{{ $item->nama_ruangan }}">{{ $item->nama_ruangan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="tgl_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" value="{{ old('tgl_pinjam') }}" name="tgl_pinjam"
                            id="tgl_pinjam">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tgl_kembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" value="{{ old('tgl_kembali') }}" name="tgl_kembali"
                            id="tgl_kembali">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="alasan" class="col-sm-2 col-form-label">Alasan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ old('alasan') }}" name="alasan"
                            id="alasan">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="surat_peminjaman" class="col-sm-2 col-form-label">Surat Peminjaman</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control @error('surat_peminjaman') is-invalid @enderror"
                            value="{{ Session::get('surat_peminjaman') }}" name="surat_peminjaman"
                            id="surat_peminjaman">
                        @error('surat_peminjaman')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="my-3 p-3 bg-body rounded shadow-sm" hidden>

                <h3 align=center>STATUS PEMINJAMAN</h3>

                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"value="Pending" name="status" id="status"
                            readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="pesan_admin" class="col-sm-2 col-form-label">Pesan Admin</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="Diisi oleh admin" name="pesan_admin"
                            id="pesan_admin" readonly>
                    </div>
                </div>

            </div>
            <div class="mb-5 ">
                <label for="nama_ruangan" class="col-sm-2 col-form-label"></label>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" name="submit">Ajukan Peminjaman</button>
                </div>
            </div>
    </div>
    </div>
    </form>

    <script>
        $(document).ready(function() {
            $('.select2-multi').select2();
        });
    </script>
@endsection

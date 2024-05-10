@extends('mahasiswa.layoutMahasiswa.template')

@section('konten')
    <div class="container-fluid px-4">

        <h1 class="mt-4">LIHAT PINJAM BARANG</h1>
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
                        <input type="text" class="form-control" value="{{ $pinjamBarang->status }}" name="status"
                            id="status" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="pesan_admin" class="col-sm-2 col-form-label">Pesan Admin</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $pinjamBarang->pesan_admin }}"
                            name="pesan_admin" id="pesan_admin" readonly>
                    </div>
                </div>

            </div>

            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h3 align=center>IDENTITAS PEMINJAMAN</h3>
                <hr>
                <div class="mb-3 row">
                    <label for="organisasi" class="col-sm-2 col-form-label">Organisasi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $pinjamBarang->organisasi }}" name="organisasi"
                            id="organisasi" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" value="{{ $pinjamBarang->nim }}" name="nim"
                            id="nim" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $pinjamBarang->nama }}" name="nama"
                            id="nama" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $pinjamBarang->email }}" name="email"
                            id="email" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $pinjamBarang->no_hp }}" name="no_hp"
                            id="no_hp" readonly>
                    </div>
                </div>

            </div>

            <h3 align=center>IDENTITAS BARANG</h3>
            <hr>
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-3 row">
                    <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $pinjamBarang->nama_barang }}"
                            name="nama_barang" id="nama_barang" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tgl_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" value="{{ $pinjamBarang->tgl_pinjam }}"
                            name="tgl_pinjam" id="tgl_pinjam" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tgl_kembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" value="{{ $pinjamBarang->tgl_kembali }}"
                            name="tgl_kembali" id="tgl_kembali" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="alasan" class="col-sm-2 col-form-label">Alasan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $pinjamBarang->alasan }}" name="alasan"
                            id="alasan" readonly>
                    </div>
                </div>
                {{-- <div class="mb-3 row">
                    <label for="surat_peminjaman" class="col-sm-2 col-form-label">Surat Peminjaman</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $pinjamBarang->surat_peminjaman }}"
                            name="surat_peminjaman" id="surat_peminjaman" readonly>
                    </div>
                </div> --}}
            </div>

    </div>
    </form>
@endsection

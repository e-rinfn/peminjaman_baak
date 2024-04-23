@extends('mahasiswa.layoutMahasiswa.template')

@section('konten')
    <div class="container-fluid px-4">

        <h1 class="mt-4">TAMBAH PINJAM BARANG</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('tambah-pinjam-barang') }}" method="POST">
            @csrf
            <div class="my-3 p-3 bg-body rounded shadow-sm">
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
                            id="nim">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $pinjamBarang->name }}" name="nama"
                            id="nama" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $pinjamBarang->email }}" name="email"
                            id="email">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $pinjamBarang->no_hp }}" name="no_hp"
                            id="no_hp">
                    </div>
                </div>

            </div>

            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-3 row">
                    <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $pinjamBarang->nama_barang }}"
                            name="nama_barang" id="nama_barang">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tgl_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" value="{{ $pinjamBarang->tgl_pinjam }}" name="tgl_pinjam"
                            id="tgl_pinjam">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tgl_kembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" value="{{ $pinjamBarang->tgl_kembali }}"
                            name="tgl_kembali" id="tgl_kembali">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="alasan" class="col-sm-2 col-form-label">Alasan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $pinjamBarang->alasan }}" name="alasan"
                            id="alasan">
                    </div>
                </div>
            </div>

            <div class="my-3 p-3 bg-body rounded shadow-sm">


                <div class="mb-3 row">
                    <label for="surat_peminjaman" class="col-sm-2 col-form-label">Surat Peminjaman</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ Session::get('surat_peminjaman') }}"
                            name="surat_peminjaman" id="surat_peminjaman">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="surat_balasan" class="col-sm-2 col-form-label">Surat Balasan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ Session::get('surat_balasan') }}"
                            name="surat_balasan" id="surat_balasan">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ Session::get('status') }}" name="status"
                            id="status">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="pesan_admin" class="col-sm-2 col-form-label">Pesan Admin</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $pinjamBarang->pesan_admin }}"
                            name="pesan_admin" id="pesan_admin">
                    </div>
                </div>

            </div>
            <div class="mb-5 ">
                <label for="nama_barang" class="col-sm-2 col-form-label"></label>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" name="submit">Simpan Barang</button>
                </div>
            </div>
    </div>
    </div>
    </form>
@endsection

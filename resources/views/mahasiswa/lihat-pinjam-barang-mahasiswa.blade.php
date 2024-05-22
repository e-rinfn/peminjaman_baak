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
            {{-- <div class="form-group">
                    <label for="gambar_kembali">Upload Bukti Barang Kembali</label>
                    <input type="file" class="form-control @error('gambar_kembali') is-invalid @enderror"
                        value="{{ Session::get('gambar_kembali') }}" name="gambar_kembali" id="gambar_kembali">
                    @error('gambar_kembali')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> --}}

            <div class="mb-3 row">
                <label for="alasan" class=" col-form-label">Bukti Barang Kembali</label>
                <a href="{{ asset('storage/' . $pinjamBarang->gambar_kembali) }}">
                    <img class="border p-2 d-flex justify-center"
                        src="{{ asset('storage/' . $pinjamBarang->gambar_kembali) }}" width="400">
                </a>
            </div>
            <hr>
            <form action="{{ url('lihat-pinjam-barang-mahasiswa/' . $pinjamBarang->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')

                @csrf
                <div class="mb-3 row">
                    <label for="gambar_kembali" class="col-sm-2 col-form-label">Upload Gambar Bukti Barang Kembali <br>
                        (upload hanya bisa 1 gambar)</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control @error('gambar_kembali') is-invalid @enderror"
                            id="gambar_kembali" name="gambar_kembali">
                        <hr>
                        <div class="image-preview">
                            <img class="border" src="{{ url('storage/images/tidak-ada.png') }}" alt="Default Image"
                                id="gambar-preview" style="max-width: 100%; height: auto;">
                        </div>
                        <small class="form-text text-muted">Kosongkan jika tidak ada gambar baru.</small>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const gambarPreview = document.getElementById('gambar-preview');
                        const gambarInput = document.getElementById('gambar_kembali');
                        const imagePreview = document.querySelector('.image-preview');

                        gambarInput.addEventListener('change', function() {
                            const file = this.files[0];
                            const acceptedFileTypes = ['image/jpeg', 'image/png', 'image/gif'];

                            if (file) {
                                if (acceptedFileTypes.includes(file.type)) {
                                    const reader = new FileReader();

                                    reader.onload = function(event) {
                                        gambarPreview.src = event.target.result;
                                        imagePreview.style.display = 'block';
                                    }

                                    reader.readAsDataURL(file);
                                } else {
                                    alert('Invalid file type. Please select an image file (JPEG, PNG, or GIF).');
                                    gambarInput.value = '';
                                    imagePreview.style.display = 'none';
                                }
                            } else {
                                imagePreview.style.display = 'none';
                            }
                        });

                        // Add an event listener to prevent form submission without selecting an image
                        const form = document.querySelector('form');
                        form.addEventListener('submit', function(event) {
                            if (!gambarInput.value) {
                                alert('Please select an image or leave it blank if there is no new image.');
                                event.preventDefault();
                            }
                        });
                    });
                </script>
                <div class="mb-3 row">
                    <label for="nama_barang" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="submit">Simpan Barang</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

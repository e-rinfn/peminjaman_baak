@extends('mahasiswa.layoutMahasiswa.template')

@section('title')
    <title>P BAAK | Beranda</title>
@endsection

{{-- sidebar --}}
@section('sidenav')
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading  ">Halaman Utama</div>
                    <a class="nav-link active bg-primary" href="#">
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
                    <a class="nav-link" href="{{ url('/daftar-pinjam-barang-mahasiswa') }}">
                        <div class="sb-nav-link-icon "><i class="fa-solid fa-box"></i> | <i
                                class="fa-solid fa-handshake"></i></div>
                        Pinjam Barang
                    </a>
                    <a class="nav-link" href="{{ url('/daftar-pinjam-ruangan-mahasiswa') }}">
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



{{-- konten admin --}}
@section('konten')
    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Selamat Datang : <br> <i> {{ Auth::user()->name }}</i></h1>
            <p>Email Anda: {{ Auth::user()->email }}</p>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Beranda Pengguna</li>
            </ol>
            <hr>

            <h2>Prosedur</h2>
            <hr>
            <div class="card-body">
                <p>Prosedur Pengajuan Permohonan Penggunaan Fasilitas</p>
                <ol>
                    <li> Panitia mengajukan surat permohonan penggunaan fasilitas berupa ruang,
                        peralatan, atau fasilitas lainnya kepada Wakil Rektor Bidang Kemahasiswaan dengan diketahui oleh
                        Kabag
                        Kemahasiswaan.</li>
                    <li>Wakil Rektor Bidang Kemahasiswaan memutuskan fasilitas kampus yang
                        dapat digunakan setelah mendengarkan kebutuhan penggunaan fasilitas
                        dari panitia dan berkoordinasi dengan bagian Urusan Dalam BAUM.</li>
                    <li>Wakil Rektor Bidang Kemahasiswaan mendisposisikan surat permohonan
                        panita untuk ditindak-lanjuti oleh Bagian Urusan Dalam BAUM.</li>
                    <li>Panitia berkoordinasi dengan Bagian Urusan Dalam BAUM dan Kabag
                        Kemahasiswaan mengenai pelaksanaan penggunaan fasilitas.</li>
                    <li>Panitia merapikan dan mengembalikan fasilitas yang telah digunakan kepada
                        Bagian Urusan Dalam BAUM sesuai dengan peminjaman fasilitas dan tidak
                        merusaknya.</li>
                </ol>

                <div class="card-body">
                    <p>Prosedur Pengajuan Surat Permohonan dan Proposal Penyelenggaraan
                        Kegiatan</p>
                    <ol>
                        <li>Panitia mengajukan surat penyelenggaraan kegiatan kepada Wakil
                            Rektor Bidang Kemahasiswaan yang ditandatangani oleh Ketua Panitia
                            setelah diperiksa dan disetujui oleh Ketua HMJ/UKM/BEM/Kepala
                            Jurusan/Kepala Bagian Kemahasiswaan (untuk selanjutnya disingkat Kabag
                            Kemahasiswaan). Contoh surat lihat lampiran.</li>
                        <li>Surat permohonan dan proposal penyelenggaraan kegiatan harus diajukan
                            paling lambat 7 hari kerja sebelum pelaksanaan kegiatan. Surat permohonan
                            yang diajukan kurang dari 7 hari kerja tidak akan diproses.</li>
                        <li>Dalam surat permohonan penyelenggaraan kegiatan harus
                            mencantumkan nama kegiatan, biaya yang dibutuhkan dan waktu
                            penyelenggaraan kegiatan.</li>
                        <li>Wakil Rektor Bidang Kemahasiswaan menyetujui/tidak menyetujui
                            penyeleng-araan kegiatansetelah mengadakan dialog dengan panitia
                            kegiatan.</li>
                        <li>Panitia melaksanakan kegiatan, atau membatalkan kegiatan jika tidak
                            mendapat persetujuan dari Pimpinan Universitas Perjuangan. Informasi
                            persetujuan/ pembatalan penyelenggaraan kegiatan disampaikan kepada
                            panitia pada 3 hari kerja setelah pengajuan surat permohonan dan proposal
                            kegiatan.</li>
                    </ol>
                </div>
            </div>
        </div>
    </main>
    {{-- main admin end --}}
    </div>
@endsection

@extends('admin.layoutAdmin.template')

@section('title')
    <title>P BAAK | Edit Akun</title>
@endsection


{{-- sidebar --}}
@section('sidenav')
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading  ">Halaman Utama</div>
                    <a class="nav-link " href="{{ url('admin') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Daftar Barang Ruangan</div>
                    <a class="nav-link" href="{{ url('daftar-barang') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i></div>
                        Daftar Barang
                    </a>
                    <a class="nav-link" href="{{ url('daftar-ruangan') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-house"> </i></div>
                        Daftar Ruangan
                    </a>
                    <div class="sb-sidenav-menu-heading">Laporan</div>
                    <a class="nav-link" href="{{ url('laporan') }}">
                        <div class="sb-nav-link-icon"><i class="fa-regular fa-clipboard"></i></div>
                        Laporan Peminjaman
                    </a>
                    <div class="sb-sidenav-menu-heading">Akun</div>
                    <a class="nav-link active bg-primary" href="{{ url('akun') }}">
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
            <h1 class="mt-4">EDIT DATA PENGGUNA </h1>
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

            {{-- Barang Edit --}}
            <form action="{{ url('edit-akun/' . $user->id) }}" method="POST">
                @method('PUT')

                @csrf
                <a href="{{ url('/akun') }}" class="btn btn-warning">Kembali</a>
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $user->name }}" name="name"
                                id="name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $user->email }}" name="email"
                                id="email">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="organisasi" class="col-sm-2 col-form-label">Organisasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $user->organisasi }}" name="organisasi"
                                id="organisasi">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label" for="role_id">Role:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="role_id" name="role_id">
                                <option value="1" {{ $user->role_id == 1 ? 'selected' : '' }}>Admin</option>
                                <option value="2" {{ $user->role_id == 2 ? 'selected' : '' }}>Pimpinan</option>
                                <option value="3" {{ $user->role_id == 3 ? 'selected' : '' }}>Mahasiswa</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <p>CATATAN : Kosongkan password jika tidak melakukan perubahan.</p>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label" for="password">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label" for="password_confirmation">Konfirmasi Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label" for="nama_barang" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="submit">Simpan Barang</button>
                        </div>
                    </div>
                </div>
            </form>




        </div>
    </main>
@endsection





@section('konten')
@endsection

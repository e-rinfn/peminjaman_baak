@extends('admin.layoutAdmin.template')

@section('title')
    <title>P BAAK | Daftar Pengguna</title>
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
                    <a class="nav-link " href="{{ url('daftar-barang') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i></div>
                        Daftar Barang
                    </a>
                    <a class="nav-link" href="{{ url('daftar-ruangan') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-house"> </i></div>
                        Daftar Ruangan
                    </a>
                    {{-- <div class="sb-sidenav-menu-heading">Daftar Peminjaman</div>
                    <a class="nav-link" href="index.html">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i> | <i
                                class="fa-solid fa-handshake"></i></div>
                        Pinjam Barang
                    </a>
                    <a class="nav-link" href="index.html">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i> | <i
                                class="fa-solid fa-handshake"></i></div>
                        Pinjam Ruangan
                    </a> --}}
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
            <h1 class="mt-4">HALAMAN DAFTAR PENGGUNA</h1>
            <hr>

            {{-- pesan berhasil menambah data barang --}}
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            {{-- pesan error saat menambahkan data barang --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="d-flex mb-5">
                {{-- bagian card dari halaman dashboard admin --}}
                <div class="container">
                    <div class="card-header">
                        <h3 align=center>Data Pengguna</h3>
                        <hr>
                    </div>
                    <div class="continer">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Organisasi</th>
                                    <th>Nama</th>
                                    <th>Role ID</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($nama as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->organisasi }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->role_id }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <a href="{{ url('edit-akun/' . $item->id) }}" class="btn btn-primary">EDIT</a>
                                            {{-- tombol delete barang --}}
                                            <form
                                                onsubmit="return confirm('Apakah anda yakin ingin menghapus data tersebut')"
                                                class="d-inline" action="{{ url('akun/' . $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" name="submit" class="btn btn-danger">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <form action="{{ url('akun/') }}" method="POST">
                    @csrf
                    <div class="p-3 bg-body rounded shadow-sm">
                        <h3 align=center>Tambah Data Pengguna</h3>
                        <hr>
                        <div class="mb-2 row">
                            <label for="name" class="col-form-label">Nama Pengguna</label>
                            <div>
                                <input type="text" class="form-control" value="{{ Session::get('name') }}"
                                    name="name" id="name">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="email" class="col-form-label">Email</label>
                            <div>
                                <input type="text" class="form-control" value="{{ Session::get('email') }}"
                                    name="email" id="email">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="organisasi" class="col-form-label">Organisasi</label>
                            <div>
                                <input type="text" class="form-control" value="{{ Session::get('organisasi') }}"
                                    name="organisasi" id="organisasi">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="role_id" class="col-form-label">Role ID</label>
                            <div>
                                <input type="text" class="form-control" value="{{ Session::get('role_id') }}"
                                    name="role_id" id="role_id">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="password" class="col-form-label">Password</label>
                            <div>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="password_confirmation" class="col-form-label">Konfirmasi Password</label>
                            <div>
                                <input type="password" class="form-control"
                                    value="{{ Session::get('password_confirmation') }}" name="password_confirmation"
                                    id="password_confirmation">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="nama_barang" class="col-form-label"></label>
                            <div>
                                <button type="submit" class="btn btn-primary" name="submit">Simpan Pengguna</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </main>
@endsection

@extends('admin.layoutAdmin.template')

@section('konten')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('daftar-barang/' . $barang->kode_barang) }}" method="POST">
        @method('PUT')

        @csrf
        <a href="{{ url('/daftar-barang') }}" class="btn btn-primary">Kembali</a>
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="kode" class="col-sm-2 col-form-label">Kode Barang</label>
                <div class="col-sm-10">
                    {{ $barang->kode_barang }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $barang->nama_barang }}" name="nama_barang"
                        id="nama_barang">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama_barang" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit">Simpan Barang</button>
                </div>
            </div>
        </div>
    </form>
@endsection

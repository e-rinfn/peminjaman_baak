@extends('layouts.main')

@section('contents')
    <div class="d-flex justify-content-center align-items-center vh-100">

        <div class="card card-header" style="width: 25rem;">

            <img class="p-3" src="https://unper.ac.id/wp-content/uploads/2022/12/Logo-UNPER-Abbr.png" alt="">
            <hr>
            <div class="p-3 ">
                <h3> SISTEM INFORMASI <br>
                    PEMINJAMAN BARANG <br>
                    DAN RUANGAN BAAK</h3>
            </div>
            <div class="text-center">

                <hr>
                <h4>LOGIN</h4>
                <hr>
            </div>

            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-body">
                <form method="post" action="/">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror" id="email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            id="password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

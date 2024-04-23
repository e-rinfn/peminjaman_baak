<?php

namespace App\Http\Controllers;

use App\Models\PinjamBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PinjamBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { {
            Session::flash('kode', $request->kode);
            Session::flash('barang', $request->barang);
            Session::flash('organisasi', $request->organisasi);
            Session::flash('nim', $request->nim);
            Session::flash('nama', $request->nama);
            Session::flash('email', $request->email);
            Session::flash('no_hp', $request->no_hp);
            Session::flash('tgl_pinjam', $request->tgl_pinjam);
            Session::flash('tgl_kembali', $request->tgl_kembali);
            Session::flash('alasan', $request->alasan);
            Session::flash('surat_peminjaman', $request->surat_peminjaman);
            Session::flash('surat_balasan', $request->surat_balasan);
            Session::flash('status', $request->status);


            $request->validate([
                'nama_barang' => 'required',

                'nim' => 'required',
                'nama' => 'required',
                'email' => 'required',
                'no_hp' => 'required',
                'tgl_pinjam' => 'required',
                'tgl_kembali' => 'required',
                'alasan' => 'required',
                'surat_peminjaman' => '',
                'surat_balasan' => '',
                'status' => '',
            ], [
                'nama_barang.required' => 'Nama Barang Wajib Diisi',
                'nama.required' => 'Nama Wajib Diisi',
                'organisasi.required' => 'Organisasi Wajib Diisi',
            ]);
            $data = [
                'kode' => $request->kode,
                'nama_barang' => $request->nama_barang,
                'organisasi' => $request->organisasi,
                'nim' => $request->nim,
                'nama' => $request->nama,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'tgl_pinjam' => $request->tgl_pinjam,
                'tgl_kembali' => $request->tgl_kembali,
                'alasan' => $request->alasan,
                'surat_peminjaman' => $request->surat_peminjaman,
                'surat_balasan' => $request->surat_balasan,
                'status' => $request->status,
                'pesan_admin' => $request->pesan_admin,
            ];
            PinjamBarang::create($data);
            return redirect('/daftar-pinjam-barang-mahasiswa')->with('success', 'Pinjam Barang Berhasil Ditambah');
        }
    }

    public function tampilPinjamBarangMahasiswa()
    {
        $data = PinjamBarang::orderBy("id", "desc")->get();
        return view('mahasiswa.daftar-pinjam-barang-mahasiswa')->with('pinjamBarang', $data);
    }

    public function lihatPinjamBarangMahasiswa(string $id)
    {
        $data = PinjamBarang::where('id', $id)->first();
        return view('mahasiswa.lihat-pinjam-barang-mahasiswa')->with('pinjamBarang', $data);

    }
    public function tampilPinjamBarang()
    {
        $data = PinjamBarang::orderBy("id", "desc")->get();
        return view('admin.index')->with('pinjamBarang', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

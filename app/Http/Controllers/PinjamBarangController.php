<?php

namespace App\Http\Controllers;

use App\Models\PinjamBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    {
        $request->validate([
            'nama_barang' => 'required|array|min:1', // Memastikan 'nama_barang' merupakan array dengan minimal 1 item
            'nama_barang.*' => 'required', // Memastikan setiap nilai dalam 'nama_barang' tidak boleh kosong
            'nim' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'alasan' => 'required',
            'surat_peminjaman' => 'required|mimes:pdf|max:4096',
            //'surat_balasan' => '',

        ], [
            'nama_barang.required' => 'Nama Barang Wajib Diisi',
            'nama.required' => 'Nama Wajib Diisi',
            'organisasi.required' => 'Organisasi Wajib Diisi',
        ]);

        $data = [
            'organisasi' => $request->organisasi,
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'nama_barang' => json_encode($request->nama_barang), // Mengubah array menjadi string
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'alasan' => $request->alasan,
            'surat_peminjaman' => $request->file('surat_peminjaman')->store('uploads'), // Simpan file surat peminjaman
            // 'surat_balasan' => $request->file('surat_balasan')->store('uploads'), // Simpan file surat balasan
            'status' => $request->status,
            'pesan_admin' => $request->pesan_admin,
        ];

        PinjamBarang::create($data);
        return redirect('/daftar-pinjam-barang-mahasiswa')->with('success', 'Pinjam Barang Berhasil Ditambah');
    }


    public function tampilPinjamBarangMahasiswa()
    {
        $pinjamBarang = PinjamBarang::where('email', Auth::user()->email)->get();
        return view('mahasiswa.daftar-pinjam-barang-mahasiswa', ['pinjamBarang' => $pinjamBarang]);
    }

    public function lihatPinjamBarangMahasiswa(string $id)
    {
        $data = PinjamBarang::where('id', $id)->first();
        return view('mahasiswa.lihat-pinjam-barang-mahasiswa')->with('pinjamBarang', $data);

    }

    public function lihatPinjamBarangAdmin(string $id)
    {
        $data = PinjamBarang::where('id', $id)->first();
        return view('admin.lihat-pinjam-barang-admin')->with('pinjamBarang', $data);

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
        $request->validate([
            // 'surat_balasan' => 'required',
            'status' => 'required',
        ], [
            //  'surat_balasan' => 'Surat Balasan Wajib Diisi',
            'status' => 'Status Wajib Diisi',
        ]);
        $data = [
            //'surat_balasan' => $request->surat_balasan,
            'status' => $request->status,
            'pesan_admin' => $request->pesan_admin,
        ];
        PinjamBarang::where('id', $id)->update($data);
        return redirect('/admin')->with('success', 'Data Peminjaman Barang Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

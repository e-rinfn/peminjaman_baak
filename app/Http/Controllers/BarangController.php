<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\http\Response
     */


    public function tampilBarangAdmin()
    {
        $data = Barang::orderBy("kode_barang", "desc")->get();
        return view('admin.daftar-barang')->with('barang', $data);
    }

    public function tampilBarangMahasiswa()
    {
        $data = Barang::orderBy("kode_barang", "desc")->get();
        return view('mahasiswa.daftar-barang-mahasiswa')->with('barang', $data);
    }

    public function tambahPinjamBarang()
    {
        $barang = Barang::all();
        $tags = $barang->pluck('nama')->toArray();
        return view('mahasiswa.tambah-pinjam-barang', ['tags' => $tags]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Menyimpan data input ke dalam session sementara kecuali file gambar
        Session::flash('kode_barang', $request->kode_barang);
        Session::flash('nama_barang', $request->nama_barang);
    
        // Validasi input
        $request->validate([
            'kode_barang' => 'required|unique:barang,kode_barang',
            'nama_barang' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'kode_barang.unique' => 'Kode Sudah Ada, Masukkan Lainnya',
            'kode_barang.required' => 'Kode Barang Wajib Diisi',
            'nama_barang.required' => 'Nama Barang Wajib Diisi',
        ]);
    
        // Menyimpan file gambar jika ada
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar_name = $request->kode_barang . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('/images', $gambar_name); // Simpan di storage public
        } else {
            $gambar_name = null;
        }
    
        // Membuat data array untuk disimpan ke database
        $data = [
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'gambar' => $gambar_name,
        ];
    
        // Menyimpan data ke tabel barang
        Barang::create($data);
    
        // Redirect ke halaman daftar barang dengan pesan sukses
        return redirect('daftar-barang')->with('success', 'Data Barang Berhasil Ditambah');
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
        $data = Barang::where('kode_barang', $id)->first();
        return view('admin.edit-barang')->with('barang', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
        ], [
            'kode_barang' => 'Kode Barang Wajib Diisi',
            'nama_barang' => 'Nama Barang Wajib Diisi',
        ]);

        $data = [
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
        ];

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar_name = $request->kode_barang . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('images', $gambar_name);
            $data['gambar'] = $gambar_name;
        }

        Barang::where('kode_barang', $id)->update($data);
        return redirect('/daftar-barang')->with('success', 'Data Barang Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Barang::where('kode_barang', $id)->delete();
        return redirect('/daftar-barang')->with('success', 'Data Barang Berhasil Di Hapus');
    }
}

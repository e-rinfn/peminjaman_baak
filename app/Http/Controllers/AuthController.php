<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function dologin(Request $request) // fungsi untuk melakukan login
    {
        // validasi login
        $credentials = $request->validate([
            'email' => 'required|email', // validasi email
            'password' => 'required' // validasi passowrd
        ]);

        if (auth()->attempt($credentials)) {

            // buat ulang session login
            $request->session()->regenerate();

            if (auth()->user()->role_id === 1) {
                // jika user admin
                return redirect()->intended('/admin'); // menuju ke halaman admin
            } elseif (auth()->user()->role_id === 2) {
                // jika user pimpinan
                return redirect()->intended('/pimpinan'); // menuju ke halaman pimpinan
            } elseif (auth()->user()->role_id === 3) {
                // jika user mahasiswa
                return redirect()->intended('/mahasiswa'); // menuju ke halaman mahasiswa
            }
        }

        // jika email atau password salah
        // kirimkan session error
        return back()->with('error', 'email atau password salah');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function register(Request $request)
    {

        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        Session::flash('organisasi', $request->organisasi);
        Session::flash('role_id', $request->role_id);
        Session::flash('password', $request->password);


        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'organisasi' => 'required|max:255',
            'role_id' => 'required',
            'password' => 'required|min:8|confirmed',
        ],
        [
            'name' => 'Nama Wajib Diisi',
            'email' => 'Email Wajib Diisi',
            'organisasi' => 'Organisasi Wajib Diisi',
            'role_id' => 'Role ID Wajib Diisi',
            'password' => 'Password Tidak Cocok',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'organisasi' => $request->organisasi,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
        ]);

        return redirect('akun')->with('success', 'Data Barang Berhasil Ditambah');
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('admin.edit-akun', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
            'organisasi' => 'required|max:255',
            'role_id' => 'required',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->organisasi = $request->organisasi;
        $user->role_id = $request->role_id;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect('akun')->with('success', 'Data Akun Berhasil Diupdate');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('akun')->with('success', 'Data Akun Berhasil Dihapus');
    }

    public function tampilUserAdmin()
    {
        $data = User::orderBy("name", "desc")->get();
        return view('admin.akun')->with('nama', $data);
    }
}

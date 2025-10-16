<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    protected $userModel;
    protected $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    /**
     * Tampilkan daftar user
     */
    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];

        return view('list_user', $data);
    }

    /**
     * Tampilkan form create user
     */
    public function create()
    {
        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title' => 'Tambah Pengguna',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    /**
     * Simpan data user baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'nim' => 'required|string|max:20|unique:user,nim',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $this->userModel->create([
            'nama' => $request->input('nama'),
            'nim' => $request->input('nim'),
            'kelas_id' => $request->input('kelas_id'),
        ]);

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    /**
     * Hapus user
     */
    public function destroy($id)
    {
        $user = $this->userModel->find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus!');
        }

        return redirect()->route('users.index')->with('error', 'Pengguna tidak ditemukan.');
    }
}

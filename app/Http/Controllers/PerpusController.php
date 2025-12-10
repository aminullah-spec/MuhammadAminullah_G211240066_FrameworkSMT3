<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerpusController extends Controller
{
    // =============================
    // HALAMAN LOGIN
    // =============================
    public function login()
    {
        return view('perpus.login');
    }

    // =============================
    // TAMPILKAN DATA DENGAN PAGINATION
    // =============================
    public function index()
    {
        // Ambil data dari tabel buku, 5 data per halaman
        $data = DB::table('buku')->paginate(5);

        // Kirim ke view
        return view('buku.index', ['data' => $data]);
    }

    // =============================
    // TAMPILKAN FORM TAMBAH BUKU
    // =============================
    public function add()
    {
        return view('buku.add', [
            'is_update' => 0
        ]);
    }

    // =============================
    // SIMPAN DATA BARU
    // =============================
    public function save(Request $request)
    {
        DB::table('buku')->insert([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tahun' => $request->tahun
        ]);

        return redirect('/buku')->with('success', 'Buku berhasil ditambahkan!');
    }

    // =============================
    // EDIT BUKU
    // =============================
    public function edit($id)
    {
        $data = DB::table('buku')->where('id', $id)->first();

        return view('buku.add', [
            'is_update' => 1,
            'data' => $data
        ]);
    }

    // =============================
    // UPDATE DATA BUKU
    // =============================
    public function update(Request $request)
    {
        DB::table('buku')->where('id', $request->id)->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tahun' => $request->tahun
        ]);

        return redirect('/buku')->with('success', 'Data buku berhasil diperbarui!');
    }

    // =============================
    // HAPUS DATA
    // =============================
    public function delete($id)
    {
        DB::table('buku')->where('id', $id)->delete();

        return redirect('/buku')->with('success', 'Buku berhasil dihapus!');
    }
}

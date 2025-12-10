<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam_m;
use App\Models\Anggota_m;
use App\Models\Buku_m;
use Illuminate\Support\Facades\DB;

class PinjamController extends Controller
{
    public function index()
    {
        $data = [
            'query' => DB::table('mst_pinjam')
                ->join('mst_anggota', 'mst_pinjam.ID_Anggota', '=', 'mst_anggota.ID_Anggota')
                ->join('mst_buku', 'mst_pinjam.ID_Buku', '=', 'mst_buku.ID_Buku')
                ->select('mst_pinjam.*', 'mst_anggota.Nama', 'mst_buku.Judul')
                ->paginate(5)
        ];

        return view('pinjam.list', $data);
    }

    public function add_new(Anggota_m $anggota, Buku_m $buku)
    {
        return view('pinjam.add', [
            'optanggota' => $anggota->opt_Anggota(),
            'optbuku' => $buku->opt_buku(),
            'is_update' => 0
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'ID_Anggota' => 'required',
            'ID_Buku' => 'required',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date'
        ]);

        Pinjam_m::create($request->except('_token'));

        return redirect('pinjam')->with('success', 'Data pinjaman berhasil ditambahkan.');
    }

    public function edit($id, Anggota_m $anggota, Buku_m $buku)
    {
        $record = Pinjam_m::findOrFail($id);

        return view('pinjam.add', [
            'record' => $record,
            'optanggota' => $anggota->opt_Anggota(),
            'optbuku' => $buku->opt_buku(),
            'is_update' => 1
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ID_Anggota' => 'required',
            'ID_Buku' => 'required',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date'
        ]);

        Pinjam_m::where('ID_Pinjam', $id)
            ->update($request->except('_token', '_method'));

        return redirect('pinjam')->with('success', 'Data pinjaman berhasil diperbarui.');
    }

    public function delete($id)
    {
        Pinjam_m::where('ID_Pinjam', $id)->delete();

        return redirect('pinjam')->with('success', 'Data pinjaman berhasil dihapus.');
    }
}

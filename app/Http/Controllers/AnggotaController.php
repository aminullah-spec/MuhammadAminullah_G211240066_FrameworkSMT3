<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota_m;

class AnggotaController extends Controller
{
    /* ---------------------------------------------
     * LIST DATA ANGGOTA
     * ---------------------------------------------*/
public function index()
{
    $data = [
        'query' => Anggota_m::orderBy('ID_Anggota', 'asc')->paginate(5)  // 5 per page
    ];

    return view('anggota.list', $data);
}

    /* ---------------------------------------------
     * FORM TAMBAH ANGGOTA
     * ---------------------------------------------*/
    public function add_new()
    {
        return view('anggota.add', [
            'is_update' => 0
        ]);
    }

    /* ---------------------------------------------
     * SIMPAN DATA BARU
     * ---------------------------------------------*/
    public function save(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'progdi' => 'required'
        ]);

        Anggota_m::create($request->only(['nim','nama','progdi']));

        return redirect('anggota')->with('success', 'Data anggota berhasil ditambahkan.');
    }

    /* ---------------------------------------------
     * FORM EDIT DATA
     * ---------------------------------------------*/
    public function edit($id)
    {
        $record = Anggota_m::findOrFail($id);

        return view('anggota.add', [
            'record' => $record,
            'is_update' => 1
        ]);
    }

    /* ---------------------------------------------
     * UPDATE DATA ANGGOTA
     * ---------------------------------------------*/
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'progdi' => 'required'
        ]);

        Anggota_m::where('ID_Anggota', $id)
            ->update($request->only(['nim','nama','progdi']));

        return redirect('anggota')->with('success', 'Data anggota berhasil diperbarui.');
    }

    /* ---------------------------------------------
     * DELETE DATA ANGGOTA
     * ---------------------------------------------*/
    public function delete($id)
    {
        Anggota_m::where('ID_Anggota', $id)->delete();

        return redirect('anggota')->with('success', 'Data anggota berhasil dihapus.');
    }
}

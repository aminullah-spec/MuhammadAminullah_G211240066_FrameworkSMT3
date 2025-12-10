<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku_m extends Model
{
    use HasFactory;

    protected $table = 'mst_buku';
    protected $primaryKey = 'ID_Buku';
    public $timestamps = false;

    function get_records($criteria = '')
    {
        $result = self::select('*')
            ->when($criteria, function ($query, $criteria) {
                return $query->where('ID_Buku', $criteria);
            })
            ->get();
        return $result;
    }

    function insert_record($data)
    {
        return self::insert($data);
    }

    function update_by_id($data, $id)
    {
        return self::where('ID_Buku', $id)->update($data);
    }

    function delete_by_id($id)
    {
        return self::where('ID_Buku', $id)->delete();
    }

    // ============================
    // Tambahan untuk dropdown pinjam
    // ============================
    public function opt_Buku()
    {
        $result = self::select('ID_Buku', 'Judul', 'Pengarang')->get();

        $rowBuku = [];
        foreach ($result as $row) {
            $rowBuku[$row->ID_Buku] = $row->Judul . " - " . $row->Pengarang;
        }

        return $rowBuku;
    }
}

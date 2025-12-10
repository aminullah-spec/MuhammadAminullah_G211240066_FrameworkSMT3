<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota_m extends Model
{
    use HasFactory;

    protected $table = 'mst_anggota';
    protected $primaryKey = 'ID_Anggota';
    public $timestamps = false;

    // Kolom yang boleh diisi mass assignment
    protected $fillable = [
        'nim',
        'nama',
        'progdi'
    ];

    function get_records($criteria = '')
    {
        return self::select('*')
            ->when($criteria, function ($query, $criteria) {
                return $query->where('ID_Anggota', $criteria);
            })
            ->get();
    }

    function insert_record($data)
    {
        return self::insert($data);
    }

    function update_by_id($data, $id)
    {
        return self::where('ID_Anggota', $id)->update($data);
    }

    function delete_by_id($id)
    {
        return self::where('ID_Anggota', $id)->delete();
    }

    // Untuk dropdown peminjaman
    public function opt_Anggota()
    {
        $result = self::select('ID_Anggota', 'nim', 'nama', 'progdi')->get();

        $rowAnggota = [];
        foreach ($result as $row) {
            $rowAnggota[$row->ID_Anggota] = $row->nim . " - " . $row->nama . " - " . $row->progdi;
        }

        return $rowAnggota;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Pinjam_m extends Model
{
    use HasFactory;

    protected $table = 'mst_pinjam';
    protected $primaryKey = 'ID_Pinjam';
    public $timestamps = false;

        protected $fillable = [
        'ID_Anggota',
        'ID_Buku',
        'tgl_pinjam',
        'tgl_kembali'
    ];

    public function get_records($id = null)
    {
        if ($id == null) {
            return DB::table($this->table)->get();
        } else {
            return DB::table($this->table)
                ->where('ID_Pinjam', $id)
                ->first();
        }
    }

    public function insert_record($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function update_by_id($data, $id)
    {
        return DB::table($this->table)
            ->where('ID_Pinjam', $id)
            ->update($data);
    }

    public function delete_by_id($id)
    {
        return DB::table($this->table)
            ->where('ID_Pinjam', $id)
            ->delete();
    }
}

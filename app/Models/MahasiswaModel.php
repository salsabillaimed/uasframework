<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MahasiswaModel extends Model
{
    public function allData()
    {
        return DB::table('mahasiswa_table')
        ->leftJoin('prodi_table', 'prodi_table.id_prodi', '=', 'mahasiswa_table.id_prodi')
        ->leftJoin('perusahaan_table', 'perusahaan_table.id_perusahaan', '=', 'mahasiswa_table.id_perusahaan')
        ->get();
    }

    public function detailData($id_mahasiswa)
    {
        return DB::table('mahasiswa_table')->where('id_mahasiswa', $id_mahasiswa)->first();
    }

    public function addData($data)
    {
        DB::table('mahasiswa_table')->insert($data);
    }

    public function editData($id_mahasiswa, $data)
    {
        DB::table('mahasiswa_table')->where('id_mahasiswa', $id_mahasiswa)->update($data);
    }

    public function deleteData($id_mahasiswa)
    {
        DB::table('mahasiswa_table')->where('id_mahasiswa', $id_mahasiswa)->delete();
    }
}

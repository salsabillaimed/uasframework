<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DosenModel extends Model
{
    public function allData()
    {
        return DB::table('dosen_table')->get();
    }


    public function detailData($id_dosen)
    {
        return DB::table('dosen_table')->where('id_dosen', $id_dosen)->first();
    }

    public function addData($data)
    {
        DB::table('dosen_table')->insert($data);
    }

    public function editData($id_dosen, $data)
    {
        DB::table('dosen_table')->where('id_dosen', $id_dosen)->update($data);
    }

    public function deleteData($id_dosen)
    {
        DB::table('dosen_table')->where('id_dosen', $id_dosen)->delete();
    }
}

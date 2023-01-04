<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KaprodiModel extends Model
{
    public function allData()
    {
        return DB::table('kaprodi_table')->get();
    }


    public function detailData($id_kaprodi)
    {
        return DB::table('kaprodi_table')->where('id_kaprodi', $id_kaprodi)->first();
    }

    public function addData($data)
    {
        DB::table('kaprodi_table')->insert($data);
    }

    public function editData($id_kaprodi, $data)
    {
        DB::table('kaprodi_table')->where('id_kaprodi', $id_kaprodi)->update($data);
    }

    public function deleteData($id_kaprodi)
    {
        DB::table('kaprodi_table')->where('id_kaprodi', $id_kaprodi)->delete();
    }
}

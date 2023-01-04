<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MahasiswaModel;

class MahasiswaController extends Controller
{
    public function __construct()
        {
            $this->MahasiswaModel = new MahasiswaModel();
            
        }

    public function index()
    {
        $data = [
            'mahasiswa'=> $this->MahasiswaModel->allData(),
        ];
        return view('mahasiswa', $data);
    }

    public function detail($id_mahasiswa)
    {
        if(!$this->MahasiswaModel->detailData($id_mahasiswa)){
            abort(404);
        }
        $data = [
            'mahasiswa'=> $this->MahasiswaModel->detailData($id_mahasiswa),
        ];
        return view('detailmahasiswa', $data);
    }

    public function add()
    {
        return view('add_mahasiswa');
    }

    public function insert()
    {
        Request()->validate([
            'npm' => 'required|unique:mahasiswa_table,npm_mahasiswa|min:4|max:10',
            'nama_mahasiswa' => 'required',
            'prodi' => 'required',
            'perusahaan' => 'required',
        ],[
            'npm.required'=>'Wajib diisi !!',
            'npm.unique'=>'NPM ini sudah ada !!',
            'npm.min'=>'Minimal 4 karakter !!',
            'npm.max'=>'Maximal 10 karakter !!',
            'nama_mahasiswa.required'=>'Wajib diisi !!',
            'prodi.required'=>'Wajib diisi !!',
            'perusahaan.required'=>'Wajib diisi !!',
        ]);
        $data = [
            'npm_mahasiswa' => Request()->npm,
            'nama_mahasiswa' => Request()->nama_mahasiswa,
            'prodi' => Request()->prodi,
            'perusahaan' => Request()->prodi,
        ];

        $this->MahasiswaModel->addData($data);
        return redirect()->route('mahasiswa')->with('pesan','Data Berhasil Ditambahkan');
    }

    public function edit($id_mahasiswa)
    {
        if(!$this->MahasiswaModel->detailData($id_mahasiswa)){
            abort(404);
        }
        $data = [
            'mahasiswa'=> $this->MahasiswaModel->detailData($id_mahasiswa),
        ];
        return view('editmahasiswa', $data);
    }

    public function update($id_mahasiswa)
    {
        Request()->validate([
            'npm' => 'required',
            'nama_mahasiswa' => 'required',
            'prodi' => 'required',
            'perusahaan' => 'required',
        ],[
            'npm.required'=>'Wajib diisi !!',
            'npm.min'=>'Minimal 4 karakter !!',
            'npm.max'=>'Maximal 10 karakter !!',
            'nama_mahasiswa.required'=>'Wajib diisi !!',
            'prodi.required'=>'Wajib diisi !!',
            'perusahaan.required'=>'Wajib diisi !!',
        ]);

        return redirect()->route('mahasiswa')->with('pesan','Data Berhasil Di Update');
    }

    public function delete($id_mahasiswa)
    {
        
        $this->MahasiswaModel->deleteData($id_mahasiswa);
        return redirect()->route('mahasiswa')->with('pesan','Data Berhasil Di Hapus');
    }
}


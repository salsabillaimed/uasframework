<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KaprodiModel;

class KaprodiController extends Controller
{
    public function __construct()
    {
        $this->KaprodiModel = new KaprodiModel();
        
    }

    public function index()
    {
        $data = [
            'kaprodi'=> $this->KaprodiModel->allData(),
        ];
        return view('kaprodi', $data);
    }

    public function detail($id_kaprodi)
    {
        if(!$this->KaprodiModel->detailData($id_kaprodi)){
            abort(404);
        }
        $data = [
            'kaprodi'=> $this->KaprodiModel->detailData($id_kaprodi),
        ];
        return view('detailkaprodi', $data);
    }

    public function add()
    {
        return view('add_kaprodi');
    }

    public function insert()
    {
        Request()->validate([
            'nip' => 'required|unique:kaprodi_table,nip_kaprodi|min:4|max:10',
            'nama_kaprodi' => 'required',
            'prodi_kaprodi' => 'required',
            'foto_kaprodi' => 'required|mimes:jpg,jpeg,bmp,png|max:1024',
        ],[
            'nip.required'=>'Wajib diisi !!',
            'nip.unique'=>'NIP ini sudah ada !!',
            'nip.min'=>'Minimal 4 karakter !!',
            'nip.max'=>'Maximal 10 karakter !!',
            'nama_kaprodi.required'=>'Wajib diisi !!',
            'prodi_kaprodi.required'=>'Wajib diisi !!',
            'foto_kaprodi.required'=>'Wajib diisi !!',
        ]);

        //upload foto
        $file = Request()->foto_kaprodi;
        $fileName = Request()->nip.'.'. $file->extension();
        $file->move(public_path('foto_kaprodi'), $fileName);

        $data = [
            'nip_kaprodi' => Request()->nip,
            'nama_kaprodi' => Request()->nama_kaprodi,
            'prodi_kaprodi' => Request()->prodi_kaprodi,
            'foto_kaprodi' => $fileName,
        ];

        $this->KaprodiModel->addData($data);
        return redirect()->route('kaprodi')->with('pesan','Data Berhasil Ditambahkan');
    }

    public function edit($id_kaprodi)
    {
        if(!$this->KaprodiModel->detailData($id_kaprodi)){
            abort(404);
        }
        $data = [
            'kaprodi'=> $this->KaprodiModel->detailData($id_kaprodi),
        ];
        return view('editkaprodi', $data);
    }

    public function update($id_kaprodi)
    {
        Request()->validate([
            'nip' => 'required|min:4|max:10',
            'nama_kaprodi' => 'required',
            'prodi_kaprodi' => 'required',
            'foto_kaprodi' => 'mimes:jpg,jpeg,bmp,png|max:1024',
        ],[
            'nip.required'=>'Wajib diisi !!',
            'nip.min'=>'Minimal 4 karakter !!',
            'nip.max'=>'Maximal 10 karakter !!',
            'nama_kaprodi.required'=>'Wajib diisi !!',
            'prodi_kaprodi.required'=>'Wajib diisi !!',
        ]);

        if (Request()->foto_kaprodi <> ""){
        //upload foto
        $file = Request()->foto_kaprodi;
        $fileName = Request()->nip.'.'. $file->extension();
        $file->move(public_path('foto_kaprodi'), $fileName);

        $data = [
            'nip_kaprodi' => Request()->nip,
            'nama_kaprodi' => Request()->nama_kaprodi,
            'prodi_kaprodi' => Request()->prodi_kaprodi,
            'foto_kaprodi' => $fileName,
        ];
            $this->KaprodiModel->editData($id_kaprodi, $data);
        }else{
            $data = [
                'nip_kaprodi' => Request()->nip,
                'nama_kaprodi' => Request()->nama_kaprodi,
                'prodi_kaprodi' => Request()->prodi_kaprodi,
            ];
            $this->KaprodiModel->editData($id_kaprodi, $data);
        }

        
        return redirect()->route('kaprodi')->with('pesan','Data Berhasil Di Update');
    }

    public function delete($id_kaprodi)
    {
        //hapus foto
        $kaprodi = $this->KaprodiModel->detailData($id_kaprodi);
        if($kaprodi->foto_kaprodi<> ""){
            unlink(public_path('foto_kaprodi').'/'. $kaprodi->foto_kaprodi);
        }
        $this->KaprodiModel->deleteData($id_kaprodi);
        return redirect()->route('kaprodi')->with('pesan','Data Berhasil Di Hapus');
    }
}

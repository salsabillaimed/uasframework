<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DosenModel;

class DosenController extends Controller
{

    public function __construct()
    {
        $this->DosenModel = new DosenModel();
    }

    public function index()
    {
        $data = [
            'dosen'=> $this->DosenModel->allData(),
        ];
        return view('dosen', $data);
    }

    public function detail($id_dosen)
    {
        if(!$this->DosenModel->detailData($id_dosen)){
            abort(404);
        }
        $data = [
            'dosen'=> $this->DosenModel->detailData($id_dosen),
        ];
        return view('detaildosen', $data);
    }

    public function add()
    {
        return view('add_dosen');
    }

    public function insert()
    {
        Request()->validate([
            'nip' => 'required|unique:dosen_table,nip_dosen|min:4|max:10',
            'nama_dosen' => 'required',
            'perusahaan' => 'required',
            'foto_dosen' => 'required|mimes:jpg,jpeg,bmp,png|max:1024',
        ],[
            'nip.required'=>'Wajib diisi !!',
            'nip.unique'=>'NIP ini sudah ada !!',
            'nip.min'=>'Minimal 4 karakter !!',
            'nip.max'=>'Maximal 10 karakter !!',
            'nama_dosen.required'=>'Wajib diisi !!',
            'perusahaan.required'=>'Wajib diisi !!',
            'foto_dosen.required'=>'Wajib diisi !!',
        ]);

        //upload foto
        $file = Request()->foto_dosen;
        $fileName = Request()->nip.'.'. $file->extension();
        $file->move(public_path('foto_dosen'), $fileName);

        $data = [
            'nip_dosen' => Request()->nip,
            'nama_dosen' => Request()->nama_dosen,
            'perusahaan' => Request()->perusahaan,
            'foto_dosen' => $fileName,
        ];

        $this->DosenModel->addData($data);
        return redirect()->route('dosen')->with('pesan','Data Berhasil Ditambahkan');
    }

    public function edit($id_dosen)
    {
        if(!$this->DosenModel->detailData($id_dosen)){
            abort(404);
        }
        $data = [
            'dosen'=> $this->DosenModel->detailData($id_dosen),
        ];
        return view('editdosen', $data);
    }

    public function update($id_dosen)
    {
        Request()->validate([
            'nip' => 'required|min:4|max:10',
            'nama_dosen' => 'required',
            'perusahaan' => 'required',
            'foto_dosen' => 'mimes:jpg,jpeg,bmp,png|max:1024',
        ],[
            'nip.required'=>'Wajib diisi !!',
            'nip.min'=>'Minimal 4 karakter !!',
            'nip.max'=>'Maximal 10 karakter !!',
            'nama_dosen.required'=>'Wajib diisi !!',
            'perusahaan.required'=>'Wajib diisi !!',
        ]);

        if (Request()->foto_dosen <> ""){
        //upload foto
        $file = Request()->foto_dosen;
        $fileName = Request()->nip.'.'. $file->extension();
        $file->move(public_path('foto_dosen'), $fileName);

        $data = [
            'nip_dosen' => Request()->nip,
            'nama_dosen' => Request()->nama_dosen,
            'perusahaan' => Request()->perusahaan,
            'foto_dosen' => $fileName,
        ];
            $this->DosenModel->editData($id_dosen, $data);
        }else{
            $data = [
                'nip_dosen' => Request()->nip,
                'nama_dosen' => Request()->nama_dosen,
                'perusahaan' => Request()->perusahaan,
            ];
            $this->DosenModel->editData($id_dosen, $data);
        }

        
        return redirect()->route('dosen')->with('pesan','Data Berhasil Di Update');
    }

    public function delete($id_dosen)
    {
        //hapus foto
        $dosen = $this->DosenModel->detailData($id_dosen);
        if($dosen->foto_dosen<> ""){
            unlink(public_path('foto_dosen').'/'. $dosen->foto_dosen);
        }
        $this->DosenModel->deleteData($id_dosen);
        return redirect()->route('dosen')->with('pesan','Data Berhasil Di Hapus');
    }
}

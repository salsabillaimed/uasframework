@extends('layout.v_template')
@section('title', 'Add Dosen')

@section('content')
    
<form action="/dosen/insert" method="POST" enctype="multipart/form-data">
    @csrf 

    <div class="content">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>NIP</label>
                    <input name="nip" class="form-control" value="{{old('nip')}}">
                    <div class="text-danger">
                        @error('nip')
                                 {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama Dosen</label>
                    <input name="nama_dosen" class="form-control" value="{{old('nama_dosen')}}">
                    <div class="text-danger">
                        @error('nama_dosen')
                                 {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Perusahaan</label>
                    <input name="perusahaan" class="form-control" value="{{old('perusahaan')}}">
                    <div class="text-danger">
                        @error('perusahaan')
                                 {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Foto Dosen</label>
                    <input type="file" name="foto_dosen" class="form-control" value="{{old('foto_dosen')}}">
                    <div class="text-danger">
                        @error('foto_dosen')
                                 {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-sm">Simpan</button>
                </div>

            </div>
        </div>
    </div>


</form>

@endsection
@extends('layout.v_template')
@section('title', 'Add Kaprodi')

@section('content')
    
<form action="/kaprodi/insert" method="POST" enctype="multipart/form-data">
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
                    <label>Nama Kaprodi</label>
                    <input name="nama_kaprodi" class="form-control" value="{{old('nama_kaprodi')}}">
                    <div class="text-danger">
                        @error('nama_kaprodi')
                                 {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Program Studi</label>
                    <input name="prodi_kaprodi" class="form-control" value="{{old('prodi_kaprodi')}}">
                    <div class="text-danger">
                        @error('prodi_kaprodi')
                                 {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Foto Kaprodi</label>
                    <input type="file" name="foto_kaprodi" class="form-control" value="{{old('foto_kaprodi')}}">
                    <div class="text-danger">
                        @error('foto_kaprodi')
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
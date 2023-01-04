@extends('layout.v_template')
@section('title', 'Add Mahasiswa')

@section('content')
    
<form action="/mahasiswa/insert" method="POST" enctype="multipart/form-data">
    @csrf 

    <div class="content">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>NPM</label>
                    <input name="nip" class="form-control" value="{{old('npm')}}">
                    <div class="text-danger">
                        @error('npm')
                                 {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama Mahasiswa</label>
                    <input name="nama_mahasiswa" class="form-control" value="{{old('nama_mahasiswa')}}">
                    <div class="text-danger">
                        @error('nama_mahasiswa')
                                 {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Program Studi</label>
                    <input name="prodi" class="form-control" value="{{old('prodi')}}">
                    <div class="text-danger">
                        @error('prodi')
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
                    <button class="btn btn-primary btn-sm">Simpan</button>
                </div>

            </div>
        </div>
    </div>


</form>

@endsection
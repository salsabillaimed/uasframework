@extends('layout.v_template')
@section('title', 'Edit Kaprodi')

@section('content')
    
<form action="/kaprodi/update/{{ $kaprodi->id_kaprodi }}" method="POST" enctype="multipart/form-data">
    @csrf 

    <div class="content">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>NIP</label>
                    <input name="nip" class="form-control" value="{{$kaprodi->nip_kaprodi}}"readonly>
                    <div class="text-danger">
                        @error('nip')
                                 {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama Kaprodi</label>
                    <input name="nama_kaprodi" class="form-control" value="{{$kaprodi->nama_kaprodi}}">
                    <div class="text-danger">
                        @error('nama_kaprodi')
                                 {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Program Studi</label>
                    <input name="prodi_kaprodi" class="form-control" value="{{$kaprodi->prodi_kaprodi}}">
                    <div class="text-danger">
                        @error('prodi_kaprodi')
                                 {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="col-sm 12">
                    <div class="col-sm-4">

                    <img src="{{url('foto_kaprodi/'.$kaprodi->foto_kaprodi) }}" width="100px">

                    </div>
                    <div class="col-sm-8">
                    <div class="form-group">
                    <label>Ganti Foto Kaprodi</label>
                    <input type="file" name="foto_kaprodi" class="form-control" value="{{old('foto_kaprodi')}}">
                    <div class="text-danger">
                        @error('foto_kaprodi')
                                 {{ $message }}
                        @enderror
                    </div>
                </div>
                    </div>
                </div>
                <br>
                <div class="col-sm 12">
                    <div class="form-group">
                         <button class="btn btn-primary btn-sm">Simpan</button>
                    </div>
            </div>
            </div>
        </div>
    </div>


</form>


@endsection
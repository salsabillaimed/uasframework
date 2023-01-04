@extends('layout.v_template')
@section('title', 'Detail Dosen')
@section('content')

<table class="table">
    <tr>
        <th width="100px">NIP</th>
        <th width="30px">:</th>
        <th>{{$dosen->nip_dosen}}</th>
    </tr>
    <tr>
        <th width="100px">Nama Dosen</th>
        <th width="30px">:</th>
        <th>{{$dosen->nama_dosen}}</th>
    </tr>
    <tr>
        <th width="100px">Perusahaan</th>
        <th width="30px">:</th>
        <th>{{$dosen->perusahaan}}</th>
    </tr>
    <tr>
        <th width="100px">Foto Dosen</th>
        <th width="30px">:</th>
        <th><img src="{{ url('foto_dosen/'.$dosen->foto_dosen) }}" width="400px"></th>
    </tr>
    <tr>
        <th><a href="/dosen" class="btn btn-success btn-sm">Kembali</a></th>
    </tr>
</table>







@endsection
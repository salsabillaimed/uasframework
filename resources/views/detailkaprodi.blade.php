@extends('layout.v_template')
@section('title', 'Detail Kaprodi')
@section('content')

<table class="table">
    <tr>
        <th width="100px">NIP</th>
        <th width="30px">:</th>
        <th>{{$kaprodi->nip_kaprodi}}</th>
    </tr>
    <tr>
        <th width="100px">Nama Kaprodi</th>
        <th width="30px">:</th>
        <th>{{$kaprodi->nama_kaprodi}}</th>
    </tr>
    <tr>
        <th width="100px">Program Studi</th>
        <th width="30px">:</th>
        <th>{{$kaprodi->prodi_kaprodi}}</th>
    </tr>
    <tr>
        <th width="100px">Foto Kaprodi</th>
        <th width="30px">:</th>
        <th><img src="{{ url('foto_kaprodi/'.$kaprodi->foto_kaprodi) }}" width="400px"></th>
    </tr>
    <tr>
        <th><a href="/kaprodi" class="btn btn-success btn-sm">Kembali</a></th>
    </tr>
</table>







@endsection
@extends('layout.v_template')
@section('title', 'Kaprodi')

@section('content')
   <a href="/kaprodi/add" class="btn btn-primary btn-sm"> +Tambahkan</a> <br>

   @if(session('pesan'))
   <div class="alert alert-success alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <h4><i class="icon fa fa-check"></i>Success !</h4>
       {{ session('pesan') }}.
</div>
@endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Kaprodi</th>
                <th>Program Studi</th>
                <th>Foto Kaprodi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach ($kaprodi as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nip_kaprodi }}</td>
                    <td>{{ $data->nama_kaprodi }}</td>
                    <td>{{ $data->prodi_kaprodi }}</td>
                    <td><img src="{{url('foto_kaprodi/'.$data->foto_kaprodi) }}"width="100px"></td>
                    <td>
                        <a href="/kaprodi/detail/{{$data->id_kaprodi}}"class="btn btn-sm btn-success">Detail</a>
                        <a href="/kaprodi/edit/{{$data->id_kaprodi}}"class="btn btn-sm btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$data->id_kaprodi}}">
                             Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@foreach($kaprodi as $data)
    <div class="modal modal-danger fade" id="delete{{$data->id_kaprodi}}">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{$data->nama_kaprodi}}</h4>
              </div>
              <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus Data Ini?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                <a href="/kaprodi/delete/{{$data->id_kaprodi}}" class="btn btn-outline">Yes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>
@endforeach

@endsection
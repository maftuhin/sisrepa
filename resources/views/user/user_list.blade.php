@extends('theme.default')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Daftar User</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if (Auth::user()->role == 'admin')
                        <a class="btn btn-sm btn-primary" href="/user/create">Tambah User</a>
                        @endif
                        <a class="btn btn-sm btn-warning" href="/user/export">Export User (xlxs)</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                            Session::forget('success');
                            @endphp
                        </div>
                        @endif
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th style="width: auto;">Name</th>
                                    <th style="width: auto;">Email</th>
                                    <th style="width: auto;">Instansi</th>
                                    <th style="width: auto;">Role</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                <tr>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->skpd}}</td>
                                    <td>{{$data->role}}</td>
                                    <td style="text-align: center;">
                                        <a href="/user/edit/{{$data->id}}" class="btn btn-sm btn-primary"><i class="right fas fa-edit"></i></a>
                                        <a href="#" data-toggle="modal" data-href="/user/destroy/{{$data->id}}" class="btn btn-sm btn-danger" data-target="#confirm-delete"><i class="right fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <b>Hapus User</b>
            </div>
            <div class="modal-body">
                Hapus user ini? tidak bisa dikembalikan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger btn-ok"><b>Hapus</b></a>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->
@endsection

@section('js')
<script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>
@endsection
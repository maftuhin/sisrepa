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
                        <a class="btn btn-sm btn-primary" href="/skpd/create">Tambah SKPD</a>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">Id</th>
                                    <th style="width: auto;">Name</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                <tr>
                                    <td>##</td>
                                    <td>{{$data->skpd}}</td>
                                    <td style="text-align: center;">
                                        <a href="/skpd/edit/{{$data->id}}" class="btn btn-sm btn-primary"><i class="right fas fa-edit"></i></a>
                                        <a href="/users/destroy/{{$data->id}}" class="btn btn-sm btn-danger"><i class="right fas fa-trash"></i></a>
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
<!-- /.content -->
@endsection
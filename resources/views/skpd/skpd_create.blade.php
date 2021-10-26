@extends('theme.default')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>SKPD Baru</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                    <!-- form start -->
                    <form method="POST" action="/skpd/store">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>SKPD</label>
                                <input type="text" name="skpd" class="form-control" placeholder="Masukkan Nama SKPD" />
                                @if ($errors->has('skpd'))
                                <span class="text-danger">{{ $errors->first('skpd') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
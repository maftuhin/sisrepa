@extends('theme.default')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Masukan Koreksi</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- left column -->
        <div class="col-md-12 row">
            <!-- general form elements -->
            <div class="col-md-6">
                <div class="card">
                    <!-- form start -->
                    @include('correction.correction_form')
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    @include('correction.correction_view')
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@section('style')
<style>
    .form-header {
        color: #006400;
    }

    td {
        vertical-align: middle;
    }
</style>
@endsection

@section('js')
<script>
    $("input[required], select[required]").attr("oninvalid", "this.setCustomValidity('Wajib Diisi!')");
</script>
@endsection
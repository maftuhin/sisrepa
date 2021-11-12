@extends('theme.default')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Transaksi Baru</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
                <!-- form start -->
                @include('transaction.transaction_form')
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->

        <!-- /.row -->
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
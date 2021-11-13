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
                @include('transaction.transaction_edit_form')
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

    th {
        vertical-align: middle;
    }
</style>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $("#moneyInput, #money_input, .currency_input, .money").maskMoney({
            thousands: '.',
            decimal: ',',
            affixesStay: false,
            precision: 0
        });
    });
    // var transaction = document.getElementById('nilai-transaksi');
    // transaction.addEventListener('keyup', function(e) {
    //     transaction.value = formatRupiah(this.value)
    // })

    // /* Fungsi formatRupiah */
    // function formatRupiah(n) {
    //     return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    // }
</script>
@endsection
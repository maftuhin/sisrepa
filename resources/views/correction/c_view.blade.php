@extends('theme.default')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Koreksi</h1>
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
                <div class="card-header">
                    <a href="/correction/edit/{{$data->trx_id}}" class="btn btn-primary btn-sm"><i class="right fas fa-edit"></i> Ubah Koreksi</a>
                    <a href="/correction/destroy/{{$data->trx_id}}" class="btn btn-danger btn-sm"><i class="right fas fa-trash"></i> Hapus Koreksi</a>
                </div>
                <div class="card-body">
                    <!-- form start -->
                    <table class="form-group table-sm" style="width: 100%;">
                        <!-- PPN -->
                        <tr>
                            <td colspan="2" class="table-success"><b>POTONGAN PAJAK PPN</b></td>
                        </tr>
                        <tr>
                            <td style="width: 50%;">JENIS PAJAK</td>
                            <td>{{$data->c_ppn_jenis}}</td>
                        </tr>
                        <tr>
                            <td>JUMLAH</td>
                            <td>@money($data->c_ppn_jumlah)</td>
                        </tr>
                        <tr>
                            <td>NTPN</td>
                            <td>{{$data->c_ppn_ntpn}}</td>
                        </tr>
                        <!-- PPH21 -->
                        <tr>
                            <td colspan="2" class="table-success"><b>POTONGAN PAJAK PPH21</b></td>
                        </tr>
                        <tr>
                            <td>JENIS PAJAK</td>
                            <td>{{$data->c_pph21_jenis}}</td>
                        </tr>
                        <tr>
                            <td>JUMLAH</td>
                            <td>@money($data->c_pph21_jumlah)</td>
                        </tr>
                        <tr>
                            <td>NTPN</td>
                            <td>{{$data->c_pph21_ntpn}}</td>
                        </tr>
                        <!-- PPH22 -->
                        <tr>
                            <td colspan="2" class="table-success"><b>POTONGAN PAJAK PPH22</b></td>
                        </tr>
                        <tr>
                            <td>JENIS PAJAK</td>
                            <td>{{$data->c_pph22_jenis}}</td>
                        </tr>
                        <tr>
                            <td>JUMLAH</td>
                            <td>{{$data->c_pph22_jumlah}}</td>
                        </tr>
                        <tr>
                            <td>NTPN</td>
                            <td>{{$data->c_pph22_ntpn}}</td>
                        </tr>
                        <!-- PPH23 -->
                        <tr>
                            <td colspan="2" class="table-success"><b>POTONGAN PAJAK PPH23</b></td>
                        </tr>
                        <tr>
                            <td>JENIS PAJAK</td>
                            <td>{{$data->c_pph23_jenis}}</td>
                        </tr>
                        <tr>
                            <td>JUMLAH</td>
                            <td>{{$data->c_pph23_jumlah}}</td>
                        </tr>
                        <tr>
                            <td>NTPN</td>
                            <td>{{$data->c_pph23_ntpn}}</td>
                        </tr>
                        <!-- PPHFIN -->
                        <tr>
                            <td colspan="2" class="table-success"><b>POTONGAN PAJAK PPHFIN</b></td>
                        </tr>
                        <tr>
                            <td>JENIS PAJAK</td>
                            <td>{{$data->c_pphfin_jenis}}</td>
                        </tr>
                        <tr>
                            <td>JUMLAH</td>
                            <td>{{$data->c_pphfin_jumlah}}</td>
                        </tr>
                        <tr>
                            <td>NTPN</td>
                            <td>{{$data->c_pphfin_ntpn}}</td>
                        </tr>
                    </table>
                </div>
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
@extends('theme.default')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>List Transaksi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">DataTables</li>
                </ol>
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
                        @if ($user->role != 'admin')
                        <a class="btn btn-sm btn-primary" href="/transaction/create">Tambah Transaksi</a>
                        @endif
                        <a class="btn btn-sm btn-warning" href="/transaction/export">Export Transaksi (xlsx)</a>
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
                        <table id="example1" class="table-bordered table-striped table-sm table-responsive" cellspacing="0">
                            <thead>
                                <tr>
                                    <th rowspan="2">Action</th>
                                    <th rowspan="2">Jenis Trx</th>
                                    <th rowspan="2">No Urut</th>
                                    <th rowspan="2">SKPD</th>
                                    <th colspan="2">SPD/SPM</th>
                                    <th colspan="2">SP2D</th>
                                    <th rowspan="2" style="min-width: 300px;">Uraian Transaksi</th>
                                    <th rowspan="2">Nominal Transaksi</th>
                                </tr>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nilai Belanja</th>
                                    <th>Nomor</th>
                                    <th>Nilai Belanja</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                <tr>
                                    <td style="text-align: center;" class="no-wrap">
                                        <a href="/transaction/edit/{{$d->id}}" class="btn btn-sm btn-primary"><i class="right fas fa-edit"></i></a>
                                        <a href="/transaction/delete/{{$d->id}}" class="btn btn-sm btn-danger"><i class="right fas fa-trash"></i></a>
                                        @if($d->trx=='GU' && $user->role!='admin')
                                        <a href="/transaction/duplicate/{{$d->id}}" class="btn btn-sm btn-success"><i class="right fas fa-plus"></i></a>
                                        @endif
                                    </td>
                                    <td style="text-align: center;">{{$d->trx}}</td>
                                    <td>{{$d->no_urut}}</td>
                                    <td class="no-wrap">{{$d->skpd}}</td>
                                    <td>{{$d->nomor_spd}}</td>
                                    <td style="text-align: end;">Rp. {{number_format($d->nilai_spd,0,',',',')}}</td>
                                    <td>{{$d->nomor_sp2d}}</td>
                                    <td style="text-align: end;">Rp {{number_format($d->nilai_sp2d,0,',',',')}}</td>
                                    <td>{{$d->uraian_transaksi}}</td>
                                    <td style="text-align: end;">Rp {{number_format($d->nilai_transaksi,0,',',',')}}</td>
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

@section('style')
<style>
    .no-wrap,
    th {
        white-space: nowrap;
    }

    th {
        vertical-align: middle;
        text-align: center;
    }
</style>
@endsection
<!-- @section('js')
<script type="text/javascript">
    $(function() {
        $("#example1").DataTable({
            scrollX: true,
            // responsive: false,
            // lengthChange: false,
            paging: false,
            searching: false,
            ordering: true,
            // autoWidth: false,
            // // buttons: ["excel", "pdf", "print"],
            // columnDefs: [{
            //     // "render": function(data, type, row) {
            //     //     return data + ' (' + row[3] + ')';
            //     // },
            //     render: $.fn.dataTable.render.number(',', '.'),
            //     "targets": 6
            // }, {
            //     render: $.fn.dataTable.render.number(',', '.'),
            //     "targets": 4
            // }]
        });
        // $('.dataTables_length').addClass('bs-select');
        // .buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection -->
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
                                    <th colspan="3">PPN</th>
                                    <th colspan="3">PPH21</th>
                                    <th colspan="3">PPH22</th>
                                    <th colspan="3">PPH23</th>
                                    <th colspan="3">PPHFIN</th>
                                </tr>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nilai Belanja</th>
                                    <th>Nomor</th>
                                    <th>Nilai Belanja</th>
                                    <!-- PPN -->
                                    <th>Jenis</th>
                                    <th>Jumlah</th>
                                    <th>NTPN</th>
                                    <!-- PPH21 -->
                                    <th>Jenis</th>
                                    <th>Jumlah</th>
                                    <th>NTPN</th>
                                    <!-- PPH22 -->
                                    <th>Jenis</th>
                                    <th>Jumlah</th>
                                    <th>NTPN</th>
                                    <!-- PPH23 -->
                                    <th>Jenis</th>
                                    <th>Jumlah</th>
                                    <th>NTPN</th>
                                    <!-- PPHFIN -->
                                    <th>Jenis</th>
                                    <th>Jumlah</th>
                                    <th>NTPN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                <tr>
                                    <td style="text-align: center;" class="no-wrap">
                                        <a href="/transaction/edit/{{$d->id}}" class="btn btn-sm btn-primary"><i class="right fas fa-edit"></i></a>
                                        <a href="#" data-toggle="modal" data-href="/transaction/delete/{{$d->id}}" class="btn btn-sm btn-danger" data-target="#confirm-delete"><i class="right fas fa-trash"></i></a>
                                        @if($d->trx=='GU' && $user->role!='admin')
                                        <a href="/transaction/duplicate/{{$d->id}}" class="btn btn-sm btn-success"><i class="right fas fa-plus"></i></a>
                                        @endif
                                        @if($user->role=='admin')
                                        <a href="/correction/create/{{$d->id}}" class="btn btn-sm btn-success">Koreksi</a>
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
                                    <!-- PPN -->
                                    <td>{{$d->ppn_jenis}}</td>
                                    <td>{{$d->ppn_jumlah}}</td>
                                    <td>{{$d->ppn_ntpn}}</td>
                                    <!-- PPN -->
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <!-- PPN -->
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <!-- PPN -->
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <!-- PPN -->
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
                <b>Hapus Transaksi</b>
            </div>
            <div class="modal-body">
                Hapus transaksi ini? tidak bisa dikembalikan.
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

@section('js')
<script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>
@endsection
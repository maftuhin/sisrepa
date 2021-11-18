@extends('theme.default')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>List Transaksi</h1>
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
                                    <th colspan="3">SPD/SPM</th>
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
                                    <th>Uraian</th>
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
                                        @if($d->trx_id != null)
                                        <a href="/correction/show/{{$d->trx_id}}" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i> Koreksi</a>
                                        @else
                                        <a href="/correction/create/{{$d->id}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Koreksi</a>
                                        @endif
                                        @endif
                                    </td>
                                    <td style="text-align: center;">{{$d->trx}}</td>
                                    <td>{{$d->no_urut}}</td>
                                    <td class="no-wrap">{{$d->skpd}}</td>
                                    <td>{{$d->nomor_spd}}</td>
                                    <td style="text-align: end;">@money($d->nilai_spd)</td>
                                    <td>{{$d->uraian_spd}}</td>
                                    <td>{{$d->nomor_sp2d}}</td>
                                    <td style="text-align: end;">@money($d->nilai_sp2d)</td>
                                    <td>{{$d->uraian_transaksi}}</td>
                                    <td style="text-align: end;">@money($d->nilai_transaksi)</td>
                                    <!-- PPN -->
                                    <td>{{$d->ppn_jenis}}</td>
                                    <td>@money($d->ppn_jumlah)</td>
                                    <td>{{$d->ppn_ntpn}}</td>
                                    <!-- PPH21 -->
                                    <td>{{$d->pph21_jenis}}</td>
                                    <td>@money($d->pph21_jumlah)</td>
                                    <td>{{$d->pph21_ntpn}}</td>
                                    <!-- PPN -->
                                    <td>{{$d->pph22_jenis}}</td>
                                    <td>@money($d->pph22_jumlah)</td>
                                    <td>{{$d->pph22_ntpn}}</td>
                                    <!-- PPN -->
                                    <td>{{$d->pph23_jenis}}</td>
                                    <td>@money($d->pph23_jumlah)</td>
                                    <td>{{$d->pph23_ntpn}}</td>
                                    <!-- PPN -->
                                    <td>{{$d->pphfin_jenis}}</td>
                                    <td>@money($d->pphfin_jumlah)</td>
                                    <td>{{$d->pphfin_ntpn}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        {{$data}}
                    </div>
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
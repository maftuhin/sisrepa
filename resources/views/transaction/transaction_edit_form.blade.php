<form method="POST" action="/transaction/update/{{$data->id}}">
    @csrf
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <table class="form-group table-sm" style="width: 100%;">
            <tr>
                <td>Jenis Trx</td>
                <td>
                    <select class="form-control" name="trx">
                        @foreach($trx as $trx)
                        @if($trx==$data->trx)
                        <option selected>{{$trx}}</option>
                        @else
                        <option>{{$trx}}</option>
                        @endif
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>No. Urut</td>
                <td><input type="text" name="no_urut" class="form-control" value="{{$data->no_urut}}"></td>
            </tr>
            <tr>
                <td>SKPD</td>
                <td><input type="text" name="skpd" class="form-control" disabled value="{{$user->skpd}}"></td>
            </tr>
            <tr>
                <td colspan="2" class="table-success"><b>SPM/SPD</b></td>
            </tr>
            <tr>
                <td>Nomor</td>
                <td><input type="text" value="{{$data->nomor_spd}}" name="nomor_spd" class="form-control" placeholder="Nomor"></td>
            </tr>
            <tr>
                <td>Nilai Belanja</td>
                <td><input type="text" name="nilai_spd" class="form-control" placeholder="Nilai Belanja" value="{{$data->nilai_spd}}"></td>
            </tr>
            <tr>
                <td>Uraian SPM/SPD</td>
                <td><input type="text" name="uraian_spm_spd" class="form-control" placeholder="Masukan Uraian SPM/SPD"></td>
            </tr>
            <tr>
                <td colspan="2" class="table-success"><b>SP2D</b></td>
            </tr>
            <tr>
                <td>Nomor</td>
                <td><input type="text" name="nomor_sp2d" class="form-control" placeholder="Nomor" value="{{$data->nomor_sp2d}}"></td>
            </tr>
            <tr>
                <td>Nilai Belanja</td>
                <td><input type="text" name="nilai_sp2d" class="form-control" placeholder="Nilai Belanja" value="{{$data->nilai_sp2d}}"></td>
            </tr>
            <tr>
                <td>Uraian Transaksi</td>
                <td><input type="text" name="uraian_transaksi" class="form-control" placeholder="Masukan Uraian Transaksi" value="{{$data->uraian_transaksi}}"></td>
            </tr>
            <tr>
                <td>Nilai Transaksi</td>
                <td><input type="number" name="nilai_transaksi" class="form-control" placeholder="Masukan Nilai Transaksi" value="{{$data->nilai_transaksi}}"></td>
            </tr>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
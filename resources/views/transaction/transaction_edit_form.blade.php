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
                <td><input type="text" class="form-control" disabled value="{{$data->skpd}}"></td>
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
                <td><input type="text" id="currency" name="nilai_spd" class="form-control" placeholder="Nilai Belanja" value="{{$data->nilai_spd}}"></td>
            </tr>
            <tr>
                <td>Uraian SPM/SPD</td>
                <td><input type="text" name="uraian_spd" class="form-control" placeholder="Masukan Uraian SPM/SPD" value="{{$data->uraian_spd}}"></td>
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
                <td><input type="text" id="currency" name="nilai_sp2d" class="form-control" placeholder="Nilai Belanja" value="{{$data->nilai_sp2d}}"></td>
            </tr>
            <tr>
                <td colspan="2" class="table-success"><b>TRANSAKSI</b></td>
            </tr>
            <tr>
                <td>Uraian Transaksi</td>
                <td><input type="text" name="uraian_transaksi" class="form-control" placeholder="Masukan Uraian Transaksi" value="{{$data->uraian_transaksi}}"></td>
            </tr>
            <tr>
                <td>Nilai Transaksi</td>
                <td><input type="text" id="currency" name="nilai_transaksi" class="form-control" placeholder="Masukan Nilai Transaksi" value="{{$data->nilai_transaksi}}"></td>
            </tr>
            <!-- PPN -->
            <tr>
                <td colspan="2" class="table-success"><b>Potongan Pajak PPN</b></td>
            </tr>
            <tr>
                <td>Jenis Pajak</td>
                <td><input type="text" class="form-control" placeholder="Jenis Pajak" name="ppn_jenis" value="{{$data->ppn_jenis}}"></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td><input type="text" id="currency" class="form-control" placeholder="Jumlah" name="ppn_jumlah" value="{{$data->ppn_jumlah}}"></td>
            </tr>
            <tr>
                <td>NTPN</td>
                <td><input type="text" class="form-control" placeholder="NTPN" name="ppn_ntpn" value="{{$data->ppn_ntpn}}"></td>
            </tr>
            <!-- PPH21 -->
            <tr>
                <td colspan="2" class="table-success"><b>Potongan Pajak PPH21</b></td>
            </tr>
            <tr>
                <td>Jenis Pajak</td>
                <td><input type="text" class="form-control" placeholder="Jenis Pajak" name="pph21_jenis" value="{{$data->pph21_jenis}}"></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td><input type="text" id="currency" class="form-control" placeholder="Jumlah" name="pph21_jumlah" value="{{$data->pph21_jumlah}}"></td>
            </tr>
            <tr>
                <td>NTPN</td>
                <td><input type="text" class="form-control" placeholder="NTPN" name="pph21_ntpn" value="{{$data->pph21_ntpn}}"></td>
            </tr>
            <!-- PPH22 -->
            <tr>
                <td colspan="2" class="table-success"><b>Potongan Pajak PPH22</b></td>
            </tr>
            <tr>
                <td>Jenis Pajak</td>
                <td><input type="text" class="form-control" placeholder="Jenis Pajak" name="pph22_jenis" value="{{$data->pph22_jenis}}"></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td><input type="text" id="currency" class="form-control" placeholder="Jumlah" name="pph22_jumlah" value="{{$data->pph22_jumlah}}"></td>
            </tr>
            <tr>
                <td>NTPN</td>
                <td><input type="text" class="form-control" placeholder="NTPN" name="pph22_ntpn" value="{{$data->pph22_ntpn}}"></td>
            </tr>
            <!-- PPH23 -->
            <tr>
                <td colspan="2" class="table-success"><b>Potongan Pajak PPH23</b></td>
            </tr>
            <tr>
                <td>Jenis Pajak</td>
                <td><input type="text" class="form-control" placeholder="Jenis Pajak" name="pph23_jenis" value="{{$data->pph23_jenis}}"></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td><input type="text" id="currency" class="form-control" placeholder="Jumlah" name="pph23_jumlah" value="{{$data->pph23_jumlah}}"></td>
            </tr>
            <tr>
                <td>NTPN</td>
                <td><input type="text" class="form-control" placeholder="NTPN" name="pph23_ntpn" value="{{$data->pph23_ntpn}}"></td>
            </tr>
            <!-- PPHFIN -->
            <tr>
                <td colspan="2" class="table-success"><b>Potongan Pajak PPHFIN</b></td>
            </tr>
            <tr>
                <td>Jenis Pajak</td>
                <td><input type="text" class="form-control" placeholder="Jenis Pajak" name="pphfin_jenis" value="{{$data->pphfin_jenis}}"></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td><input type="text" id="currency" class="form-control" placeholder="Jumlah" name="pphfin_jumlah" value="{{$data->pphfin_jumlah}}"></td>
            </tr>
            <tr>
                <td>NTPN</td>
                <td><input type="text" class="form-control" placeholder="NTPN" name="pphfin_ntpn" value="{{$data->pphfin_ntpn}}"></td>
            </tr>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
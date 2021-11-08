<form method="POST" action="/transaction/store">
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
                        <option>LS</option>
                        <option>GU</option>
                        <option>TU Nihil</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>No. Urut</td>
                <td><input type="text" name="no_urut" class="form-control" value="{{old('no_urut')}}" require></td>
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
                <td><input type="text" value="{{old('nomor_spd')}}" name="nomor_spd" class="form-control" placeholder="Nomor"></td>
            </tr>
            <tr>
                <td>Nilai Belanja</td>
                <td><input type="text" name="nilai_spd" class="form-control" placeholder="Nilai Belanja"></td>
            </tr>
            <tr>
                <td>Uraian SPM/SPD</td>
                <td><input type="text" name="uraian_spd" class="form-control" placeholder="Masukan Uraian SPM/SPD"></td>
            </tr>
            <tr>
                <td colspan="2" class="table-success"><b>SP2D</b></td>
            </tr>
            <tr>
                <td>Nomor</td>
                <td><input type="text" name="nomor_sp2d" class="form-control" placeholder="Nomor"></td>
            </tr>
            <tr>
                <td>Nilai Belanja</td>
                <td><input type="text" name="nilai_sp2d" class="form-control" placeholder="Nilai Belanja"></td>
            </tr>
            <tr>
                <td colspan="2" class="table-success"><b>TRANSAKSI</b></td>
            </tr>
            <tr>
                <td>Uraian Transaksi</td>
                <td><input type="text" name="uraian_transaksi" class="form-control" placeholder="Masukan Uraian Transaksi"></td>
            </tr>
            <tr>
                <td>Nilai Transaksi</td>
                <td><input type="text" name="nilai_transaksi" class="form-control" placeholder="Masukan Nilai Transaksi"></td>
            </tr>
            <!-- PPN -->
            <tr>
                <td colspan="2" class="table-success"><b>POTONGAN PAJAK PPN</b></td>
            </tr>
            <tr>
                <td>JENIS PAJAK</td>
                <td><input type="text" class="form-control" placeholder="Jenis Pajak" name="ppn_jenis"></td>
            </tr>
            <tr>
                <td>JUMLAH</td>
                <td><input type="number" class="form-control" placeholder="Jumlah" name="ppn_jumlah"></td>
            </tr>
            <tr>
                <td>NTPN</td>
                <td><input type="text" class="form-control" placeholder="NTPN" name="ppn_ntpn"></td>
            </tr>
            <!-- PPH21 -->
            <tr>
                <td colspan="2" class="table-success"><b>POTONGAN PAJAK PPH21</b></td>
            </tr>
            <tr>
                <td>JENIS PAJAK</td>
                <td><input type="text" class="form-control" placeholder="Jenis Pajak" name="pph21_jenis"></td>
            </tr>
            <tr>
                <td>JUMLAH</td>
                <td><input type="number" class="form-control" placeholder="Jumlah" name="pph21_jumlah"></td>
            </tr>
            <tr>
                <td>NTPN</td>
                <td><input type="text" class="form-control" placeholder="NTPN" name="pph21_ntpn"></td>
            </tr>
            <!-- PPH22 -->
            <tr>
                <td colspan="2" class="table-success"><b>POTONGAN PAJAK PPH22</b></td>
            </tr>
            <tr>
                <td>JENIS PAJAK</td>
                <td><input type="text" class="form-control" placeholder="Jenis Pajak" name="pph22_jenis"></td>
            </tr>
            <tr>
                <td>JUMLAH</td>
                <td><input type="number" class="form-control" placeholder="Jumlah" name="pph22_jumlah"></td>
            </tr>
            <tr>
                <td>NTPN</td>
                <td><input type="text" class="form-control" placeholder="NTPN" name="pph22_ntpn"></td>
            </tr>
            <!-- PPH23 -->
            <tr>
                <td colspan="2" class="table-success"><b>POTONGAN PAJAK PPH23</b></td>
            </tr>
            <tr>
                <td>JENIS PAJAK</td>
                <td><input type="text" class="form-control" placeholder="Jenis Pajak" name="pph23_jenis"></td>
            </tr>
            <tr>
                <td>JUMLAH</td>
                <td><input type="number" class="form-control" placeholder="Jumlah" name="pph23_jumlah"></td>
            </tr>
            <tr>
                <td>NTPN</td>
                <td><input type="text" class="form-control" placeholder="NTPN" name="pph23_ntpn"></td>
            </tr>
            <!-- PPHFIN -->
            <tr>
                <td colspan="2" class="table-success"><b>POTONGAN PAJAK PPHFIN</b></td>
            </tr>
            <tr>
                <td>JENIS PAJAK</td>
                <td><input type="text" class="form-control" placeholder="Jenis Pajak" name="pphfin_jenis"></td>
            </tr>
            <tr>
                <td>JUMLAH</td>
                <td><input type="number" class="form-control" placeholder="Jumlah" name="pphfin_jumlah"></td>
            </tr>
            <tr>
                <td>NTPN</td>
                <td><input type="text" class="form-control" placeholder="NTPN" name="pphfin_ntpn"></td>
            </tr>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
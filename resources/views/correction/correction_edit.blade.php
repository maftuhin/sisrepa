<div class="card-header">
    <h4>Form Koreksi</h4>
</div>
<form method="POST" action="/correction/update/{{$id}}">
    @csrf
    <div class="card-body">
        <table class="form-group table-sm" style="width: 100%;">
            <!-- PPN -->
            <tr>
                <td colspan="2"><b>POTONGAN PAJAK PPN</b></td>
            </tr>
            <tr>
                <td>JENIS PAJAK</td>
                <td><input type="text" class="form-control" placeholder="Jenis Pajak" name="ppn_jenis" value="{{$data->c_ppn_jenis}}"></td>
            </tr>
            <tr>
                <td>JUMLAH</td>
                <td><input type="number" class="form-control" placeholder="Jumlah" name="ppn_jumlah" value="{{$data->c_ppn_jumlah}}"></td>
            </tr>
            <tr>
                <td>NTPN</td>
                <td><input type="text" class="form-control" placeholder="NTPN" name="ppn_ntpn" value="{{$data->c_ppn_ntpn}}"></td>
            </tr>
            <!-- PPH21 -->
            <tr>
                <td colspan="2"><b>POTONGAN PAJAK PPH21</b></td>
            </tr>
            <tr>
                <td>JENIS PAJAK</td>
                <td><input type="text" class="form-control" placeholder="Jenis Pajak" name="pph21_jenis" value="{{$data->c_pph21_jenis}}"></td>
            </tr>
            <tr>
                <td>JUMLAH</td>
                <td><input type="number" class="form-control" placeholder="Jumlah" name="pph21_jumlah" value="{{$data->c_pph21_jumlah}}"></td>
            </tr>
            <tr>
                <td>NTPN</td>
                <td><input type="text" class="form-control" placeholder="NTPN" name="pph21_ntpn" value="{{$data->c_pph21_ntpn}}"></td>
            </tr>
            <!-- PPH22 -->
            <tr>
                <td colspan="2"><b>POTONGAN PAJAK PPH22</b></td>
            </tr>
            <tr>
                <td>JENIS PAJAK</td>
                <td><input type="text" class="form-control" placeholder="Jenis Pajak" name="pph22_jenis" value="{{$data->c_pph22_jenis}}"></td>
            </tr>
            <tr>
                <td>JUMLAH</td>
                <td><input type="number" class="form-control" placeholder="Jumlah" name="pph22_jumlah" value="{{$data->c_pph22_jumlah}}"></td>
            </tr>
            <tr>
                <td>NTPN</td>
                <td><input type="text" class="form-control" placeholder="NTPN" name="pph22_ntpn" value="{{$data->c_pph22_ntpn}}"></td>
            </tr>
            <!-- PPH23 -->
            <tr>
                <td colspan="2"><b>POTONGAN PAJAK PPH23</b></td>
            </tr>
            <tr>
                <td>JENIS PAJAK</td>
                <td><input type="text" class="form-control" placeholder="Jenis Pajak" name="pph23_jenis" value="{{$data->c_pph23_jenis}}"></td>
            </tr>
            <tr>
                <td>JUMLAH</td>
                <td><input type="number" class="form-control" placeholder="Jumlah" name="pph23_jumlah" value="{{$data->c_pph23_jumlah}}"></td>
            </tr>
            <tr>
                <td>NTPN</td>
                <td><input type="text" class="form-control" placeholder="NTPN" name="pph23_ntpn" value="{{$data->c_pph23_ntpn}}"></td>
            </tr>
            <!-- PPHFIN -->
            <tr>
                <td colspan="2"><b>POTONGAN PAJAK PPHFIN</b></td>
            </tr>
            <tr>
                <td>JENIS PAJAK</td>
                <td><input type="text" class="form-control" placeholder="Jenis Pajak" name="pphfin_jenis" value="{{$data->c_pphfin_jenis}}"></td>
            </tr>
            <tr>
                <td>JUMLAH</td>
                <td><input type="number" class="form-control" placeholder="Jumlah" name="pphfin_jumlah" value="{{$data->c_pphfin_jumlah}}"></td>
            </tr>
            <tr>
                <td>NTPN</td>
                <td><input type="text" class="form-control" placeholder="NTPN" name="pphfin_ntpn" value="{{$data->c_pphfin_ntpn}}"></td>
            </tr>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
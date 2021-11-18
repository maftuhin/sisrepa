<div class="card-header">
    <h4>Data Asli</h4>
</div>
<div class="card-body">
    <table class="form-group table-sm" style="width: 100%;">
        <!-- PPN -->
        <tr>
            <td colspan="2"><b>Potongan Pajak PPN</b></td>
        </tr>
        <tr>
            <td>Jenis Pajak</td>
            <td><input class="form-control" value="{{$data->ppn_jenis}}" disabled></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td><input  class="form-control" value="@money($data->ppn_jumlah)" disabled></td>
        </tr>
        <tr>
            <td>NTPN</td>
            <td><input class="form-control" value="{{$data->ppn_ntpn}}" disabled></td>
        </tr>
        <!-- PPH21 -->
        <tr>
            <td colspan="2"><b>Potongan Pajak PPH21</b></td>
        </tr>
        <tr>
            <td>Jenis Pajak</td>
            <td><input class="form-control" value="{{$data->pph21_jenis}}" disabled></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td><input  class="form-control" value="@money($data->pph21_jumlah)" disabled></td>
        </tr>
        <tr>
            <td>NTPN</td>
            <td><input class="form-control" value="{{$data->pph21_ntpn}}" disabled></td>
        </tr>
        <!-- PPH22 -->
        <tr>
            <td colspan="2"><b>Potongan Pajak PPH22</b></td>
        </tr>
        <tr>
            <td>Jenis Pajak</td>
            <td><input class="form-control" value="{{$data->pph22_jenis}}" disabled></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td><input  class="form-control" value="@money($data->pph22_jumlah)" disabled></td>
        </tr>
        <tr>
            <td>NTPN</td>
            <td><input class="form-control" value="{{$data->pph22_ntpn}}" disabled></td>
        </tr>
        <!-- PPH23 -->
        <tr>
            <td colspan="2"><b>Potongan Pajak PPH23</b></td>
        </tr>
        <tr>
            <td>Jenis Pajak</td>
            <td><input class="form-control" value="{{$data->pph23_jenis}}" disabled></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td><input  class="form-control" value="@money($data->pph23_jumlah)" disabled></td>
        </tr>
        <tr>
            <td>NTPN</td>
            <td><input class="form-control" value="{{$data->pph23_ntpn}}" disabled></td>
        </tr>
        <!-- PPHFIN -->
        <tr>
            <td colspan="2"><b>Potongan Pajak PPHFIN</b></td>
        </tr>
        <tr>
            <td>Jenis Pajak</td>
            <td><input class="form-control" value="{{$data->pphfin_jenis}}" disabled></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td><input  class="form-control" value="@money($data->pphfin_jumlah)" disabled></td>
        </tr>
        <tr>
            <td>NTPN</td>
            <td><input class="form-control" value="{{$data->pphfin_ntpn}}" disabled></td>
        </tr>
    </table>
</div>
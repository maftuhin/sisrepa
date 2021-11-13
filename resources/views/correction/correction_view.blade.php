<div class="card-header">
    <h1>Data Asli</h1>
</div>
<div class="card-body">
    <table class="form-group table-sm" style="width: 100%;">
        <!-- PPN -->
        <tr>
            <td colspan="2"><b>POTONGAN PAJAK PPN</b></td>
        </tr>
        <tr>
            <td>JENIS PAJAK</td>
            <td><input class="form-control" value="{{$data->ppn_jenis}}" disabled></td>
        </tr>
        <tr>
            <td>JUMLAH</td>
            <td><input  class="form-control" value="@money($data->ppn_jumlah)" disabled></td>
        </tr>
        <tr>
            <td>NTPN</td>
            <td><input class="form-control" value="{{$data->ppn_ntpn}}" disabled></td>
        </tr>
        <!-- PPH21 -->
        <tr>
            <td colspan="2"><b>POTONGAN PAJAK PPH21</b></td>
        </tr>
        <tr>
            <td>JENIS PAJAK</td>
            <td><input class="form-control" value="{{$data->pph21_jenis}}" disabled></td>
        </tr>
        <tr>
            <td>JUMLAH</td>
            <td><input  class="form-control" disabled></td>
        </tr>
        <tr>
            <td>NTPN</td>
            <td><input class="form-control" value="{{$data->pph21_ntpn}}" disabled></td>
        </tr>
        <!-- PPH22 -->
        <tr>
            <td colspan="2"><b>POTONGAN PAJAK PPH22</b></td>
        </tr>
        <tr>
            <td>JENIS PAJAK</td>
            <td><input class="form-control" disabled></td>
        </tr>
        <tr>
            <td>JUMLAH</td>
            <td><input  class="form-control" disabled></td>
        </tr>
        <tr>
            <td>NTPN</td>
            <td><input class="form-control" disabled></td>
        </tr>
        <!-- PPH23 -->
        <tr>
            <td colspan="2"><b>POTONGAN PAJAK PPH23</b></td>
        </tr>
        <tr>
            <td>JENIS PAJAK</td>
            <td><input class="form-control" disabled></td>
        </tr>
        <tr>
            <td>JUMLAH</td>
            <td><input  class="form-control" disabled></td>
        </tr>
        <tr>
            <td>NTPN</td>
            <td><input class="form-control" disabled></td>
        </tr>
        <!-- PPHFIN -->
        <tr>
            <td colspan="2"><b>POTONGAN PAJAK PPHFIN</b></td>
        </tr>
        <tr>
            <td>JENIS PAJAK</td>
            <td><input class="form-control" disabled></td>
        </tr>
        <tr>
            <td>JUMLAH</td>
            <td><input  class="form-control" disabled></td>
        </tr>
        <tr>
            <td>NTPN</td>
            <td><input class="form-control" disabled></td>
        </tr>
    </table>
</div>
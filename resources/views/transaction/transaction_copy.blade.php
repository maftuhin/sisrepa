<form method="POST" action="/transaction/copy/{{$data->id}}">
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
                <td>No. Urut</td>
                <td><input type="text" name="no_urut" class="form-control" value="{{old('no_urut')}}" require></td>
            </tr>
            <tr>
                <td colspan="2" class="table-success"><b>SP2D</b></td>
            </tr>
            <tr>
                <td>Nomor</td>
                <td><input type="text" class="form-control" placeholder="Nomor" value="{{$data->nomor_sp2d}}" disabled></td>
            </tr>
            <tr>
                <td>Nilai Belanja</td>
                <td><input type="text" class="form-control" placeholder="Nilai Belanja" value="{{$data->nilai_sp2d}}" disabled></td>
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
                <td><input type="number" name="nilai_transaksi" class="form-control" placeholder="Masukan Nilai Transaksi"></td>
            </tr>
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
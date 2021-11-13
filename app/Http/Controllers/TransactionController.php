<?php

namespace App\Http\Controllers;

use App\Exports\TransactionsExport;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web', ['except' => ['list']]);
    }

    function index()
    {
        $me = Auth::user();
        if ($me->role == "admin") {
            $data = Transaction::select('transactions.*', 'skpd.skpd')
                ->leftJoin('skpd', 'skpd.id', 'transactions.skpd_id')
                ->paginate(20);
        } else {
            $data = Transaction::select('transactions.*', 'skpd.skpd')
                ->join('skpd', 'skpd.id', 'transactions.skpd_id')
                ->where('transactions.skpd_id', $me->skpd)
                ->paginate(20);
        }

        return view('transaction.list', [
            'data' => $data,
            'user' => $me,
        ]);
    }

    function create()
    {
        $id = Auth::id();
        $user = User::select('skpd.*')
            ->where('users.id', $id)
            ->join('skpd', 'skpd.id', 'users.skpd')
            ->first();

        return view('transaction.create', [
            'user' => $user
        ]);
    }

    function store(Request $request)
    {
        $me = Auth::user();
        $validated = $request->validate([
            'trx' => 'required',
            'no_urut' => 'required',
            'nomor_spd' => 'required',
            'nilai_spd' => 'required',
            'uraian_spd' => '',
            'nomor_sp2d' => 'required',
            'nilai_sp2d' => 'required',
            'nilai_transaksi' => 'required|integer',
            'uraian_transaksi' => 'required',
            'ppn_jenis' => '',
            'ppn_jumlah' => '',
            'ppn_ntpn' => '',
            'pph21_jenis' => '',
            'pph21_jumlah' => '',
            'pph21_ntpn' => '',
            'pph22_jenis' => '',
            'pph22_jumlah' => '',
            'pph22_ntpn' => '',
            'pph23_jenis' => '',
            'pph23_jumlah' => '',
            'pph23_ntpn' => '',
            'pphfin_jenis' => '',
            'pphfin_jumlah' => '',
            'pphfin_ntpn' => '',
        ], [
            'nomor_spd.required' => 'Nomor SPD Wajib Diisi',
            'nilai_spd.required' => 'Nilai SPD Wajib Diisi',
            'no_urut.required' => 'Nomor Urut Wajib Diisi',
            'nilai_transaksi.required' => 'Nilai Transaksi Wajib Diisi',
            'nilai_transaksi.integer' => 'Nilai Transaksi Harus Angka',
        ]);

        $store = Transaction::insert([
            'trx' => $validated['trx'],
            'no_urut' => $validated['no_urut'],
            'skpd_id' => $me->skpd,
            'nilai_transaksi' => $validated['nilai_transaksi'],
            'uraian_transaksi' => $validated['uraian_transaksi'],
            'nilai_spd' => $validated['nilai_spd'],
            'nomor_spd' => $validated['nomor_spd'],
            'uraian_spd' => $validated['uraian_spd'],
            'nomor_sp2d' => $validated['nomor_sp2d'],
            'nilai_sp2d' => $validated['nilai_sp2d'],
            'ppn_jenis' => $validated['ppn_jenis'],
            'ppn_jumlah' => $validated['ppn_jumlah'],
            'ppn_ntpn' => $validated['ppn_ntpn'],
            'pph21_jenis' => $validated['pph21_jenis'],
            'pph21_jumlah' => $validated['pph21_jumlah'],
            'pph21_ntpn' => $validated['pph21_ntpn'],
            'pph22_jenis' => $validated['pph22_jenis'],
            'pph22_jumlah' => $validated['pph22_jumlah'],
            'pph22_ntpn' => $validated['pph22_ntpn'],
            'pph23_jenis' => $validated['pph23_jenis'],
            'pph23_jumlah' => $validated['pph23_jumlah'],
            'pph23_ntpn' => $validated['pph23_ntpn'],
            'pphfin_jenis' => $validated['pphfin_jenis'],
            'pphfin_jumlah' => $validated['pphfin_jumlah'],
            'pphfin_ntpn' => $validated['pphfin_ntpn'],
        ]);
        if ($store == 1) {
            return redirect("/transaction");
        }
        return $store;
    }

    function edit($id)
    {
        $trx = ['LS', 'GU', 'TU Nihil'];
        $me = auth()->user();
        $user = User::select('skpd.*')
            ->where('users.id', $me->id)
            ->join('skpd', 'skpd.id', 'users.skpd')
            ->first();
        $data = Transaction::select("transactions.*", "skpd.skpd")
            ->where('transactions.id', $id)
            ->join('skpd', 'skpd.id', 'transactions.skpd_id')
            ->first();
        return view('transaction.edit', [
            'data' => $data,
            'user' => $user,
            'trx' => $trx
        ]);
    }

    function update(Request $request, $id)
    {
        $validated = $request->validate([
            'trx' => 'required',
            'no_urut' => 'required',
            'nomor_spd' => 'required',
            'nilai_spd' => 'required|integer',
            'uraian_spd' => '',
            'nomor_sp2d' => 'nullable',
            'nilai_sp2d' => 'nullable|integer',
            'nilai_transaksi' => 'required|integer',
            'uraian_transaksi' => 'required',
            'ppn_jenis' => '',
            'ppn_jumlah' => 'integer',
            'ppn_ntpn' => '',
            'pph21_jenis' => '',
            'pph21_jumlah' => 'nullable|integer',
            'pph21_ntpn' => '',
            'pph22_jenis' => '',
            'pph22_jumlah' => 'nullable|integer',
            'pph22_ntpn' => '',
            'pph23_jenis' => '',
            'pph23_jumlah' => 'nullable|integer',
            'pph23_ntpn' => '',
            'pphfin_jenis' => '',
            'pphfin_jumlah' => 'nullable|integer',
            'pphfin_ntpn' => '',
        ]);

        $update = Transaction::where('id', $id)
            ->update([
                'trx' => $validated['trx'],
                'no_urut' => $validated['no_urut'],
                'nomor_spd' => $validated['nomor_spd'],
                'nilai_spd' => $validated['nilai_spd'],
                'uraian_spd' => $validated['uraian_spd'],
                'nomor_sp2d' => $validated['nomor_sp2d'],
                'nilai_sp2d' => $validated['nilai_sp2d'],
                'uraian_transaksi' => $validated['uraian_transaksi'],
                'nilai_transaksi' => $validated['nilai_transaksi'],
                'ppn_jenis' => $validated['ppn_jenis'],
                'ppn_jumlah' => $validated['ppn_jumlah'],
                'ppn_ntpn' => $validated['ppn_ntpn'],
                'pph21_jenis' => $validated['pph21_jenis'],
                'pph21_jumlah' => $validated['pph21_jumlah'],
                'pph21_ntpn' => $validated['pph21_ntpn'],
                'pph22_jenis' => $validated['pph22_jenis'],
                'pph22_jumlah' => $validated['pph22_jumlah'],
                'pph22_ntpn' => $validated['pph22_ntpn'],
                'pph23_jenis' => $validated['pph23_jenis'],
                'pph23_jumlah' => $validated['pph23_jumlah'],
                'pph23_ntpn' => $validated['pph23_ntpn'],
                'pphfin_jenis' => $validated['pphfin_jenis'],
                'pphfin_jumlah' => $validated['pphfin_jumlah'],
                'pphfin_ntpn' => $validated['pphfin_ntpn'],
            ]);
        if ($update == 1) {
            return redirect('/transaction')->with('success', 'Data Berhasil Diubah');
        }
        return $update;
    }

    function duplicate($id)
    {
        $me = auth()->user();
        $user = User::select('skpd.*')
            ->where('users.id', $me->id)
            ->join('skpd', 'skpd.id', 'users.skpd')
            ->first();
        $data = Transaction::where('id', $id)
            ->first();
        return view('transaction.duplicate', [
            'data' => $data,
            'user' => $user,
        ]);
    }

    function copy(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        $count = Transaction::where('nomor_spd', $transaction->nomor_spd)
            ->sum('nilai_transaksi');
        $limit = $transaction->nilai_spd - $count;

        $validated = $request->validate([
            'no_urut' => 'required',
            'uraian_transaksi' => 'required',
            'nilai_transaksi' => 'required|numeric|max:' . $limit
        ], [
            'nilai_transaksi.max' => 'Nilai Transaksi Tidak Boleh lebih dari Rp.' . number_format($limit, 0, ',', '.'),
            'uraian_transaksi.required'
        ]);

        $new = $transaction->replicate();
        $new->no_urut = $validated['no_urut'];
        $new->uraian_transaksi = $validated['uraian_transaksi'];
        $new->nilai_transaksi = $validated['nilai_transaksi'];
        $save = $new->save();
        if ($save == 1) {
            return redirect('/transaction');
        }
        return $save;
    }

    function destroy($id)
    {
        $delete = Transaction::where('id', $id)->delete();
        if ($delete == 1) {
            return redirect('transaction')->with('success', 'Data Berhasil Dihapus');
        } else {
            return response($delete);
        }
    }

    function export()
    {
        $date = Carbon::now()->isoFormat('YYYY-MM-DD h:m');
        return (new TransactionsExport)->download('Transactions-' . $date . '.xlsx');
    }
}

<?php

namespace App\Http\Controllers;

use App\Exports\TransactionsExport;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
            'nomor_spd' => 'required',
            'nilai_spd' => 'required',
            'nomor_sp2d' => 'required',
            'nilai_sp2d' => 'required',
            'nilai_transaksi' => 'required',
            'uraian_transaksi' => 'required',
            'no_urut' => 'required'
        ], [
            'nomor_spd.required' => 'Nomor SPD Wajib Diisi',
            'nilai_spd.required' => 'Nilai SPD Wajib Diisi',
            'no_urut.required' => 'Nomor Urut Wajib Diisi',
            'nilai_transaksi.required' => 'Nilai Transaksi Wajib Diisi'
        ]);

        $store = Transaction::insert([
            'trx' => $validated['trx'],
            'no_urut' => $validated['no_urut'],
            'skpd_id' => $me->skpd,
            'nilai_transaksi' => $validated['nilai_transaksi'],
            'uraian_transaksi' => $validated['uraian_transaksi'],
            'nilai_spd' => $validated['nilai_spd'],
            'nomor_spd' => $validated['nomor_spd'],
            'nomor_sp2d' => $validated['nomor_sp2d'],
            'nilai_sp2d' => $validated['nilai_sp2d']
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
        $data = Transaction::where('id', $id)
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
            'uraian_transaksi' => 'required',
            'nomor_spd' => 'required',
            'trx' => 'required',
            'nomor_sp2d' => 'nullable',
            'nilai_sp2d' => 'nullable',
            'no_urut' => 'required',
        ]);

        $update = Transaction::where('id', $id)
            ->update([
                'trx' => $validated['trx'],
                'no_urut' => $validated['no_urut'],
                'nomor_spd' => $validated['nomor_spd'],
                'nomor_sp2d' => $validated['nomor_sp2d'],
                'nilai_sp2d' => $validated['nilai_sp2d'],
                'uraian_transaksi' => $validated['uraian_transaksi'],
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
        $validated = $request->validate([
            'uraian_transaksi' => 'required',
            'nilai_transaksi' => 'required'
        ]);
        $transaction = Transaction::find($id);
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
        return (new TransactionsExport)->download('transaction-list.xlsx');
    }
}

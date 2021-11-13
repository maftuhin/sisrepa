<?php

namespace App\Http\Controllers;

use App\Models\Correction;
use Illuminate\Http\Request;

class CorrectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $correction = Correction::where('trx_id', $id)->first();
        if ($correction != null) {
            return view('correction.c_view', [
                'data' => $correction
            ]);
        } else {
            return view('correction.c_create', [
                'id' => $id
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'ppn_jenis' => '',
            'ppn_jumlah' => 'integer',
            'ppn_ntpn' => '',
            'pph21_jenis' => '',
            'pph21_jumlah' => 'integer',
            'pph21_ntpn' => '',
            'pph22_jenis' => '',
            'pph22_jumlah' => 'integer',
            'pph22_ntpn' => '',
            'pph23_jenis' => '',
            'pph23_jumlah' => 'integer',
            'pph23_ntpn' => '',
            'pphfin_jenis' => '',
            'pphfin_jumlah' => 'integer',
            'pphfin_ntpn' => '',
        ]);

        $insert = Correction::insert([
            'trx_id' => $id,
            'c_ppn_jenis' => $validated['ppn_jenis'],
            'c_ppn_jumlah' => $validated['ppn_jumlah'],
            'c_ppn_ntpn' => $validated['ppn_ntpn'],
            'c_pph21_jenis' => $validated['pph21_jenis'],
            'c_pph21_jumlah' => $validated['pph21_jumlah'],
            'c_pph21_ntpn' => $validated['pph21_ntpn'],
            'c_pph22_jenis' => $validated['pph22_jenis'],
            'c_pph22_jumlah' => $validated['pph22_jumlah'],
            'c_pph22_ntpn' => $validated['pph22_ntpn'],
            'c_pph23_jenis' => $validated['pph23_jenis'],
            'c_pph23_jumlah' => $validated['pph23_jumlah'],
            'c_pph23_ntpn' => $validated['pph23_ntpn'],
            'c_pphfin_jenis' => $validated['pphfin_jenis'],
            'c_pphfin_jumlah' => $validated['pphfin_jumlah'],
            'c_pphfin_ntpn' => $validated['pphfin_ntpn'],
        ]);
        if ($insert == 1) {
            return redirect('/transaction');
        }
        return $insert;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'ppn_jenis' => '',
            'ppn_jumlah' => 'integer',
            'ppn_ntpn' => '',
            'pph21_jenis' => '',
            'pph21_jumlah' => 'integer',
            'pph21_ntpn' => '',
            'pph22_jenis' => '',
            'pph22_jumlah' => 'integer',
            'pph22_ntpn' => '',
            'pph23_jenis' => '',
            'pph23_jumlah' => 'integer',
            'pph23_ntpn' => '',
            'pphfin_jenis' => '',
            'pphfin_jumlah' => 'integer',
            'pphfin_ntpn' => '',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Exports\SKPDExport;
use App\Models\Skpd;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SkpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Skpd::all();
        return view('skpd.skpd_list', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skpd.skpd_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'skpd' => 'required|unique:skpd'
        ], [
            'skpd.required' => 'Nama SKPD Wajib Diisi',
            'skpd.unique' => 'SKPD Dengan Nama tersebut sudah ada'
        ]);
        $insert = Skpd::insert(
            ['skpd' => $validated['skpd']]
        );
        if ($insert == 1) {
            return redirect('/skpd');
        } else {
            return response($insert);
        }
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
        $skpd = Skpd::where('id', $id)->first();
        return view('skpd.skpd_edit', ['data' => $skpd]);
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
            'skpd' => 'required'
        ], [
            'skpd.required' => 'Nama SKPD Wajib Diisi',
        ]);
        $update = Skpd::where('id', $id)->update([
            'skpd' => $validated['skpd']
        ]);
        if ($update == 1) {
            return redirect('/skpd');
        } else {
            return response($update);
        }
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

    public function export()
    {
        $date = Carbon::now()->isoFormat('YYYY-MM-DD h:m');
        return (new SKPDExport)->download('skpd-' . $date . '.xlsx');
    }
}

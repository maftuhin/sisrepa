<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\Skpd;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role != 'admin') {
            return redirect('/');
        }
        $data = User::select('users.*', 'skpd.skpd')
            ->join('skpd', 'users.skpd', 'skpd.id')
            ->orderBy('name', 'ASC')
            ->get();
        return view('user.user_list', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = ['Admin', 'Editor'];
        $skpd = Skpd::all();
        return view('user.user_create', [
            'skpd' => $skpd,
            'role' => $role
        ]);
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
            'email' => 'required|unique:users',
            'name' => 'required',
            'password' => 'required',
            'skpd' => 'required',
            'role' => 'required',
        ], [
            'name.required' => 'Nama Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
        ]);
        $store = User::insert([
            'name' => $validated['name'],
            'password' => Hash::make($validated['password']),
            'email' => $validated['email'],
            'skpd' => $validated['skpd'],
            'role' => $validated['role']
        ]);
        if ($store == 1) {
            return redirect('/users')->with('success', 'User Telah Berhasil Dibuat.');
        } else {
            Session::flash('error', $store);
            return redirect()->route('login');
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
        $user = User::where('id', $id)->first();
        return view('user.user_edit', [
            'user' => $user
        ]);
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
            'email' => 'required|unique:users,email,' . $id,
            'name' => 'required',
        ]);
        $update = User::where('id', $id)
            ->update([
                'name' => $validated['name'],
                'email' => $validated['email']
            ]);
        if ($update == 1) {
            return redirect('/users')->with('success', 'User Telah Berhasil Diupdate');
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
        return (new UsersExport)->forRole('editor')->download('user-list.xlsx');
        // return Excel::download(new UsersExport, 'users.xlsx');
    }
}

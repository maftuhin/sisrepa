<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    //
    function index()
    {
        $me = auth()->user();
        if ($me->role == 'admin') {
            $trx = Transaction::count();
        } else {
            $trx = Transaction::where('skpd_id', $me->skpd)->count();
        }
        return view('home.dashboard', [
            'trx' => $trx
        ]);
    }
}

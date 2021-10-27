<?php

namespace App\Http\Controllers;

use App\Models\Skpd;
use App\Models\Transaction;
use App\Models\User;
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
            $user = User::count();
            $skpd = Skpd::count();
            return view('home.dashboard', [
                'trx' => $trx,
                'user' => $user,
                'skpd' => $skpd,
                'role' => $me->role
            ]);
        } else {
            $trx = Transaction::where('skpd_id', $me->skpd)->count();
            return view('home.dashboard', [
                'trx' => $trx,
                'role' => $me->role
            ]);
        }
    }
}

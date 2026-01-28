<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class DashboardController extends Controller
{
    // dashboard utama
    public function index()
    {
        $transactions = Transaction::with('customer','user')
            ->latest()
            ->limit(10)
            ->get();

        return view('admin.dashboard', compact('transactions'));
    }

    public function transactions()
    {
        $transactions = Transaction::with('customer','user')
            ->latest()
            ->get();

        return view('admin.transaksi.index', compact('transactions'));
    }

    public function show($id)
    {
        $trx = Transaction::with('details','customer','user')
            ->findOrFail($id);

        return view('admin.transaksi.show', compact('trx'));
    }
}

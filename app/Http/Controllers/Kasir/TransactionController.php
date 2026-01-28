<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{
    Customer, Sparepart, Transaction,
    TransactionDetail, Setting
};

class TransactionController extends Controller
{
    public function create()
    {
        return view('kasir.transaction.create', [
            'spareparts' => Sparepart::all(),
            'serviceFee' => Setting::get('service_fee', 0)
        ]);
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {

            $customer = Customer::firstOrCreate(
                ['phone' => $request->phone],
                ['name' => $request->name]
            );

            $serviceFee = $request->is_service
                ? Setting::get('service_fee', 0)
                : 0;

            $trx = Transaction::create([
                'customer_id'   => $customer->id,
                'user_id'       => session('user.id'),
                'is_service'    => $request->is_service ? 1 : 0,
                'service_fee'   => $serviceFee,
                'payment_method'=> $request->payment_method,
                'total'         => 0,
            ]);

            $total = $serviceFee;

            foreach ($request->items as $item) {
                $sparepart = Sparepart::find($item['id']);

                $sparepart->decrement('stock', $item['qty']);

                TransactionDetail::create([
                    'transaction_id' => $trx->id,
                    'item_name'      => $sparepart->name,
                    'qty'            => $item['qty'],
                    'price'          => $sparepart->price,
                ]);

                $total += $item['qty'] * $sparepart->price;
            }

            $trx->update(['total' => $total]);
        });

        return redirect('/kasir')->with('success', 'Transaksi berhasil');
    }

    public function invoice($id)
    {
        $trx = Transaction::with('details','customer')->findOrFail($id);
        return view('kasir.transaction.invoice', compact('trx'));
    }
}
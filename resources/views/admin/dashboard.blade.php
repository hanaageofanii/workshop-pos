@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">History Pembayaran</h1>

<table class="w-full bg-white shadow rounded">
    <tr class="bg-gray-200">
        <th class="p-2">Tanggal</th>
        <th>Kasir</th>
        <th>Pelanggan</th>
        <th>Total</th>
    </tr>

    @foreach($transactions as $trx)
    <tr class="border-t">
        <td class="p-2">{{ $trx->created_at }}</td>
        <td>{{ $trx->user->name }}</td>
        <td>{{ $trx->customer->phone }}</td>
        <td>Rp {{ number_format($trx->total) }}</td>
    </tr>
    @endforeach
</table>
@endsection

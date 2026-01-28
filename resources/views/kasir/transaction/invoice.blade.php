@extends('layouts.kasir')

@section('content')
<h1 class="text-xl font-bold mb-4">Invoice</h1>

<p>Pelanggan: {{ $trx->customer->phone }}</p>

<ul class="mt-2">
@foreach($trx->details as $d)
<li>{{ $d->item_name }} x {{ $d->qty }}</li>
@endforeach
</ul>

@if($trx->service_fee > 0)
<p>Biaya Jasa: Rp {{ number_format($trx->service_fee) }}</p>
@endif

<p class="font-bold mt-2">
TOTAL: Rp {{ number_format($trx->total) }}
</p>
@endsection

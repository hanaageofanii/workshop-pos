@extends('layouts.kasir')

@section('content')
<h1 class="text-xl font-bold mb-4">Transaksi</h1>

<form method="POST">
@csrf

<input name="phone"
 class="border p-2 mb-2 block"
 placeholder="No HP Pelanggan">

<label class="block mb-2">
<input type="checkbox" name="is_service" value="1">
 Servis di tempat
</label>

<button class="bg-green-600 text-white p-2">
Proses Transaksi
</button>
</form>
@endsection

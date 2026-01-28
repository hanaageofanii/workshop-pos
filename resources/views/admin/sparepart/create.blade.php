@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">Tambah Sparepart</h1>

<form method="POST">
@csrf
<input name="name" class="border p-2 mb-2 block" placeholder="Nama">
<input name="price" class="border p-2 mb-2 block" placeholder="Harga">
<input name="stock" class="border p-2 mb-2 block" placeholder="Stok">

<button class="bg-green-600 text-white p-2">Simpan</button>
</form>
@endsection

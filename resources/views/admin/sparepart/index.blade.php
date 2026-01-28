@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">Sparepart</h1>

<a href="/admin/sparepart/create"
 class="bg-green-600 text-white p-2 rounded">
Tambah Sparepart
</a>

<table class="w-full mt-4 bg-white shadow">
<tr class="bg-gray-200">
    <th class="p-2">Nama</th>
    <th>Harga</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>

@foreach($spareparts as $sp)
<tr class="border-t">
    <td class="p-2">{{ $sp->name }}</td>
    <td>Rp {{ number_format($sp->price) }}</td>
    <td>{{ $sp->stock }}</td>
    <td>
        <a href="/admin/sparepart/{{ $sp->id }}/edit"
         class="text-blue-600">Edit</a>
    </td>
</tr>
@endforeach
</table>
@endsection

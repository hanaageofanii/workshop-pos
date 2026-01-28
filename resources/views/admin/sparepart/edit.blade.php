@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">Edit Sparepart</h1>

<form method="POST">
@csrf
@method('PUT')

<input name="name" value="{{ $sparepart->name }}" class="border p-2 mb-2 block">
<input name="price" value="{{ $sparepart->price }}" class="border p-2 mb-2 block">
<input name="stock" value="{{ $sparepart->stock }}" class="border p-2 mb-2 block">

<button class="bg-blue-600 text-white p-2">Update</button>
</form>
@endsection

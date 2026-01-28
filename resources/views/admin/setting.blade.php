@extends('layouts.admin')

@section('content')
<h1 class="text-xl font-bold mb-4">Setting Biaya Jasa</h1>

<form method="POST">
    @csrf
    <input type="number" name="service_fee"
        value="{{ $serviceFee }}"
        class="border p-2">

    <button class="bg-blue-600 text-white p-2 ml-2">
        Simpan
    </button>
</form>
@endsection

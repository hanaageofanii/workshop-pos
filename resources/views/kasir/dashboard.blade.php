@extends('layouts.kasir')

@section('content')
<h1 class="text-xl font-bold">
Selamat datang, {{ session('user.name') }}
</h1>
@endsection

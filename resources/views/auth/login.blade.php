@extends('layouts.auth')

@section('content')
<form method="POST" class="bg-white p-6 rounded shadow w-80">
    @csrf
    <h2 class="text-xl font-bold mb-4 text-center">Login Bengkel</h2>

    @if(session('error'))
        <p class="text-red-500 mb-2">{{ session('error') }}</p>
    @endif

    <input name="username"
        class="border p-2 w-full mb-3"
        placeholder="Username">

    <input type="password" name="password"
        class="border p-2 w-full mb-3"
        placeholder="Password">

    <button class="bg-blue-600 text-white w-full p-2 rounded">
        Login
    </button>
</form>
@endsection

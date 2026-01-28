@extends('layouts.auth')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 font-sans">

    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-lg overflow-hidden grid grid-cols-1 md:grid-cols-2">

        {{-- LEFT : BRAND --}}
        <div class="bg-blue-600 text-white p-12 flex flex-col justify-center">
            <div class="w-11 h-11 mb-6 rounded-xl bg-white/20 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 24 24"
                     class="w-6 h-6 text-white"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="1.8"
                     stroke-linecap="round"
                     stroke-linejoin="round">
                    <circle cx="12" cy="12" r="3"/>
                    <path d="M19.4 15a1.6 1.6 0 00.3 1.7l.1.1a2 2 0 01-2.8 2.8l-.1-.1a1.6 1.6 0 00-1.7-.3 1.6 1.6 0 00-1 1.5V21a2 2 0 01-4 0v-.1a1.6 1.6 0 00-1-1.5 1.6 1.6 0 00-1.7.3l-.1.1a2 2 0 01-2.8-2.8l.1-.1a1.6 1.6 0 00.3-1.7 1.6 1.6 0 00-1.5-1H3a2 2 0 010-4h.1a1.6 1.6 0 001.5-1 1.6 1.6 0 00-.3-1.7l-.1-.1a2 2 0 012.8-2.8l.1.1a1.6 1.6 0 001.7.3 1.6 1.6 0 001-1.5V3a2 2 0 014 0v.1a1.6 1.6 0 001 1.5 1.6 1.6 0 001.7-.3l.1-.1a2 2 0 012.8 2.8l-.1.1a1.6 1.6 0 00-.3 1.7 1.6 1.6 0 001.5 1H21a2 2 0 010 4h-.1a1.6 1.6 0 00-1.5 1z"/>
                </svg>
            </div>

            <h1 class="text-3xl font-bold mb-4">Bengkel POS</h1>
            <p class="text-blue-100 text-lg leading-relaxed">
                Sistem kasir bengkel untuk mengelola transaksi,
                servis, dan sparepart secara cepat dan rapi.
            </p>
        </div>

        {{-- RIGHT : LOGIN --}}
        <div class="p-12 flex flex-col justify-center">

            <h2 class="text-2xl font-semibold text-gray-800 text-center mb-2">
                Login
            </h2>
            <p class="text-gray-500 text-center mb-6">
                Masuk ke sistem Bengkel POS
            </p>

            <form method="POST" action="/login" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm text-gray-600 mb-2">
                        Username
                    </label>
                    <input
                        type="text"
                        name="username"
                        value="{{ old('username') }}"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300
                               focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <div>
                    <label class="block text-sm text-gray-600 mb-2">
                        Password
                    </label>
                    <input
                        type="password"
                        name="password"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300
                               focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                </div>

                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700
                           text-white font-semibold py-3 rounded-lg transition">
                    Login
                </button>
            </form>

            <p class="text-sm text-gray-400 mt-8 text-center">
                © {{ date('Y') }} Bengkel POS System
            </p>
        </div>
    </div>
</div>
@endsection

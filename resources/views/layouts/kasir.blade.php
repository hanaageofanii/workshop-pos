<!DOCTYPE html>
<html>
<head>
    <title>Kasir Bengkel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="flex">
    <aside class="w-64 bg-blue-700 text-white min-h-screen p-4">
        <h2 class="font-bold mb-4">KASIR</h2>
        <a href="/kasir" class="block mb-2">Dashboard</a>
        <a href="/kasir/transaksi" class="block mb-2">Transaksi</a>
        <a href="/logout" class="block mt-6 text-red-300">Logout</a>
    </aside>
    <main class="flex-1 p-6">
        @yield('content')
    </main>
</div>
</body>
</html>

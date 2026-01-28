<!DOCTYPE html>
<html>
<head>
    <title>Admin Bengkel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="flex">
    <aside class="w-64 bg-gray-800 text-white min-h-screen p-4">
        <h2 class="font-bold mb-4">ADMIN</h2>
        <a href="/admin" class="block mb-2">Dashboard</a>
        <a href="/admin/sparepart" class="block mb-2">Sparepart</a>
        <a href="/admin/setting" class="block mb-2">Setting</a>
        <a href="/logout" class="block mt-6 text-red-400">Logout</a>
    </aside>
    <main class="flex-1 p-6">
        @yield('content')
    </main>
</div>
</body>
</html>

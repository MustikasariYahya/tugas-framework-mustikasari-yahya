<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Akses Ditolak - POS Barokah Mart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white p-8 rounded-xl shadow-md text-center max-w-md w-full border border-gray-200">
        
        <h1 class="text-4xl font-extrabold text-gray-900 mb-2">403</h1>
        <h2 class="text-lg font-bold text-gray-700 mb-2">Akses Ditolak!</h2>
        <p class="text-gray-500 mb-6 text-sm">
            Maaf, Anda tidak memiliki izin untuk mengakses halaman ini. Halaman khusus untuk Admin.
        </p>
        <a href="{{ route('login') }}" class="inline-block bg-indigo-600 text-white px-5 py-2.5 rounded-lg font-medium text-sm hover:bg-indigo-700 transition duration-150">
            Kembali ke Login
        </a>
    </div>
</body>
</html>
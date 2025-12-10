<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Library System') }}</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Figtree', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center px-6 py-10 bg-gradient-to-br from-blue-100 via-white to-sky-200 text-gray-800">

    <!-- Card Container -->
    <div class="backdrop-blur-md bg-white/80 border border-blue-100 rounded-2xl shadow-xl p-8 w-full max-w-md space-y-6 transition-all">
        
        <!-- Logo & Heading -->
        <div class="text-center">
           
            <p class="mt-2 text-sm text-gray-600">Manage books, users, and records efficiently</p>
        </div>

        <!-- Dynamic Slot Content -->
        <div>
            {{ $slot }}
        </div>
    </div>

    <!-- Footer -->
    <footer class="absolute bottom-4 text-sm text-gray-500">
        &copy; {{ date('Y') }} {{ config('app.name', 'Library System') }}. All rights reserved.
    </footer>

</body>
</html>

{{-- resources/views/errors/404.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page Not Found - 404</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-700 flex items-center justify-center min-h-screen">
    <div class="text-center p-6 max-w-md">
        <h1 class="text-6xl font-bold text-red-500 mb-4">404</h1>
        <h2 class="text-2xl font-semibold mb-2">Oops! Page Not Found</h2>
        <p class="mb-6 text-gray-600">The page you're looking for doesn't exist or has been moved.</p>
        <a href="{{ url('/') }}" class="inline-block px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            Go to Homepage
        </a>
    </div>
</body>
</html>

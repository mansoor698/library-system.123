{{-- resources/views/components/admin-layout.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Library System</title>
     <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <nav class="bg-white shadow p-4 mb-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Admin Dashboard</h1>
            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline">User Dashboard</a>
        </div>
    </nav>
    
    <main class="container mx-auto px-4">
        {{ $slot }}
    </main>
</body>
</html>

@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-lg mt-12">
    <!-- Header -->
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold text-blue-800 mb-2">Register a New Borrower</h1>
        <p class="text-gray-600 text-base">Fill in the form below to add a new borrower to the system.</p>
    </div>

    <!-- Borrower Form -->
    <form action="{{ route('admin.borrowers.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Full Name</label>
            <input
                type="text"
                name="name"
                id="name"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                placeholder="Enter full name"
                required
            >
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email Address</label>
            <input
                type="email"
                name="email"
                id="email"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                placeholder="Enter email"
                required
            >
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
            <input
                type="password"
                name="password"
                id="password"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                placeholder="Enter a strong password"
                required
            >
        </div>

        <!-- Submit Button -->
        <div class="text-right">
            <button
                type="submit"
                class="bg-blue-700 hover:bg-blue-800 text-white font-medium px-6 py-2 rounded-lg transition duration-200"
            >
                Save Borrower
            </button>
        </div>
    </form>
</div>
@endsection

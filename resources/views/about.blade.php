@extends('layouts.app')

@section('content')
<div class="bg-white p-8 md:p-10 lg:p-12 rounded-2xl shadow-xl max-w-5xl mx-auto mt-10">

    <!-- Header Section -->
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-blue-800 mb-4">Our Mission</h1>
        <p class="text-base md:text-lg text-gray-600 leading-relaxed max-w-3xl mx-auto">
            At <span class="font-semibold text-blue-700">Library System</span>, our mission is to revolutionize traditional library management by offering a modern, digital solution. We aim to empower institutions with intuitive tools that streamline book management, user access, and borrowing processes — all with enhanced efficiency and accuracy.
        </p>
    </div>

    <!-- Why Choose Us Section -->
    <div class="text-center">
        <h2 class="text-3xl font-semibold text-blue-700 mb-4">Why Choose Us?</h2>
        <p class="text-sm md:text-base text-gray-600 max-w-3xl mx-auto mb-6">
            Our platform is crafted with simplicity, reliability, and scalability in mind — making it ideal for schools, universities, public libraries, and digital archives.
        </p>

        <ul class="text-left max-w-xl mx-auto text-gray-700 space-y-3 list-disc list-inside">
            <li><span class="font-semibold text-blue-800">Efficient Cataloging:</span> Seamlessly add, update, and organize books by title, author, category, and more.</li>
            <li><span class="font-semibold text-blue-800">Real-Time Tracking:</span> Instantly monitor borrowed, returned, and overdue items for better accountability.</li>
            <li><span class="font-semibold text-blue-800">Role-Based Access:</span> Securely manage users with distinct roles for administrators and students.</li>
            <li><span class="font-semibold text-blue-800">Powered by Laravel:</span> Built on a robust, secure, and scalable PHP framework trusted by developers worldwide.</li>
            <li><span class="font-semibold text-blue-800">Modern Responsive Design:</span> Enjoy a clean, mobile-friendly interface styled with Tailwind CSS for optimal user experience.</li>
        </ul>
    </div>

</div>
@endsection

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Community Print') }}</title>

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="{{ asset('css/styles.css?v4') }}">
        <!-- Scripts -->
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script>
            function onSubmit(token) {
                document.getElementById("printForm").submit();
            }
        </script>
    </head>
    <body class="bg-gray-50">
        <div class="min-h-screen flex flex-col">
            <!-- Navigation -->
            <nav class="bg-white shadow">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center h-16">
                        <div class="flex items-center">
                            <h1 class="text-2xl font-bold gradient-text">Community Print</h1>
                        </div>
                        <div class="flex gap-4">
                            @auth
                                <a href="{{ route('dashboard') }}" class="sign-in-btn">Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf
                                    <button type="submit" class="sign-in-btn">Sign Out</button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="sign-in-btn">Sign In</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>

            <div class="flex-1 w-full px-4 sm:px-6 lg:px-8 py-12">
                {{ $slot }}
            </div>

            <!-- Footer -->
            <footer class="gradient-bg text-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Community Print</h3>
                            <p class="text-blue-100">Simple wireless printing solutions for libraries.</p>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                            <ul class="space-y-2 text-blue-100">
                                <li><a href="{{ route('library.register.form') }}" class="hover:text-white transition">Register Library</a></li>
                                <li><a href="{{ route('login') }}" class="hover:text-white transition">Staff Login</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-4">Contact</h4>
                            <p class="text-blue-100">
                                <a href="mailto:webmaster@freewareforlibraries.org" class="hover:text-white transition">webmaster@freewareforlibraries.org</a>
                            </p>
                        </div>
                    </div>
                    <div class="border-t border-blue-500 pt-8 text-center text-blue-100">
                        <p>&copy; 2024 <a href="https://www.communityprint.org" class="hover:text-white transition">Community Print</a> - All rights reserved</p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>

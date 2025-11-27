<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Print</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css?v3') }}">
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
                            <a href="{{ route('dashboard') }}" class="text-gray-700 hover-gradient-text hover:gradient-text">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-gray-700 hover-gradient-text hover:gradient-text">Sign Out</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="gradient-border gradient-text hover:gradient-text px-4 py-2 rounded inline-block">Sign In</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="flex-1 gradient-bg text-white min-vh-96">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-80 flex items-center justify-center min-vh-96">
                <div class="text-center">
                    <h2 class="text-5xl font-bold mb-4">Simple Wireless Printing for Libraries</h2>
                    <p class="text-xl text-blue-100 mb-8">Enable patrons to print documents from anywhere.</p>
                    <div class="flex gap-4 justify-center">
                        <a href="{{ route('library.register.form') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:gradient-text transition">Register Your Library</a>
                        <a href="{{ route('login') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:gradient-text transition">Staff Login</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="bg-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h3 class="text-3xl font-bold text-center text-gray-900 mb-12">How It Works</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-gray-50 rounded-lg p-8 border border-gray-200">
                        <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mb-4 text-white text-xl font-bold">
                            1
                        </div>
                        <h4 class="text-lg font-semibold text-gray-900 mb-2">Register Your Library</h4>
                        <p class="text-gray-600">Set up your library account with basic information and create an admin account for management.</p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-gray-50 rounded-lg p-8 border border-gray-200">
                        <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mb-4 text-white text-xl font-bold">
                            2
                        </div>
                        <h4 class="text-lg font-semibold text-gray-900 mb-2">Manage Your Staff</h4>
                        <p class="text-gray-600">Create up to 5 staff accounts to manage print jobs and coordinate with your team.</p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-gray-50 rounded-lg p-8 border border-gray-200">
                        <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mb-4 text-white text-xl font-bold">
                            3
                        </div>
                        <h4 class="text-lg font-semibold text-gray-900 mb-2">Accept Print Jobs</h4>
                        <p class="text-gray-600">Patrons submit documents via your library's custom subdomain link instantly.</p>
                    </div>
                </div>
            </div>
        </section>
    <!-- Hosting Section -->
    <section class="bg-gray-100 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="hosting-text">
                    <h2 class="text-4xl font-bold gradient-text mb-6">Ready for More?</h2>
                    <p class="text-lg text-grey-700 mb-4">You're using the Community Print freeware edition – great for getting started! We also offer a privately hosted version with advanced features.</p>
                    <p class="text-lg text-grey-800 mb-4">Get professional hosting, advanced integrations, and dedicated support to take your print services to the next level.</p>
                    <p class="text-lg font-semibold text-grey-900">Perfect for libraries wanting enterprise-level features without the complexity.</p>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Enterprise Hosting</h3>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-start">
                            <span class="gradient-text font-bold mr-3">✓</span>
                            <span class="text-gray-700">Improved security</span>
                        </li>
                        <li class="flex items-start">
                            <span class="gradient-text font-bold mr-3">✓</span>
                            <span class="text-gray-700">Unlimited Staff Accounts and Admin Accounts</span>
                        </li>
                        <li class="flex items-start">
                            <span class="gradient-text font-bold mr-3">✓</span>
                            <span class="text-gray-700">Custom Integrations</span>
                        </li>
                        <li class="flex items-start">
                            <span class="gradient-text font-bold mr-3">✓</span>
                            <span class="text-gray-700">Advanced Reporting</span>
                        </li>
                        <li class="flex items-start">
                            <span class="gradient-text font-bold mr-3">✓</span>
                            <span class="text-gray-700">Priority Updates</span>
                        </li>
                    </ul>
                    <a href="mailto:webmaster@freewareforlibraries.org" class="w-full bg-gradient-to-r from-blue-600 to-blue-800 text-white px-6 py-3 rounded-lg font-semibold text-center hover:from-blue-700 hover:to-blue-900 transition">
                        Contact Us Today
                    </a>
                </div>
            </div>
        </div>
    </section>

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

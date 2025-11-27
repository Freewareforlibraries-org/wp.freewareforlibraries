<x-layouts.app>
<div class="max-w-2xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <!-- Breadcrumbs -->
    <div class="flex items-center gap-2 text-sm text-gray-600 mb-6">
        <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-700">Dashboard</a>
        <span class="text-gray-400">/</span>
        <a href="{{ route('library.dashboard') }}" class="text-blue-600 hover:text-blue-700">Library Admin</a>
        <span class="text-gray-400">/</span>
        <span class="text-gray-900">New Staff Account</span>
    </div>

    <div class="bg-white rounded-lg shadow border border-gray-200">
        <div class="px-6 py-5 border-b border-gray-200">
            <h1 class="text-2xl font-bold text-gray-900">Create Staff Account</h1>
            <p class="text-sm text-gray-600 mt-1">Staff accounts: {{ $staffCount }} of 5</p>
        </div>

        <div class="px-6 py-4">
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-md">
                    <h3 class="text-sm font-medium text-red-800 mb-2">Please correct the following errors:</h3>
                    <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('library.staff.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <div class="flex gap-3 pt-6 border-t border-gray-200">
                    <button type="submit" class="flex-1 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition font-medium">
                        Create Account
                    </button>
                    <a href="{{ route('library.dashboard') }}" class="flex-1 bg-gray-100 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-200 transition font-medium text-center">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
</x-layouts.app>

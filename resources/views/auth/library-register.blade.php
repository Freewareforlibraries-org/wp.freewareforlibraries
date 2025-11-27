<x-layouts.guest>
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-lg">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-900 text-center">Register Your Library</h2>
                <p class="mt-2 text-center text-sm text-gray-600">Get started with wireless printing in minutes</p>
            </div>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-md">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Please correct the following errors:</h3>
                        <ul class="mt-2 list-disc list-inside text-sm text-red-700">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('library.register') }}" class="space-y-4">
            @csrf

            <div>
                <label for="library_name" class="block text-sm font-medium text-gray-700">Library Name</label>
                <input type="text" name="library_name" id="library_name" value="{{ old('library_name') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div>
                <label for="contact_name" class="block text-sm font-medium text-gray-700">Contact Name</label>
                <input type="text" name="contact_name" id="contact_name" value="{{ old('contact_name') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div>
                <label for="contact_email" class="block text-sm font-medium text-gray-700">Contact Email</label>
                <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div>
                <label for="contact_phone" class="block text-sm font-medium text-gray-700">Contact Phone</label>
                <input type="tel" name="contact_phone" id="contact_phone" value="{{ old('contact_phone') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                    <input type="text" name="city" id="city" value="{{ old('city') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                    <input type="text" name="state" id="state" value="{{ old('state') }}" maxlength="2" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>

            <hr class="my-4">
            <p class="text-sm font-semibold text-gray-700">Admin Account Information</p>

            <div>
                <label for="admin_name" class="block text-sm font-medium text-gray-700">Admin Name</label>
                <input type="text" name="admin_name" id="admin_name" value="{{ old('admin_name') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div>
                <label for="admin_email" class="block text-sm font-medium text-gray-700">Admin Email</label>
                <input type="email" name="admin_email" id="admin_email" value="{{ old('admin_email') }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div>
                <label for="admin_password" class="block text-sm font-medium text-gray-700">Admin Password</label>
                <input type="password" name="admin_password" id="admin_password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <div>
                <label for="admin_password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="admin_password_confirmation" id="admin_password_confirmation" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <button type="submit" class="w-full py-3 px-4 rounded-lg text-white font-medium bg-blue-600 hover:bg-blue-700 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Register Library
            </button>

            <p class="mt-6 text-center text-sm text-gray-600">
                Already have an account? <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">Sign in here</a>
            </p>
        </form>
    </div>
</div>
</x-layouts.guest>

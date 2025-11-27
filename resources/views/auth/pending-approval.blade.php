<x-layouts.guest>
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="mb-8 text-center">
                <div class="mx-auto h-12 w-12 text-yellow-500 mb-4">
                    <svg fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900">Approval Pending</h2>
                <p class="mt-2 text-gray-600">Your account is awaiting administrator approval</p>
            </div>

            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                <p class="text-sm text-yellow-800">
                    Thank you for registering! Your library account has been submitted for review. An administrator will review your information and approve your account shortly. You'll receive an email notification once your account is approved.
                </p>
            </div>

            <div class="space-y-4 mb-6">
                <div class="flex items-start gap-3">
                    <svg class="h-5 w-5 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Check your email</p>
                        <p class="text-sm text-gray-600">We'll send a confirmation once your account is approved</p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <svg class="h-5 w-5 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Typical approval time</p>
                        <p class="text-sm text-gray-600">Usually within 24 business hours</p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <svg class="h-5 w-5 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Need help?</p>
                        <p class="text-sm text-gray-600">Contact <a href="mailto:webmaster@freewareforlibraries.org" class="text-blue-600 hover:text-blue-500 font-medium">webmaster@freewareforlibraries.org</a></p>
                    </div>
                </div>
            </div>

            <div class="border-t pt-6">
                <a href="{{ route('login') }}" class="w-full inline-flex justify-center items-center gap-2 bg-gray-100 text-gray-800 px-6 py-3 rounded-lg hover:bg-gray-200 transition font-medium">
                    Back to Login
                </a>
            </div>
        </div>
    </div>
</div>
</x-layouts.guest>

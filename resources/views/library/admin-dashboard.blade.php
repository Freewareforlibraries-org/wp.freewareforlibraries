<x-layouts.app>
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <!-- Header with Breadcrumbs -->
    <div class="mb-8">
        <div class="flex items-center gap-2 text-sm text-gray-600 mb-4">
            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:text-blue-700">Dashboard</a>
            <span class="text-gray-400">/</span>
            <span class="text-gray-900">{{ $library->name }}</span>
        </div>
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">{{ $library->name }}</h1>
                <p class="text-gray-600 mt-1">Library Administration Dashboard</p>
            </div>
            <div class="flex flex-col items-start sm:items-end gap-2">
                <div>
                    <p class="text-sm text-gray-600">Subdomain URL:</p>
                    <p class="text-sm font-mono bg-gray-100 px-3 py-1 rounded text-gray-900">{{ $library->slug }}.yourdomain.com</p>
                </div>
                <div>
                    @if($library->status === 'approved')
                        <span class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-800 text-sm font-medium">Approved</span>
                    @elseif($library->status === 'pending')
                        <span class="inline-block px-3 py-1 rounded-full bg-yellow-100 text-yellow-800 text-sm font-medium">Pending Approval</span>
                    @else
                        <span class="inline-block px-3 py-1 rounded-full bg-red-100 text-red-800 text-sm font-medium">Rejected</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-md">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-md">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Staff Accounts Section -->
        <div class="mb-8">
            <div class="bg-white rounded-lg shadow border border-gray-200">
                <div class="px-6 py-5 border-b border-gray-200 flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-900">Staff Accounts</h2>
                        <p class="text-sm text-gray-600 mt-1">{{ $staffUsers->count() }} of 5 accounts created</p>
                    </div>
                    @if($staffUsers->count() < 5)
                        <a href="{{ route('library.staff.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-sm font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Add Staff
                        </a>
                    @endif
                </div>
                <div class="px-6 py-6">
                    @if($staffUsers->isEmpty())
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-2a6 6 0 0112 0v2zm0 0h6v-2a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No staff accounts yet</h3>
                            <p class="mt-1 text-sm text-gray-500">Create your first staff account to get started managing prints.</p>
                            <div class="mt-6">
                                <a href="{{ route('library.staff.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-sm font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Create First Staff Account
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="border-b border-gray-200 bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wide">Name</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wide">Email</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wide">Phone</th>
                                        <th class="px-4 py-3 text-right text-xs font-semibold text-gray-700 uppercase tracking-wide">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach($staffUsers as $staff)
                                        <tr class="hover:bg-gray-50 transition">
                                            <td class="px-4 py-4 text-sm font-medium text-gray-900">{{ $staff->name }}</td>
                                            <td class="px-4 py-4 text-sm text-gray-600">{{ $staff->email }}</td>
                                            <td class="px-4 py-4 text-sm text-gray-600">{{ $staff->phone }}</td>
                                            <td class="px-4 py-4 text-right">
                                                <div class="flex items-center justify-end gap-3">
                                                    <a href="{{ route('library.staff.edit', $staff->id) }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">Edit</a>
                                                    <form method="POST" action="{{ route('library.staff.delete', $staff->id) }}" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-700 text-sm font-medium" onclick="return confirm('Are you sure you want to delete this staff account?')">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Recent Print Jobs Section -->
        <div class="bg-white rounded-lg shadow border border-gray-200">
            <div class="px-6 py-5 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Recent Print Jobs</h2>
                <p class="text-sm text-gray-600 mt-1">Latest print submissions from patrons</p>
            </div>
            <div class="px-6 py-6">
                @if($prints->isEmpty())
                    <div class="text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No print jobs yet</h3>
                        <p class="mt-1 text-sm text-gray-500">Print jobs submitted by patrons will appear here.</p>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="border-b border-gray-200 bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wide">Patron</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wide">File</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wide">Copies</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wide">Submitted</th>
                                    <th class="px-4 py-3 text-right text-xs font-semibold text-gray-700 uppercase tracking-wide">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($prints as $print)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-4 py-4 text-sm font-medium text-gray-900">{{ $print->patron }}</td>
                                        <td class="px-4 py-4 text-sm text-gray-600 font-mono text-xs">{{ substr($print->file, 0, 30) }}...</td>
                                        <td class="px-4 py-4 text-sm text-gray-600">{{ $print->copies }}</td>
                                        <td class="px-4 py-4 text-sm text-gray-600">{{ $print->created_at->format('M d, Y') }}</td>
                                        <td class="px-4 py-4 text-right">
                                            <div class="flex items-center justify-end gap-3">
                                                <a href="{{ route('storage.download', $print->id) }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">Download</a>
                                                <a href="{{ route('storage.print', $print->id) }}" class="text-green-600 hover:text-green-700 text-sm font-medium">Print</a>
                                                <form method="POST" action="{{ route('wp.delete', $print->id) }}" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-700 text-sm font-medium" onclick="return confirm('Are you sure you want to delete this print job?')">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</x-layouts.app>

<x-app-layout>
    <x-slot name="header">
    <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Complaint Form
        </h2>

        <div class="flex gap-2">
            <a href="{{ route('dashboard') }}"
               class="rounded-md bg-gray-100 px-4 py-2 text-sm font-medium text-black 
                      hover:bg-black hover:text-white transition">
                Dashboard
            </a>

            <a href="{{ route('complaints.index') }}"
               class="rounded-md bg-gray-100 px-4 py-2 text-sm font-medium text-black 
                      hover:bg-black hover:text-white transition">
                My complaints
            </a>

            <a href="{{ route('complaints.create') }}"
               class="rounded-md bg-gray-100 px-4 py-2 text-sm font-medium text-black 
                      hover:bg-black hover:text-white transition">
                New complaint
            </a>
        </div>
    </div>
</x-slot>

    <div class="bg-pink-200 border-b border-pink-200 px-6 py-4 text-center">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-4">
                <div class="text-pink-600 font-semibold">Company name</div>
            </div>
            <div class="bg-white rounded-lg shadow-sm border border-gray-300 overflow-hidden">

                <div class="bg-pink-200 border-b border-gray-300 px-6 py-4 text-center">
                    <div class="font-medium text-gray-900">Users</div>
                    <div class="text-sm text-gray-700">
                        Logged in as testing: {{ auth()->user()->email }}
                    </div>
                </div>

                <div class="p-6">

                    <div class="border border-gray-300 rounded-md p-4 mb-6 bg-white">
                        <div class="flex items-start justify-between gap-4">
                            <div class="text-sm text-gray-800 space-y-1">
                                <div><span class="font-medium">Status:</span> active</div>
                                <div><span class="font-medium">Total users:</span> {{ $users->count() }}</div>
                            </div>

                            <span class="inline-flex items-center rounded-full border border-pink-400 px-3 py-1 text-xs font-medium text-pink-700 bg-pink-50">
                                {{ auth()->user()->role }}
                            </span>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead>
                                <tr class="border-b border-gray-300">
                                    <th class="py-2 pr-4 font-medium text-gray-800">ID</th>
                                    <th class="py-2 pr-4 font-medium text-gray-800">Email</th>
                                    <th class="py-2 pr-4 font-medium text-gray-800">Role</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($users as $user)
                                    <tr class="border-b border-gray-200">
                                        <td class="py-2 pr-4 text-gray-900">{{ $user->id }}</td>
                                        <td class="py-2 pr-4 text-gray-900">{{ $user->email }}</td>
                                        <td class="py-2 pr-4">
                                            <span class="inline-flex items-center rounded-md border border-gray-300 px-2 py-1 text-xs text-gray-800 bg-gray-100">
                                                {{ $user->role }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="py-6 text-center text-gray-600">
                                            No users found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="flex justify-center mt-8">
                        <a href="#"
                           class="rounded-md bg-pink-600 px-6 py-2 text-sm font-medium text-white hover:bg-pink-700 transition">
                            View my users
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>

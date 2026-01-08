<x-app-layout>
    <<x-slot name="header">
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

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white rounded-md shadow-sm border border-gray-300 overflow-hidden">
                <div class="border-b border-gray-300 px-6 py-4">
                    <div class="font-medium text-gray-900">Complaints</div>
                    <div class="text-sm text-gray-600">Logged in as: {{ auth()->user()->email }}</div>
                </div>

                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead>
                                <tr class="border-b border-gray-300">
                                    <th class="py-2 pr-4 font-medium text-gray-700">Reference</th>
                                    <th class="py-2 pr-4 font-medium text-gray-700">Status</th>
                                    <th class="py-2 pr-4 font-medium text-gray-700">Category</th>
                                    <th class="py-2 pr-4 font-medium text-gray-700">Created</th>
                                    <th class="py-2 pr-4 font-medium text-gray-700"></th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($complaints as $c)
                                    <tr class="border-b border-gray-200">
                                        <td class="py-2 pr-4 text-gray-900">{{ $c->reference_no }}</td>
                                        <td class="py-2 pr-4 text-gray-900">{{ $c->status }}</td>
                                        <td class="py-2 pr-4 text-gray-900">{{ $c->category }}</td>
                                        <td class="py-2 pr-4 text-gray-700">
                                            {{ \Carbon\Carbon::parse($c->created_at)->format('d M Y H:i') }}
                                        </td>
                                        <td class="py-2 pr-4 text-right">
                                            <a class="text-gray-900 underline"
                                               href="{{ route('complaints.show', ['reference' => $c->reference_no]) }}">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-8 text-center text-gray-500">
                                            No complaints yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

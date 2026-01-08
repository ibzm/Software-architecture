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

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-4">
                <div class="font-semibold">Company name</div>
            </div>

            <div class="bg-white rounded-md shadow-sm border border-gray-300 overflow-hidden">
                <div class="bg-gray-100 border-b border-gray-300 px-6 py-4 text-center">
                    <div class="font-medium text-gray-900">Complaint submitted</div>
                    <div class="text-sm text-gray-700">Thank you for your submission.</div>
                </div>

                <div class="p-6">
                    <div class="border border-gray-300 rounded-md p-4 bg-white">
                        <div class="text-sm text-gray-800 space-y-1">
                            <div><span class="font-medium">Status:</span> {{ $complaint->status }}</div>
                            <div><span class="font-medium">Reference Number:</span> {{ $complaint->reference_no }}</div>
                            <div><span class="font-medium">Category:</span> {{ $complaint->category }}</div>
                        </div>
                    </div>

                    <div class="flex justify-center mt-8 gap-3">
                        <a href="{{ route('complaints.index') }}"
                           class="rounded-md bg-gray-900 px-6 py-2 text-sm font-medium text-white hover:bg-black transition">
                            View my complaints
                        </a>

                        <a href="{{ route('complaints.create') }}"
                           class="rounded-md border border-gray-300 px-6 py-2 text-sm font-medium text-gray-800 hover:bg-gray-50 transition">
                            Submit another
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

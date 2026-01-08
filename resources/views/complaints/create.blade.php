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
                <div class="bg-gray-100 border-b border-gray-300 px-6 py-4">
                    <div class="font-medium text-gray-900">Complaint Form</div>
                    <div class="text-sm text-gray-600">
                        Please fill out the following form with your complaint. We will review your request and follow up as soon as possible.
                    </div>
                </div>

                <div class="p-6">

                  
                    @if ($errors->any())
                        <div class="mb-4 rounded-md border border-red-300 bg-red-50 p-4 text-sm text-red-800">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('complaints.store') }}" class="space-y-4">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">First Name</label>
                                <input name="first_name" value="{{ old('first_name') }}"
                                       class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2" />
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Last Name</label>
                                <input name="last_name" value="{{ old('last_name') }}"
                                       class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2" />
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input name="email" value="{{ old('email') }}"
                                   class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Phone number</label>
                            <input name="phone" value="{{ old('phone') }}"
                                   class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Reason for Complaint</label>
                            <select name="category"
                                    class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2">
                                <option value="">Choose your reason for contacting us</option>
                                <option value="service issue" @selected(old('category')==='service issue')>service issue</option>
                                <option value="staff behaviour" @selected(old('category')==='staff behaviour')>staff behaviour</option>
                                <option value="billing" @selected(old('category')==='billing')>billing</option>
                                <option value="other" @selected(old('category')==='other')>other</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Please provide any details</label>
                            <textarea name="details" rows="5"
                                      class="mt-1 w-full rounded-md border border-gray-300 px-3 py-2">{{ old('details') }}</textarea>
                        </div>

                        <div class="flex justify-center pt-2">
                            <button type="submit"
                                    class="rounded-md bg-gray-100 px-6 py-2 text-sm font-medium text-black hover:bg-black transition">
                                Submit complaint
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>

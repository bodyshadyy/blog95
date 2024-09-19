<!-- resources/views/admin_request.blade.php -->
<x-app-layout>
    <h1 class="font-bold text-center text-4xl">Request Admin Access</h1>
    <div class="my-2 bg-white pb-5 sm:pb-3">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <form action="{{ route('admin.request') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="reason" class="block text-sm font-medium text-gray-700">Reason for Admin Access</label>
                    <textarea id="reason" name="reason" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Submit Request</button>
            </form>
        </div>
    </div>

</x-app-layout>
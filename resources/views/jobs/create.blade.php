<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold mb-4">Create Job</h1>
    </x-slot>
    @if ($errors->any())
        <ul class="mb-4">
            @foreach ($errors->all() as $error)
                <li class="text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form method="POST" action="/jobs" class="max-w-md mx-auto bg-white p-6 rounded shadow space-y-4">
        @csrf
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" required
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Job title" value="{{ old('title') }}">
            @error('title')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
            <input type="number" name="salary" id="salary" required
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Salary in USD" value="{{ old('salary') }}">
            @error('salary')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit"
                class="w-full py-2 px-4 bg-gray-900 text-white rounded hover:bg-gray-700 transition">
                Create Job
            </button>
        </div>
    </form>
</x-layout>

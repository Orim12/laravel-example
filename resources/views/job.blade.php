<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold mb-4">{{ $job->title }}</h1>
    </x-slot>
    <div class="mb-4">
        <div class="text-gray-500 mb-1">
            {{ $job->employer?->name ?? 'Unknown employer' }}
        </div>
        <div class="text-gray-700 mb-2">
            ${{ $job->salary }} per year
        </div>
        <div class="flex gap-2">
            <a href="/jobs/{{ $job->id }}/edit"
               class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-500 transition text-sm font-semibold">
                Edit Job
            </a>
            <form method="POST" action="/jobs/{{ $job->id }}" class="inline"
                  onsubmit="return confirm('Are you sure you want to delete this job?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-500 transition text-sm font-semibold">
                    Delete
                </button>
            </form>
        </div>
    </div>
    <a href="/jobs" class="text-blue-500 hover:underline mt-4 inline-block">Back to jobs</a>
</x-layout>

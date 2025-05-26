<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold mb-4">Jobs</h1>
    </x-slot>
    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job->id }}" class="block p-4 border rounded-lg hover:bg-gray-50 transition">
                <div class="text-sm text-gray-500 mb-1">
                    {{ $job->employer?->name ?? 'Unknown employer' }}
                </div>
                <div class="text-lg font-semibold">
                    {{ $job->title }}
                </div>
                <div class="text-gray-700">
                    ${{ $job->salary }} per year
                </div>
            </a>
        @endforeach
    </div>
    <div class="mt-6">
        {{ $jobs->links() }}
    </div>
</x-layout>

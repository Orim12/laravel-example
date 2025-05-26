<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold mb-4">Jobs</h1>
    </x-slot>
    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:underline">
                    {{ $job['title'] }}
                </a>: <strong>${{ $job['salary'] }}</strong> per year
            </li>
        @endforeach
    </ul>
</x-layout>

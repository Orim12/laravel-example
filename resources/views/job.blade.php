<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold mb-4">{{ $job['title'] }}</h1>
    </x-slot>
    <p>This job pays ${{ $job['salary'] }} per year.</p>
    <a href="/jobs" class="text-blue-500 hover:underline mt-4 inline-block">Back to jobs</a>
</x-layout>

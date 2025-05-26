<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold mb-4">Login</h1>
    </x-slot>
    <form method="POST" action="/login" class="max-w-md mx-auto bg-white p-6 rounded shadow space-y-4">
        @csrf
        <div>
            <x-form-label for="email">Email</x-form-label>
            <x-form-input id="email" name="email" type="email" required autofocus value="{{ old('email') }}" />
            <x-form-error name="email" />
        </div>
        <div>
            <x-form-label for="password">Password</x-form-label>
            <x-form-input id="password" name="password" type="password" required />
            <x-form-error name="password" />
        </div>
        <div>
            <button type="submit"
                class="w-full py-2 px-4 bg-gray-900 text-white rounded hover:bg-gray-700 transition">
                Login
            </button>
        </div>
    </form>
</x-layout>

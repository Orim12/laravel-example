<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold mb-4">Register</h1>
    </x-slot>
    <form method="POST" action="/register" class="max-w-md mx-auto bg-white p-6 rounded shadow space-y-4">
        @csrf
        <div>
            <x-form-label for="first_name">First Name</x-form-label>
            <x-form-input id="first_name" name="first_name" required autofocus value="{{ old('first_name') }}" />
            <x-form-error name="first_name" />
        </div>
        <div>
            <x-form-label for="last_name">Last Name</x-form-label>
            <x-form-input id="last_name" name="last_name" required value="{{ old('last_name') }}" />
            <x-form-error name="last_name" />
        </div>
        <div>
            <x-form-label for="email">Email</x-form-label>
            <x-form-input id="email" name="email" type="email" required value="{{ old('email') }}" />
            <x-form-error name="email" />
        </div>
        <div>
            <x-form-label for="password">Password</x-form-label>
            <x-form-input id="password" name="password" type="password" required />
            <x-form-error name="password" />
        </div>
        <div>
            <x-form-label for="password_confirmation">Confirm Password</x-form-label>
            <x-form-input id="password_confirmation" name="password_confirmation" type="password" required />
        </div>
        <div>
            <button type="submit"
                class="w-full py-2 px-4 bg-gray-900 text-white rounded hover:bg-gray-700 transition">
                Register
            </button>
        </div>
    </form>
</x-layout>

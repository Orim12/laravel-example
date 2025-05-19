<html class="h-full bg-gray-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="h-full">
        <nav>
            <ul class="flex gap-4">
                <li>
                    <x-navlink href="/" :active="request()->is('/')" type="a">Home</x-navlink>
                </li>
                <li>
                    <x-navlink href="/about" :active="request()->is('about')" type="a">About</x-navlink>
                </li>
                <li>
                    <x-navlink href="/contact" :active="request()->is('contact')" type="a">Contact</x-navlink>
                </li>
            </ul>
        </nav>
        @isset($heading)
            <header>
                {{ $heading }}
            </header>
        @endisset
        {{ $slot }}
    </body>
</html>
<!DOCTYPE html>
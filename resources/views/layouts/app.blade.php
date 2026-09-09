<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <footer class="bg-white shadow mt-8">
    <div class="max-w-7xl mx-auto py-6 px-4 text-center">
        <a href="{{ route('contact.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded inline-block mb-4">
            お問い合わせ
        </a>
        <div class="flex justify-center gap-4 text-sm text-gray-600 mb-2">
            <a href="{{ route('products.index') }}">Home</a>
            <a href="{{ route('mypage') }}">マイページ</a>
        </div>
        <p class="text-xs text-gray-400">© 2024 Company, Inc</p>
    </div>
        </footer>
    </body>
</html>

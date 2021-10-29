<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased bg-gray-800">
<div class="min-h-screen bg-gray-100 flex container mx-auto">
{{--@include('layouts.navigation')--}}

<!-- Page Heading -->
    <header class="bg-white shadow  bg-gray-800 w-2/5">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <section class="flex flex-col items-start space-y-4">
                <x-application-logo class="h-10 text-white fill-current" />

                <x-menu />
            </section>
        </div>
    </header>

    <!-- Page Content -->
    <main id="sidebar-wrapper" class="bg-gray-800 border-l border-r border-gray-500 overflow-y-scroll h-screen w-full">
        <div>
            <h1 class="text-2xl p-3 text-gray-200 uppercase">
                {{request()->segment(1)}}
            </h1>
        </div>
        {{ $slot }}
    </main>

    <aside class="w-3/5 pt-8 px-10 space-y-5 bg-gray-800">

        <div class="bg-gray-600 p-5 rounded-xl space-y-3">
            <h2 class="text-lg text-gray-200">Who to follow</h2>
            <ul class="flex flex-col space-y-3">
                <x-userlist-not-follow :users="$usersNotFollowMe" />
            </ul>
        </div>

    </aside>
</div>
</body>
</html>

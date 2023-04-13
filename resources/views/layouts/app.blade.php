<?php
header("Access-Control-Allow-Origin: *");
header("Origin-Trial: AloWWxLa2bZsb8iGD5evH/znTjrQUBYKNu+F7u1zJLyD3RGbBsO1PPKy2BtjAzoL4Ke4b7MrZU1GJ5XCoCdDDw4AAACCeyJvcmlnaW4iOiJodHRwOi8vc2Vhdm95LnRlc3Q6ODAiLCJmZWF0dXJlIjoiUHJpdmF0ZU5ldHdvcmtBY2Nlc3NOb25TZWN1cmVDb250ZXh0c0FsbG93ZWQiLCJleHBpcnkiOjE2ODgwODMxOTksImlzU3ViZG9tYWluIjp0cnVlfQ==");

?>
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://api.fontshare.com/v2/css?f[]=cabinet-grotesk@700,400,300&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/main.scss', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased min-h-screen flex flex-col bg-gray-100 mt-2">
    @include('layouts.header')
    <main class="flex mt-4 mx-32">

        @yield('content')
        @yield('js')
    </main>
    <footer class="h-80 w-full bottom-0">
        <div>haha</div>
    </footer>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{--  <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />  --}}
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
        @vite(['resources/js/app.js', 'resources/css/app.css'])
        {{--  <link rel="stylesheet" href="resources/css/app.css" />  --}}
        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body class="h-screen overflow-hidden">

        {{--  web  --}}
        <div class="hidden md:flex">
            <x-side-bar />

            <main class="flex-grow h-screen p-5 overflow-hidden overflow-y-auto border">
                {{ $slot }}
            </main>
        </div>

        {{--  mobbile  --}}
        <div class="md:hidden">
            <x-mobile-nav />

            <main class="h-screen p-5 overflow-hidden overflow-y-auto grow">
                {{ $slot }}
            </main>
        </div>


    </body>
</html>

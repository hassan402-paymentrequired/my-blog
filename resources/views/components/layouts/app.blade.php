<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/code@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@2.7.6/dist/quote.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image"></script>

    <link href="{{ asset('assets/css/simple-image.css') }}" rel="stylesheet" />

    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <title>{{ $title ?? 'Hassan page' }}</title>
</head>

<body class="h-screen overflow-hidden">

    {{--  web  --}}
    <div class="hidden md:flex font-robo">
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


    <script src="{{ asset('assets/js/simple-image.js') }}"></script>
</body>

</html>

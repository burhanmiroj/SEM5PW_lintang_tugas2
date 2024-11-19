<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title></title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://code.iconify.design/iconify-icon/1.0.5/iconify-icon.min.js"></script>
        <script>
            // LOADING
            function onReady(callback) {
                let intervalId = window.setInterval(function() {
                if (document.getElementsByTagName('body')[0] !== undefined) {
                    window.clearInterval(intervalId);
                        callback.call(this);
                    }
                }, 300);
            }
    
            function setVisible(selector, visible) {
                document.querySelector(selector).style.display = visible ? 'block' : 'none';
            }
    
            onReady(function() {
                setVisible('#app', true);
                setVisible('#loading', false);
            });
        </script>
    </head>
    <body class="font-sans antialiased">
        <div id="loading" class="w-full h-full fixed inset-0 z-[99999] bg-white bg-opacity-50 backdrop-blur-xl grid place-items-center">
            <span class="loader"></span>
        </div>
        <div id="app">
            <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
                @include('layouts.navigation')
                @isset($header)
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>

        @include('sweetalert::alert')
    </body>
</html>
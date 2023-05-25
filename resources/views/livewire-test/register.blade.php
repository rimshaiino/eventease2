<html>
    <head>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        Livewireテスト <span class="text-blue-300">Register</span>
        {{-- <livewire:counter /> --}}
        @livewire('register')
        @livewireScripts
    </body>
</html>
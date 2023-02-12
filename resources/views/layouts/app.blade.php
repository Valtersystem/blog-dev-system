<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://kit.fontawesome.com/0180025e57.js" crossorigin="anonymous"></script>

        <link rel="icon" type="image/x-icon" href="devsystem.ico">
     

        <title>Dev_System</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased" id="style-scroll">
        <x-jet-banner />

        @livewire('navigation')
            <div class="min-h-screen bg-zinc-900 ">
            
                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        @livewire('footer')

        @stack('modals')

        @livewireScripts


        <script>
            document.addEventListener('livewire:load', function () {

                window.addEventListener('scroll', function(event){ 
                if (window.scrollY > 10) {
                    document.getElementById("nav-event").classList.add('nav-event-active');
                } else {
                    document.getElementById("nav-event").classList.remove('nav-event-active');
                }
                });
            })
        </script>
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Shop Online') }}</title>

        <!-- Favicon icon-->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon/favicon.ico')}}">


        <!-- Libs CSS -->
        <link href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/libs/feather-webfont/dist/feather-icons.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css')}}" rel="stylesheet">


        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css')}}">
        @livewireStyles
    </head>
    <body>
        <!-- main -->
        <div>
            @include('admin.sections.navbar')        

            <div class="main-wrapper">
                <!-- side navbar vertical -->
                @include('admin.sections.sidebar')

                <!-- main wrapper -->
                <main class="main-content-wrapper">
                    @yield('content')
                </main>
            </div>
        </div>
        

        <!-- Libs JS -->
        <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js')}}"></script>

        <!-- Theme JS -->
        <script src="{{ asset('assets/js/theme.min.js')}}"></script>
        <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
        <script src="{{ asset('assets/js/vendors/chart.js')}}"></script>

        @livewireScripts
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />

        <meta name="application-name" content="{{ config('app.name') }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
            <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">
         <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="/assets/css/font-awesome.min.css">
            <link rel="stylesheet" type="text/css" href="/assets/css/select2.min.css">
            <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-datetimepicker.min.css">
            <link rel="stylesheet" type="text/css" href="/assets/css/style.css">

        <title>{{ config('app.name') }}</title>

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body class="antialiased">
     <div class="main-wrapper">
            <x-header />
           <x-sidebar />
            <div class="page-wrapper">
               {{$slot}}
            </div>
        </div>

        <div class="sidebar-overlay" data-reff=""></div>

        <script>

            document.addEventListener('livewire:init', () => {
            Livewire.on('event', (event) => {

                Swal.fire({
                icon: event[0].icon,
                title:event[0].title ,
                position:'top-end',
                toast:true,

                });
            //
            });
            });

        </script>
       <script src="/assets/js/jquery-3.2.1.min.js"></script>
        <script src="/assets/js/popper.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/jquery.slimscroll.js"></script>
        <script src="/assets/js/select2.min.js"></script>
        <script src="/assets/js/moment.min.js"></script>
        <script src="/assets/js/bootstrap-datetimepicker.min.js"></script>
        <script src="/assets/js/app.js"></script>
        <script src="/assets/js/Chart.bundle.js"></script>
        <script src="/assets/js/chart.js"></script>

    </body>
</html>

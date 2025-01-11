<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

       @vite(['resources/css/app.css'])
    </head>
    <body class="bg-black-900 text-slate-50 h-full">
        {{ $slot }}
    </body>
</html>

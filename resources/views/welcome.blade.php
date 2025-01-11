<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

       @vite(['resources/css/app.css'])
    </head>
    <body class="bg-red-900 text-slate-50 h-full">

        <h1 class="font-bold text-3xl">
            Hello World: from tailwindcss
        </h1>
        
    </body>
</html>

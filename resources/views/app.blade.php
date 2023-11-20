<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ERP</title>

        <link href="{{asset('css/app.css')}}" ref="stylesheet">
        <link href="{{asset('css/reset.css')}}" ref="stylesheet">

        <script type="module" src="{{asset('js/app.js')}}" defer></script>
        @vite('resources/css/app.css')
        @vite('resources/css/reset.css')
        @vite('resources/img/logo.css')
    </head>
    <body>
        <div id="app" style="width: 100%"></div>
        @vite('resources/js/app.js')
    </body>
</html>

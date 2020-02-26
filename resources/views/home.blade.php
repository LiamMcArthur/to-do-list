<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>To-Do List</title>
        <link rel="stylesheet" type="text/css" href="/css/app.css"/>
    </head>
    <body>
    <div id="app">
        <to-do-list></to-do-list>
    </div>
    <script src="{{mix('js/app.js')}}"></script>
    </body>
</html>

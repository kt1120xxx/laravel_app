<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Component</title>
  <link rel="stylesheet"  href="{{ asset('css/style.css') }}">
  <script src="{{ asset('/js/app.js') }}" defer></script>
</head>
<body>
<h1>Vue.Component</h1>
<div id="app">
  <Parent></Parent>
</div>
</body>
</html>
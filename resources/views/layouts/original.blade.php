<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TaskApp</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/task.css') }}">
    <!-- jquery適用 -->
    <script src="{{ asset('js/addtaskforms.js') }}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <header class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/routine') }}">
                TaskApp
            </a>
            <a href="https://app.ta-chal.com/">Home</a>
            <a href="https://ta-chal.com/">Blog</a>
            <a href="https://app.ta-chal.com/login">Laravel</a>
            <a href="https://app.ta-chal.com/vue-top">Vue.js</a>
        </div>
    </header>
    <div id="app" class="app-wrap">
        <side-menu></side-menu>
        @if($_SERVER['REQUEST_URI'] == '/routine')
            <week-parent></week-parent>
        @endif
    </div>
    <div>
        @yield('content')
    </div>
    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LaraApp</title>

    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous"
    >
    <link rel="stylesheet" href="{{ asset('css/common/header.css') }}">
</head>
<body>
    <header class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('') }}">
                LaraApp
            </a>                
            <div>
                <a href="https://app.ta-chal.com/" class="navbar-brand">Home</a>
                <a href="https://ta-chal.com/" class="navbar-brand">Blog</a>
                <a href="https://app.ta-chal.com/vue-top" class="navbar-brand">vue.js</a>
                <a href="https://app.ta-chal.com/task" class="navbar-brand">Task,English</a>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </header>
    <div>
        @yield('content')
    </div>
    <script src="{{ asset('js/addtaskforms.js') }}"></script>
</body>
</html>
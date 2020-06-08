
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TaskApp</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/english_practice.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/task.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <header class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/routine') }}">
                TaskApp
            </a>
            <a href="{{ url('/english_practice/create')}}" class="btn btn-outline-light">new</a>
        </div>
    </header>
    <div id="app" class="">
        <side-menu></side-menu>
        <english_quize></english_quize>
    </div>
    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
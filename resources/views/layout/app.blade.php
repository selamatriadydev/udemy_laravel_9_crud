<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <h2>@yield('heading')</h2> 
    <ul>
        <li><a href="{{ route('student.index') }}">Studen</a></li>
        <li><a href="{{ route('phone.index') }}">Phone</a></li>
        <li><a href="{{ route('student.submit-add') }}">Add</a></li>
    </ul>
    <p>
        @yield('content')
    </p>
</body>
</html>
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
        <li><a href="{{ route('student.home') }}">Home</a></li>
        <li><a href="{{ route('student.about') }}">About</a></li>
        <li><a href="{{ route('check_price') }}?price=90">price < 100</a></li>
        <li><a href="{{ route('check_price') }}?price=190">price > 100</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
        <li><a href="{{ route('location.city') }}">Location City</a></li>
        <li><a href="{{ route('location.country') }}">Location country</a></li>
        <li><a href="{{ route('location.zip') }}">Location zip</a></li>
    </ul>
    <p>
        @yield('content')
    </p>
</body>
</html>
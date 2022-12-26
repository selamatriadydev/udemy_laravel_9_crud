<h1>Profile page</h1>

<ul>
    <li><a href="{{ route('student.home') }}">Home</a></li>
    <li><a href="{{ route('student.about') }}">About</a></li>
</ul>

<p>Profile page descritption</p>
<h3>Hi {{ $un }}, age {{ $age }}</h3>
<h1>about page</h1>

<ul>
    <li><a href="{{ route('student.home') }}">Home</a></li>
    <li><a href="{{ route('student.about') }}">About</a></li>
    <li><a href="{{ route('student.profile', ['david', 13]) }}">profile</a></li>
</ul>

<p>about page descritption</p>
{{-- <h3>Hi {{ $un }}, age {{ $age }}</h3> --}}
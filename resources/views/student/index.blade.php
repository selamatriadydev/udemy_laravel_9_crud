<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Page</title>
</head>
<body>
    <h1>tes</h1>

<hr>
<h2>Foreach</h2>
@foreach ($student_name as $item)
    {{ $item }} <br>
@endforeach

<hr>
<h2>foreelse</h2>
@forelse ($student_name as $item)
{{ $item }} <br>
@empty
    Not fine
@endforelse
<hr>
<h2>For</h2>
@for ($i=0;$i<count($student_name);$i++)
    {{ $i }} 
@endfor
</body>
</html>
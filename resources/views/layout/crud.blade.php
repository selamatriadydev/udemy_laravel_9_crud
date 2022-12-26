<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .is-invalid {
        border: 1px solid red;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">CRUD</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{ route('student.index') }}">Home</a></li>
      <li><a href="{{ route('check', 33) }}">Calculate</a></li>
      <li><a href="{{ route('env.edit') }}">Edit Env Mail</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success">
            <strong>Success!</strong> {{ session('success') }}
        </div>
    @endif

    @if (session()->has('warning'))
        <div class="alert alert-warning">
            <strong>Warning!</strong> {{ session('warning') }}
        </div>
    @endif

    @if (session()->has('danger'))
        <div class="alert alert-danger">
            <strong>Danger!</strong> {{ session('danger') }}
        </div>
    @endif

    @if (session()->has('info'))
        <div class="alert alert-info">
            <strong>Info!</strong> {{ session('info') }}
        </div>
    @endif
  <h3>@yield('heading')</h3>
  @yield('content')
</div>

</body>
</html>


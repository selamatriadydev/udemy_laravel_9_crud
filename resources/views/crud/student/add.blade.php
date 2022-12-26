@extends('layout.crud')

@section('title', 'New Srudent')

@section('heading', 'New Srudent')

@section('content')
<a href="{{ route('student.index') }}" class="btn btn-warning">Back</a>
<form class="form-horizontal" action="{{ route('student.submit-add') }}">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="name" placeholder="Enter password" name="name">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
@endsection
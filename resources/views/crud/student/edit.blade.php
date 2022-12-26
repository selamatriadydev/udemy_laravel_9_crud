@extends('layout.crud')

@section('title', 'Edit Student')

@section('heading', 'Edit Student')

@section('content')
<a href="{{ route('student.index') }}" class="btn btn-warning">Back</a>
<div class="panel panel-primary">
    <div class="panel-heading">Update</div>
    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="{{ route('student.update', $student_single->id) }}"  enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Existing Photo:</label>
                <div class="col-sm-10">          
                    <img src="{{ asset('Uploads/'.$student_single->student_photo) }}" class="media-object" style="width:60px" alt="">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Change Photo:</label>
                <div class="col-sm-10">          
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" placeholder="Enter Name" name="photo">
                    @error('photo')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">          
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" name="name" value="{{ old('name', $student_single->student_name) }}">
                    @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email" value="{{ old('email', $student_single->student_email) }}">
                    @error('email')<div class="alert alert-danger">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Update Student</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
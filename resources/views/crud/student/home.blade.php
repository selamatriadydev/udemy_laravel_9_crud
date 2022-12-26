@extends('layout.crud')

@section('title', 'Home Page')

@section('heading', 'Student')

@section('content')
<a href="{{ route('student.trashed') }}" class="btn btn-warning">Trash Data</a>
<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-primary">
            <div class="panel-heading">New</div>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Photo:</label>
                        <div class="col-sm-10">          
                            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" placeholder="Enter Name" name="photo">
                            @error('photo')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-10">          
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" name="name" value="{{ old('name') }}">
                            @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
                            @error('email')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">New Student</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel panel-primary">
            <div class="panel-heading">List</div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset('Uploads/'.$item->student_photo) }}" class="media-object" style="width:60px" alt=""></td>
                                <td>{{ $item->student_name }}</td>
                                <td>{{ $item->student_email }}</td>
                                <td>
                                    <a href="{{ route('student.show', $item->id) }}" class="btn btn-info">Show</a>
                                    -<a href="{{ route('student.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    -<a href="{{ route('student.delete', $item->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this data ?')">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Sorry! result is not found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
@endsection
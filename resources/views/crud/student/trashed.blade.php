@extends('layout.crud')

@section('title', 'Trashed Page')

@section('heading', 'Trashed Student')

@section('content')
<a href="{{ route('student.index') }}" class="btn btn-success">All Data</a>
<div class="panel panel-primary">
    <div class="panel-heading">List Trashed</div>
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
                            <a href="{{ route('student.show-trashed', $item->id) }}" class="btn btn-info">Show</a>
                            -<a href="{{ route('student.restore', $item->id) }}" class="btn btn-warning">Restore</a>
                            -<a href="{{ route('student.force-delete', $item->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure want to permanen delete this data ?')">Permanen Delete</a>
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
@endsection
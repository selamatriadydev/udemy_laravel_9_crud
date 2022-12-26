@extends('layout.crud')

@section('title', 'Detail Student')

@section('heading', 'Detail Student')

@section('content')
<a href="{{ route('student.index') }}" class="btn btn-warning">Back</a>

<div class="panel panel-primary">
    <div class="panel-heading">Detail</div>
    <div class="panel-body">
        <div class="form-group row">
            <label class="control-label col-sm-2" for="name">Photo:</label>
            <div class="col-sm-10">          
                <img src="{{ asset('Uploads/'.$student_single->student_photo) }}" class="media-object" style="width:60px" alt="">
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="col-sm-10">          
                {{ $student_single->student_name }}
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                {{ $student_single->student_email }}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-primary">
            <div class="panel-heading">New Phone</div>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('phone.store', $student_single->id) }}">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="phone">Phone:</label>
                        <div class="col-sm-10">          
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter Phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">New Phone</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel panel-primary">
            <div class="panel-heading">List Phone</div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($student_single->rPhones as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>
                                    <a href="{{ route('phone.delete', $item->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this data ?')">Delete</a>
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
@extends('layout.app')

@section('title', 'Home Page')

@section('heading', 'Home')

@section('content')
    <ul>
        @forelse ($data as $item)
        <li>{{ $item->student_name }} - {{ $item->student_email }} <a href="{{ route('student.show', $item->id) }}">Show</a>-<a href="{{ route('student.delete', $item->id) }}">Delete</a></li>
        @empty
            <li>Sorry! result is not found</li>
        @endforelse
    </ul>
@endsection
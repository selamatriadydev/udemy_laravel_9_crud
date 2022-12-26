@extends('layout.app')

@section('title', 'Home Page')

@section('heading', 'Home')

@section('content')
    <ul>
        @forelse ($data as $item)
        <li>{{ $item->rStudent->student_name }} - {{ $item->rStudent->student_email }} - {{ $item->phone }} </li>
        @empty
            <li>Sorry! result is not found</li>
        @endforelse
    </ul>
@endsection
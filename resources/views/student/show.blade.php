@extends('layout.app')

@section('title', 'Show Page')

@section('heading', 'Show')

@section('content')
    <p><a href="{{ route('phone.submit-add', $student->id) }}">Add Phone</a></p>
    <ul>
        <li>{{ $student->student_name }} - {{ $student->student_email }} 
            <br>- Phone : 
            @forelse ($student->rPhones as $item)
                {{ $item->phone }},
            @empty
                sorry! no phone
            @endforelse
        </li>
    </ul>
@endsection
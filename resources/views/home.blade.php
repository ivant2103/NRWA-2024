@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome to College App</h1>
    

    <!-- Faculties -->
    <h2>Our Faculties</h2>
    <ul class="list-group mb-4">
        @foreach($faculties as $faculty)
            <li class="list-group-item">
                {{ $faculty->first_name }} {{ $faculty->last_name }}
                - Department: {{ $faculty->department->name ?? 'N/A' }}
            </li>
        @endforeach
    </ul>

    <!-- Subjects -->
    <h2>Subjects</h2>
    <ul class="list-group mb-4">
        @foreach($subjects as $subject)
            <li class="list-group-item">{{ $subject->name }}</li>
        @endforeach
    </ul>

    <!-- Students -->
    <h2>Students</h2>
    <ul class="list-group mb-4">
        @foreach($students as $student)
            <li class="list-group-item">
                {{ $student->first_name }} {{ $student->last_name }}
                - Email: {{ $student->email }}
            </li>
        @endforeach
    </ul>

    <!-- Marks Display Loop -->
<h2>Marks</h2>
<ul class="list-group mb-4">
    @foreach($marks as $mark)
        <li class="list-group-item">
            Student: {{ $mark->student ? $mark->student->first_name . ' ' . $mark->student->last_name : 'N/A' }}<br>
            Subject: {{ $mark->subject ? $mark->subject->name : 'N/A' }}<br>
            Mark: {{ $mark->marks }}
        </li>
    @endforeach
</ul>

</div>
@endsection

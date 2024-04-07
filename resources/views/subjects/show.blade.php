@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $subject->name }}</div>

                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $subject->id }}</p>
                        <p><strong>Department ID:</strong> {{ $subject->department_id }}</p>
                        <p><strong>Start Date:</strong> {{ $subject->start_date }}</p>
                        <p><strong>End Date:</strong> {{ $subject->end_date }}</p>
                        <p><strong>Faculty ID:</strong> {{ $subject->faculty_id }}</p>
                        <a href="{{ route('subjects.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Student Details</div>

                    <div class="card-body">
                        <p><strong>Roll Number:</strong> {{ $student->roll_num }}</p>
                        <p><strong>First Name:</strong> {{ $student->first_name }}</p>
                        <p><strong>Last Name:</strong> {{ $student->last_name }}</p>
                        <p><strong>Department:</strong> {{ $student->department->name }}</p>
                        <p><strong>Phone:</strong> {{ $student->phone }}</p>
                        <p><strong>Admission Date:</strong> {{ $student->admission_date }}</p>
                        <p><strong>CET Marks:</strong> {{ $student->cet_marks }}</p>
                        <a href="{{ route('students.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

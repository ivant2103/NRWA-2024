@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mark Details</div>

                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $mark->id }}</p>
                        <p><strong>Student:</strong> {{ $mark->student->roll_num }}</p>
                        <p><strong>Subject:</strong> {{ $mark->subject->name }}</p>
                        <p><strong>Marks:</strong> {{ $mark->marks }}</p>
                        <a href="{{ route('marks.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

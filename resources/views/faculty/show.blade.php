@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('Faculty Details') }}</div>

            <div class="card-body">
                <p><strong>Name:</strong> {{ $faculty->first_name }} {{ $faculty->last_name }}</p>
                <p><strong>Department:</strong> {{ $faculty->department_id }}</p>
                <p><strong>Phone:</strong> {{ $faculty->phone }}</p>
                <a href="{{ route('faculty.index') }}" class="btn btn-primary">Back</a>
                
            </div>
        </div>
    </div>
@endsection

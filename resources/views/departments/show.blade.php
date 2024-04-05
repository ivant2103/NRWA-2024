@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Department Details') }}</div>

                <div class="card-body">
                    <p><strong>Name:</strong> {{ $department->name }}</p>
                    <p><strong>Head of Department:</strong> {{ $department->hod->first_name }} {{ $department->hod->last_name }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

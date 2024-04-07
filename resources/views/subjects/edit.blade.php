@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Subject</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('subjects.update', $subject->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $subject->name }}">
                            </div>
                            <div class="form-group">
                                <label for="department_id">Department</label>
                                <select class="form-control" id="department_id" name="department_id">
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}" {{ $subject->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="faculty_id">Faculty</label>
                                <select class="form-control" id="faculty_id" name="faculty_id">
                                    @foreach($faculties as $faculty)
                                        <option value="{{ $faculty->id }}" {{ $subject->faculty_id == $faculty->id ? 'selected' : '' }}>{{ $faculty->first_name }} {{ $faculty->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="number" class="form-control" id="start_date" name="start_date" value="{{ $subject->start_date }}">
                            </div>
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="number" class="form-control" id="end_date" name="end_date" value="{{ $subject->end_date }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Subject</button>
                            <a href="{{ route('subjects.index') }}" class="btn btn-primary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

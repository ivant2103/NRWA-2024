@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Student</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('students.update', $student->roll_num) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="roll_num">Roll Number</label>
                                <input type="text" class="form-control" id="roll_num" name="roll_num" value="{{ $student->roll_num }}">
                            </div>
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $student->first_name }}">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $student->last_name }}">
                            </div>
                            <div class="form-group">
                                <label for="department_id">Department</label>
                                <select class="form-control" id="department_id" name="department_id">
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}" {{ $student->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $student->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="admission_date">Admission Date</label>
                                <input type="date" class="form-control" id="admission_date" name="admission_date" value="{{ $student->admission_date }}">
                            </div>
                            <div class="form-group">
                                <label for="cet_marks">CET Marks</label>
                                <input type="text" class="form-control" id="cet_marks" name="cet_marks" value="{{ $student->cet_marks }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Student</button>
                            <a href="{{ route('students.index') }}" class="btn btn-primary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

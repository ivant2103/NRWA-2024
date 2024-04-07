@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Student</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('students.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="roll_num">Roll Number</label>
                                <input type="text" class="form-control" id="roll_num" name="roll_num">
                            </div>
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name">
                            </div>
                            <div class="form-group">
                                <label for="department_id">Department</label>
                                <select class="form-control" id="department_id" name="department_id">
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="admission_date">Admission Date</label>
                                <input type="date" class="form-control" id="admission_date" name="admission_date" placeholder="YYYY-MM-DD">
                            </div>
                            <div class="form-group">
                                <label for="cet_marks">CET Marks</label>
                                <input type="text" class="form-control" id="cet_marks" name="cet_marks">
                            </div>
                            <button type="submit" class="btn btn-primary">Create Student</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Students</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Roll Number</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Department</th>
                                    <th>Phone</th>
                                    <th>Admission Date</th>
                                    <th>CET Marks</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->roll_num }}</td>
                                        <td>{{ $student->first_name }}</td>
                                        <td>{{ $student->last_name }}</td>
                                        <td>{{ $student->department->name }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td>{{ $student->admission_date }}</td>
                                        <td>{{ $student->cet_marks }}</td>
                                        <td>
                                            <a href="{{ route('students.show', $student->roll_num) }}" class="btn btn-sm btn-info">View</a>
                                            <a href="{{ route('students.edit', $student->roll_num) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('students.destroy', $student->roll_num) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>    
                    </div>
                <a href="{{ route('students.create') }}" class="btn btn-primary mt-3" style="margin-top:10px;">Create New Student</a>
        </div>
    </div>
@endsection

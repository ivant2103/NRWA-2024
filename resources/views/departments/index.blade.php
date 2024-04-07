@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Departments</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Head of Department</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departments as $department)
                                    <tr>
                                        <td>{{ $department->id }}</td>
                                        <td>{{ $department->name }}</td>
                                        <td>{{ $department->hod_id }}</td> 
                                        <td>
                                            <a href="{{ route('departments.show', $department->id) }}" class="btn btn-sm btn-info">View</a> 
                                            <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="{{ route('departments.create') }}" class="btn btn-primary mt-3">Add Department</a>
            </div>
        </div>
    </div>
@endsection

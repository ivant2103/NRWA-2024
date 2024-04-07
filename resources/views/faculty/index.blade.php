@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Faculty Members</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Department</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faculty as $member)
                                    <tr>
                                        <td>{{ $member->id }}</td>
                                        <td>{{ $member->first_name }}</td>
                                        <td>{{ $member->last_name }}</td>
                                        <td>{{ $member->department->name }}</td>
                                        <td>{{ $member->phone }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                            <form action="{{ route('faculty.destroy', $member->id) }}" method="POST" style="display: inline-block;"> 
                                                <a href="{{ route('faculty.show', $member->id) }}" class="btn btn-sm btn-info">View</a> 
                                                <a href="{{ route('faculty.edit', $member->id) }}" class="btn btn-sm btn-primary">Edit<a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this mark?')">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="{{ route('faculty.create') }}" class="btn btn-primary mt-3">Add Faculty Member</a>
            </div>
        </div>
    </div>
@endsection

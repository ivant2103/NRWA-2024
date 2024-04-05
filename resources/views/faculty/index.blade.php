<!-- index.blade.php for faculty -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Faculty Members</h1>
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
                                <a href="{{ route('faculty.show', $member->id) }}" class="btn btn-sm btn-info" style="margin-left: 5px;">View</a> <!-- Add left margin -->
                                <a href="{{ route('faculty.edit', $member->id) }}" class="btn btn-sm btn-primary" style="margin-left: 5px;">Edit</a> <!-- Add left margin -->
                                <form action="{{ route('faculty.destroy', $member->id) }}" method="POST" style="margin-left: 5px;"> <!-- Add left margin -->
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" style="color: red;" onclick="return confirm('Are you sure you want to delete this faculty member?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('faculty.create') }}" class="btn btn-primary">Add Faculty Member</a>
    </div>
@endsection

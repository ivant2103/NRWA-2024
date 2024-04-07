@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Marks</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student</th>
                                    <th>Subject</th>
                                    <th>Marks</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($marks as $mark)
                                    <tr>
                                        <td>{{ $mark->id }}</td>
                                        <td>{{ $mark->student->roll_num }}</td>
                                        <td>{{ $mark->subject->name }}</td>
                                        <td>{{ $mark->marks }}</td>
                                        <td>
                                            <a href="{{ route('marks.show', $mark->id) }}" class="btn btn-sm btn-info">View</a>
                                            <a href="{{ route('marks.edit', $mark->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('marks.destroy', $mark->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this mark?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="{{ route('marks.create') }}" class="btn btn-primary mt-3">Add Mark</a>
            </div>
        </div>
    </div>
@endsection

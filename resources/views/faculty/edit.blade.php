@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Faculty</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('faculty.update', $faculty->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $faculty->first_name }}" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $faculty->last_name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="department_id">Department</label>
                                <select id="department_id" class="form-control" name="department_id" required>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" {{ $department->id == $faculty->department_id ? 'selected' : '' }}>
                                            {{ $department->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ $faculty->phone }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('faculty.index') }}" class="btn btn-primary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

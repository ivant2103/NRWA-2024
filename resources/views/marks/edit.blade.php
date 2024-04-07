@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Mark</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('marks.update', $mark->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="student_id">Student</label>
                                <select class="form-control" id="student_id" name="student_id">
                                    @foreach($students as $student)
                                        <option value="{{ $student->roll_num }}" {{ $mark->student_id == $student->roll_num ? 'selected' : '' }}>{{ $student->first_name }} {{ $student->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subject_id">Subject</label>
                                <select class="form-control" id="subject_id" name="subject_id">
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ $mark->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="marks">Marks</label>
                                <input type="text" class="form-control" id="marks" name="marks" value="{{ $mark->marks }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Mark</button>
                            <a href="{{ route('marks.index') }}" class="btn btn-primary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

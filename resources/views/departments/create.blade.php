@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Department') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('departments.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="hod_id">{{ __('Head of Department') }}</label>
                            <select id="hod_id" class="form-control @error('hod_id') is-invalid @enderror" name="hod_id" required>
                                @foreach ($faculty as $facultyMember)
                                    <option value="{{ $facultyMember->id }}">
                                        {{ $facultyMember->first_name }} {{ $facultyMember->last_name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('hod_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contact Us</h1>
    
    <h2>Address</h2>
    <p>[Your College Address]</p>

    <h2>Phone</h2>
    <p>[College Phone Number]</p>

    <h2>Email</h2>
    <p>[College Email Address]</p>

    <h2>Contact Form</h2>
    <form method="POST" action="{{ route('contact.submit') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Send Message</button>
    </form>
</div>
@endsection

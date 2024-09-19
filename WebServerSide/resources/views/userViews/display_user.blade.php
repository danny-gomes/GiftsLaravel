@extends('layout.main_layout')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Edit User</h2>

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('user.createUser', $user->id) }}">
            @csrf

            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control"
                       id="name" name="name" value="{{ $user->name }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email"
                       value="{{ $user->email }}" disabled>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection

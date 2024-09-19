@extends('layout.main_layout')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Add New Gift</h2>
        <form method="POST" action="{{ route('gift.createGift') }}">
            @csrf

            <div class="mb-3">
                <label for="gift_name" class="form-label">Gift Name</label>
                <input type="text" class="form-control" id="gift_name" name="gift_name" placeholder="Enter the gift name" required>
                @error('gift_name')
                    Error in gift name.
                @enderror
            </div>

            <div class="mb-3">
                <label for="expected_value" class="form-label">Expected Value</label>
                <input type="number" class="form-control" id="expected_value" name="expected_value" placeholder="Enter the expected value" step="0.01" required>
                @error('expected_value')
                    Error in expected value
                @enderror
            </div>

            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select class="form-control" id="user_id" name="user_id" required>
                    <option value="">Select User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

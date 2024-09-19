@extends('layout.main_layout')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Edit Gift</h2>

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

        <form method="POST" action="{{ route('gift.createGift', $gift->id)}}">
            @csrf

            <input type="hidden" name="id" value="{{ $gift->id }}">

            <div class="mb-3">
                <label for="gift_name" class="form-label">Gift Name</label>
                <input type="text" class="form-control"
                       id="gift_name" name="gift_name" value="{{ $gift->gift_name }}" required>
                @error('gift_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="expected_value" class="form-label">Expected Value</label>
                <input type="number" step="0.01" class="form-control"
                       id="expected_value" name="expected_value" value="{{ $gift->expected_value }}" required>
                @error('expected_value')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="money_spent" class="form-label">Money Spent</label>
                <input type="number" step="0.01" class="form-control"
                       id="money_spent" name="money_spent" value="{{ $gift->money_spent }}">
                @error('money_spent')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select class="form-control" id="user_id" name="user_id" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $gift->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Gift</button>
            <a href="{{ route('gift.showAllGifts') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection

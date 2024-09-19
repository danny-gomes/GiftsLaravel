@extends('layout.main_layout')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Gift List</h2>
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <form action="">
            <label for="searchGift">Gift search:</label>
            <input type="text" name="searchGift" id="searchGift">
            <button class="btn btn-info" type="submit">Search</button>
            <a href="{{ route('gift.showAllGifts') }}" class="btn btn-danger">Cancel search</a>
        </form>
        <form action="">
            <label for="searchRecipient">Recipient search:</label>
            <input type="text" name="searchRecipient" id="searchRecipient">
            <button class="btn btn-info" type="submit">Search</button>
            <a href="{{ route('gift.showAllGifts') }}" class="btn btn-danger">Cancel search</a>
        </form>
        @if ($gifts->isEmpty())
        <div class="alert alert-info">
            No gifts found.
        </div>
         @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Gift Name</th>
                    <th scope="col">Expected Value</th>
                    <th scope="col">Money Spent</th>
                    <th scope="col">Difference</th>
                    <th scope="col">Recipient</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gifts as $gift)
                    <tr>
                        <th scope="row">{{ $gift->id }}</th>
                        <td>{{ $gift->gift_name }}</td>
                        <td>{{ $gift->expected_value }}€</td>
                        <td>
                            @if ($gift->money_spent)
                                {{ $gift->money_spent}}€
                            @else
                                Not bought
                            @endif
                        </td>
                        <td>
                        @if ($gift->money_spent)
                            {{ $gift->money_spent - $gift->expected_value}}€
                        @else
                            Not bought
                        @endif
                        </td>

                        <td>{{ $gift->user->name }}</td>
                        <td>
                            <a href="{{ route('gift.displayGift', $gift->id) }}" class="btn btn-info btn-sm">View/Edit</a>
                            <a href="{{ route('gift.deleteGift', $gift->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
@endsection

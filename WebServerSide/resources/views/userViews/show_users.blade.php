@extends('layout.main_layout')
  @section('content')
  <div class="container mt-5">
    <h2 class="mb-4">Users List</h2>
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <form action="">
        <label for="search">User search:</label>
        <input type="text" name="search" id="search">
        <button class="btn btn-info" type="submit">Search</button>
        <a href="{{ route('user.showAllUsers') }}" class="btn btn-danger">Cancel search</a>

    </form>
    @if ($users->isEmpty())
        <div class="alert alert-info">
            No users found.
        </div>
    @else
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('user.displayUser', $user->id) }}" class="btn btn-info btn-sm me-2">View/Edit</a>
                            <a href="{{ route('user.deleteUser', $user->id)}}" class="btn btn-danger btn-sm me-2">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Home</a>
</div>
  @endsection

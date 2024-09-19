@extends('layout.main_layout')

@section('content')
    <div class="container mt-5 text-center">
        <h1>Welcome to the Application</h1>
        <p class="lead">Navigate to different sections using the buttons below:</p>

        <div class="row">
            <div class="col-md-6 mb-3">
                <a href="{{ route('user.showAllUsers') }}" class="btn btn-primary btn-lg btn-block">Show All Users</a>
            </div>
            <div class="col-md-6 mb-3">
                <a href="{{ route('user.addUser') }}" class="btn btn-success btn-lg btn-block">Add User</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <a href="{{ route('gift.showAllGifts') }}" class="btn btn-info btn-lg btn-block">Show All Gifts</a>
            </div>
            <div class="col-md-6 mb-3">
                <a href="{{ route('gift.addGift') }}" class="btn btn-warning btn-lg btn-block">Add Gift</a>
            </div>
        </div>
    </div>
@endsection

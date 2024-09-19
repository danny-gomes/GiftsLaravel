@extends('layout.main_layout')
  @section('content')
     <div class="container mt-5">
     <h2 class="mb-4">Add New User</h2>
     <form method="POST" action="{{ route('user.createUser') }}">
           @csrf
           <div class="mb-3">
               <label for="name" class="form-label">Name</label>
               <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
           </div>

           <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
              <div class="form-text">We'll never share your email with anyone else.</div>
          </div>

          <div class="mb-3">
             <label for="password" class="form-label">Password</label>
             <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

  @endsection

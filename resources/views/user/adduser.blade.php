@extends('master')

@section('content')
@if (Auth::user()->role == 'admin')
<title>Add User</title>
@include('sidebar.admin')
<script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>

<link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">

 <form action="{{ route('user.addadmin') }}" method="post" >

            @csrf

            <div class="signupbox">
                @if (Session::get('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
             @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
            @endif

                <h3 class="col-md-6 offset-md-3">Add User</h3>
                           
            <div class="col-md-6 offset-md-3" style="margin-top: 10px">
                <label for="name" style="color:#130200;">Fullname</label>
                <input type="text" name="name" class="form-control" placeholder="Fullname" value="{{ old('name') }}" >
                <span class="text-danger">@error('name') {{ $message }} @enderror</span><br>
                
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                <span class="text-danger">@error('email') {{ $message }} @enderror</span><br>

                <label for="Phonenumber">Phone Number</label>
                <input type="number" name="pnumber" class="form-control" placeholder="Phone number" value="{{ old('pnumber') }}">
                <span class="text-danger">@error('pnumber') {{ $message }} @enderror</span><br>

                <label for="Address">Address details</label>
                <input type="text" name="address" class="form-control" placeholder="address" value="{{ old('address') }}">
                <span class="text-danger">@error('address') {{ $message }} @enderror</span><br>

                 <label for="role">Role</label>
                <input type="text" name="role" value="admin" class="form-control" readonly><br>

                <label for="Password">Password</label>
                <input type="Password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
                 <span class="text-danger">@error('password') {{ $message }} @enderror</span><br>

                 <label for="Confirm Password">Confirm Password</label>
                <input type="Password" name="cpassword" class="form-control" placeholder="Confirm Password"  value="{{ old('cpassword') }}"><br>
                 <span class="text-danger">@error('cpassword') {{ $message }} @enderror</span>
                 
                <button type="submit" class="btn btn-primary" style="left:32%;">Register User</button><br>

            </div> 
                
        
            </div>
        
        </form><br>

        
@endif
@endsection


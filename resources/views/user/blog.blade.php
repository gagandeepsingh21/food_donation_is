@extends('master')

@section('content')
@if (Auth::user()->role == 'admin')
<title>Add User</title>
@include('sidebar.admin')
<script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>

<link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">

 <form action="{{ route('user.cblog') }}" method="post" >


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

                <h3 class="col-md-6 offset-md-3">Add Blog</h3>
                           
            <div class="col-md-6 offset-md-3" style="margin-top: 10px">
                <label for="bname" style="color:#130200;">Blog name</label>
                <input type="text" name="bname" class="form-control" placeholder="Blog name" value="{{ old('bname') }}" >
                <span class="text-danger">@error('bname') {{ $message }} @enderror</span><br>
                
                <label for="bdate">Blog Date</label>
                <input type="date" name="bdate" class="form-control" value="{{ old('bdate') }}">
                <span class="text-danger">@error('bdate') {{ $message }} @enderror</span><br>

                 <label for="About">Feedback/Complaint</label>
                <textarea name="about" rows="6" cols="60" placeholder="Write your blog about the wastage of food and Donation here..." class="form-control"></textarea><br>

                <button type="submit" class="btn btn-primary" style="left:32%;">Post blog</button><br>

            </div> 
                
        
            </div>
        
        </form><br>

        
@endif
@endsection


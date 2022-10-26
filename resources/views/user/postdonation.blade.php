@extends('master')

@section('content')
@if (Auth::user()->role == 'organization')
<title>Create Donation Post</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" >
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" ></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" ></script>
            <script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
@include('sidebar.organization') 
     <form action="upload" method="post" enctype="multipart/form-data">

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

            <h3 class="col-md-6 offset-md-3">Create Donation Post</h3>
            
               
            <div class="col-md-6 offset-md-3" style="margin-top: 10px">
                
                <label for="image" style="color:#130200;">Image</label>
                <input type="file" name="pimage" class="form-control" placeholder="image" value="{{ old('pimage') }}" >
                <span class="text-danger">@error('pimage') {{ $message }} @enderror</span><br>
                
                <label  for="title">Donation Title</label>
                <input type="text" name="dtitle" class="form-control" placeholder="Donation name" value="{{ old('dtitle') }}">
                <span class="text-danger">@error('dtitle') {{ $message }} @enderror</span><br>

                <label for="Description">Description</label>
                <textarea name="description" rows="4" cols="60" placeholder="Please give a brief description about your donation drive for example like where the donation is carried including other details..." class="form-control" value="{{ old('description') }}"></textarea><br>

                <label for="role">Donation Quantity</label>
                 <input type="number" name="dquantity" class="form-control" placeholder="Donation Quantity" value="{{ old('dquanity') }}">
                <span class="text-danger">@error('dquantity') {{ $message }} @enderror</span><br>

                <label for="Phonenumber">Phone Number</label>
                <input type="number" name="pnumber" class="form-control" placeholder="Phone number" value="{{ old('pnumber') }}">
                <span class="text-danger">@error('pnumber') {{ $message }} @enderror</span><br>

                <label for="Address">Address details</label>
                <input type="text" name="address" class="form-control" placeholder="Please enter your head office location" value="{{ old('address') }}">
                <span class="text-danger">@error('address') {{ $message }} @enderror</span><br>

                 <label for="donDate">Donation post date</label>
                <input type="date" name="dondate" class="form-control"  value="{{ old('donpdate') }}"><br>
                 <span class="text-danger">@error('dondate') {{ $message }} @enderror</span>
                 
                <button type="submit" class="btn btn-primary" style="left:32%;">Create post</button><br>
                

            </div> 
                
        
            </div>
        
        </form>


        
@endif
@endsection

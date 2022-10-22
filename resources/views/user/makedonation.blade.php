@extends('master')

@section('content')
@if(Auth::user()->role == 'donor')
 @include('sidebar.donor')
 <title>Make Donation</title>
 <script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>

      <form action="{{ url('user/postdonation')}}" method="post" enctype="multipart/form-data">

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
              
            <button type="submit" class="btn btn-primary" style="float: right; margin:8px;" > Make Money donation </button><br>
            
            <hr style="margin-top:30px;">
            <h3 class="col-md-6 offset-md-3">Make Donation</h3>
            
               
            <div class="col-md-6 offset-md-3" style="margin-top: 10px">
                
                <input type="hidden" name="id" value="{{ $donate['id']}}">
                <label  for="title">Please indicate the type of food item you will be donating:</label><br>
                <select name="foodtype" id="foodtype" class="form-control">
                    <option value="Cooked food">Cooked food</option>
                    <option value="packed food">Packed food items</option>
                </select><br>

                 <label for="quantity">Please write the number of meals you would like to donate: </label><br>
                 <input type="number" name="qmeals" class="form-control" placeholder="Number of meals" value="{{ old('qmeals') }}">
                <span class="text-danger">@error('qmeals') {{ $message }} @enderror</span><br>


                <label for="Message">Please write any message for this donation</label>
                <textarea name="message" rows="4" cols="60" placeholder="Please write any message for this donation...." class="form-control" value="{{ old('message') }}"></textarea><br>

               
                <label for="Phonenumber">Phone Number</label>
                <input type="number" name="pnum" class="form-control" placeholder="Phone number" value="{{ old('pnum') }}">
                <span class="text-danger">@error('pnum') {{ $message }} @enderror</span><br>

                <label for="Address">Address details</label>
                <input type="text" name="address" class="form-control" placeholder="My address" value="{{ old('address') }}">
                <span class="text-danger">@error('address') {{ $message }} @enderror</span><br>

                 <label for="date_donated">Date donated:</label>
                <input type="date" name="date" class="form-control"  value="{{ old('date') }}"><br>
                 <span class="text-danger">@error('date') {{ $message }} @enderror</span>
                 
                <button type="submit" class="btn btn-primary" style="left:32%; width:100%;">Donate</button><br><br>
               
                

            </div> 
                
        
            </div>
        
        </form>


 @endif
 @endsection
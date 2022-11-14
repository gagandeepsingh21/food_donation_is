@extends('master')

@section('content')

    {{-- admin's view --}}
    @if (Auth::user()->role == 'admin')

       
        @include('sidebar.admin')
        <script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>
        


         @if( auth()->check())
                    {{-- <h3><p>{{ auth()->user()->role }} Dashboard</h3> --}}
                    {{-- <h3>Welcome, {{ auth()->user()->name }}</h3> --}}

 <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-top: 10px">
                 <h4>My Details</h4><hr>
                 <form action="{{ url('user/updatedetails',auth()->user()->id) }}" method="post"> 
                    @csrf
                    @method('PUT')
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
                  <label for="name" style="color:#130200;">Fullname</label>
                 
                <input type="text" class="form-control" name="name" placeholder="Fullname" value="{{ auth()->user()->name }}" >
               
                
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ auth()->user()->email }}" readonly>

                <label for="role">Role</label>
                <input type="text" name="role" class="form-control" value="{{ auth()->user()->role }}" readonly>
      

                <label for="Phonenumber">Phone Number</label>
                <input type="number" name="pnumber" class="form-control" placeholder="Phone number" value="{{ auth()->user()->pnumber }}"><br>
                {{-- <span class="text-danger">@error('pnumber') {{ $message }} @enderror</span><br> --}}

                <label for="Address">Address details</label>
                <iframe width="100%" height="250" src="https://maps.google.com/maps?q={{ auth()->user()->address }}&output=embed"></iframe> 
                 <input type="text" name="address" class="form-control" placeholder="address" value="{{ auth()->user()->address }}"><br> 

                
                
                {{-- <span class="text-danger">@error('address') {{ $message }} @enderror</span><br>  --}}

                {{-- <label for="role">Role</label>
                <input type="text" name="role" value="donor" readonly><br><br>

                <label for="Password">Password</label>
                <input type="Password" name="password" class="form-control" placeholder="Password" value="{{ auth()->user()->password }}"><br>
                 --}}

                
                 
                <button type="submit" class="btn btn-primary">Update</button><br><br>

                 </form>
            </div>
        </div>
    </div>
       
            
            @endif
    @endif


    {{-- Organization's view  --}}
     @if (Auth::user()->role == 'organization')
     @include('sidebar.organization')
     <script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>
        
        @if( auth()->check() )
                    {{-- <h3><p>Organization Dashboard</h3> --}}
                    {{-- <p>Welcome, {{ auth()->user()->name }}</p>

                    <div class="container"> --}}
 <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-top: 10px">
                 <h4>My Details</h4><hr>
                 <form action="{{ url('user/updatedetails',auth()->user()->id) }}" method="post"> 
                    @csrf
                    @method('PUT')
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
                  <label for="name" style="color:#130200;">Fullname</label>
                 
                <input type="text" class="form-control" name="name" placeholder="Fullname" value="{{ auth()->user()->name }}" >
               
                
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ auth()->user()->email }}" readonly>

                <label for="role">Role</label>
                <input type="text" name="role" class="form-control" value="{{ auth()->user()->role }}" readonly>
      

                <label for="Phonenumber">Phone Number</label>
                <input type="number" name="pnumber" class="form-control" placeholder="Phone number" value="{{ auth()->user()->pnumber }}"><br>
                {{-- <span class="text-danger">@error('pnumber') {{ $message }} @enderror</span><br> --}}

                <label for="Address">Address details</label>
                <iframe width="100%" height="250" src="https://maps.google.com/maps?q={{ auth()->user()->address }}&output=embed"></iframe> 
                 <input type="text" name="address" class="form-control" placeholder="address" value="{{ auth()->user()->address }}"><br> 

                
                
                {{-- <span class="text-danger">@error('address') {{ $message }} @enderror</span><br>  --}}

                {{-- <label for="role">Role</label>
                <input type="text" name="role" value="donor" readonly><br><br>

                <label for="Password">Password</label>
                <input type="Password" name="password" class="form-control" placeholder="Password" value="{{ auth()->user()->password }}"><br>
                 --}}

                
                 
                <button type="submit" class="btn btn-primary">Update</button><br><br>

                 </form>
            </div>
        </div>
    </div>
            
            @endif
    @endif

    {{-- Donor's view --}}
    @if (Auth::user()->role == 'donor')
    
        @include('sidebar.donor')
        <script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>

    
        
        @if( auth()->check() )
                    
                    {{-- <h3><p>{{ auth()->user()->role }} Dashboard</h3>    
                    <p>Welcome, {{ auth()->user()->name }}</p> --}}

     <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-top: 10px">
                 <h4>My Details</h4><hr>
                 <form action="{{ url('user/updatedetails',auth()->user()->id) }}" method="post"> 
                    @csrf
                    @method('PUT')
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
                     
                  <label for="name" style="color:#130200;">Fullname</label>
                 
                <input type="text" class="form-control" name="name" placeholder="Fullname" value="{{ auth()->user()->name }}" >
               
                
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ auth()->user()->email }}" readonly>

                <label for="role">Role</label>
                <input type="text" name="role" class="form-control" value="{{ auth()->user()->role }}" readonly>
      

                <label for="Phonenumber">Phone Number</label>
                <input type="number" name="pnumber" class="form-control" placeholder="Phone number" value="{{ auth()->user()->pnumber }}"><br>
                {{-- <span class="text-danger">@error('pnumber') {{ $message }} @enderror</span><br> --}}

                <label for="Address">Address details</label>
                <iframe width="100%" height="250" src="https://maps.google.com/maps?q={{ auth()->user()->address }}&output=embed"></iframe> 
                 <input type="text" name="address" class="form-control" placeholder="address" value="{{ auth()->user()->address }}"><br> 

                
                
                {{-- <span class="text-danger">@error('address') {{ $message }} @enderror</span><br>  --}}

                {{-- <label for="role">Role</label>
                <input type="text" name="role" value="donor" readonly><br><br>

                <label for="Password">Password</label>
                <input type="Password" name="password" class="form-control" placeholder="Password" value="{{ auth()->user()->password }}"><br>
                 --}}

                
                 
                <button type="submit" class="btn btn-primary">Update</button><br><br>

                 </form>
            </div>
        </div>
    </div>
            
            @endif
    @endif


   
@endsection
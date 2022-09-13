@extends('master')

@section('content')
    {{-- admin's view --}}
    @if (Auth::user()->role == 'admin')

       
        @include('sidebar.admin')

        


         @if( auth()->check())
                    {{-- <h3><p>{{ auth()->user()->role }} Dashboard</h3> --}}
                    {{-- <h3>Welcome, {{ auth()->user()->name }}</h3> --}}

                    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-top: 10px">
                 {{-- <h4>Organization Dashboard</h4><hr> --}}
                  <label for="name" style="color:#130200;">Fullname</label>
                <input type="text" class="form-control" name="name" placeholder="Fullname" value="{{ auth()->user()->name }}" >
               
                
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ auth()->user()->email }}">

                <label for="role">Role</label>
                <input type="text" name="role" class="form-control" value="{{ auth()->user()->role }}" readonly>
      

                <label for="Phonenumber">Phone Number</label>
                <input type="number" name="pnumber" class="form-control" placeholder="Phone number" value="{{ auth()->user()->pnumber }}"><br>
                {{-- <span class="text-danger">@error('pnumber') {{ $message }} @enderror</span><br> --}}

                <label for="Address">Address details</label>
                <input type="text" name="address" class="form-control" placeholder="address" value="{{ auth()->user()->address }}"><br>
                {{-- <span class="text-danger">@error('address') {{ $message }} @enderror</span><br>  --}}

                <label for="role">Role</label>
                <input type="text" name="role" value="donor" readonly><br><br>

                <label for="Password">Password</label>
                <input type="Password" name="password" class="form-control" placeholder="Password" value="{{ auth()->user()->password }}"><br>
                

                
                 
                <button type="submit" class="btn btn-primary">Update</button><br><br>
            </div>
        </div>
    </div>
         </div>
       
            
            @endif
    @endif


    {{-- Organization's view  --}}
     @if (Auth::user()->role == 'organization')
     @include('sidebar.organization')
        
        @if( auth()->check() )
                    {{-- <h3><p>Organization Dashboard</h3> --}}
                    {{-- <p>Welcome, {{ auth()->user()->name }}</p>

                    <div class="container"> --}}
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-top: 10px">
                 {{-- <h4>Organization Dashboard</h4><hr> --}}
                  <label for="name" style="color:#130200;">Fullname</label>
                <input type="text" class="form-control" name="name" placeholder="Fullname" value="{{ auth()->user()->name }}" >
               
                
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ auth()->user()->email }}">

                <label for="role">Role</label>
                <input type="text" name="role" class="form-control" value="{{ auth()->user()->role }}" readonly>
      

                <label for="Phonenumber">Phone Number</label>
                <input type="number" name="pnumber" class="form-control" placeholder="Phone number" value="{{ auth()->user()->pnumber }}"><br>
                {{-- <span class="text-danger">@error('pnumber') {{ $message }} @enderror</span><br> --}}

                <label for="Address">Address details</label>
                <input type="text" name="address" class="form-control" placeholder="address" value="{{ auth()->user()->address }}"><br>
                {{-- <span class="text-danger">@error('address') {{ $message }} @enderror</span><br>  --}}

                <label for="role">Role</label>
                <input type="text" name="role" value="donor" readonly><br><br>

                <label for="Password">Password</label>
                <input type="Password" name="password" class="form-control" placeholder="Password" value="{{ auth()->user()->password }}"><br>
                

                
                 
                <button type="submit" class="btn btn-primary">Update</button><br><br>
            </div>
        </div>
    </div>
            
            @endif
    @endif

    {{-- Donor's view --}}
    @if (Auth::user()->role == 'donor')
    
        @include('sidebar.donor')

    
        
        @if( auth()->check() )
                    
                    {{-- <h3><p>{{ auth()->user()->role }} Dashboard</h3>    
                    <p>Welcome, {{ auth()->user()->name }}</p> --}}

     <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-top: 10px">
                 {{-- <h4>Organization Dashboard</h4><hr> --}}
                  <label for="name" style="color:#130200;">Fullname</label>
                <input type="text" class="form-control" name="name" placeholder="Fullname" value="{{ auth()->user()->name }}" >
               
                
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ auth()->user()->email }}">

                <label for="role">Role</label>
                <input type="text" name="role" class="form-control" value="{{ auth()->user()->role }}" readonly>
      

                <label for="Phonenumber">Phone Number</label>
                <input type="number" name="pnumber" class="form-control" placeholder="Phone number" value="{{ auth()->user()->pnumber }}"><br>
                {{-- <span class="text-danger">@error('pnumber') {{ $message }} @enderror</span><br> --}}

                <label for="Address">Address details</label>
                <input type="text" name="address" class="form-control" placeholder="address" value="{{ auth()->user()->address }}"><br>
                {{-- <span class="text-danger">@error('address') {{ $message }} @enderror</span><br>  --}}

                <label for="role">Role</label>
                <input type="text" name="role" value="donor" readonly><br><br>

                <label for="Password">Password</label>
                <input type="Password" name="password" class="form-control" placeholder="Password" value="{{ auth()->user()->password }}"><br>
                

                
                 
                <button type="submit" class="btn btn-primary">Update</button><br><br>
            </div>
        </div>
    </div>
            
            @endif
    @endif


   
@endsection
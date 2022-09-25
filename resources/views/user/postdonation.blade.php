@if (Auth::user()->role == 'organization')
<title>Create Donation Post</title>
@include('sidebar.organization') 
     <form action="upload" method="post" enctype="multipart/form-data">

            @csrf

            <div class="signupbox">

                <h3 class="col-md-6 offset-md-3">Create Donation Post</h3>
                
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
               
            <div class="col-md-6 offset-md-3" style="margin-top: 10px">
                
                <label for="image" style="color:#130200;">Image</label>
                <input type="file" name="pimage" class="form-control" placeholder="image" value="{{ old('pimage') }}" >
                <span class="text-danger">@error('pimage') {{ $message }} @enderror</span><br>
                
                <label  for="title">Donation Title</label>
                <input type="text" name="dtitle" class="form-control" placeholder="Donation name" value="{{ old('dtitle') }}">
                <span class="text-danger">@error('dtitle') {{ $message }} @enderror</span><br>

                <label for="role">Donation Quantity</label>
                 <input type="number" name="dquantity" class="form-control" placeholder="Donation Quantity" value="{{ old('dquanity') }}">
                <span class="text-danger">@error('dquantity') {{ $message }} @enderror</span><br>

                <label for="Phonenumber">Phone Number</label>
                <input type="number" name="pnumber" class="form-control" placeholder="Phone number" value="{{ old('pnumber') }}">
                <span class="text-danger">@error('pnumber') {{ $message }} @enderror</span><br>

                <label for="Address">Address details</label>
                <input type="text" name="address" class="form-control" placeholder="address" value="{{ old('address') }}">
                <span class="text-danger">@error('address') {{ $message }} @enderror</span><br>

                 <label for="donDate">Donation post date</label>
                <input type="date" name="dondate" class="form-control"  value="{{ old('donpdate') }}"><br>
                 <span class="text-danger">@error('dondate') {{ $message }} @enderror</span>
                 
                <button type="submit" class="btn btn-primary" style="left:32%;">Create post</button><br>
                

            </div> 
                
        
            </div>
        
        </form>


        
@endif

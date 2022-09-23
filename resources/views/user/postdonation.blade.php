@if (Auth::user()->role == 'organization')
<title>Create Donation Post</title>
@include('sidebar.organization')
     <form action="" method="post" >

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
                <input type="file" name="image" class="form-control" placeholder="image" value="{{ old('image') }}" >
                <span class="text-danger">@error('image') {{ $message }} @enderror</span><br>
                
                <label for="title">Donation name</label>
                <input type="text" name="dname" class="form-control" placeholder="Donation name" value="{{ old('dname') }}">
                <span class="text-danger">@error('dname') {{ $message }} @enderror</span><br>

                <label for="role">Donation Type</label>
                 <select name="dtype" id="dtype" class="form-control">
                    <option value="cooked meals">Cooked meals</option>
                    <option value="Purchased food">Purchased food items</option>
                </select><br>

                <label for="Phonenumber">Phone Number</label>
                <input type="number" name="pnumber" class="form-control" placeholder="Phone number" value="{{ old('pnumber') }}">
                <span class="text-danger">@error('pnumber') {{ $message }} @enderror</span><br>

                <label for="Address">Address details</label>
                <input type="text" name="address" class="form-control" placeholder="address" value="{{ old('address') }}">
                <span class="text-danger">@error('address') {{ $message }} @enderror</span><br>

                 <label for="donDate">Donation date</label>
                <input type="date" name="date" class="form-control"  value="{{ old('date') }}"><br>
                 <span class="text-danger">@error('date') {{ $message }} @enderror</span>
                 
                <button type="submit" class="btn btn-primary" style="left:32%;">Create post</button><br>
                

            </div> 
                
        
            </div>
        
        </form>


        
@endif

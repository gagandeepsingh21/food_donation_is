 @extends('master')

@section('content')
 @if(Auth::user()->role == 'donor')
 @include('sidebar.donor')
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
 <script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>
 <title>Approved Donation Details</title>



     <form>

            @csrf


            <h3 class="col-md-6 offset-md-3">Approved Donation Post</h3>
            
               
            <div class="col-md-6 offset-md-3" style="margin-top: 10px">
                <label for="image" style="color:#130200;">Donation Image</label><br>
                <div style="text-align: center;">
                
                 <img src="{{ asset('uploads/students/'.$adons->image) }}"
                       width="400px" height="250px" alt="donImage">
                </div><br>
                
                <label  for="title">Donation Title</label>
                <input type="text" name="dtitle" class="form-control" placeholder="Donation name" value="{{ $adons->dtitle }}"><br>

                <label for="Description">Description</label>
                <textarea name="descrip" rows="4" cols="60" placeholder="{{ $adons->description }}" class="form-control" ></textarea><br>
                

                <label for="role">Donation Quantity</label>
                 <input type="number" name="dquantity" class="form-control" placeholder="Donation Quantity" value="{{ $adons->dquantity}}"><br>
                

                <label for="Phonenumber">Phone Number</label>
                <input type="number" name="pnumber" class="form-control" placeholder="Phone number" value="{{$adons->pnumber }}"><br>
                

                <label for="Address">Address details</label>
                <iframe width="100%" height="250" src="https://maps.google.com/maps?q={{ $adons->location }}&output=embed"></iframe><br><br>
                <input type="text" name="address" class="form-control" placeholder="address" value="{{ $adons->location }}"><br>
                {{-- <input type="text" name="address" class="form-control" placeholder="address" value="{{ $donposts->location }}"> --}}
                

                 <label for="donDate">Date of Donation</label>
                <input type="date" name="dondate" class="form-control"  value="{{ $adons->date}}"><br><br>

             
                 
                 

                

            </div> 
                
        
            </div>
        
        </form>
 @endif
 @endsection
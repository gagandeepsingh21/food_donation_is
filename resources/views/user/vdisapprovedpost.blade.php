 @extends('master')

@section('content')
 @if(Auth::user()->role == 'organization')
 @include('sidebar.organization')
 <script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>
 <title>Approved Donation Details</title>



     <form>

            @csrf


            <h3 class="col-md-6 offset-md-3">Approved Donation Details</h3>
            
               
            <div class="col-md-6 offset-md-3" style="margin-top: 10px">
                <label for="image" style="color:#130200;">Donation Image</label><br>
                <div style="text-align: center;">
                
                 <img src="{{ asset('uploads/students/'.$donp->image) }}"
                       width="400px" height="250px" alt="donImage">
                </div><br>
                
                <label  for="title">Donation Title</label>
                <input type="text" name="dtitle" class="form-control" placeholder="Donation name" value="{{ $donp->dtitle }}" readonly><br>

                <label for="Description">Description</label>
                <textarea name="descrip" rows="4" cols="60" placeholder="Please write description your donation here...." class="form-control" readonly> {{ $donp->description }}</textarea><br>
                

                <label for="role">Donation Quantity</label>
                 <input type="number" name="dquantity" class="form-control" placeholder="Donation Quantity" value="{{ $donp->dquantity}}" readonly><br>
                

                <label for="Phonenumber">Phone Number</label>
                <input type="number" name="pnumber" class="form-control" placeholder="Phone number" value="{{$donp->pnumber }}" readonly><br>
                

                <label for="Address">Address details</label>
                <iframe width="100%" height="250" src="https://maps.google.com/maps?q={{ $donp->location }}&output=embed"></iframe><br><br>
                <input type="text" name="address" class="form-control" placeholder="address" value="{{ $donp->location }}" readonly><br>

                

                 <label for="donDate">Date of Donation</label>
                <input type="date" name="dondate" class="form-control"  value="{{ $donp->date}}" readonly><br><br>

           
             
                 
                 

                

            </div> 
                
        
            </div>
        
        </form>
 @endif
 @endsection
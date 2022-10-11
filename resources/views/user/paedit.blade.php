 @if(Auth::user()->role == 'organization')
 @include('sidebar.organization')
 <title>Edit Details</title>



     <form action="{{ url('user/update-post',$upost->id) }}" method="post" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <h3 class="col-md-6 offset-md-3">Edit Donation Details</h3>
            
               
            <div class="col-md-6 offset-md-3" style="margin-top: 10px">
                <label for="image" style="color:#130200;">Donation Image</label><br>
                <div style="text-align: center;">
                
                <label for="image" style="color:#130200;">Image</label>
                <input type="file" name="pimage" class="form-control" placeholder="image" value="{{ asset('uploads/students/'.$upost->image) }}" >

                
                <label  for="title">Donation Title</label>
                <input type="text" name="dtitle" class="form-control" placeholder="Donation name" value="{{ $upost->dtitle }}"><br>

                 <label for="Description">Description</label>
                <textarea name="description" rows="4" cols="60" placeholder="" class="form-control" value="{{ $upost->description }}">{{ $upost->description }}</textarea><br>
                

                <label for="role">Donation Quantity</label>
                 <input type="number" name="dquantity" class="form-control" placeholder="Donation Quantity" value="{{ $upost->dquantity}}"><br>
                

                <label for="Phonenumber">Phone Number</label>
                <input type="number" name="pnumber" class="form-control" placeholder="Phone number" value="{{$upost->pnumber }}"><br>
                

                <label for="Address">Address details</label>
                <iframe width="100%" height="250" src="https://maps.google.com/maps?q={{ $upost->location }}&output=embed"></iframe><br><br>
                <input type="text" name="address" class="form-control" placeholder="address" value="{{ $upost->location }}"><br>
                {{-- <input type="text" name="address" class="form-control" placeholder="address" value="{{ $donposts->location }}"> --}}
                

                 <label for="donDate">Date of Donation</label>
                <input type="date" name="dondate" class="form-control"  value="{{ $upost->date}}"><br><br>

           
                <button type="submit" class="btn btn-primary" style="left:32%;">Update post</button><br>
                 
                 

                

            </div> 
                
        
            </div>
        
        </form>
 @endif
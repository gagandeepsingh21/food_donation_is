  @if(Auth::user()->role == 'admin')
 @include('sidebar.admin')
 <title>Unverified Users</title>

     <form>

            @csrf

        

            <h2 class="col-md-6 offset-md-5" style="margin-top:10px;">View Donation details</h2>
          
            
            
               
            <div class="col-md-6 offset-md-3" style="margin-top: 10px">
                <label for="image" style="color:#130200;">Donation Image</label><br>
                <div style="text-align: center;">
                
                 <img src="{{ asset('uploads/students/'.$donposts->image) }}"
                       width="400px" height="250px" alt="donImage">
                </div><br>
                
                <label  for="title">Donation Title</label>
                <input type="text" name="dtitle" class="form-control" placeholder="Donation name" value="{{ $donposts->dtitle }}" style="width: 100%;"><br>

                                  <label for="Description">Description</label>
                <textarea name="descrip" rows="4" cols="60" placeholder="Please write description your donation here...." class="form-control" readonly> {{ $donposts->description }}</textarea><br>


                <label for="role">Donation Quantity</label>
                 <input type="number" name="dquantity" class="form-control" placeholder="Donation Quantity" value="{{ $donposts->dquantity}}"><br>
                

                <label for="Phonenumber">Phone Number</label>
                <input type="number" name="pnumber" class="form-control" placeholder="Phone number" value="{{$donposts->pnumber }}"><br>
                

                <label for="Address">Address details</label>
                <iframe width="100%" height="250" src="https://maps.google.com/maps?q={{ $donposts->location }}&output=embed"></iframe><br><br>
                <input type="text" name="address" class="form-control" placeholder="address" value="{{ $donposts->location }}" readonly><br>
               
                

                 <label for="donDate">Date of Donation</label>
                <input type="date" name="dondate" class="form-control"  value="{{ $donposts->date}}"><br><br>

                

        <button class="btn btn-success" style="width:100%;"> <a  href="{{ url('user/approved',$donposts->id) }}" style="font-size:12px; text-decoration:none; color:white;">Approve</a></button>                 
                 

                

            </div> 

            
        
        </form>
 @endif
  @if(Auth::user()->role == 'admin')
 @include('sidebar.admin')
 <title>Verified Users</title>



     <form>

            @csrf


            <h3 class="col-md-6 offset-md-3">View Donation details</h3>
            
               
            <div class="col-md-6 offset-md-3" style="margin-top: 10px">
                <label for="image" style="color:#130200;">Donation Image</label><br>
                <div style="text-align: center;">
                
                 <img src="{{ asset('uploads/students/'.$donposts->image) }}"
                       width="400px" height="250px" alt="donImage">
                </div><br>
                
                <label  for="title">Donation Title</label>
                <input type="text" name="dtitle" class="form-control" placeholder="Donation name" value="{{ $donposts->dtitle }}" readonly><br>

                  <label for="Description">Description</label>
                <textarea name="descrip" rows="4" cols="60" placeholder="Please write description your donation here...." class="form-control" readonly> {{ $donposts->description }}</textarea><br>

                <label for="role">Donation Quantity</label>
                 <input type="number" name="dquantity" class="form-control" placeholder="Donation Quantity" value="{{ $donposts->dquantity}}" readonly><br>
                

                <label for="Phonenumber">Phone Number</label>
                <input type="number" name="pnumber" class="form-control" placeholder="Phone number" value="{{$donposts->pnumber }}" readonly><br>
                

                <label for="Address">Address details</label>
                <iframe width="100%" height="250" src="https://maps.google.com/maps?q={{ $donposts->location }}&output=embed"></iframe><br><br>
                <input type="text" name="address" class="form-control" placeholder="address" value="{{ $donposts->location }}" readonly><br>
                {{-- <input type="text" name="address" class="form-control" placeholder="address" value="{{ $donposts->location }}"> --}}
                

                 <label for="donDate">Date of Donation</label>
                <input type="date" name="dondate" class="form-control"  value="{{ $donposts->date}}" readonly><br><br>

           <button class="btn btn-danger" style="width: 100%;"> <a  href="{{ url('user/disapprove',$donposts->id) }}" style="font-size:12px; color:white; text-decoration:none;">Reject</a></button>
             
                 
                 

                

            </div> 
                
        
            </div>
        
        </form>
 @endif
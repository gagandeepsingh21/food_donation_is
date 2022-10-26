  @extends('master')

@section('content')
  @if(Auth::user()->role == 'admin')
 @include('sidebar.admin')
 <script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>
 <title>Verified Users</title>



     <form>

            @csrf
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

                @if ($donposts->isset==0)
                        <button class="btn btn-success"  style="width: 100%;"><a href="{{ url('user/approved',$donposts->id) }}" style="font-size:12px; color:white; text-decoration:none;">
                        Approve
                    </a></button>
                        @else
                       <button class="btn btn-danger" style="width: 100%;"> <a  href="{{ url('user/disapprove',$donposts->id) }}" style="font-size:12px; color:white; text-decoration:none;">Reject</a></button>

                            
                        @endif
                
             
                 
                 

                

            </div> 
                
        
            </div><br>
        
        </form>
 @endif
 @endsection
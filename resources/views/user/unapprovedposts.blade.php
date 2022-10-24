 @extends('master')

@section('content')
 @if(Auth::user()->role == 'organization')
 @include('sidebar.organization')
<script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>
 <title>Unapproved/Closed Donations</title>

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
         <h3 style="text-align: center; padding:5px;">Posts Requiring Approval/Closed posts</h3>   

    {{-- <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">No. of Meals</th>
                <th scope="col">Location</th>
                <th scope="col">Phone number</th>
                <th scope="col">Date</th>
                <th scope="col"> Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead> --}}
    
        @foreach ($dons as $don)
        <div style="width:350px; height:450px; border:1px solid gray; border-radius:5px;margin-top:5px; margin-left:35%;  text-align:center;"> 
            <img src="{{ asset('uploads/students/'.$don->image) }}"
                       width="150px" height="150px" style="margin-left: 30px; margin-top:12px" alt="donImage">
                    </td><br><br>
           <strong>Donation Title: </strong> {{ $don->dtitle }}<br>
           <strong>Donation Quantity: </strong> {{ $don->dquantity}} meals<br>
           <strong>Donation Location: </strong> {{ $don->location}}<br>
           <strong>Contact Details: </strong> {{ $don->pnumber }}<br>
           <strong>Donation Date: </strong> {{ $don->date }}<br><br>
           <strong>Status: </strong> @if ($don->isset==0)
                        <label class="btn btn-sm btn-danger">Inactive</label><br><br>
                        @else
                        <label class="btn btn-sm btn-success">Active</label><br><br>
                            
                        @endif
                        

                    
                        <a class="btn btn-primary" href=" {{ url('user/vapprovedpost',$don->id) }}" style="font-size:12px">View</a>
                        <a class="btn btn-success" href="{{ url('user/paedit',$don->id) }}" style="font-size:12px">Edit</i></a>
                        <a class="btn btn-danger" href=" {{ url('user/deleteapprpost',$don->id) }}" style="font-size:12px">Delete</a>


</div><br>
            {{-- <tbody>
                <tr>
                    <td>{{ ++$i  }}</td>
                    <td>
                      <img src="{{ asset('uploads/students/'.$don->image) }}" width="50px" height="50px" alt="donImage">
                    </td>
                    <td>{{ $don->dtitle }}</td>
                    <td>{{ $don->dquantity}}</td>
                    <td>{{ $don->location}}</td>
                    <td>{{ $don->pnumber }}</td>
                    <td>{{ $don->date }}</td>
                    <td>
                        @if ($don->isset==0)
                        <label class="btn btn-sm btn-danger">Inactive</label>
                        @else
                        <label class="btn btn-sm btn-success">Active</label>
                            
                        @endif

                    </td>
                    <td>
                        <a class="btn btn-primary" href=" {{ url('user/vdisapprovedpost',$don->id) }}" style="font-size:12px">View</a>
                        <a class="btn btn-success" href="{{ url('user/paedit',$don->id) }}" style="font-size:12px">Edit</a>
                        <a class="btn btn-danger" href=" {{ url('user/deleteapprpost',$don->id) }}" style="font-size:12px">Delete</a>
                    </td>
                </tr>
            </tbody>
        
        </table> --}}
            @endforeach 
        @endif
 @endsection
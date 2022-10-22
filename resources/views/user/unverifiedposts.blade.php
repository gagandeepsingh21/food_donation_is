  @extends('master')

@section('content')
  @if(Auth::user()->role == 'admin')
 @include('sidebar.admin')
 <script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>
 <title>Unverified Users</title>


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
    <table class="table table-hover">
        
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">No. of Meals</th>
                <th scope="col">Location</th>
                <th scope="col">Phone number</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
    
        @foreach ($donations as $donation)
            <tbody>
                <tr>
                    <td>{{ ++$i  }}</td>
                    <td>
                      <img src="{{ asset('uploads/students/'.$donation->image) }}"
                       width="50px" height="50px" alt="donImage">
                    </td>
                    <td>{{ $donation->dtitle }}</td>
                    <td>{{ $donation->dquantity}}</td>
                    <td>{{ $donation->location}}</td>
                    <td>{{ $donation->pnumber }}</td>
                    <td>{{ $donation->date }}</td>
                    <td>
                        @if ($donation->isset==0)
                        <label class="btn btn-sm btn-danger">Inactive</label>
                        @else
                        <label class="btn btn-sm btn-success">Active</label>
                            
                        @endif

                    </td>
                    <td>
                        <a class="btn btn-primary" href=" {{ url('user/vunverifiedposts',$donation->id) }}" style="font-size:12px">View</a>
                        <a class="btn btn-success" href="{{ url('user/approved',$donation->id) }}" style="font-size:12px">
                            Approve
                        </a>
                        
                    </td>
                    
                        
                    
                </tr>
            </tbody>
        @endforeach
    </table>
 @endif
 @endsection
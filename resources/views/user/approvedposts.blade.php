 @if(Auth::user()->role == 'organization')
 @include('sidebar.organization')
<script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>
 <title>Approved Users</title>


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
                <th scope="col"> Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
    
        @foreach ($dons as $don)
            <tbody>
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
                        <a  href=" {{ url('user/vapprovedpost',$don->id) }}" style="font-size:12px"><i class="fa-solid fa-eye" style="color: black; font-size:14px;"></i></a>
                        <a class="btn btn-success" href="{{ url('user/paedit',$don->id) }}" style="font-size:12px"><i class="fa-solid fa-pen" style="color: black; font-size:10px;"></i></a>
                        <a class="btn btn-danger" href=" {{ url('user/deleteapprpost',$don->id) }}" style="font-size:12px"><i class="fa-solid fa-trash-can" style="color: black; font-size:14px;"></i></a>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
 @endif
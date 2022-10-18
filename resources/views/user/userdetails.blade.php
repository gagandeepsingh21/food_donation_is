@if (Auth::user()->role == 'admin')
<title>Add User</title>
@include('sidebar.admin')
<script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>

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
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone number</th>
                <th scope="col">Address</th>
                <th scope="col"> Role</th>
                <th scope="col"> Status</th>
                <th scope="col"> Action</th>

            </tr>
        </thead>
    
        @foreach ($users as $user)
            <tbody>
                <tr>
                    <td>{{ ++$i  }}</td>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->pnumber}}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        @if ($user->status==0)
                        <label class="btn btn-sm btn-danger">Blocked</label>
                        @else
                        <label class="btn btn-sm btn-success">Active</label>
                            
                        @endif

                    </td>
                    <td>
                    @if ($user->status==0)
                        <a class="btn btn-success" href="{{ url('user/blocked',$user->id) }}" style="font-size:12px">
                            Activate
                        </a>
                        @else
                        <a class="btn btn-danger" href="{{ url('user/blocked',$user->id) }}" style="font-size:12px">
                            Block
                        </a>
                            
                        @endif
                        
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>

@endif

 @if(Auth::user()->role == 'organization')
 @include('sidebar.organization')
 <title>View Donations Made</title>
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
                
                <th scope="col">Donor name</th>
                <th scope="col">Donor title</th>
                <th scope="col">Role</th>
                <th scope="col">Donation Type</th>
                <th scope="col">Meals Donated</th>
                <th scope="col">Message</th>
                <th scope="col">Phone number</th>
                <th scope="col">My Location</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
    
        @foreach ($stores as $store)
            <tbody>
                <tr>
                    
                    <td>{{ $store->name }}</td>
                    <td>{{ $store->dtitle }}</td>
                    <td>{{ $store->role}}</td>
                    <td> {{ $store->foodtype}}</td>
                    <td>{{ $store->qmeals}}</td>
                    <td>{{ $store->message}}</td>
                    <td>{{ $store->pnum }}</td>
                    <td>{{ $store->address }}</td>
                    <td>{{ $store->date }}</td>
                    <td>
                        @if ($store->dstatus==0)
                        <label class="btn btn-sm btn-danger">Pending</label>
                        @else
                        <label class="btn btn-sm btn-success">Received</label>
                            
                        @endif

                    </td>
                    <td>
                        <a class="btn btn-success" href="{{ url('user/received',$store->id) }}" style="font-size:12px">
                            Received
                        </a>
                    </td>
                    
                </tr>
            </tbody>
        @endforeach
    </table>
 @endif
 @extends('master')

@section('content')
 @if(Auth::user()->role == 'donor')
 @include('sidebar.donor')
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
                
                <th scope="col">Donation Title</th>
                <th scope="col">Role</th>
                <th scope="col">Donation Type</th>
                <th scope="col">Meals Donated</th>
                <th scope="col">Message</th>
                <th scope="col">Phone number</th>
                <th scope="col">My Location</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
    
        @foreach ($views as $view)
            <tbody>
                <tr>
                    
                    <td>{{ $view->dtitle }}</td>
                    <td>{{ $view->role}}</td>
                    <td> {{ $view->foodtype}}</td>
                    <td>{{ $view->qmeals}}</td>
                    <td>{{ $view->message}}</td>
                    <td>{{ $view->pnum }}</td>
                    <td>{{ $view->address }}</td>
                    <td>{{ $view->date }}</td>
                    <td>
                        @if ($view->dstatus==0)
                        <label class="btn btn-sm btn-danger">Pending</label>
                        @else
                        <label class="btn btn-sm btn-success">Received</label>
                            
                        @endif

                    </td>
                    
                </tr>
            </tbody>
        @endforeach
    </table>
 @endif
 @endsection


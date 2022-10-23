 @extends('master')

@section('content')
 @if(Auth::user()->role == 'donor')
 @include('sidebar.donor')
 <title>View Donations Made</title>
         <style>
            body {
        overflow-x: hidden;
        }
        #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -18rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out;
        }
        #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
        }
        #sidebar-wrapper .list-group {
        width: 17rem;
        }
        #page-content-wrapper {
        min-width: 100vw;
        }
        #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
        }
        @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: 0;
        }
        #page-content-wrapper {
            min-width: 0;
            width: 100%;
        }
        #wrapper.toggled #sidebar-wrapper {
            margin-left: -18rem;
        }
        }
        .h3, h3 {
                font-size: 1.6rem;
        }
        </style>   
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


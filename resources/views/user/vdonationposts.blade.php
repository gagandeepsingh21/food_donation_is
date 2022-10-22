@extends('master')

@section('content')
 @if(Auth::user()->role == 'donor')
 @include('sidebar.donor')
 <script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>
 <title> View Donation Posts</title>



    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">No. of Meals</th>
                {{-- <th scope="col">Meals remaining</th> --}}
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
                    <td>{{ ($don->dquantity - $don->qmeals)}}</td>
                    {{-- <td>{{ }}</td> --}}
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
                        <a class="btn btn-primary" href=" {{ url('user/vapost',$don->id) }}" style="font-size:12px">View</a>
                        <a class="btn btn-success" href=" {{ url('user/mdonation',$don->id) }}" style="font-size:12px">Donate</a>
                    </td>
                </tr>
            </tbody>
            
        @endforeach
    </table>
 @endif
 @endsection
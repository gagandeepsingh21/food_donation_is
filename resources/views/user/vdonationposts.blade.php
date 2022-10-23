@extends('master')

@section('content')
 @if(Auth::user()->role == 'donor')
 @include('sidebar.donor')
 <script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>
 <title> View Donation Posts</title>
          <style>
            body {
        overflow-x: hidden;
        }
        #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -21.5rem;
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
            margin-left: -21.5rem;
        }
        }
        .h3, h3 {
                font-size: 1.6rem;
        }
        </style>   



   <h3 style="text-align: center; padding:5px;">Approved posts</h3>   
    
        @foreach ($dons as $don)
         <div style="width:350px; height:450px; border:1px solid gray; border-radius:5px;margin-top:5px; margin-left:37%;  text-align:center;"> 
            <img src="{{ asset('uploads/students/'.$don->image) }}"
                       width="150px" height="150px" style="margin-left: 30px; margin-top:12px" alt="donImage">
                    </td><br><br>
           <strong>Donation Title: </strong> {{ $don->dtitle }}<br>
           <strong>Donation Quantity: </strong> Required {{ $don->dquantity}} meals<br>
           <strong>Donation Location: </strong> {{ $don->location}}<br>
           <strong>Contact Details: </strong> {{ $don->pnumber }}<br>
           <strong>Donation Date: </strong> {{ $don->date }}<br><br>
           <strong>Status: </strong> @if ($don->isset==0)
                        <label class="btn btn-sm btn-danger">Inactive</label><br><br>
                        @else
                        <label class="btn btn-sm btn-success">Active</label><br><br>
                            
                        @endif
                        

                    
                    <a class="btn btn-primary" href=" {{ url('user/vapost',$don->id) }}" style="font-size:12px">View</a>
                    <a class="btn btn-success" href=" {{ url('user/mdonation',$don->id) }}" style="font-size:12px">Donate</a>
                    

</div><br>
            {{-- <tbody>
                <tr>
                    <td>{{ ++$i  }}</td>
                    <td>
                      <img src="{{ asset('uploads/students/'.$don->image) }}" width="50px" height="50px" alt="donImage">
                    </td>
                    <td>{{ $don->dtitle }}</td>
                    <td>{{ ($don->dquantity - $don->qmeals)}}</td>
                    
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
        </table>     --}}
        @endforeach
    
 @endif
 @endsection
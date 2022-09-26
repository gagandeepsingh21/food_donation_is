  @if(Auth::user()->role == 'admin')
 @include('sidebar.admin')
 <title>Unverified Users</title>



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
                <th scope="col">Action</th>
            </tr>
        </thead>
    
        @foreach ($donations as $donation)
            <tbody>
                <tr>
                    <td>{{ ++$i  }}</td>
                    <td>
                      <img src="{{ asset('uploads/students/'.$donation->image) }}" width="50px" height="50px" alt="donImage">
                    </td>
                    <td>{{ $donation->dtitle }}</td>
                    <td>{{ $donation->dquantity}}</td>
                    <td>{{ $donation->location}}</td>
                    <td>{{ $donation->pnumber }}</td>
                    <td>{{ $donation->date }}</td>
                    <td>Action</td>
                </tr>
            </tbody>
        @endforeach
    </table>
 @endif
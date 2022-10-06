 @if(Auth::user()->role == 'organization')
 @include('sidebar.organization')
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
                    <td>Action</td>
                </tr>
            </tbody>
        @endforeach
    </table>
 @endif
@if (Auth::user()->role == 'admin')
<title>Add User</title>
@include('sidebar.admin')


    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone number</th>
                <th scope="col">Address</th>
                <th scope="col"> Role</th>
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
                </tr>
            </tbody>
        @endforeach
    </table>

@endif

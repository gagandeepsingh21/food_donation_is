@if (Auth::user()->role == 'admin')

<title>Add User</title>

@include('sidebar.admin')

     <h3>Feedback from users</h3>

    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone number</th>
                <th scope="col">Address</th>
                <th scope="col">Message</th>
            </tr>
        </thead>
    
        @foreach ($forms as $form)
            <tbody>
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $form->orgname }}</td>
                    <td>{{ $form->email }}</td>
                    <td>{{ $form->pnumber }}</td>
                    <td>{{ $form->address }}</td>
                    <td>{{ $form->about }}</td>
                </tr>
            </tbody>
        @endforeach
    </table>


@endif

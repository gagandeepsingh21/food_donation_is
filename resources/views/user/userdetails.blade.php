@if (Auth::user()->role == 'admin')

@include('sidebar.admin')
 <p>user details </p>

@endif

@if(auth::user()->role == 'organization')

@include('sidebar.organization')
 <p>Post about donation </p>

@endif 
@if (Auth::user()->role == 'organization')
@include('sidebar.organization')

hello

        
@endif

  @if(Auth::user()->role == 'admin')
 @include('sidebar.admin')
 <p>Verified posts </p>
 @endif
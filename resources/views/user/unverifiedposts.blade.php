  @if(Auth::user()->role == 'admin')
 @include('sidebar.admin')
 <p>Unverified posts </p>
 @endif
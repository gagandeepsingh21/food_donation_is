 @if(Auth::user()->role == 'organization')
 @include('sidebar.organization')
 <p>organization reports </p>
 @endif

  @if(Auth::user()->role == 'admin')
 @include('sidebar.admin')
 <p>admin reports </p>
 @endif

  @if(Auth::user()->role == 'Donor')
 @include('sidebar.donor')
 <p>Donor reports </p>
 @endif


 
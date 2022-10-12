 @if(Auth::user()->role == 'organization')
 @include('sidebar.organization')
 <script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>
 <p>organization reports </p>
 @endif

  @if(Auth::user()->role == 'admin')
 @include('sidebar.admin')
 <script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>
 <p>admin reports </p>
 @endif

  @if(Auth::user()->role == 'Donor')
 @include('sidebar.donor')
 <script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>
 <p>Donor reports </p>
 @endif


 
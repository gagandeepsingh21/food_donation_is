 @if(Auth::user()->role == 'donor')
 @include('sidebar.donor')
 <title>View Donations Made</title>
 <script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>

    
donations made page 

 @endif
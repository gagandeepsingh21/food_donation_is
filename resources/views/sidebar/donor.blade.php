 <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
        jQuery(document).ready(function($){
            $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            });
        })
        </script>
        <style>
            body {
        overflow-x: hidden;
        }
        #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out;
        }
        #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
        }
        #sidebar-wrapper .list-group {
        width: 15rem;
        }
        #page-content-wrapper {
        min-width: 100vw;
        }
        #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
        }
        @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: 0;
        }
        #page-content-wrapper {
            min-width: 0;
            width: 100%;
        }
        #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
        }
        }
        </style>    
    </head>
    <body>
        <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">
                @if( auth()->check() )
                    
                    <h3><p>{{ auth()->user()->role }} Dashboard</h3>    
                    <h4>Welcome, {{ auth()->user()->name }}</h4></div>
                @endif
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">View user Details</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Add User</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Reports</a>
            <a href="{{ route('user.logout') }}" class="list-group-item list-group-item-action bg-light" 
            onclick="event.preventDefault();document.getElementById('logout-form').submit();" >Logout</a>
                                     <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
        </div>
        </div>
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
            {{-- <h3 style="margin: 10px">Welcome, {{ auth()->user()->name }}</h3> --}}
            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" >Logout</a>
                                     <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
                
                </li>
                
            </ul>
            </div> --}}
        </nav>
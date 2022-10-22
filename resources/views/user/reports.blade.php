 {{-- @if(Auth::user()->role == 'organization')
 @include('sidebar.organization')
 <script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
 <p>organization reports </p>
 @endif --}}

@extends('master')

@section('content')
  @if(Auth::user()->role == 'admin')
 @include('sidebar.admin')
 <script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  


  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

    <h2></h2>
<table id="example" class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">Donors name</th>
                <th scope="col">Donation Title</th>
                <th scope="col">Role</th>
                <th scope="col">Donation Type</th>
                <th scope="col">Meals Donated</th>
                <th scope="col">Message</th>
                <th scope="col">Phone number</th>
                <th scope="col">My Location</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
              
            </tr>
        </thead>
        <tbody>
           
        </tbody>
        
    </table>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
     <script>
        $(document).ready( function(){
            $('#example').DataTable({
                "processing":true,
                "serverSide":true,
                "ajax":"{{ route('user.reports') }}",
                //  dom: 'Bfrtip',
                columns:[
                {data: 'Name'},
                {data: 'Dtitle'},
                {data: 'Role'},
                {data: 'foodtype'},
                {data: 'qmeals'},
                {data: 'message'},
                {data: 'pnum'},
                {data: 'address'},
                {data: 'date'} 
        
                ],
                buttons:[
                    'copy'
                ]

                
            });
        });
    </script>
   {{-- <script>
//     jQuery(document).ready(function() {
//       $('#example').DataTable(
//         {
//         processing:true,
//         serverSide:true,
//         dom: 'Bfrtip',
//         columns: [
//            {data: ''} 
//         ]
        
//         },
//         buttons: [
//                     'copy',
//                     'excel',
//                     'csv',
//                     'pdf',
//                     'print'
//                 ],
//       );
     
//     } );
//     </script> --}}


 @endif
 @endsection

 
  {{-- @if(Auth::user()->role == 'Donor')
 @include('sidebar.donor')
 <script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>
 <p>Donor reports </p>
 @endif
  @endsection --}}


 
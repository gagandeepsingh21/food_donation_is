

@extends('master')

@section('content')
  @if(Auth::user()->role == 'admin')
 @include('sidebar.admin')
 <script src="https://kit.fontawesome.com/a5878f8a6c.js" crossorigin="anonymous"></script>
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script> 
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>


{{-- <div class="container box">
    <h4 style="text-align: center;">Donations made report</h4><br>
    <div class="table-responsive">
<table id="example" class="table table-striped table-hover table-bordered">
            
    <thead>   
    <tr> 
                 <th scope="col">Image</th>
                <th scope="col">Donors name</th>
                <th scope="col">Donation Title</th>
                <th scope="col">Role</th>
                <th scope="col">Donation Type</th>
                <th scope="col">Meals Donated</th>
                <th scope="col"> Donor's Message</th>
                <th scope="col">Phone number</th>
                <th scope="col">Date Donated</th>
                <th scope="col">Status</th>
              
            </tr>
        </thead>
        <tbody>
           
        </tbody>
        
    </table>
    </div>
</div><br><br><br><br> --}}

<div class="container box">
    <h4 style="text-align: center;">Organizations Posts Report </h4><br>
    <div class="table-responsive">
<table id="report" class="table table-striped table-hover table-bordered">
    
        <thead>
            
            <tr> 
                 <th scope="col">Image</th>
                <th scope="col">Organization name</th>
                <th scope="col">Role</th>
                <th scope="col">Donation Title</th>
                <th scope="col">Description</th>
                <th scope="col">Quantity Required</th>
                <th scope="col"> Org contact number</th>
                <th scope="col">Location</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
              
            </tr>
        </thead>
        <tbody>
           
           
        </tbody>
        
    </table>
    </div>
</div>



 @endif
 @endsection

 @section('javascripts')



    <script>
        $(document).ready( function(){
            $('#report').DataTable({
                processing:true,
                //serverSide:true,
                paging:true,
                orderClasses:false,
                dom:'Blfrtip',
                responsive:true,
                ajax:"{{ route('user.report1a') }}",
                

                columns:[
                {data: 'image'},
                {data: 'Name'},
                {data: 'Role'},
                {data: 'dtitle'},
                {data: 'description'},
                {data: 'dquantity'},
                {data: 'pnumber'},
                {data: 'location'},
                {data: 'date'},
                {data: 'isset'},
                

            
            ],
                
           
                buttons: [
                    'pdf','excel','print'
                ]
            

        

                
            });
        });
    </script>

 @endsection


 
  

 
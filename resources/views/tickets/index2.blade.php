
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    
@extends('layouts.app')

@section('content')

<div class="row">
<div class="col-sm-12">
    <div class="col-sm-12">

        @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}  
          </div>
        @endif
      </div>
    <h3 class="display-5">Tickets</h3>        
  <table class="table table-striped data-table">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Phone</td>
          <td>Title</td>
          
          <td colspan =2>Actions</td>
        </tr>
    </thead>
    <tbody>       
    </tbody>
  </table>

</div>
</div>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

 <script type="text/javascript">
   $(document).ready(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('tickets.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'fname', name: 'fname'},
            {data: 'lname', name: 'lname'},
            {data: 'email', name: 'email'},
            {data: 'title', name: 'title'},
            {data: 'action', name: 'action', orderable: true, searchable: true},
        ]
    });
    
  });
</script>




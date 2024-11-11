@extends('Templates.layouts.app')
@section('title','ManageUsers')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- Mini-extra style to be apply to tables with the dataTable plugin  -->
    <style>
        .dataTable table tr {
            border: solid 1px black;
        }
        .container{
            background: snow !important;
        }
        table#myTable,tr,td {
            padding: 15px 16px 15px 16px !important;
        }
        #content >main > nav {
            display: none !important;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row" style="margin: 50px">
		<table id="myTable" style="border:solid 1px black">
		    <thead>
		        <tr>
    		        <th>#</th>
    		        <th>ID</th>
    		        <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th colspan="3">Actions</th>
		        </tr>
		    </thead>
		    <tbody>
                @forelse ($users as $user)
                <tr>
		            <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->is_active==1 ? 'Active' : 'Deactive' }}</td>
                    <td><a href="{{ route('enable_disable_user',$user->id) }}" class="btn btn-info">Enable/Disable</a></td>
                    <td><a href="{{ route('remove_user',$user->id) }}" class="btn btn-danger">Remove</a></td>

	            </tr>
                @empty
                   <tr>
                     <td>No Data Found</td>
                   </tr>
                @endforelse
                {!! $users->links() !!}
		    </tbody>
		</table>
	</div>
    <a href="{{ route('viewDeletedUsrs') }}" class="btn btn-primary">View Trash</a>
</div>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function(){

    //Apply the datatables plugin to your table
    $('#myTable').DataTable();

});
</script>
</body>
</html>
@endsection

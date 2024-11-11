<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- Need to use datatables.net -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>

    <!-- Mini-extra style to be apply to tables with the dataTable plugin  -->
    <style>
        .dataTable table tr {
            border: solid 1px black;
        }
        .container{
            background:snow !important;
        }
        form,table,tr,td{
            padding:10px 5px 10px 5px !important;
        }
    </style>
</head>
<body>
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
<div class="container">
    <div class="row" style="margin: 50px">
		<table id="myTable" style="border:solid 1px black">
		    <thead>
		        <tr>
    		        <th>#</th>
    		        <th>Order Number</th>
    		        <th>Product</th>
                    <th>UserId</th>
                    <th>Weight</th>
                    <th>Source Address</th>
                    <th>Destination Address</th>
                    <th>Status</th>
                    <th>Delivery Agent</th>
                    <th colspan='4'>Actions</th>
		        </tr>
		    </thead>
		    <tbody>
                @forelse($order as $ord)
                 {{--  @isset($ord->belongsToDeliveryagent->name)  --}}
                 {{--  @if($ord->belongsToDeliveryagent->name !='' )  --}}
		        <tr>
		            <td>{{  $loop->iteration }}</td>
                    <td>{{  $ord->id }}</td>
                    <td>{{ $ord->product }}</td>
                    <td>{{ $ord->userId }}</td>
                    <td>{{ $ord->weight }}</td>
                    <td>{{ $ord->source_address }}</td>
                    <td>{{ $ord->destination_address }}</td>
                    <td>{{ $ord->status }}</td>
                    <td>{{ $ord->belongsToDeliveryagent->name ?? '' }}</td>
                    <td><a href="{{ route('edit_order',$ord->id) }}" class="btn btn-info">Edit</a></td>
                    <td>
                      <form method="post" action="{{ route('delete_order',$ord->id) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" name="btndel" id="btndel" class="btn btn-danger" value="Cancel"/>
                      </form>
                    </td>
	            </tr>
                {{--  @endif  --}}
                {{--  @endisset  --}}
                @empty
                 <tr>
                    <td>No Data</td>
                 </tr>
                @endforelse

		    </tbody>
		</table>
        {!! $order->links() !!}
	</div>
</div>
<!-- Need to use datatables.net -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function(){

    //Apply the datatables plugin to your table
    $('#myTable').DataTable();

});
</script>
</body>
</html>

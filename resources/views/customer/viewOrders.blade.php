<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>

</head>
<body>
@php
 //echo "<pre>";
 //print_r($orderData);
 //echo "</pre>";


// exit;
@endphp
<div class="container mt-3">
<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th># </th>
                <th>Order ID</th>
                <th>Product</th>
                <th>UserID</th>
                <th>UserName</th>
                <th>Weight</th>
                <th>Source_Address</th>
                <th>Destination_Address</th>
                <th>Status</th>
                <th>Order Date</th>
                <th colspan="4">Actions</th>
            </tr>
        </thead>
        <tbody>
           @forelse($orderData as $orddetails)
             <tr>
                <td><input type="checkbox" name="chkids[]" class="checkbox" value="{{ $orddetails->id }}"/></td>
                <td>{{ $orddetails->id }}</td>
                <td>{{ $orddetails->product }}</td>
                <td>{{ $orddetails->userId }}</td>
                <td>{{ Auth::guard()->user()->name }}</td>
                <td>{{ $orddetails->weight }}</td>
                <td>{{ $orddetails->source_address }}</td>
                <td>{{ $orddetails->destination_address }}</td>
                <td>{{ $orddetails->status }}</td>
                <td>{{ $orddetails->created_at }}</td>

                <td><a href="{{ route('orders.edit',$orddetails->id) }}" class="btn btn-info">Edit </a></td>
                <td>
                  <form method="post" action="{{ route('orders.destroy',$orddetails->id) }}">
                    @csrf
                    @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Cancel"/>
                  </form>
                </td>
            </tr>
            @empty
            <tr>
              <td>No Order Details Found</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Order ID</th>
                <th>Product</th>
                <th>UserID</th>
                <th>UserName</th>
                <th>Weight</th>
                <th>Source_Address</th>
                <th>Destination_Address</th>
                <th>Status</th>
                <th>Order Date</th>
                <th colspan="4">Actions</th>
            </tr>
        </tfoot>
    </table>
    {!! $orderData->links() !!}
</div>
<a href="{{ route('viewTrashed') }}" class="btn btn-info">View Trashed Records</a>
</body>
</html>

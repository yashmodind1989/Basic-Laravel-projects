<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .container{
        background: snow !important;
    }
  </style>
</head>
<body>

<div class="container mt-3">
<form method="post" action="{{ route('add_agent') }}">
    @csrf
    <div class="row justify-content-center mb-3">
       <div class="col-sm-12 form-group">
          <label>Order Number:</label>
          <select name="ddlord" id="ddlord" class="form-control" onchange="fetchCustomers(this.value)">
            <option value="0">--Select--</option>
            @forelse($orders as $order)
            <option value="{{ $order->id }}">{{ $order->id }}</option>
            @empty
            <option value="0">No Data Found</option>
            @endforelse
          </select>
       </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-sm-12 form-group">
           <label>Customer Number:</label>
           <select name="ddlcust" id="ddlcust" class="form-control">
             <option value="0">--Select--</option>

           </select>
        </div>
     </div>
     <div class="row justify-content-center mb-3">
        <div class="col-sm-12 form-group">
           <label>Delivery Agent:</label>
           <select name="ddlagent" id="ddlagent" class="form-control">
              <option value="0">--Select--</option>
              @forelse($agents as $agent)
              <option value="{{ $agent->id }}">{{ $agent->name }}</option>
              @empty
              <option value="0">No Data Found</option>
              @endforelse
           </select>
        </div>
     </div>
     <div class="row justify-content-center mb-3">
        <div class="col-sm-12 form-group">
           <input type="submit" class="btn btn-info" value="Submit"/>
        </div>
     </div>
</form>
</div>
<script type="text/javascript">
    function fetchCustomers(id) {
        if (id) {
            fetch(`/get_customers/${id}`)
                .then(response => response.json())
                .then(data => {
                    let stateSelect = document.getElementById('ddlcust');
                    stateSelect.innerHTML = '<option value="">Select a Customer</option>';
                    data.states.forEach(state => {
                        stateSelect.innerHTML += `<option value="${state.userId}" selected>${state.userId}</option>`;
                    });
                });
        }
    }


</script>


</body>
</html>

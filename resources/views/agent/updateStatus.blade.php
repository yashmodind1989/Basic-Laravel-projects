@extends('Templates.layouts.app')
@section('title','Change Status')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .container,form,input,label{
        padding: 15px 25px 15px 25px !important;
    }
  </style>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Change Order Status</h1>
  <p>Agent will change order status!</p>
</div>

<div class="container">
  <form method="post" action="{{ route('updateStatus',$orderId) }}">
    @csrf
    @method('PUT')
    <div class="row mb-15">
        <div class="col-sm-12">
            <label>Order Id:</label>
            <label>{{ $orderId }}</label>
        </div>
    </div>
    <div class="row mb-15">
        <div class="col-sm-12">
            <label>Order Status:</label>
            <label>{{ $orderStatus }}</label>
        </div>
    </div>
    <div class="row mb-15">
        <div class="col-sm-12">
            <label>Change Order Status:</label>
            <select name="ddlstate" id="ddlstate" class="form-control">
                <option value="0">--Select--</option>
                <option value="pending" {{ $orderStatus=='pending' ? 'selected' : ''  }}>Pending</option>
                <option value="dispatched" {{ $orderStatus=='dispatched' ? 'selected' : ''  }}>Dispatched</option>
                <option value="delivered" {{ $orderStatus=='delivered' ? 'selected' : ''  }}>Delivered</option>
            </select>
        </div>
    </div>
    <div class="row mb-15">
        <div class="col-sm-12">
            <input type="submit" name="btnmodify" id="btnmodify" class="btn btn-info" value="Change Status"/>
        </div>
    </div>
  </form>

</div>

</body>
</html>

@endsection

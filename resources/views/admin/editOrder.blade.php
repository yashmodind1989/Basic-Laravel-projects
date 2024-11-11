<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Edit Order Page</h1>
  <p>Edit Order Details Over Here!</p>
</div>
@php
//echo "<pre>";
//print_r($order);
@endphp
<div class="container">
  <form method="post" action="{{ route('change_order',$order[0]->id) }}">
    @csrf
    @method('PUT')
    <div class="row mb-3 justify-content-left">
        <div class="col-sm-12 ">
            <div class="form-group">
                <label>Order Number:</label>
                <label class="text-center">{{  $order[0]->id }}</label>
            </div>
        </div>
    </div>
    <div class="row mb-3 justify-content-left">
        <div class="col-sm-12 ">
            <div class="form-group">
                <label>Product:</label>
                <label class="text-center">{{  $order[0]->product }}</label>
            </div>
        </div>
    </div>
    <div class="row mb-3 justify-content-left">
        <div class="col-sm-12 ">
            <div class="form-group ">
                <label>Weight:</label>
                <input type="text" name="txtweight" id="txtweight" value="{{  $order[0]->weight }}" class="form-control"/>
            </div>
        </div>
    </div>
    <div class="row mb-3 justify-content-center">
        <div class="col-sm-12 ">
            <div class="form-group">
                <label>Source Address:</label>
                <textarea name="txtsource" id="txtsource" rows="5" cols="12" class="form-control">{{  $order[0]->source_address }}</textarea>
            </div>
        </div>
    </div>
    <div class="row mb-3 justify-content-center">
        <div class="col-sm-12 ">
            <div class="form-group">
                <label>Destination Address:</label>
                <textarea name="txtdestination" id="txtdestination" rows="5" cols="12" class="form-control">{{  $order[0]->destination_address }}</textarea>
            </div>
        </div>
    </div>
    <div class="row mb-3 justify-content-center">
        <div class="col-sm-12 ">
            <div class="form-group">
                <label>Status:</label>
                <select name="ddlstatus" id="ddlstatus" class="form-control">
                    <option value="0">--Select--</option>
                    <option value="pending" @if($order[0]->status=='pending'){{ 'selected' }}@endif>pending</option>
                    <option value="dispatched" @if($order[0]->status=='dispatched'){{ 'selected' }}@endif>dispatched</option>
                    <option value="delivered" @if($order[0]->status=='delivered'){{ 'selected' }}@endif>delivered</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row mb-3 justify-content-center">
        <div class="col-sm-12 ">
            <div class="form-group">
                <label>Agent:</label>
                <select name="ddlagent" id="ddlagent" class="form-control">
                    <option value="0">--Select--</option>
                    <option value="deliveryAgent" @if($order[0]->belongsToDeliveryagent->name=='deliveryAgent'){{ 'selected' }}@endif>deliveryAgent</option>
                    <option value="deliveryAgent1" @if($order[0]->belongsToDeliveryagent->name=='deliveryAgent1'){{ 'selected' }}@endif>deliveryAgent1</option>
                    <option value="deliveryAgent2" @if($order[0]->belongsToDeliveryagent->name=='deliveryAgent2'){{ 'selected' }}@endif>deliveryAgent2</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row mb-3 justify-content-center">
        <div class="col-sm-12 text-center">
            <div class="form-group">
                <input type="submit" name="btnedit" id="btnedit" value="Edit" class="form-control btn btn-primary"/>
            </div>
        </div>
    </div>
  </form>
</div>

</body>
</html>

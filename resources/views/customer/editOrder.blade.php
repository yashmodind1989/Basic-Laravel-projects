<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body{
        background:none !important;
    }
    form div {
    background-color: snow !important;
    padding: 1px 15px 15px 5px !important;
}
  </style>

</head>
<body>
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success')}}
</div>
@endif
<div class="container mt-3">
  <form method="post" action="{{ route('orders.update',$order->id)}}">
    @csrf
    @method('PUT')
    <div class="row">
       <div class="col-sm-12">
          <input type="hidden" name="txtuser" id="txtuser" value="{{ Auth::guard()->user()->id}}"/>
       </div>
    </div>
    <div class="row">
       <div class="col-sm-12">
        <label>Product:</label>
        <select name="ddlprod" id="ddlprod">
            <option value="0">Select</option>
            <option value="book" @if($order->product=='book'){{  'selected' }}@endif>Book</option>
            <option value="watch" @if($order->product=='watch'){{  'selected' }}@endif>Watch</option>
            <option value="cloth" @if($order->product=='cloth'){{  'selected' }}@endif>Cloth</option>
        </select>
       </div>
    </div>
    <div class="row">
       <div class="col-sm-12">
          <label>Weight:</label> <br/>
          <input type="text" name="txtweight" id="txtweight" value="{{ $order->weight ?? '' }}"/>
       </div>
    </div>
    <div class="row">
       <div class="col-sm-12">
          <label>Source Address:</label> <br/>
          <textarea name="txtsource" id="txtsource" rows="5" cols="45">{{ $order->source_address ?? '' }}</textarea>
       </div>
    </div>
    <div class="row">
       <div class="col-sm-12">
          <label>Destination Address:</label> <br/>
          <textarea name="txtdestination" id="txtdestination" rows="5" cols="45">{{ $order->destination_address ?? '' }}</textarea>
       </div>
    </div>
    <div class="row">
       <div class="col-sm-12">
          <input type="submit" name="btnparceledit" id="btnparceledit" class="btn btn-success" value="Submit"/>
       </div>
    </div>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.js"></script>

</body>
</html>

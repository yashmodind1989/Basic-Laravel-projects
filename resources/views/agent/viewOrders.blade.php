@extends('Templates.layouts.app')
@section('title','View Orders')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css">
<link rel="stylesheet" href="https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/editable/bootstrap-table-editable.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js"></script>
<script src="https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js"></script>
<style>
    .container{
        background: snow !important;
    }
    #content >main#top>nav
    {
        display: none !important;
    }
</style>
<div class="container">
    <h1>Bootstrap Table</h1>

    <p>A table with third party integration  extension Filter control extension Data export</a> pour exporter</p>
    @php
       //echo "<pre>";
       //print_r($data);
       //exit;
    @endphp
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{  session()->get('success') }}
    </div>
    @endif
    <div id="toolbar">
            <select class="form-control">
                    <option value="">Export Basic</option>
                    <option value="all">Export All</option>
                    <option value="selected">Export Selected</option>
            </select>
    </div>

    <table id="table"
                 data-toggle="table"
                 data-search="true"
                 data-filter-control="true"
                 data-show-export="true"
           data-show-refresh="true"
           data-show-toggle="true"
           data-pagination="true"

                 data-toolbar="#toolbar"
           class="table-responsive">
        <thead>
            <tr>
                <th data-field="state" data-checkbox="true"></th>
                <th   data-sortable="true">Order Id</th>
                <th    data-sortable="true">Product</th>
                <th  data-sortable="true">Customer Id</th>
                <th  data-sortable="true">Customer Name</th>
                <th  data-sortable="true">Weight</th>
                <th  data-sortable="true">Source Address</th>
                <th   data-sortable="true">Destination Address</th>
                <th   data-sortable="true">Status</th>
                <th   data-sortable="true">Created Date</th>
                <th   data-sortable="true">Updated Date</th>
                <th   data-sortable="true">Agent Id</th>
                <th data-field="note" data-sortable="true">Agent Name</th>
                <th colspan="3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $myassignedord)

            <tr>
                <td class="bs-checkbox "><input data-index="0" name="btSelectItem" type="checkbox" value="{{  $myassignedord->order_id }}"></td>
                <td>{{ $myassignedord->order_id }}</td>
                <td>{{ $myassignedord->product }}</td>
                <td>{{ $myassignedord->userId }}</td>
                <td>{{ $myassignedord->name }}</td>
                <td>{{ $myassignedord->weight }}</td>
                <td>{{ $myassignedord->source_address }}</td>
                <td>{{ $myassignedord->destination_address }}</td>
                <td>{{ $myassignedord->status }}</td>
                <td>{{ $myassignedord->created_at }}</td>
                <td>{{ $myassignedord->updated_at }}</td>
                <td>{{ \Illuminate\Support\Facades\Auth::guard()->user()->id }}</td>
                <td>{{ \Illuminate\Support\Facades\Auth::guard()->user()->name }}</td>

                <td><a href="{{ route('change_status',$myassignedord->order_id) }}" class="btn btn-info">Change Status</a></td>
                <td>
                   <form method="post" action="{{ route('remove_order',$myassignedord->order_id) }}">
                    @csrf
                    @method('Delete')
                      <input type="submit" name="btndel" id="btndel" class="btn btn-danger" value="Remove"/>
                   </form>
                </td>
            </tr>
           @empty
           <tr>
            <td>No Data Found</td>
           </tr>
           @endforelse
        </tbody>
    </table>
    </div>
    <script>
        //exporte les données sélectionnées
var $table = $('#table');
$(function () {
    $('#toolbar').find('select').change(function () {
      $table.bootstrapTable('refreshOptions', {
            exportDataType: $(this).val()
        });
    });
})

    var trBoldBlue = $("table");


$(trBoldBlue).on("click", "tr", function (){
        $(this).toggleClass("bold-blue");
});
    </script>

@endsection

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

@endphp
<div class="container mt-3">
    <a href="{{ route('manage_users') }}" class="btn">Back To Users</a>
<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th># </th>
                <th>User ID</th>
                <th>UserName</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>

                <th colspan="4">Actions</th>
            </tr>
        </thead>
        <tbody>
           @forelse($trashed as $trash)
             <tr>
                <td><input type="checkbox" name="chkids[]" class="checkbox" value="{{  $trash->id }}"/></td>
                <td>{{ $trash->id }}</td>
                <td>{{ $trash->name }}</td>
                <td>{{ $trash->email }}</td>
                <td>{{ $trash->role }}</td>
                <td>{{ $trash->is_active }}</td>

                <td><a href="{{ route('restoreUser',$trash->id) }}" class="btn btn-info">Restore </a></td>

            </tr>
            @empty
            <tr>
              <td>No Order Details Found</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <th># </th>
                <th>User ID</th>
                <th>UserName</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>

                <th colspan="4">Actions</th>
            </tr>
        </tfoot>
    </table>

</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of Hospitals</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">

  <!-- Custom CSS (You can add your own styles here) -->
  <style>
    /* Add your custom styles here */
    body {
      font-family: 'Arial', sans-serif;
    }
    .box {
      /* Add styling for the box if needed */
    }
  </style>
</head>
<body>

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">List of Hospitals</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

      <table class="table table-bordered table-striped" id="organizationsTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Registration Date | Number</th>
            <th>Address</th>
            <th>ETH Address</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($Hospitals as $UserHospital)
            <tr>
              <td>{{$UserHospital->hid}}</td>
              <td>{{$UserHospital->user->name}}</td>
              <td>{{$UserHospital->user->email}}</td>
              <td>{{$UserHospital->mobile}}</td>
              <td>{{$UserHospital->registerDate}} | {{$UserHospital->registerNumber}}</td>
              <td>{{$UserHospital->address}}</td>
              <td>{{$UserHospital->account}}</td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Registration Date | Number</th>
            <th>Address</th>
            <th>ETH Address</th>
          </tr>
        </tfoot>
      </table>

    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



  <!-- Your Custom JavaScript -->
  <script>
    $(document).ready(function () {
      // Use JavaScript to trigger the print dialog when the page is loaded
      window.onload = function () {
        window.print();
      };
    });
  </script>

</body>
</html>

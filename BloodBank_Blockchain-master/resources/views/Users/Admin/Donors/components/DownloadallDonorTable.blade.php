<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of Donors</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
      <h3 class="box-title">List of Donors</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

      <table class="table table-bordered table-striped" id="donorsTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date of Birth | Gender</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>BloodGroup</th>
            <th>ETH Address</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($usersWithDonors as $UserDonor)
            <tr>
              <td>{{$UserDonor->did}}</td>
              <td>{{$UserDonor->user->name}}</td>
              <td>{{$UserDonor->dob}} | {{$UserDonor->gender}} </td>
              <td>{{$UserDonor->mobile}}</td>
              <td>{{$UserDonor->address}}</td>
              <td>{{$UserDonor->bloodGroup}}</td>
              <td>{{$UserDonor->account}}</td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date of Birth | Gender</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>BloodGroup</th>
            <th>ETH Address</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

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

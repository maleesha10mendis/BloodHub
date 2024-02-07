<div class="box">
  <div class="box-header">
    <h3 class="box-title">List of Donors</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">

        @include('Users.Admin.messages.addMsg')



        <table  id="example1" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Date of Birth | Gender</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>BloodGroup</th>
                    <th>ETH Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody >



                @foreach ($usersWithDonors as $UserDonor)
                {{-- {{$usersWithDonors[0]->user->name}} --}}
                    <tr>
                        <td>{{$UserDonor->did}}</td>
                        <td>{{$UserDonor->user->name}}</td>
                        <td>{{$UserDonor->dob}} | {{$UserDonor->gender}} </td>
                        <td>{{$UserDonor->mobile}}</td>
                        <td>{{$UserDonor->address}}</td>
                        <td>
                            {{$UserDonor->bloodGroup}}
                        </td>

                        <td>{{$UserDonor->account}}</td>




                        <td id="buttonsDELETE">
                            <a class="btn btn-warning" type="button" data-toggle="modal" data-target="#ClientEditModal-{{$UserDonor->did}}" >
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#clientDeleteModal-{{$UserDonor->did}}"  >
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>

                    {{-- delete modal --}}
                    @include('Users.Admin.Donors.components.deleteDonor')
                    {{-- update modal --}}
                    @include('Users.Admin.Donors.components.updateDonor')



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
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

@push('specificJs')
{{-- toastr msg --}}

<script>

    $(function () {
      $('#example1').DataTable()
    })
  </script>


<script>
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
  </script>


{{-- <script>
    function downloadAsPDF() {
        // Get the current section to be converted to PDF
        var contentSection = document.getElementById('pdfOUT');
        // Specify the page size (e.g., 'a4', 'letter', etc.)
        var options = {
            margin: 10,
            filename: 'report.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' },
            // Specify elements to be excluded (replace with appropriate selectors)
            exclude: [  // Example: elements with class 'exclude-from-pdf'
                '#buttonsDELETE'    // Example: element with ID 'elementToExclude'
            ]
        };

        // Use html2pdf.js to generate PDF with specified options
        html2pdf().from(contentSection).set(options).save();
    }
</script> --}}

@endpush

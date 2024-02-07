@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid ">
    {{-- <h1>Blood Stock Management</h1> --}}

    <!-- /.card -->

    {{-- Blood table --}}
    <div class="box">
        <div class="box-header">
          <h3 class="box-title">List of Requests</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table  id="example1" class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Hospital Name</th>
                        <th>Mobile</th>
                        <th>Blood Group</th>
                        <th>Units</th>
                    </tr>
                </thead>
                <tbody id="campaignsList2">
                    <tr>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>Hospital Name</th>
                        <th>Mobile</th>
                        <th>Blood Group</th>
                        <th>Units</th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>

</div>
@endsection

@section('header')
Hospital Blood Requests
@endsection

@push('specificJs')
<script src="https://cdn.jsdelivr.net/npm/web3@1.6.0/dist/web3.min.js"></script>
<script src="{{ asset('js/contractJS/orgCampaign/orgCampaign.js') }}"></script>


<script>
    // Pass the PHP variable to JavaScript
    var hospitals = @json($hospitals);

</script>

<script>

    window.onload = function() {
        setTimeout(async function() {
            try {
                await displayAllBlood();
            } catch (error) {
                console.error('Error on page load:', error);
            }
        }, 200); // 2000 milliseconds = 2 seconds
    };







    //show blood table

    async function displayAllBlood() {
    try {

        const bloodStock = await getAllTransferRequestsByHospital();
        console.log(bloodStock);


        //check campaigns empty or not
        if (bloodStock[0] && bloodStock[0].length === 0) {
            console.log('The _campaignIDs array is empty.');
        } else {
            console.log('The _campaignIDs array is not empty.');
            //call diaplay function
            displayBloodTable(bloodStock);

        }

        // console.log(campaigns);

    } catch (error) {
        console.error('Error getting campaigns broo:', error);
    }

}

//display data in the table

    function displayBloodTable(bloodStock) {
        // Check if DataTable is already initialized on the table and delete it
        if ($.fn.DataTable.isDataTable('#example1')) {
            $('#example1').DataTable().destroy();
        }

        const campaignsListDiv = document.getElementById('campaignsList2');

        // Clear previous content
        campaignsListDiv.innerHTML = '';

        const campaignSlotsPromises = [];  // Declare campaignSlotsPromises here

        if (bloodStock[0].length === 0) {
            campaignsListDiv.innerHTML = '<tr><td colspan="4">No campaigns available.</td></tr>';
        } else {
            for (let i = 0; i < bloodStock[0].length; i++) {

                const tr = document.createElement('tr');


                // Create a td for each piece of  information
                const campaignIdTd = document.createElement('td');
                campaignIdTd.textContent = formatDateFromUniqueId(bloodStock[0][i]);
                tr.appendChild(campaignIdTd);

                // console.log(bloodStock[1][i]);
                hospitals.forEach(function(hospital) {
                    if(bloodStock[1][i] == hospital.id){
                        const hospitalNameTd = document.createElement('td');
                        hospitalNameTd.textContent = hospital.name;
                        tr.appendChild(hospitalNameTd);
                    }

                });


                hospitals.forEach(function(hospital) {
                    if(bloodStock[1][i] == hospital.id){
                        const hospitalNameTd = document.createElement('td');
                        hospitalNameTd.textContent = hospital.mobile;
                        tr.appendChild(hospitalNameTd);
                    }

                });

                const locationTd = document.createElement('td');
                locationTd.textContent = web3.utils.hexToUtf8(bloodStock[2][i]);
                tr.appendChild(locationTd);

                const dateTd = document.createElement('td');
                dateTd.textContent = bloodStock[3][i];
                tr.appendChild(dateTd);

                campaignsListDiv.appendChild(tr);

            }
        }

        // Use Promise.all to wait for all promises to resolve before initializing DataTable
        Promise.all(campaignSlotsPromises).then(() => {
            // Initialize DataTable with the desired options
            $('#example1').dataTable({
                "order": [[0, 'desc']] // Adjust the column index based on your table structure
            });
        });
    }


    function formatDateFromUniqueId(uniqueId) {
    // Extract date and time components from the uniqueId
    const year = uniqueId.slice(0, 4);
    const month = uniqueId.slice(4, 6);
    const day = uniqueId.slice(6, 8);
    const hours = uniqueId.slice(8, 10);
    const minutes = uniqueId.slice(10, 12);
    const seconds = uniqueId.slice(12, 14);
    const milliseconds = uniqueId.slice(14, 17);

    // Assemble the components into a date string
    const dateString = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}.${milliseconds}`;

    return dateString;
}
</script>
@endpush


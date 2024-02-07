@extends('layouts.organizationLayout')

@section('content')
<div class="container-fluid ">
    {{-- <h1>Blood Stock Management</h1> --}}

{{-- form --}}
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Add Blood Stock Data</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form id="addBloodForm">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="bloodGroup">Blood Group:</label>
                        <select class="form-control" id="bloodGroup" required>
                            <option value="" disabled selected>Select Blood Group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="units">Units: (1Unit = 450 milliliters)</label>
                        <input type="number" class="form-control" id="units" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-primary" onclick="validateAndAddBlood()">Add Blood</button>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
</div>

    <!-- /.card -->

    {{-- Blood table --}}
    <div class="box">
        <div class="box-header">
          <h3 class="box-title">List of Blood Stock</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table  id="example1" class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Blood Group</th>
                        <th>Units</th>
                    </tr>
                </thead>
                <tbody id="campaignsList2">
                    <tr>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Date</th>
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
Blood Inventory
@endsection

@push('specificJs')
<script src="https://cdn.jsdelivr.net/npm/web3@1.6.0/dist/web3.min.js"></script>
<script src="{{ asset('js/contractJS/orgCampaign/orgCampaign.js') }}"></script>


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



    async function validateAndAddBlood() {
        const bloodGroup = document.getElementById('bloodGroup').value;
        const units = document.getElementById('units').value;

        // Validate if the blood group is selected
        if (!bloodGroup) {
            showAlert('Please select a blood group.', 'alert-danger');
            return;
        }

        // Validate if units field is not empty and is a positive number
        if (!units || isNaN(units) || units <= 0) {
            showAlert('Please enter a valid number of units.', 'alert-danger');
            return;
        }

        const stockID = generateUniqueId();
        const ownerID = {{ auth()->id() }};

        try {
            // Call the JavaScript function to add blood stock
            await window.addBloodStock(stockID, ownerID, bloodGroup, units);
            await displayAllBlood();
            console.log('Blood added successfully.');

            // Show success alert
            showAlert('Blood added successfully!', 'alert-success');
        } catch (error) {
            console.error('Error blood adding:', error);

            // Show error alert
            showAlert('Error adding blood. Please try again.', 'alert-danger');
        }
    }

    function showAlert(message, alertClass) {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert ${alertClass} alert-dismissible fade in`;
        alertDiv.setAttribute('role', 'alert');
        alertDiv.innerHTML = `
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            ${message}
        `;

        const formGroup = document.querySelector('.form-group');
        formGroup.parentNode.insertBefore(alertDiv, formGroup.nextSibling);

        // Automatically close the alert after 3 seconds (adjust as needed)
        setTimeout(() => {
            alertDiv.classList.remove('in');
            alertDiv.classList.add('out');
            setTimeout(() => {
                alertDiv.remove();
            }, 400);
        }, 5000);
    }


    function generateUniqueId() {
        const now = new Date();
        const uniqueId = `${now.getFullYear()}${(now.getMonth() + 1).toString().padStart(2, '0')}${now.getDate().toString().padStart(2, '0')}${now.getHours().toString().padStart(2, '0')}${now.getMinutes().toString().padStart(2, '0')}${now.getSeconds().toString().padStart(2, '0')}${now.getMilliseconds().toString().padStart(3, '0')}`;
        return uniqueId;
    }



    //show blood table

    async function displayAllBlood() {
    try {

        const bloodStock = await getBloodStocksByOwner({{ auth()->id() }});
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

                // Create a td for each piece of campaign information
                const campaignIdTd = document.createElement('td');
                campaignIdTd.textContent = formatDateFromUniqueId(bloodStock[0][i]);
                tr.appendChild(campaignIdTd);

                const locationTd = document.createElement('td');
                locationTd.textContent = web3.utils.hexToUtf8(bloodStock[2][i]);
                tr.appendChild(locationTd);

                const dateTd = document.createElement('td');
                dateTd.textContent = bloodStock[3][i];
                tr.appendChild(dateTd);

                // Append the row to the tbody
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

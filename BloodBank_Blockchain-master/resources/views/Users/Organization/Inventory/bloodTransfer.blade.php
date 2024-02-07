@extends('layouts.organizationLayout')

@section('content')
<div class="container-fluid ">
    {{-- <h1>Blood Stock Management</h1> --}}

{{-- form --}}
<h3>Available Blood Stock</h3>
<div class="row">

    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="info-box bg-aqua">

            <span class="info-box-icon">A+</span>
            <div class="info-box-content">
                <span class="info-box-text">A+ Blood Stock</span>
                <span class="Aplus info-box-number">0</span>
                    <div class="progress">
                    <div class="progress-bar Aplus" style="width: 0%"></div>
                    </div>
                <span class="progress-description">
                <div class="bld-precent-Aplus" style="display: inline-block;">0</div>% Compared to Other Types
                </span>
            </div>

        </div>

    </div>


    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="info-box bg-red">

            <span class="info-box-icon">B+</span>
            <div class="info-box-content">
                <span class="info-box-text">B+ Blood Stock</span>
                <span class="Bplus info-box-number">0</span>
                    <div class="progress">
                    <div class="progress-bar Bplus" style="width: 0%"></div>
                    </div>
                <span class="progress-description">
                <div class="bld-precent-Bplus" style="display: inline-block;">0</div>% Compared to Other Types
                </span>
            </div>

        </div>

    </div>



    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="info-box bg-green">

            <span class="info-box-icon">AB+</span>
            <div class="info-box-content">
                <span class="info-box-text">AB+ Blood Stock</span>
                <span class="ABplus info-box-number">0</span>
                    <div class="progress">
                    <div class="progress-bar ABplus" style="width: 0%"></div>
                    </div>
                <span class="progress-description">
                <div class="bld-precent-ABplus" style="display: inline-block;">0</div>% Compared to Other Types
                </span>
            </div>

        </div>

    </div>


    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="info-box bg-yellow">

            <span class="info-box-icon">O+</span>
            <div class="info-box-content">
                <span class="info-box-text">O+ Blood Stock</span>
                <span class="Oplus info-box-number">0</span>
                    <div class="progress">
                    <div class="progress-bar Oplus" style="width: 0%"></div>
                    </div>
                <span class="progress-description">
                <div class="bld-precent-Oplus" style="display: inline-block;">0</div>% Compared to Other Types
                </span>
            </div>

        </div>

    </div>


    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="info-box bg-aqua">

            <span class="info-box-icon">A-</span>
            <div class="info-box-content">
                <span class="info-box-text">A- Blood Stock</span>
                <span class="Aminus info-box-number">0</span>
                    <div class="progress">
                    <div class="progress-bar Aminus" style="width: 0%"></div>
                    </div>
                <span class="progress-description">
                <div class="bld-precent-Aminus" style="display: inline-block;">0</div>% Compared to Other Types
                </span>
            </div>

        </div>

    </div>



    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="info-box bg-red">

            <span class="info-box-icon">B-</span>
            <div class="info-box-content">
                <span class="info-box-text">B- Blood Stock</span>
                <span class="Bminus info-box-number">0</span>
                    <div class="progress">
                    <div class="progress-bar  Bminus" style="width: 0%"></div>
                    </div>
                <span class="progress-description">
                <div class="bld-precent-Bminus" style="display: inline-block;">0</div>% Compared to Other Types
                </span>
            </div>

        </div>

    </div>

    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="info-box bg-green">

            <span class="info-box-icon">AB-</span>
            <div class="info-box-content">
                <span class="info-box-text">AB- Blood Stock</span>
                <span class="ABminus info-box-number">0</span>
                    <div class="progress">
                    <div class="progress-bar ABminus" style="width: 0%"></div>
                    </div>
                <span class="progress-description">
                <div class="bld-precent-ABminus" style="display: inline-block;">0</div>% Compared to Other Types
                </span>
            </div>

        </div>

    </div>



    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="info-box bg-yellow">

            <span class="info-box-icon">O-</span>
            <div class="info-box-content">
                <span class="info-box-text">O- Blood Stock</span>
                <span class="Ominus info-box-number">0</span>
                    <div class="progress">
                    <div class="progress-bar Ominus" style="width: 0%"></div>
                    </div>
                <span class="progress-description">
                <div class="bld-precent-Ominus" style="display: inline-block;">0</div>% Compared to Other Types
                </span>
            </div>

        </div>

    </div>

</div>



<div class="card">
    <div class="card-header">
        {{-- <h3 class="card-title">Blood Trabsfer to Hospital</h3> --}}
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
                <button type="button" class="btn btn-danger" onclick="validateAndAddBlood()">Transfer</button>
            </div>
        </form>
    </div>
    <!-- /.card-body -->
</div>

    <!-- /.card -->

    {{-- Blood table --}}
    <div class="box">
        <div class="box-header">
          <h3 class="box-title">List of Transferd Blood</h3>
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
Blood Transfer To Blood Bank
@endsection

@push('specificJs')
<script src="https://cdn.jsdelivr.net/npm/web3@1.6.0/dist/web3.min.js"></script>
<script src="{{ asset('js/contractJS/orgCampaign/orgCampaign.js') }}"></script>

<script>
    // Pass the PHP variable to JavaScript
    var admin = @json($admin);

</script>

<script>

    window.onload = function() {
        setTimeout(async function() {
            try {
                await callBloodAvailable();
                await displayAllBlood();
            } catch (error) {
                console.error('Error on page load:', error);
            }
        }, 200); // 2000 milliseconds = 2 seconds
    };





    let apS = 0, amS = 0, bpS = 0, bmS = 0, abpS = 0, abmS = 0, opS = 0, omS = 0;
async function callBloodAvailable(){
    const myStock = await getBloodStocksByOwner({{ auth()->id() }});
            const recStock = await getTransfersByReceiver({{ auth()->id() }});
            const sendStock = await getTransfersBySender({{ auth()->id() }});



            //assign values to blood types myStock
            if (myStock[0].length !== 0) {
                for (let i = 0; i < myStock[0].length; i++) {
                    if (web3.utils.hexToUtf8(myStock[2][i]) === 'A+') {
                        apS += parseInt(myStock[3][i]);
                    } else if (web3.utils.hexToUtf8(myStock[2][i]) === 'A-') {
                        amS += parseInt(myStock[3][i]);
                    } else if (web3.utils.hexToUtf8(myStock[2][i]) === 'AB+') {
                        abpS += parseInt(myStock[3][i]);
                    } else if (web3.utils.hexToUtf8(myStock[2][i]) === 'AB-') {
                        abmS += parseInt(myStock[3][i]);
                    } else if (web3.utils.hexToUtf8(myStock[2][i]) === 'B+') {
                        bpS += parseInt(myStock[3][i]);
                    } else if (web3.utils.hexToUtf8(myStock[2][i]) === 'B-') {
                        bmS += parseInt(myStock[3][i]);
                    } else if (web3.utils.hexToUtf8(myStock[2][i]) === 'O+') {
                        opS += parseInt(myStock[3][i]);
                    } else if (web3.utils.hexToUtf8(myStock[2][i]) === 'O-') {
                        omS += parseInt(myStock[3][i]);
                    }
                }
            }



            //reduce values from blood types by send blood
            if (sendStock[0].length !== 0) {
                for (let i = 0; i < sendStock[0].length; i++) {
                    if (web3.utils.hexToUtf8(sendStock[3][i]) === 'A+') {
                        apS -= parseInt(sendStock[4][i]);
                    } else if (web3.utils.hexToUtf8(sendStock[3][i]) === 'A-') {
                        amS -= parseInt(sendStock[4][i]);
                    } else if (web3.utils.hexToUtf8(sendStock[3][i]) === 'AB+') {
                        abpS -= parseInt(sendStock[4][i]);
                    } else if (web3.utils.hexToUtf8(sendStock[3][i]) === 'AB-') {
                        abmS -= parseInt(sendStock[4][i]);
                    } else if (web3.utils.hexToUtf8(sendStock[3][i]) === 'B+') {
                        bpS -= parseInt(sendStock[4][i]);
                    } else if (web3.utils.hexToUtf8(sendStock[3][i]) === 'B-') {
                        bmS -= parseInt(sendStock[4][i]);
                    } else if (web3.utils.hexToUtf8(sendStock[3][i]) === 'O+') {
                        opS -= parseInt(sendStock[4][i]);
                    } else if (web3.utils.hexToUtf8(sendStock[3][i]) === 'O-') {
                        omS -= parseInt(sendStock[4][i]);
                    }
                }
            }

// console.log('omS');
            updateInfoBoxNumber('.Aplus.info-box-number', parseInt(apS));
            updateInfoBoxNumber('.Bplus.info-box-number', parseInt(bpS));
            updateInfoBoxNumber('.ABplus.info-box-number', parseInt(abpS));
            updateInfoBoxNumber('.Oplus.info-box-number', parseInt(opS));
            updateInfoBoxNumber('.Aminus.info-box-number', parseInt(amS));
            updateInfoBoxNumber('.Bminus.info-box-number', parseInt(bmS));
            updateInfoBoxNumber('.ABminus.info-box-number', parseInt(abmS));
            updateInfoBoxNumber('.Ominus.info-box-number', parseInt(omS));

            // Assuming you have the total sum as totalSum
            const totalSum = parseInt(apS) + parseInt(amS) + parseInt(bpS) + parseInt(bmS) +
                            parseInt(abpS) + parseInt(abmS) + parseInt(opS) + parseInt(omS);

            // Calculate the percentage for each value
            const percentageApS = ((parseInt(apS) / totalSum) * 100).toFixed(0);
            const percentageAmS = ((parseInt(amS) / totalSum) * 100).toFixed(0);
            const percentageBpS = ((parseInt(bpS) / totalSum) * 100).toFixed(0);
            const percentageBmS = ((parseInt(bmS) / totalSum) * 100).toFixed(0);
            const percentageAbpS = ((parseInt(abpS) / totalSum) * 100).toFixed(0);
            const percentageAbmS = ((parseInt(abmS) / totalSum) * 100).toFixed(0);
            const percentageOpS = ((parseInt(opS) / totalSum) * 100).toFixed(0);
            const percentageOmS = ((parseInt(omS) / totalSum) * 100).toFixed(0);


            // Set the percentage value in the corresponding HTML elements
            document.querySelector('.bld-precent-Aplus').textContent = percentageApS;
            document.querySelector('.bld-precent-Aminus').textContent = percentageAmS;
            document.querySelector('.bld-precent-Bplus').textContent = percentageBpS;
            document.querySelector('.bld-precent-Bminus').textContent = percentageBmS;
            document.querySelector('.bld-precent-ABplus').textContent = percentageAbpS;
            document.querySelector('.bld-precent-ABminus').textContent = percentageAbmS;
            document.querySelector('.bld-precent-Oplus').textContent = percentageOpS;
            document.querySelector('.bld-precent-Ominus').textContent = percentageOmS;


            // Update the width of the progress bars
            updateProgressBarWidth('.progress-bar.Aplus', percentageApS);
            updateProgressBarWidth('.progress-bar.Aminus', percentageAmS);
            updateProgressBarWidth('.progress-bar.Bplus', percentageBpS);
            updateProgressBarWidth('.progress-bar.Bminus', percentageBmS);
            updateProgressBarWidth('.progress-bar.ABplus', percentageAbpS);
            updateProgressBarWidth('.progress-bar.ABminus', percentageAbmS);
            updateProgressBarWidth('.progress-bar.Oplus', percentageOpS);
            updateProgressBarWidth('.progress-bar.Ominus', percentageOmS);

            console.log(myStock, recStock, sendStock, abmS,opS);

}


function updateInfoBoxNumber(selector, value) {
        const element = document.querySelector(selector);
        if (element) {
            element.textContent = value + ' units';
        } else {
            console.error('Element not found with selector:', selector);
        }
    }

function updateProgressBarWidth(selector, percentage) {
    const progressBar = document.querySelector(selector);
    if (progressBar) {
        progressBar.style.width = percentage + '%';
    } else {
        console.error('Element not found with selector:', selector);
    }
}




    async function validateAndAddBlood() {
        // const hospitalID = document.getElementById('hospital_id').value;
        const bloodGroup = document.getElementById('bloodGroup').value;
        const units = document.getElementById('units').value;

        // Validate if the blood group is selected
        if (!bloodGroup) {
            showAlert('Please select a blood group.', 'alert-danger');
            return;
        }

        if(bloodGroup == 'A+'){
            if(units > parseInt(apS)){

                showAlert('You Do not Have Enough A+ units.', 'alert-danger');
                return;
            }
        }
        if(bloodGroup == 'A-'){
            if(units > parseInt(amS)){
                showAlert('You Do not Have Enough A- units.', 'alert-danger');
                return;
            }
        }
        if(bloodGroup == 'AB+'){
            if(units > parseInt(abpS)){
                showAlert('You Do not Have Enough AB+ units.', 'alert-danger');
                return;
            }
        }
        if(bloodGroup == 'AB-'){
            if(units > parseInt(abmS)){
                showAlert('You Do not Have Enough AB- units.', 'alert-danger');
                return;
            }
        }
        if(bloodGroup == 'B+'){
            if(units > parseInt(bpS)){
                showAlert('You Do not Have Enough B+ units.', 'alert-danger');
                return;
            }
        }
        if(bloodGroup == 'B-'){
            if(units > parseInt(bmS)){
                showAlert('You Do not Have Enough B- units.', 'alert-danger');
                return;
            }
        }
        if(bloodGroup == 'O+'){
            if(units > parseInt(opS)){
                showAlert('You Do not Have Enough O+ units.', 'alert-danger');
                return;
            }
        }
        if(bloodGroup == 'O-'){
            if(units > parseInt(omS)){
                showAlert('You Do not Have Enough O- units.', 'alert-danger');
                return;
            }
        }

        // Validate if units field is not empty and is a positive number
        if (!units || isNaN(units) || units <= 0) {
            showAlert('Please enter a valid number of units.', 'alert-danger');
            return;
        }

        const _transferID = generateUniqueId();
        const _senderID = {{ auth()->id() }};

        try {
            // Call the JavaScript function to add blood stock
            await window.executeBloodTransferByAdminOrg(_transferID, admin[0].id, _senderID,bloodGroup, units);
            displayAllBlood();
            callBloodAvailable();
            console.log('Blood Added Successfully.');

            // Show success alert
            showAlert('Blood Trabsaction Confirmed or Rejected Successfully!', 'alert-success');
            setTimeout(function() {
                location.reload(); // or window.location.reload();
            }, 2000);
        } catch (error) {
            console.error('Error blood adding:', error);

            // Show error alert
            showAlert('Error Transfering Blood. Please try again.', 'alert-danger');
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

        const bloodStock = await getTransfersBySender({{ auth()->id() }});
        console.log(bloodStock);


        //check campaigns empty or not
        if (bloodStock[0] && bloodStock[0].length === 0) {
            console.log('The array is empty.');
        } else {
            console.log('The array is not empty.');
            //call diaplay function
            displayBloodTable(bloodStock);

        }

        // console.log(campaigns);

    } catch (error) {
        console.error('Error getting campaigns :', error);
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

                if({{auth()->id()}} == bloodStock[2][i]){
                    const tr = document.createElement('tr');

                    // Create a td for each piece of campaign information
                    const campaignIdTd = document.createElement('td');
                    campaignIdTd.textContent = formatDateFromUniqueId(bloodStock[0][i]);
                    tr.appendChild(campaignIdTd);


                    const dateTd = document.createElement('td');
                    dateTd.textContent = web3.utils.hexToUtf8(bloodStock[3][i]);
                    tr.appendChild(dateTd);

                    const locationTd = document.createElement('td');
                    locationTd.textContent = bloodStock[4][i];
                    tr.appendChild(locationTd);

                    // Append the row to the tbody
                    campaignsListDiv.appendChild(tr);
                }

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

@extends('layouts.donorLayout')
{{-- justify-content-center --}}
@section('content')
<div class="container-fluid">

    <h2 id="donateNote"><b>Your next donation can be made on <span id="nextDay"></span></b> </h2>

    <div class="box">
        <div class="box-header">
          <h3 class="box-title">List of Campaigns</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table  id="example1" class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>Campaign ID</th>
                        <th>Organization ID - Name</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Status</th>
                        {{-- <th>Action</th> --}}
                        <th>Select Time Slot</th>
                    </tr>
                </thead>
                <tbody id="campaignsList2">
                    <tr>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>




                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Campaign ID</th>
                        <th>Organization ID - Name</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Status</th>
                        {{-- <th>Action</th> --}}
                        <th>Select Time Slot</th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>




    <div class="box">
        <div class="box-header">
          <h3 class="box-title">List of Your Appointments</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table  id="example2" class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>Campaign ID</th>
                        <th>Organization ID - Name</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="campaignsList3">
                    <tr>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>
                        <td>No data</td>



                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Campaign ID</th>
                        <th>Organization ID - Name</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>

</div>
@endsection

@section('header')
All Campaigns and Ads
@endsection


@push('specificJs')
{{-- import js for eth --}}
<script src="https://cdn.jsdelivr.net/npm/web3@1.6.0/dist/web3.min.js"></script>
<script src="{{ asset('js/contractJS/orgCampaign/orgCampaign.js') }}"></script>


<script>
    // Pass the PHP variable to JavaScript
    var orgNames = @json($orgNames);
    var Donor = @json($Donor);

</script>


<script>
    window.onload = function() {
    setTimeout(async function() {
        try {
            await displayAllCampaigns();
        } catch (error) {
            console.error('Error on page load:', error);
        }
    }, 200); // 2000 milliseconds = 2 seconds
    };
</script>

<script>
    let lastAppointmentDate = 0;
    let lastAppointmentDateNotAttendance = 0;
    const allappointmentCampIds = [];
    const allAppointments = [];
    // Call the getAllCampaigns function on the smart contract
    async function displayAllCampaigns() {
    try {

        const campaigns = await bloodHubContract.methods.getAllCampaignsForAnyone().call();
        const campaignIDs = campaigns._campaignIDs;


        console.log(campaigns);
        console.log('campaigns');
        // Use Promise.all to collect results from getAllAppointmentsForCampaign
        // await Promise.all(
        //     campaignIDs.map(async campaign => {
        //         const appointments = await getAllAppointmentsForCampaign(campaigns[0][0]);
        //         allAppointments.push(appointments);
        //     })
        // );
        for (let i = 0; i < campaigns[0].length; i++) {
            const campaignElement = campaigns[0][i];
            const appointments = await getAllAppointmentsForCampaign(campaignElement);
            allAppointments.push(appointments);
        }
        // Now 'allAppointments' is an array containing the results of each campaign
        console.log(allAppointments);
        console.log('h');
        for (const Appointment of allAppointments) {

            for (let i = 0; i < Appointment[2].length; i++) {
                // console.log(Appointment);
                if(Appointment[2][i] == Donor[0].account){
                    allappointmentCampIds.push(Appointment._campaignIDs[i]);
                    // if(Appointment[4][i]){ //check if marked attendence
                        // lastAppointmentDate = formatDateFromUniqueId(Appointment[0][0]);
                        for (let j = 0; j < campaigns._campaignIDs.length; j++) {

                            if((campaigns[0][j]) == Appointment[0][i]){
                                lastAppointmentDate = web3.utils.hexToUtf8(campaigns[4][j]);
                                // console.log(lastAppointmentDate);
                            }

                        }
                        // const camData = await bloodHubContract.methods.getAllCampaignsForAnyone(Appointment[0][i]).call();
                        // console.log(camData);
                    // }else{
                    //     for (let j = 0; j < campaigns._campaignIDs.length; j++) {

                    //         if((campaigns[0][j]) == Appointment[0][i]){
                    //             lastAppointmentDateNotAttendance = web3.utils.hexToUtf8(campaigns[4][j]);
                    //             // console.log(lastAppointmentDate);
                    //         }

                    //     }
                    // }


                }
            }
            // console.log(Appointment[2]);
            // console.log(Donor[0].account);

        }
        console.log(allappointmentCampIds + ' hgh');




        //check campaigns empty or not
        if (campaigns._campaignIDs && campaigns._campaignIDs.length === 0) {
            console.log('The _campaignIDs array is empty.');
        } else {
            console.log('The _campaignIDs array is not empty.');
            //call diaplay function
            displayCampaigns(campaigns);
            displayCampaignsAppointments(campaigns);
            // console.log(campaigns);

        }

        console.log(campaigns);

    } catch (error) {
        console.error('Error getting campaigns:', error);
    }

}

//display data in the table

function displayCampaigns(campaigns) {
 console.log(lastAppointmentDate + ' jj');
 let lastappointmentDateAsString = 0;
 if(lastAppointmentDate == 0){
    let today = new Date();
    let lastDate = new Date(today);
    lastappointmentDateAsString = lastDate.toISOString().split('T')[0];

    document.getElementById('donateNote').innerHTML = '<b>You are Eligible to Donate!</b>';
 }else{
        //checking old donation date
    let lastDate = new Date(lastAppointmentDate);
    // Add 4 months to the date
    lastDate.setMonth(lastDate.getMonth() + 4);
    // Convert the result back to a string if needed
    lastappointmentDateAsString = lastDate.toISOString().split('T')[0];
    document.getElementById('nextDay').textContent = lastappointmentDateAsString;
 }



    console.log(lastappointmentDateAsString + ' jjj');


    // Check if DataTable is already initialized on the table and delete it
    if ($.fn.DataTable.isDataTable('#example1')) {
        $('#example1').DataTable().destroy();
    }

    const campaignsListDiv = document.getElementById('campaignsList2');

    // Clear previous content
    campaignsListDiv.innerHTML = '';

    const campaignSlotsPromises = [];  // Declare campaignSlotsPromises here

    if (campaigns._campaignIDs.length === 0) {
        campaignsListDiv.innerHTML = '<tr><td colspan="4">No campaigns available.</td></tr>';
    } else {
        for (let i = 0; i < campaigns._campaignIDs.length; i++) {

            if(campaigns.approvedStatus[i]){
                let campDate = new Date(web3.utils.hexToUtf8(campaigns.dates[i]));

                // Extract date components
                const year = campDate.getFullYear();
                const month = String(campDate.getMonth() + 1).padStart(2, '0'); // Months are zero-based
                const day = String(campDate.getDate()).padStart(2, '0');

                // Create the desired date string format
                const formattedDate = `${year}-${month}-${day}`;
                // console.log(campDate+ '  p');
                if(formattedDate >= lastappointmentDateAsString){
                    const tr = document.createElement('tr');

                    // Create a td for each piece of campaign information
                    const campaignIdTd = document.createElement('td');
                    campaignIdTd.textContent = campaigns._campaignIDs[i];
                    tr.appendChild(campaignIdTd);

                    orgNames.forEach(function(orgName) {
                        if(campaigns.organizationIDs[i] == orgName.id){
                            const organizationIDTd = document.createElement('td');
                            organizationIDTd.textContent = '('+orgName.id + ') ' + orgName.name;
                            tr.appendChild(organizationIDTd);
                        }
                        // console.log(orgName.name);



                    });




                    const locationTd = document.createElement('td');
                    locationTd.textContent = web3.utils.hexToUtf8(campaigns.locations[i]);
                    tr.appendChild(locationTd);

                    const dateTd = document.createElement('td');
                    dateTd.textContent = web3.utils.hexToUtf8(campaigns.dates[i]);
                    tr.appendChild(dateTd);

                    const startTd = document.createElement('td');
                    startTd.textContent = web3.utils.hexToUtf8(campaigns.startTimes[i]);
                    tr.appendChild(startTd);

                    const endTd = document.createElement('td');
                    endTd.textContent = web3.utils.hexToUtf8(campaigns.endTimes[i]);
                    tr.appendChild(endTd);

                    const approvedTd = document.createElement('td');
                    approvedTd.textContent = campaigns.approvedStatus[i] ? 'Yes' : 'No';
                    tr.appendChild(approvedTd);


                    campaignsListDiv.appendChild(tr);

                    const campaignSlotsPromise = getAllCampaignSlotsByCampaignID(campaigns._campaignIDs[i]);
                    console.log(campaignSlotsPromise);
                    // Handle the promise rejection and log the error
                    campaignSlotsPromise.catch((error) => {
                        console.error('Error fetching campaign slots:', error);
                    });

                    campaignSlotsPromises.push(campaignSlotsPromise);

                    campaignSlotsPromise.then(campaignSlots => {
                        const slotsTd = document.createElement('td');
                        console.log(campaignSlots);
                        if (campaignSlots && campaignSlots.slotIDs.length > 0) {
                            // alert('ss');
                            // const allEmpty = campaignSlots.every(value => value.trim() === "");
                          //  console.log(campaignSlots);
                            // if (allEmpty) {
                                // slotsTd.textContent = 'No slots available.';
                            // } else {
                                console.log(campaignSlots.slotIDs.length);

                                for (let j = 0; j < campaignSlots.slotIDs.length; j++) {
                                    const slot = campaignSlots.slotDataArray[j];
                                    // console.log('h');
                                    // console.log(slot);
                                    // console.log('h');

                                    const trimmedValue = web3.utils.hexToUtf8(slot).trim();

                                    if (trimmedValue !== "") {

                                        const button = document.createElement('button');
                                        button.type = 'button';
                                        button.className = 'btn btn-primary';
                                        button.style.marginRight = '5px';

                                        // const utf8Slots = campaignSlots.map(web3.utils.hexToUtf8);
                                        // const position = utf8Slots.findIndex(element => element === trimmedValue);
                                        // alert(position);
                                        button.value = campaignSlots[0][j];
                                        button.textContent = trimmedValue;

                                        button.addEventListener('click', function() {
                                            const selectedSlotID = this.value;
                                            // alert(campaigns._campaignIDs[i]);
                                            // alert(selectedSlotID);
                                            makeAppointmentByDonor(campaigns._campaignIDs[i], selectedSlotID);
                                        });

                                        slotsTd.appendChild(button);
                                    }
                                }
                            // }
                        } else {
                            slotsTd.textContent = 'No slots available.';
                        }

                        tr.appendChild(slotsTd);
                    });
                }
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





function displayCampaignsAppointments(campaigns) {



    // Check if DataTable is already initialized on the table and delete it
    if ($.fn.DataTable.isDataTable('#example2')) {
        $('#example2').DataTable().destroy();
    }

    const campaignsListDiv = document.getElementById('campaignsList3');

    // Clear previous content
    campaignsListDiv.innerHTML = '';

    const campaignSlotsPromises = [];  // Declare campaignSlotsPromises here

    if (campaigns._campaignIDs.length === 0) {
        campaignsListDiv.innerHTML = '<tr><td colspan="4">No campaigns available.</td></tr>';
    } else {
        for (let i = 0; i < campaigns._campaignIDs.length; i++) {

            if(campaigns.approvedStatus[i]){
                // let campDate = new Date(web3.utils.hexToUtf8(campaigns.dates[i]));

                // console.log(campDate+ '  p');
                if (allappointmentCampIds.includes(campaigns._campaignIDs[i])) {

                    const tr = document.createElement('tr');

                    // Create a td for each piece of campaign information
                    const campaignIdTd = document.createElement('td');
                    campaignIdTd.textContent = campaigns._campaignIDs[i];
                    tr.appendChild(campaignIdTd);

                    orgNames.forEach(function(orgName) {
                        if(campaigns.organizationIDs[i] == orgName.id){
                            const organizationIDTd = document.createElement('td');
                            organizationIDTd.textContent = '('+orgName.id + ') ' + orgName.name;
                            tr.appendChild(organizationIDTd);
                        }
                        // console.log(orgName.name);

                    });


                    const locationTd = document.createElement('td');
                    locationTd.textContent = web3.utils.hexToUtf8(campaigns.locations[i]);
                    tr.appendChild(locationTd);

                    const dateTd = document.createElement('td');
                    dateTd.textContent = web3.utils.hexToUtf8(campaigns.dates[i]);
                    tr.appendChild(dateTd);

                    const startTd = document.createElement('td');
                    startTd.textContent = web3.utils.hexToUtf8(campaigns.startTimes[i]);
                    tr.appendChild(startTd);

                    const endTd = document.createElement('td');
                    endTd.textContent = web3.utils.hexToUtf8(campaigns.endTimes[i]);
                    tr.appendChild(endTd);

                    campaignsListDiv.appendChild(tr);

                    const slotsTd = document.createElement('td');

                    const button = document.createElement('button');
                    button.type = 'button';
                    button.className = 'btn btn-primary';
                    button.style.marginRight = '5px';

                    for (const Appointment of allAppointments) {
                        for (let p = 0; p < Appointment[2].length; p++) {
                            if(campaigns._campaignIDs[i] == Appointment[0][p]){
                                if(Donor[0].account == Appointment.donors[p]){
                                    button.value = Appointment._appointmentIDs[p];
                                }
                                if(Appointment.attendedStatus[p]){
                                    button.disabled = true;
                                }

                            }
                        }

                    }

                    button.textContent = 'delete';

                    button.addEventListener('click', function() {
                        const selectedAppointmentID = this.value;

                        // deleteAppointment(campaigns._campaignIDs[i], selectedSlotID);
                        deleteAppointment(selectedAppointmentID)
                        .then(() => {
                            // After the appointment is created, update the table
                            location.reload();
                            //displayAllCampaigns();
                        })
                        .catch((error) => {
                            console.error('Error deleting appointment:', error);
                        });
                    });

                    slotsTd.appendChild(button);


                    tr.appendChild(slotsTd);

                }



            }

        }
    }

    // Use Promise.all to wait for all promises to resolve before initializing DataTable
    Promise.all(campaignSlotsPromises).then(() => {
        // Initialize DataTable with the desired options
        $('#example2').dataTable({
            "order": [[0, 'desc']] // Adjust the column index based on your table structure
        });
    });
}
    function makeAppointmentByDonor(campaignIDString, slotIDString) {
        const appointmentID = generateUniqueAppointmentID();
        let campaignID = parseInt(campaignIDString);
        let slotID = parseInt(slotIDString);

        console.log(appointmentID);
            console.log(campaignID);
            console.log(slotID);
        // console.log(appointmentID,campaignID, slotID);
        // console.log(appointmentID);
        if (appointmentID && campaignID && (slotID >= 0)) {

            createAppointment(appointmentID, campaignID, slotID)
                .then(() => {
                    // After the appointment is created, update the table
                    displayAllCampaigns();
                })
                .catch((error) => {
                    console.error('Error creating appointment:', error);
                });
        } else {
            console.error('Error: Missing required values for appointment creation.');
        }
    }

    function generateUniqueAppointmentID() {
    const now = new Date();
    const numericValue = now.getFullYear() * 10000000000 +
                         (now.getMonth() + 1) * 100000000 +
                         now.getDate() * 1000000 +
                         now.getHours() * 10000 +
                         now.getMinutes() * 100 +
                         now.getSeconds();

    return numericValue;
}


function formatDateFromUniqueId(uniqueId) {
    // Extract date components from the uniqueId
    const year = uniqueId.slice(0, 4);
    const month = uniqueId.slice(4, 6);
    const day = uniqueId.slice(6, 8);

    // Assemble the components into a date string
    const dateString = `${year}-${month}-${day}`;

    return dateString;
}


</script>


@endpush

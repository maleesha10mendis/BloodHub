@extends('layouts.organizationLayout')
{{-- justify-content-center --}}
@section('content')
<div class="container-fluid">
    <div class="box">
        <div class="box-header">
          <h3 class="box-title">List of Appointments For Campaigns</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table  id="example1" class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>Campaign ID</th>
                        <th>Donor Name - Mobile</th>
                        <th>Camp. Location</th>
                        <th>Camp. Date</th>
                        <th>Donor DOB</th>
                        <th>Donor Address</th>
                        <th>Blood Group - Gender</th>
                        <th>Action</th>
                        <th>Selected Slot</th>
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
                        <td>No data</td>
                        <td>No data</td>


                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Campaign ID</th>
                        <th>Donor Name - Mobile</th>
                        <th>Camp. Location</th>
                        <th>Camp. Date</th>
                        <th>Donor DOB</th>
                        <th>Donor Address</th>
                        <th>Blood Group - Gender</th>
                        <th>Action</th>
                        <th>Selected Slot</th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>


</div>
@endsection

@section('header')
Donor Requests
@endsection


@push('specificJs')
{{-- import js for eth --}}
<script src="https://cdn.jsdelivr.net/npm/web3@1.6.0/dist/web3.min.js"></script>
<script src="{{ asset('js/contractJS/orgCampaign/orgCampaign.js') }}"></script>

<script>
    // Pass the PHP variable to JavaScript
    var donors = @json($donors);

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
    // Call the getAllCampaigns function on the smart contract
    async function displayAllCampaigns() {
    try {

        const campaigns = await bloodHubContract.methods.getAllCampaignsForAnyone().call();
        // console.log(campaigns);
        //check campaigns empty or not
        if (campaigns._campaignIDs && campaigns._campaignIDs.length === 0) {
            console.log('The _campaignIDs array is empty.');
        } else {
            console.log('The _campaignIDs array is not empty.');
            //call diaplay function
            displayCampaigns(campaigns);

        }

        // console.log(campaigns);

    } catch (error) {
        console.error('Error getting campaigns:', error);
    }

}

//display data in the table

async function displayCampaigns(campaigns) {
    // Check if DataTable is already initialized on the table and delete it
    if ($.fn.DataTable.isDataTable('#example1')) {
        $('#example1').DataTable().destroy();
    }

    const campaignsListDiv = document.getElementById('campaignsList2');

    // Clear previous content
    campaignsListDiv.innerHTML = '';

    const campaignSlotsPromises = [];
    let rows = [];
    if (campaigns._campaignIDs.length === 0) {
        campaignsListDiv.innerHTML = '<tr><td colspan="4">No campaigns available.</td></tr>';
    } else {

        for (let i = 0; i < campaigns._campaignIDs.length; i++) {
            if (campaigns.approvedStatus[i]) {
                const allAppointments = await  getAllAppointmentsForCampaign(campaigns._campaignIDs[i]);
                const campaignSlots= await  getAllCampaignSlotsByCampaignID(campaigns._campaignIDs[i]);

                console.log(allAppointments);
                console.log('allAppointments');


                for (let x = 0; x < allAppointments._appointmentIDs.length; x++) {
                        // Declare tr here
                    //  alert(allAppointments._appointmentIDs.length);
                    //  alert(allAppointments._appointmentIDs[x]);
                    const tr = document.createElement('tr');
                    if(allAppointments._appointmentIDs[x] != 0){

                        // Create and append td elements for campaign information
                        const campaignIdTd = document.createElement('td');
                        campaignIdTd.textContent = campaigns._campaignIDs[i];
                        tr.appendChild(campaignIdTd);

                        donors.forEach(function(donor) {
                            if (allAppointments.donors[x] == donor.account) {
                                const donorNameTD = document.createElement('td');
                                donorNameTD.textContent = donor.name + ' - ' + donor.mobile;
                                tr.appendChild(donorNameTD);
                            }
                        });

                        const locationTd = document.createElement('td');
                        locationTd.textContent = web3.utils.hexToUtf8(campaigns.locations[i]);
                        tr.appendChild(locationTd);

                        const dateTd = document.createElement('td');
                        dateTd.textContent = web3.utils.hexToUtf8(campaigns.dates[i]);
                        tr.appendChild(dateTd);

                        donors.forEach(function(donor) {
                            if (allAppointments.donors[x] == donor.account) {
                                const donorDOBTD = document.createElement('td');
                                donorDOBTD.textContent = donor.dob;
                                tr.appendChild(donorDOBTD);
                            }
                        });

                        donors.forEach(function(donor) {
                            if (allAppointments.donors[x] == donor.account) {
                                const donorAddressTD = document.createElement('td');
                                donorAddressTD.textContent = donor.address;
                                tr.appendChild(donorAddressTD);
                            }
                        });

                        donors.forEach(function(donor) {
                            if (allAppointments.donors[x] == donor.account) {
                                const donorGenderBldTd = document.createElement('td');
                                donorGenderBldTd.textContent = donor.bloodGroup + ' (' + donor.gender + ') ';
                                tr.appendChild(donorGenderBldTd);
                            }
                        });

                        // Create a td for the button
                        const buttonTd = document.createElement('td');

                        if (!allAppointments.attendedStatus[x]) {
                            // If attendedStatus is false, create and append the "Confirm" button
                            const button = document.createElement('button');
                            button.innerHTML = '<i class="fa fa-check" aria-hidden="true"></i> <b> Confirm</b>';
                            button.className = 'btn btn-primary';

                            // Add click event listener to the button
                            button.addEventListener('click', function() {
                                // Call markAppointmentAttendedbyORG function with appointmentID as the parameter
                                markAppointmentAttendedbyORG(allAppointments._appointmentIDs[x]);
                            });

                            // Append the button to the td
                            buttonTd.appendChild(button);
                        } else {
                            // If attendedStatus is true, display "Confirmed"
                            buttonTd.textContent = 'Confirmed';
                        }

                        // Append the td with the button (or text) to the row
                        tr.appendChild(buttonTd);
                        // console.log(allAppointments);
                        // console.log('allAppointments');

                            const slotsTd = document.createElement('td');

                            if (campaignSlots[0].length > 0) {
                                // const ul = document.createElement('ul');

                                for (let y = 0; y < campaignSlots[0].length; y++) {
                                    // alert(x);
                                    // console.log(campaignSlots);
                                    const slotID = campaignSlots.slotIDs[y];
                                    const slotData = web3.utils.hexToUtf8(campaignSlots.slotDataArray[y]).trim();

                                    if (slotData !== "") {
                                        slotsTd.textContent = `${slotData}`;
                                    } else {
                                        slotsTd.textContent = 'No slots available.';
                                    }
                                }
                            } else {
                                slotsTd.textContent = 'No slots available.';
                            }

                            // Append the td with the slots information to the row
                            tr.appendChild(slotsTd);

                        // Append the row to the tbody
                        campaignsListDiv.appendChild(tr);
                        rows.push(tr);
                    }

                }

                // Return the row for further processing if needed


            }
        }
        return rows;
    }

    // Use Promise.all to wait for all promises to resolve before initializing DataTable
        Promise.all(campaignSlotsPromises).then(rows => {
        // All rows are resolved, now you can append them to the campaignsListDiv

        rows.forEach(row => {
            campaignsListDiv.appendChild(row);
        });

        // Initialize DataTable with the desired options
        $('#example1').dataTable({
            "order": [[0, 'desc']] // Adjust the column index based on your table structure
        });
    });
}






function markAppointmentAttendedbyORG(appointmentID){


    markAppointmentAttended(appointmentID)
            .then(() => {
            // After the campaign is created, update the table
            displayAllCampaigns();
            })
            .catch((error) => {
            console.error('Error creating campaign:', error);
            });
}
</script>

@endpush

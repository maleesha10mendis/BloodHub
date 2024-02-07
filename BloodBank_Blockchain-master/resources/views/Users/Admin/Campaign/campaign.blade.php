@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid ">

    <div class="box">
        <div class="box-header">
          <h3 class="box-title">List of Your Campaigns</h3>
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
                        <th>Action</th>
                        <th>Time Slots</th>
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
                        <th>Organization ID - Name</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Time Slots</th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>

</div>
@endsection

@section('header')
Campaigns
@endsection



@push('specificJs')
{{-- import js for eth --}}
<script src="https://cdn.jsdelivr.net/npm/web3@1.6.0/dist/web3.min.js"></script>
<script src="{{ asset('js/contractJS/orgCampaign/orgCampaign.js') }}"></script>

<script>
    // Pass the PHP variable to JavaScript
    var orgNames = @json($orgNames);

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

    // function displayCampaigns(campaigns) {
    //     // Check if DataTable is already initialized on the table and delete it
    //     if ($.fn.DataTable.isDataTable('#example1')) {
    //         $('#example1').DataTable().destroy();
    //     }

    //     const campaignsListDiv = document.getElementById('campaignsList2');

    //     // Clear previous content
    //     campaignsListDiv.innerHTML = '';

    //     const campaignSlotsPromises = [];  // Declare campaignSlotsPromises here

    //     if (campaigns._campaignIDs.length === 0) {
    //         campaignsListDiv.innerHTML = '<tr><td colspan="4">No campaigns available.</td></tr>';
    //     } else {
    //         for (let i = 0; i < campaigns._campaignIDs.length; i++) {

    //             const tr = document.createElement('tr');

    //             // Create a td for each piece of campaign information
    //             const campaignIdTd = document.createElement('td');
    //             campaignIdTd.textContent = campaigns._campaignIDs[i];
    //             tr.appendChild(campaignIdTd);

    //             orgNames.forEach(function(orgName) {
    //                 if(campaigns.organizationIDs[i] == orgName.id){
    //                     const organizationIDTd = document.createElement('td');
    //                     organizationIDTd.textContent = '('+orgName.id + ') ' + orgName.name;
    //                     tr.appendChild(organizationIDTd);
    //                 }
    //                 // console.log(orgName.name);



    //             });




    //             const locationTd = document.createElement('td');
    //             locationTd.textContent = web3.utils.hexToUtf8(campaigns.locations[i]);
    //             tr.appendChild(locationTd);

    //             const dateTd = document.createElement('td');
    //             dateTd.textContent = web3.utils.hexToUtf8(campaigns.dates[i]);
    //             tr.appendChild(dateTd);

    //             const startTd = document.createElement('td');
    //             startTd.textContent = web3.utils.hexToUtf8(campaigns.startTimes[i]);
    //             tr.appendChild(startTd);

    //             const endTd = document.createElement('td');
    //             endTd.textContent = web3.utils.hexToUtf8(campaigns.endTimes[i]);
    //             tr.appendChild(endTd);

    //             const approvedTd = document.createElement('td');
    //             approvedTd.textContent = campaigns.approvedStatus[i] ? 'Yes' : 'No';
    //             tr.appendChild(approvedTd);

    //             // Create a td for the button
    //             const buttonTd = document.createElement('td');

    //             if (!campaigns.approvedStatus[i]) {
    //                 // If approvedStatus is true, create and append the "Delete" button
    //                 const button = document.createElement('button');
    //                 button.innerHTML = '<i class="fa fa-check" aria-hidden="true"></i> <b> Approve</b>';
    //                 // button.textContent = 'Approve';
    //                 button.className = 'btn btn-success';

    //                 // Add click event listener to the button
    //                 button.addEventListener('click', function() {
    //                     // Call approve function with campaignID as the parameter
    //                     approvingCampaignByAdmin(campaigns._campaignIDs[i]);

    //                 });

    //                 // Append the button to the td
    //                 buttonTd.appendChild(button);
    //             } else {
    //                 // If approvedStatus is false, display "No action"
    //                 buttonTd.textContent = 'No action';
    //             }

    //             // Append the td with the button (or text) to the row
    //             tr.appendChild(buttonTd);

    //             // Append the row to the tbody
    //             campaignsListDiv.appendChild(tr);

    //             const campaignSlotsPromise = getAllCampaignSlotsByCampaignID(campaigns._campaignIDs[i]);
    //             campaignSlotsPromises.push(campaignSlotsPromise);

    //             campaignSlotsPromise.then(campaignSlots => {
    //                 // Inside your loop, create and append the <ul> element
    //                 const slotsTd = document.createElement('td');

    //                 if (campaignSlots.length > 0) {
    //                     const allEmpty = campaignSlots.every(value => value.trim() === "");

    //                     if (allEmpty) {
    //                         slotsTd.textContent = 'No slots available.';
    //                     } else {
    //                         const ul = document.createElement('ul');
    //                         for (let j = 0; j < campaignSlots.length; j++) {
    //                             const trimmedValue = web3.utils.hexToUtf8(campaignSlots[j]).trim();
    //                             if (trimmedValue !== "") {
    //                                 const li = document.createElement('li');
    //                                 li.textContent = trimmedValue;
    //                                 ul.appendChild(li);
    //                             }
    //                         }
    //                         slotsTd.appendChild(ul);
    //                     }
    //                 } else {
    //                     slotsTd.textContent = 'No slots available.';
    //                 }

    //                 tr.appendChild(slotsTd);
    //             });

    //         }
    //     }

    //     // Use Promise.all to wait for all promises to resolve before initializing DataTable
    //     Promise.all(campaignSlotsPromises).then(() => {
    //         // Initialize DataTable with the desired options
    //         $('#example1').dataTable({
    //             "order": [[0, 'desc']] // Adjust the column index based on your table structure
    //         });
    //     });
    // }


function displayCampaigns(campaigns) {
    // Check if DataTable is already initialized on the table and delete it
    if ($.fn.DataTable.isDataTable('#example1')) {
        $('#example1').DataTable().destroy();
    }

    const campaignsListDiv = document.getElementById('campaignsList2');

    // Clear previous content
    campaignsListDiv.innerHTML = '';

    const campaignSlotsPromises = campaigns._campaignIDs.map(campaignID => {
        return getAllCampaignSlotsByCampaignID(campaignID)
            .then(campaignSlots => ({ campaignID, campaignSlots }));
    });

    if (campaigns._campaignIDs.length === 0) {
        campaignsListDiv.innerHTML = '<tr><td colspan="4">No campaigns available.</td></tr>';
    } else {
        Promise.all(campaignSlotsPromises)
            .then(campaignsSlotsArray => {
                for (let i = 0; i < campaigns._campaignIDs.length; i++) {
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

                // Create a td for the button
                const buttonTd = document.createElement('td');

                if (!campaigns.approvedStatus[i]) {
                    // If approvedStatus is true, create and append the "Delete" button
                    const button = document.createElement('button');
                    button.innerHTML = '<i class="fa fa-check" aria-hidden="true"></i> <b> Approve</b>';
                    // button.textContent = 'Approve';
                    button.className = 'btn btn-success';

                    // Add click event listener to the button
                    button.addEventListener('click', function() {
                        // Call approve function with campaignID as the parameter
                        approvingCampaignByAdmin(campaigns._campaignIDs[i]);

                    });

                    // Append the button to the td
                    buttonTd.appendChild(button);
                } else {
                    // If approvedStatus is false, display "No action"
                    buttonTd.textContent = 'No action';
                }

                // Append the td with the button (or text) to the row
                tr.appendChild(buttonTd);

                // Append the row to the tbody
                campaignsListDiv.appendChild(tr);

                    // Handle campaign slots
                    const slotsTd = document.createElement('td');
                    const campaignSlots = campaignsSlotsArray.find(c => c.campaignID === campaigns._campaignIDs[i])?.campaignSlots;

                    if (campaignSlots && campaignSlots.slotIDs.length > 0) {
                        const allEmpty = campaignSlots.slotDataArray.every(value => value.trim() === "");

                        if (allEmpty) {
                            slotsTd.textContent = 'No slots available.';
                        } else {
                            const ul = document.createElement('ul');
                            for (let j = 0; j < campaignSlots.slotIDs.length; j++) {
                                const slotID = campaignSlots.slotIDs[j];
                                const slotData = web3.utils.hexToUtf8(campaignSlots.slotDataArray[j]).trim();
                                if (slotData !== "") {
                                    const li = document.createElement('li');
                                    li.textContent = `${slotData}`;
                                    ul.appendChild(li);
                                }
                            }
                            slotsTd.appendChild(ul);
                        }
                    } else {
                        slotsTd.textContent = 'No slots available.';
                    }

                    tr.appendChild(slotsTd);

                    // Append the row to the tbody only once
                    campaignsListDiv.appendChild(tr);
                }

                // Initialize DataTable after all promises are resolved
                $('#example1').dataTable({
                    "order": [[0, 'desc']] // Adjust the column index based on your table structure
                });
            })
            .catch(error => {
                console.error('Error fetching campaign slots:', error);
            });
    }
}





function approvingCampaignByAdmin(campaignID){


    approveCampaign(campaignID)
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

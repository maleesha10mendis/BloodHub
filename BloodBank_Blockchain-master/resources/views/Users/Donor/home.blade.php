@extends('layouts.donorLayout')
{{-- justify-content-center --}}
@section('content')
<div class="container-fluid">

    {{-- Date and Time --}}
    {{-- @foreach ($loanData as $item)
        @include('Users.User.HomeCalculations.components.timeDate')
    @endforeach --}}

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
            <div class="box box-primary">
                <div class="box-header">



                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="box-body">



                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3 id = "donationTimes">0</h3>
                                    <h4>Times You have donated</h4>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-medkit" aria-hidden="true"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                <h3 id = "campaignCount">0</h3>

                                <h4>Campaigns are running</h4>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-file-o" aria-hidden="true"></i>
                                </div>

                            </div>
                        </div>
                        <!-- ./col -->

                    </div>
                    <!-- /.row -->


                    <br>


                    <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">List of My Donation</h3>
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

                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>





                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

</div>
@endsection

@section('header')
Donor Dashboard
@endsection


@push('specificJs')

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
    let donationCount = 0;
    const allappointmentCampIds = [];
    const allAppointments = [];
    // Call the getAllCampaigns function on the smart contract
    async function displayAllCampaigns() {
        try {

            const campaigns = await bloodHubContract.methods.getAllCampaignsForAnyone().call();
            const campaignIDs = campaigns._campaignIDs;

            const trueCount = campaigns[7].filter(value => value === true).length;
            document.getElementById('campaignCount').textContent = trueCount;
            console.log(campaigns);
            console.log('campaigns');

            // console.log("Number of false values in the array:", falseCount);
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
                        if(Appointment[4][i]){ //check if marked attendence
                            allappointmentCampIds.push(Appointment._campaignIDs[i]);
                            lastAppointmentDate = formatDateFromUniqueId(Appointment[0][0]);
                            for (let j = 0; j < campaigns._campaignIDs.length; j++) {

                                if((campaigns[0][j]) == Appointment[0][i]){
                                    lastAppointmentDate = web3.utils.hexToUtf8(campaigns[4][j]);
                                    // console.log(lastAppointmentDate);
                                }

                            }
                            // const camData = await bloodHubContract.methods.getAllCampaignsForAnyone(Appointment[0][i]).call();
                            // console.log(camData);
                        }


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
                // displayCampaigns(campaigns);
                displayCampaignsAppointments(campaigns);
                // console.log(campaigns);

            }

            console.log(campaigns);

        } catch (error) {
            console.error('Error getting campaigns:', error);
        }

    }
</script>

<script>

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

                    donationCount +=1;
                }



            }

        }
        document.getElementById('donationTimes').textContent = donationCount;
    }

    // Use Promise.all to wait for all promises to resolve before initializing DataTable
    Promise.all(campaignSlotsPromises).then(() => {
        // Initialize DataTable with the desired options
        $('#example2').dataTable({
            "order": [[0, 'desc']] // Adjust the column index based on your table structure
        });
    });
}


</script>

<script>
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

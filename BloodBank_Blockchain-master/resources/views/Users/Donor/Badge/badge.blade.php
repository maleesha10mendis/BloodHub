@extends('layouts.donorLayout')
{{-- justify-content-center --}}
@section('content')
<div class="container-fluid">

    <div class="col-md-12">
        {{-- public\homePage\images\logo.png --}}
        <div class="box box-primary">
            <div class="box-body box-profile">
                <center>
                    <img class="" src="{{ asset('homePage/images/logo.png') }}" alt="User profile picture">
                </center>
                <h2 class=" text-center">You have Donated <b><span id = "donationCountShow">0</span></b>  Times</h2>
                <h4 class="text-muted text-center">Donor Badges</h4>
                {{-- if --}}
                <div id="badgeContent">

                </div>
                <hr>
                <center>
                    <div class="row">
                        <div class="col-md-4">
                            <img class="" src="{{ asset('badges/bronze.png') }}" alt="User profile picture">
                            <h3> <b>Bronze Badge</b> <br> (2 or 3 donations)</h3>
                        </div>

                        <div class="col-md-4">
                            <img class="" src="{{ asset('badges/silver.png') }}" alt="User profile picture">
                            <h3> <b>Silver Badge</b>  <br>(4 or 5 donations)</h3>
                        </div>

                        <div class="col-md-4">
                            <img class="" src="{{ asset('badges/gold.png') }}" alt="User profile picture">
                            <h3><b>Golden Badge</b><br> (More than 5 donations)</h3>
                        </div>

                    </div>
                </center>
                {{-- <a href="{{route('donor.downloadDonorCard')}}" target="_blank" class="btn btn-primary btn-block"><i class="fa fa-download margin-r-5"></i><b>Download</b></a> --}}
            </div>

        </div>
    </div>

</div>
@endsection

@section('header')
My Badge
@endsection


@push('specificJs')

<script src="https://cdn.jsdelivr.net/npm/web3@1.6.0/dist/web3.min.js"></script>
<script src="{{ asset('js/contractJS/orgCampaign/orgCampaign.js') }}"></script>


<script>
    // Pass the PHP variable to JavaScript
    // var orgNames = @json($orgNames);
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


            // console.log(campaigns[0][0]);

            for (let i = 0; i < campaigns[0].length; i++) {
                const campaignElement = campaigns[0][i];
                const appointments = await getAllAppointmentsForCampaign(campaignElement);
                allAppointments.push(appointments);
            }
            // Now 'allAppointments' is an array containing the results of each campaign

            for (const Appointment of allAppointments) {

                for (let i = 0; i < Appointment[2].length; i++) {
                    // console.log(Appointment);
                    if(Appointment[2][i] == Donor[0].account){
                        allappointmentCampIds.push(Appointment._campaignIDs[i]);
                        // if(Appointment[4][i]){ //check if marked attendence
                        //     lastAppointmentDate = formatDateFromUniqueId(Appointment[0][0]);
                        //     for (let j = 0; j < campaigns._campaignIDs.length; j++) {

                        //         if((campaigns[0][j]) == Appointment[0][i]){
                        //             lastAppointmentDate = web3.utils.hexToUtf8(campaigns[4][j]);
                        //             // console.log(lastAppointmentDate);
                        //         }

                        //     }

                        // }


                    }
                }

            }


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


        } catch (error) {
            console.error('Error getting campaigns:', error);
        }

    }
</script>

<script>

function displayCampaignsAppointments(campaigns) {



    // Check if DataTable is already initialized on the table and delete it
    // if ($.fn.DataTable.isDataTable('#example2')) {
    //     $('#example2').DataTable().destroy();
    // }

    // const campaignsListDiv = document.getElementById('campaignsList3');

    // Clear previous content
    // campaignsListDiv.innerHTML = '';

    // const campaignSlotsPromises = [];  // Declare campaignSlotsPromises here

    if (campaigns._campaignIDs.length === 0) {
        // campaignsListDiv.innerHTML = '<tr><td colspan="4">No campaigns available.</td></tr>';
    } else {
        for (let i = 0; i < campaigns._campaignIDs.length; i++) {

            if(campaigns.approvedStatus[i]){
                // let campDate = new Date(web3.utils.hexToUtf8(campaigns.dates[i]));

                // console.log(campDate+ '  p');
                if (allappointmentCampIds.includes(campaigns._campaignIDs[i])) {
                    donationCount +=1;


                }



            }

        }
    }

    // Use Promise.all to wait for all promises to resolve before initializing DataTable
    // Promise.all(campaignSlotsPromises).then(() => {
    //     // Initialize DataTable with the desired options
    //     $('#example2').dataTable({
    //         "order": [[0, 'desc']] // Adjust the column index based on your table structure
    //     });
    // });
    document.getElementById('donationCountShow').textContent = donationCount;
    console.log(donationCount);
    if (donationCount == 2 || donationCount == 3) {
        document.getElementById('badgeContent').innerHTML = `
            <center>
                <img class="" src="{{ asset('badges/bronze.png') }}" alt="User profile picture">
                <h3>You have earned the <b>Bronze Badge!</b></h3>
            </center>
                `;
            } else if (donationCount == 4 || donationCount == 5) {
                document.getElementById('badgeContent').innerHTML = `
                <center>
                    <img class="" src="{{ asset('badges/silver.png') }}" alt="User profile picture">
                    <h3>Silver Badge</h3>
                    </center>
                    `;
                } else if (donationCount >= 6) {
                    document.getElementById('badgeContent').innerHTML = `
                    <center>
                        <img class="" src="{{ asset('badges/gold.png') }}" alt="User profile picture">
                        <h3>Golden Badge</h3>
            </center>
        `;
    }
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

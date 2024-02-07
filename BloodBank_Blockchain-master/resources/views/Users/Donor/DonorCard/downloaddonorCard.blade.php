
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Donor Card</title>

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

      <!-- Your existing HTML content -->

      <div class="col-md-5">
        <div class="box box-primary">
            <div class="box-body box-profile">
                <center>
                    <img class="" src="{{ asset('homePage/images/logo.png') }}" alt="User profile picture">
                </center>
                <h2 class=" text-center">{{$donorCardData[0]->user->name}}</h2>
                <p class="text-muted text-center">Donor</p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <h4><i class="fa fa-id-card-o margin-r-5"></i> <b>Donor ID</b> <a class="pull-right">{{$donorCardData[0]->did}}</a></h4>
                        </li>
                        <li class="list-group-item">
                            <h4><i class="fa fa-tint margin-r-5"></i> <b>Blood Group</b> <a class="pull-right">{{$donorCardData[0]->bloodGroup}}</a></h4>
                        </li>
                        <li class="list-group-item">
                            <h4><i class="fa fa-calendar margin-r-5"></i><b>Date of Birth</b> <a class="pull-right">{{$donorCardData[0]->dob}}</a></h4>
                        </li>
                        <li class="list-group-item">
                            <h4><i class="fa fa-mars margin-r-5"></i><b>Gender</b> <a class="pull-right">{{$donorCardData[0]->gender}}</a></h4>
                        </li>
                        <li class="list-group-item">
                            <h4><i class="fa fa-phone margin-r-5"></i><b>Mobile Number</b> <a class="pull-right">{{$donorCardData[0]->mobile}}</a></h4>
                        </li>
                        <li class="list-group-item">
                            <h4><i class="fa fa-map-marker margin-r-5"></i><b>Address</b> <a class="pull-right">{{$donorCardData[0]->address}}</a></h4>
                        </li>

                        {{-- <li class="list-group-item">
                            <b>Following</b> <a class="pull-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="pull-right">13,287</a>
                        </li> --}}
                    </ul>
                {{-- <a href="#" class="btn btn-primary btn-block"><i class="fa fa-download margin-r-5"></i><b>Download</b></a> --}}
            </div>

        </div>
    </div>
    <div class="col-md-6">
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

                        </tr>
                    </thead>
                    <tbody id="campaignsList3">
                        <tr>
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
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/web3@1.6.0/dist/web3.min.js"></script>
    <script src="{{ asset('js/contractJS/orgCampaign/orgCampaign.js') }}"></script>

      <script>
        // Use JavaScript to trigger the print dialog when the page is loaded
        // window.onload = function () {
        //   window.print();
        // };
      </script>


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
        window.print();
    }, 200); // 2000 milliseconds = 2 seconds
    };
</script>

<script>
    let lastAppointmentDate = 0;
    const allappointmentCampIds = [];
    const allAppointments = [];
    // Call the getAllCampaigns function on the smart contract
    async function displayAllCampaigns() {
        try {

            const campaigns = await bloodHubContract.methods.getAllCampaignsForAnyone().call();
            const campaignIDs = campaigns._campaignIDs;


            console.log(campaigns[0][0]);
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
    // if ($.fn.DataTable.isDataTable('#example2')) {
    //     $('#example2').DataTable().destroy();
    // }

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

                    campaignsListDiv.appendChild(tr);

                }

            }

        }
    }

    // Use Promise.all to wait for all promises to resolve before initializing DataTable
    Promise.all(campaignSlotsPromises).then(() => {
        // Initialize DataTable with the desired options
        // $('#example2').dataTable({
        //     "order": [[0, 'desc']] // Adjust the column index based on your table structure
        // });
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
    </body>
    </html>


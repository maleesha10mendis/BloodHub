@extends('layouts.organizationLayout')
{{-- justify-content-center --}}
@section('content')
<div class="container-fluid">

    <!-- Campaign Creation Form -->

    <div class="row">

        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Create Campaign</h3>
                </div>
                <div class="box-body">

                    <form  class="form" onsubmit="createCampaignFormSubmit(); return false;">
                        @csrf
                        <input id="organizationID" type="hidden" value="{{ auth()->user()->id }}">
                        <input type="hidden" id="campaignIDInput" value="" name="campID" required>

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="location">Location:</label>
                                    <input type="text" id="location" class="form-control" required>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">Date:</label>
                                    <input type="text" class="form-control" id="date" required>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="startTime">Start Time:</label>
                                    <div class="input-group">
                                        <input type="text" id="startTime" class="form-control timepicker" required>
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="endTime">End Time:</label>
                                    <div class="input-group">
                                        <input type="text" id="endTime" class="form-control timepicker" required>
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>




                        <div class="form-group">
                            <label for="slots">Slots:</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="slotsContainer">
                                        <!-- Slots will be dynamically added here -->
                                    </div>
                                    <button type="button" class="btn btn-success" onclick="addSlot()" style="margin-top: 3px">Add Slot</button>
                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" >Create Campaign</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <hr>

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
                        <th>Location</th>
                        <th>Date</th>
                        <th>start</th>
                        <th>end</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>slots</th>
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


                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Campaign ID</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>start</th>
                        <th>end</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>slots</th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
</div>
@auth
    <script>
        window.authUserId = {{ auth()->user()->id }};
    </script>
@endauth

@endsection

@section('header')
Campaigns
@endsection


@push('specificJs')
<!-- Initialize the timepicker -->
<script>
    $(document).ready(function(){
        $('.timepicker').timepicker({
            showMeridian: false, // Set to true if you want to show AM/PM
            defaultTime: false
        });

    });

</script>



<script>
    //Date picker
    $('#date').datepicker({
      autoclose: true
    })
  </script>
{{-- <script>
    $(function () {
      $('#example1').DataTable()
    })
  </script> --}}
<script src="https://cdn.jsdelivr.net/npm/web3@1.6.0/dist/web3.min.js"></script>
<script src="{{ asset('js/contractJS/orgCampaign/orgCampaign.js') }}"></script>
{{-- <script src="{{ mix('js/app.js') }}"></script> --}}

<script>
        var userId = window.authUserId;

    // Now you can use the userId variable in your JavaScript code
    // console.log('User ID:', userId);

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



function generateUniqueId() {
  const date = new Date();
  const timestamp = date.getTime();
  return timestamp;
}

    // Function to handle campaign creation form submission
    async function createCampaignFormSubmit() {

        // Check if at least one slot is added
        if (slotInputs.length === 0) {
            displayMessageInContainer("Please Add At Least One Slot Before Creating The Campaign.", 8000);
            return;
        }

        const organizationID = document.getElementById('organizationID').value;

        const campaigns = await bloodHubContract.methods.getAllCampaignsForAnyone().call();

        const campaignID = generateUniqueId();


        // Set the value of the input field for campaign slot

        const location = document.getElementById('location').value;
        const date = document.getElementById('date').value;
        const startTime = document.getElementById('startTime').value;
        const endTime = document.getElementById('endTime').value;




        //get slot data to allSlotValues
        var allSlotValues = getAllSlotValues();
        // createSlot(campaignID, allSlotValues[0]);
        for (var i = 0; i < allSlotValues.length; i++) {
            const slotID = generateUniqueId();
            createSlot(campaignID,slotID,allSlotValues[i])
            .then(() => {
            // After the campaign is created, update the table
            displayAllCampaigns();
            })
            .catch((error) => {
            console.error('Error creating campaign:', error);
            });
        }

        createCampaign(organizationID, campaignID, location, date, startTime, endTime)
        .then(() => {



            // After the campaign is created, update the table
            displayAllCampaigns();
        })
        .catch((error) => {
            console.error('Error creating campaign:', error);
        });
    }






    // Call the getAllCampaigns function on the smart contract
    async function displayAllCampaigns() {
    try {

        const campaigns = await bloodHubContract.methods.getAllCampaignsForAnyone().call();
        console.log(campaigns);
        //check campaigns empty or not
        if (campaigns._campaignIDs && campaigns._campaignIDs.length === 0) {
            console.log('The _campaignIDs array is empty.');
            // location.reload();
        } else {
            console.log('The _campaignIDs array is not empty.');
            //call diaplay function
            displayCampaigns(campaigns)

        }

        // console.log(campaigns);

    } catch (error) {
        console.error('Error getting campaigns:', error);
    }


}


function displayCampaigns(campaigns) {
    // Check if DataTable is already initialized on the table and delete it
    if ($.fn.DataTable.isDataTable('#example1')) {
        $('#example1').DataTable().destroy();
    }

    const campaignsListDiv = document.getElementById('campaignsList2');

    // Clear previous content
    campaignsListDiv.innerHTML = '';

    const campaignSlotsPromises = campaigns._campaignIDs.map(campaignID => getAllCampaignSlotsByCampaignID(campaignID));

    if (campaigns._campaignIDs.length === 0) {
        campaignsListDiv.innerHTML = '<tr><td colspan="4">No campaigns available.</td></tr>';
    } else {
        Promise.all(campaignSlotsPromises)
            .then(campaignsSlotsArray => {
                for (let i = 0; i < campaigns._campaignIDs.length; i++) {
                    if (campaigns.organizationIDs[i] == userId) {
                        const tr = document.createElement('tr');

                        // Create a td for each piece of campaign information
                        const campaignIdTd = document.createElement('td');
                        campaignIdTd.textContent = campaigns._campaignIDs[i];
                        tr.appendChild(campaignIdTd);

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

                        // Create a button and add it to a td
                        const buttonTd = document.createElement('td');
                        const button = document.createElement('button');
                        button.textContent = 'Delete'; // Change 'YourButtonText' to the desired text

                        // Add the "btn btn-danger" class to the button
                        button.className = 'btn btn-danger';

                        // Add click event listener to the button
                        button.addEventListener('click', function () {
                            // Call deleteCampaign function with campaignID as the parameter
                            deleteCampaignByID(campaigns._campaignIDs[i]);
                            deleteSlotBycampaignID(campaigns._campaignIDs[i]);
                        });

                        // Append the button to the td
                        buttonTd.appendChild(button);

                        // Append the td with the button to the row
                        tr.appendChild(buttonTd);

                        // Append the row to the tbody
                        campaignsListDiv.appendChild(tr);

                        // Handle campaign slots
                        const slotsTd = document.createElement('td');
                        const campaignSlots = campaignsSlotsArray[i];

                        if (campaignSlots.slotIDs.length > 0) {
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
                    }
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




    // delete campaign
    function deleteCampaignByID(campaignID){
        deleteCampaign(campaignID)
        .then(() => {
            // After the campaign is deleted, update the table
            displayAllCampaigns();
        })
        .catch((error) => {
            console.error('Error deleting campaign:', error);
        });
    }

        // delete slots
        function deleteSlotBycampaignID(campaignID){
        deleteSlots(campaignID)
        .then(() => {
            // After the campaign is deleted, update the table
            displayAllCampaigns();
        })
        .catch((error) => {
            console.error('Error deleting campaign slots:', error);
        });
    }



// Define an array to store slot input elements
var slotInputs = [];

function addSlot() {
    var slotsContainer = document.getElementById("slotsContainer");

    // Create a new input element for the slot
    var slotInput = document.createElement("input");
    slotInput.type = "text";
    slotInput.className = "form-control";
    slotInput.name = "slots[]"; // Use an array to handle multiple slots
    slotInput.placeholder = "Enter Time Range";

    // Create a new button to remove the slot
    var removeButton = document.createElement("button");
    removeButton.type = "button";
    removeButton.innerHTML = "Remove";
    removeButton.className = 'btn btn-danger float-right';
    removeButton.onclick = function() {
        // Remove the slot input and button from the container
        slotsContainer.removeChild(slotInput);
        slotsContainer.removeChild(removeButton);

        // Remove the slot input from the array
        var index = slotInputs.indexOf(slotInput);
        if (index !== -1) {
            slotInputs.splice(index, 1);
        }
    };

    // Append the new input and button to the container
    slotsContainer.appendChild(slotInput);
    slotsContainer.appendChild(removeButton);

    // Add the slot input to the array
    slotInputs.push(slotInput);
}

// Function to get all slot values into an array
function getAllSlotValues() {
    var slotValues = [];
    for (var i = 0; i < slotInputs.length; i++) {
        slotValues.push(slotInputs[i].value);
    }
    return slotValues;
}

// Function to display a message in a container and disappear after a duration
function displayMessageInContainer(message, duration) {
    var slotsContainer = document.getElementById("slotsContainer");

    // Create a new message element
    var messageElement = document.createElement("div");
    messageElement.className = "alert alert-warning";
    messageElement.textContent = message;

    // Append the message element to the container
    slotsContainer.appendChild(messageElement);

    // Set a timeout to remove the message after the specified duration
    setTimeout(function () {
        slotsContainer.removeChild(messageElement);
    }, duration);
}
</script>

@endpush

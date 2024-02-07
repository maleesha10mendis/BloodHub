@extends('layouts.adminLayout')
{{-- justify-content-center --}}
@section('content')
<div class="container-fluid ">
    {{-- <h1>Blood Stock Management</h1> --}}


    <h3>Organizations Blood Stock</h3>
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




    <!-- /.card -->

    {{-- Blood table --}}
    <div class="box">
        <div class="box-header">
          <h3 class="box-title">List of Organization Blood Stock</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table  id="example1" class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Organization</th>
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
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>Organization</th>
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
Organizations Blood Stocks
@endsection

@push('specificJs')
<script src="https://cdn.jsdelivr.net/npm/web3@1.6.0/dist/web3.min.js"></script>
<script src="{{ asset('js/contractJS/orgCampaign/orgCampaign.js') }}"></script>

<script>
    // Pass the PHP variable to JavaScript
    var allorgs = @json($allorgs);
// console.log(allHospital);
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

    for (const org of allorgs) {

        const myStock = await getBloodStocksByOwner(org.user.id);
        // const recStock = await getTransfersByReceiver(Hospital.user.id);
        const sendStock = await getTransfersBySender(org.user.id);


        //assign values to blood types myStock
        if (myStock[0].length !== 0) {
            for (let i = 0; i < myStock[0].length; i++) {
                if (web3.utils.hexToUtf8(myStock[2][i]) === 'A+') {
                    apS += myStock[3][i];
                } else if (web3.utils.hexToUtf8(myStock[2][i]) === 'A-') {
                    amS += myStock[3][i];
                } else if (web3.utils.hexToUtf8(myStock[2][i]) === 'AB+') {
                    abpS += myStock[3][i];
                } else if (web3.utils.hexToUtf8(myStock[2][i]) === 'AB-') {
                    abmS += myStock[3][i];
                } else if (web3.utils.hexToUtf8(myStock[2][i]) === 'B+') {
                    bpS += myStock[3][i];
                } else if (web3.utils.hexToUtf8(myStock[2][i]) === 'B-') {
                    bmS += myStock[3][i];
                } else if (web3.utils.hexToUtf8(myStock[2][i]) === 'O+') {
                    opS += myStock[3][i];
                } else if (web3.utils.hexToUtf8(myStock[2][i]) === 'O-') {
                    omS += myStock[3][i];
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

    };



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

            // console.log(myStock, sendStock, abmS,opS);

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

    //show blood table
    async function displayAllBlood() {
    try {
        const bloodStockList = [];


        for (const org of allorgs) {

            const bloodStock = await getBloodStocksByOwner(org.user.id);
            bloodStockList.push(bloodStock);
            // bloodStockListOwner.push(bloodStockOwner);
        }
// console.log(bloodStockListOwner);
        // Check if campaigns empty or not
        if (bloodStockList.length === 0 || (bloodStockList[0] && bloodStockList[0].length === 0)) {
            console.log('The array is empty.');
        } else {
            console.log('The array is not empty1.');
            // Call display function
            console.log(bloodStockList);

            displayBloodTable(bloodStockList);
        }


    } catch (error) {
        console.error('Error getting campaigns:', error);
    }
}

function displayBloodTable(bloodStockList) {
    // Check if DataTable is already initialized on the table and delete it
    if ($.fn.DataTable.isDataTable('#example1')) {
        $('#example1').DataTable().destroy();
    }

    const campaignsListDiv = document.getElementById('campaignsList2');
    campaignsListDiv.innerHTML = '';

    const campaignSlotsPromises = [];
    // console.log(bloodStockList);
    if (bloodStockList.length === 0 || bloodStockList[0].length === 0) {
        campaignsListDiv.innerHTML = '<tr><td colspan="4">No campaigns available.</td></tr>';
    } else {

        for (let j = 0; j < bloodStockList.length; j++) {
            console.log(`Hospital ${j} data:`);

            for (let prop in bloodStockList[j]) {
                console.log(`Property ${prop}:`);

                for (let i = 0; i < bloodStockList[j][prop].length; i++) {
                    // console.log(`  Element ${i}:`, bloodStockList[j][prop][i]);
                    const tr = document.createElement('tr');

                    // Create a td for each piece of campaign information
                    const campaignIdTd = document.createElement('td');
                    campaignIdTd.textContent = formatDateFromUniqueId(bloodStockList[j][0][i]);
                    tr.appendChild(campaignIdTd);

                    allorgs.forEach(function (org) {
                        // console.log(bloodStockList[j][1][i],Hospital.user.id);
                        if (bloodStockList[j][1][i] == org.user.id) {
                            const hospitalTd = document.createElement('td');
                            hospitalTd.textContent = org.user.name;
                            tr.appendChild(hospitalTd);
                        }
                    });

                    const dateTd = document.createElement('td');
                    dateTd.textContent = web3.utils.hexToUtf8(bloodStockList[j][2][i]); // Changed from [3] to [2]
                    tr.appendChild(dateTd);

                    const locationTd = document.createElement('td');
                    locationTd.textContent = bloodStockList[j][3][i];
                    tr.appendChild(locationTd);

                    // Append the row to the tbody
                    campaignsListDiv.appendChild(tr);

                    // Assuming you have a function that returns a promise here
                    const campaignSlotsPromise = getSomeAsyncData(); // Replace with your function
                    campaignSlotsPromises.push(campaignSlotsPromise);
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

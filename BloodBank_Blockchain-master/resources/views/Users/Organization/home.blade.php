@extends('layouts.organizationLayout')
{{-- justify-content-center --}}
@section('content')
<div class="container-fluid">

    {{-- Date and Time --}}
    {{-- @foreach ($loanData as $item)
        @include('Users.User.HomeCalculations.components.timeDate')
    @endforeach --}}

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






</div>
@endsection

@section('header')
Organization Dashboard
@endsection


@push('specificJs')
<script src="https://cdn.jsdelivr.net/npm/web3@1.6.0/dist/web3.min.js"></script>
<script src="{{ asset('js/contractJS/orgCampaign/orgCampaign.js') }}"></script>

<script>

window.onload = function() {
        setTimeout(async function() {
            try {
                await callBloodAvailable();
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
</script>



@endpush

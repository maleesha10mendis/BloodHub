
 <!-- Small boxes (Stat box) -->
 <div class="row">
     <!-- ./col -->
     <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-green">
             <div class="inner">
                 <h3 id = "pendingCamps">0</h3>

                 <h4>Pending Campaign Requests</h4>
                </div>
                <div class="icon">
                    <i class="fa fa-tint" aria-hidden="true"></i>
                </div>
                <a href="{{route('admin.allCampaigns')}}" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{$donorCount}}</h3>
                <h4>Donors</h4>
            </div>
            <div class="icon">
              <i class="fa fa-users" aria-hidden="true"></i>
            </div>
            <a href="{{route('admin.allDonors')}}" class="small-box-footer">
              View Donors <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{$hospCount}}</h3>

          <h4>Hospitals</h4>
        </div>
        <div class="icon">
          <i class="fa fa-hospital-o"></i>
        </div>
        <a href="{{route('admin.allHospital')}}" class="small-box-footer">
          View Hospitals <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>{{$orgCount}}</h3>

          <h4>Organizations</h4>
        </div>
        <div class="icon">
          <i class="fa fa-building-o" aria-hidden="true"></i>
        </div>
        <a href="{{route('admin.allOrganization')}}" class="small-box-footer">
          View Organizations <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->


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




{{-- Charts --}}

<h3>Donors Details</h3>
    <div class="row">
      <div class="col-md-6">


        <!-- DONUT CHART -->
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Gender of Donors</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> --}}
            </div>
          </div>
          <div class="box-body">
            <canvas id="pieChart" ></canvas>
            <div class="col-md-4">
                <ul class="chart-legend clearfix">

                    <li><i class="fa fa-circle-o text-light-blue"></i> Male : {{$maleP}}</li>
                    <li><i class="fa fa-circle-o text-red"></i> Female : {{$femaleP}}</li>
                    <li><i class="fa fa-circle-o text-green"></i> Other : {{$otherP}}</li>
                    <li><i class="fa fa-circle-o text-yellow"></i> Prefer Not To Say : {{$notSayP}}</li>

                </ul>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
      <!-- /.col (LEFT) -->
      <div class="col-md-6">

        <!-- BAR CHART -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Availble Blood Types
            </h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              {{-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> --}}
            </div>
          </div>
          <div class="box-body">
            <div class="chart">

              {{-- <canvas id="barChart" ></canvas> --}}
              <div class="col-md-12">
                {{-- <p class="text-center">
                <strong>Blood Types</strong>
                </p> --}}
                <div class="progress-group">
                <span class="progress-text">A Positive (A+):</span>
                <span class="progress-number"><b>{{$aP}}</b>/{{$aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM}} Donors</span>
                <div class="progress progress active">
                    @if($aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM !== 0)
                        <div class="progress-bar progress-bar-aqua progress-bar-striped" style="width: {{$aP/($aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM) * 100}}%"></div>
                    @else
                    <div class="progress-bar progress-bar-aqua progress-bar-striped" style="width: 0%"></div>

                    @endif
                </div>
                </div>
                <div class="progress-group">
                <span class="progress-text">A Negative (A-):</span>
                <span class="progress-number"><b>{{$aM}}</b>/{{$aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM}} Donors</span>
                <div class="progress progress active">
                    @if($aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM !== 0)
                        <div class="progress-bar progress-bar-aqua progress-bar-striped" style="width: {{$aM/($aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM) * 100}}%"></div>
                    @else
                    <div class="progress-bar progress-bar-aqua progress-bar-striped" style="width: 0%"></div>
                    @endif
            </div>
                </div>


                <div class="progress-group">
                <span class="progress-text">B Positive (B+):</span>
                <span class="progress-number"><b>{{$bP}}</b>/{{$aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM}} Donors</span>
                <div class="progress progress active">

                @if($aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM !== 0)
                    <div class="progress-bar progress-bar-red progress-bar-striped" style="width: {{$bP/($aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM) * 100}}%"></div>
                @else
                    <div class="progress-bar progress-bar-aqua progress-bar-striped" style="width: 0%"></div>
                @endif
            </div>
                </div>
                <div class="progress-group">
                <span class="progress-text">B Negative (B-):</span>
                <span class="progress-number"><b>{{$bM}}</b>/{{$aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM}} Donors</span>
                <div class="progress progress active">
                @if($aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM !== 0)
                <div class="progress-bar progress-bar-red progress-bar-striped" style="width: {{$bM/($aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM) * 100}}%"></div>
                @else
                    <div class="progress-bar progress-bar-aqua progress-bar-striped" style="width: 0%"></div>

                    @endif
            </div>
                </div>


                <div class="progress-group">
                <span class="progress-text">AB Positive (AB+):</span>
                <span class="progress-number"><b>{{$abP}}</b>/{{$aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM}} Donors</span>
                <div class="progress progress active">
                @if($aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM !== 0)
                <div class="progress-bar progress-bar-green progress-bar-striped" style="width: {{$abP/($aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM) * 100}}%"></div>
                @else
                    <div class="progress-bar progress-bar-aqua progress-bar-striped" style="width: 0%"></div>
                @endif
            </div>
                </div>
                <div class="progress-group">
                <span class="progress-text">AB Negative (AB-):</span>
                <span class="progress-number"><b>{{$abM}}</b>/{{$aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM}} Donors</span>
                <div class="progress progress active">
                @if($aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM !== 0)
                <div class="progress-bar progress-bar-green progress-bar-striped" style="width: {{$abM/($aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM) * 100}}%"></div>
                @else
                    <div class="progress-bar progress-bar-aqua progress-bar-striped" style="width: 0%"></div>
                @endif
            </div>
                </div>


                <div class="progress-group">
                <span class="progress-text">O Positive (O+):</span>
                <span class="progress-number"><b>{{$oP}}</b>/{{$aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM}} Donors</span>
                <div class="progress progress active">
                    @if($aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM !== 0)
                        <div class="progress-bar progress-bar-yellow progress-bar-striped" style="width: {{$oP/($aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM) * 100}}%"></div>
                    @else
                        <div class="progress-bar progress-bar-aqua progress-bar-striped" style="width: 0%"></div>

                    @endif
            </div>
                </div>
                <div class="progress-group">
                <span class="progress-text">O Negative (O-):</span>
                <span class="progress-number"><b>{{$oM}}</b>/{{$aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM}} Donors</span>
                <div class="progress progress active">
                    @if($aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM !== 0)
                        <div class="progress-bar progress-bar-yellow progress-bar-striped" style="width: {{$oM/($aP + $aM + $bP + $bM + $abP + $abM + $oP + $oM) * 100}}%"></div>
                    @else
                    <div class="progress-bar progress-bar-aqua progress-bar-striped" style="width: 0%"></div>

                    @endif
            </div>
                </div>


                </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </div>
      <!-- /.col (RIGHT) -->
    </div>
    <!-- /.row -->


<!-- /.box -->
  @push('specificJs')

<script src="https://cdn.jsdelivr.net/npm/web3@1.6.0/dist/web3.min.js"></script>
<script src="{{ asset('js/contractJS/orgCampaign/orgCampaign.js') }}"></script>

<script>
    window.onload = function() {
    setTimeout(async function() {
        try {

            const campaigns = await bloodHubContract.methods.getAllCampaignsForAnyone().call();
            const falseCount = campaigns[7].filter(value => value === false).length;

            document.getElementById('pendingCamps').textContent = falseCount;

            const myStock = await getBloodStocksByOwner({{ auth()->id() }});
            const recStock = await getTransfersByReceiver({{ auth()->id() }});
            const sendStock = await getTransfersBySender({{ auth()->id() }});

            let apS = 0, amS = 0, bpS = 0, bmS = 0, abpS = 0, abmS = 0, opS = 0, omS = 0;

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

            //assign values to blood types received blood
            if (recStock[0].length !== 0) {
                for (let i = 0; i < recStock[0].length; i++) {
                    if (web3.utils.hexToUtf8(recStock[3][i]) === 'A+') {
                        apS += parseInt(recStock[4][i]);
                    } else if (web3.utils.hexToUtf8(recStock[3][i]) === 'A-') {
                        amS += parseInt(recStock[4][i]);
                    } else if (web3.utils.hexToUtf8(recStock[3][i]) === 'AB+') {
                        abpS += parseInt(recStock[4][i]);
                    } else if (web3.utils.hexToUtf8(recStock[3][i]) === 'AB-') {
                        abmS += parseInt(recStock[4][i]);
                    } else if (web3.utils.hexToUtf8(recStock[3][i]) === 'B+') {
                        bpS += parseInt(recStock[4][i]);
                    } else if (web3.utils.hexToUtf8(recStock[3][i]) === 'B-') {
                        bmS += parseInt(recStock[4][i]);
                    } else if (web3.utils.hexToUtf8(recStock[3][i]) === 'O+') {
                        opS += parseInt(recStock[4][i]);
                    } else if (web3.utils.hexToUtf8(recStock[3][i]) === 'O-') {
                        omS += parseInt(recStock[4][i]);
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

            // console.log(myStock, recStock, sendStock, abmS,opS);
//             console.log(
//     parseInt(apS),
//     parseInt(amS),
//     parseInt(bpS),
//     parseInt(bmS),
//     parseInt(abpS),
//     parseInt(abmS),
//     parseInt(opS),
//     parseInt(omS)
// );
        } catch (error) {
            console.error('Error on page load:', error);
        }
    }, 200); // 200 milliseconds
};

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

          <script>
            $(function () {
              /* ChartJS
               * -------
               * Here we will create a few charts using ChartJS
               */


                var maleP = @json($maleP);
                var femaleP = @json($femaleP);
                var otherP = @json($otherP);
                var notSayP = @json($notSayP);


              //-------------
              //- PIE CHART -
              //-------------
              // Get context with jQuery - using jQuery's .get() method.
              var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
                var pieChart = new Chart(pieChartCanvas);
                var PieData = [
                {
                    value: maleP,
                    color: '#3c8dbc',
                    highlight: '#3c8dbc',
                    label: 'Male'
                },
                {
                    value: femaleP,
                    color: '#dd4b39',
                    highlight: '#dd4b39',
                    label: 'Female'
                },
                {
                    value: otherP,
                    color: '#00a65a',
                    highlight: '#00a65a',
                    label: 'Other'
                },
                {
                    value: notSayP,
                    color: '#f39c12',
                    highlight: '#f39c12',
                    label: 'Prefer Not To Say'
                }
                ];

                var pieOptions = {
                segmentShowStroke: false,
                segmentStrokeColor: '#fff',
                segmentStrokeWidth: 2,
                percentageInnerCutout: 50,
                animationSteps: 140,
                animationEasing: 'easeInBounce',
                animateRotate: true,
                animateScale: false,
                responsive: true,
                maintainAspectRatio: true,
                legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
                };

            pieChart.Doughnut(PieData, pieOptions);
            })
          </script>


          {{-- <script>
            $(function () {
              $('#example1').DataTable()
              $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
              })
            })
          </script> --}}
  @endpush

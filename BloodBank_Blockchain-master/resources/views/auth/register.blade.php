@extends('layouts.layout')

@section('content')
<div class="container">







    <div class="col-md-12">

        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Donor Registration</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Organization Registration</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <div class="col-12">
                        <form method="POST" id="donorForm" action="{{ route('registering') }}">
                                @csrf
                                @include('Users.Admin.messages.addMsg')
                            <div class="row">
                                <div class="col-lg-6 col-12 ">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Donor Login Credentials</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->

                                        <div class="card-body">


                                            <div class="form-group">
                                                <label >Full Name</label>
                                                <input type="name" name="name" class="form-control" id="name" placeholder="Enter Name">
                                            </div>
                                {{-- Gender and DOB --}}

                                            <div class="row">

                                                <div class="col-lg-6 col-12">
                                                    <div class="form-group">
                                                        <label >Email Address</label>
                                                        <input type="email" class="form-control" name="email" placeholder="Email Address">
                                                    </div>
                                                </div>


                                            </div>


                                        {{-- Role value --}}
                                        <input name="role" type="hidden" value="0">
                                        <input id="donorRole" type="hidden" value="2">
                                    </div>
                                        <!-- /.card-body -->



                                </div>
                            </div>



                                                {{-- Start of Second Card --}}

                            <div class="col-lg-6 col-12">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">Create Password</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->

                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-lg-6 col-12">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" pattern="^(?=.*[!@#\$%\^&\*]).{8,}$">
                                                   <small>Password must contain at least one of the following special symbols: !@#$%^&* and be at least 8 characters long</small>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-12">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Confirm the Password</label>
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                    <!-- /.card-body -->

                                    {{-- <div class="card-footer">
                                        <div class="form-group">
                                            <small class="form-text text-muted text-right">Please check details again.</small>
                                            <button type="submit" class="btn btn-danger btn-lg float-right"><b>&nbsp; Save All&nbsp;</b>
                                            </button>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>















                            <div class="col-lg-12 col-12">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">Personal Information</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->

                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-lg-6 col-12">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Mobile</label>
                                                    <input type="text" name="mobile" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-12">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Date of Birth</label>
                                                    <input type="text" name="dob" class="form-control pull-right" id="datepicker">
                                                </div>
                                                <span id = "dateMsg"></span>
                                            </div>

                                        </div>


                                    </div>
                                    <!-- /.card-body -->

                                    {{-- <div class="card-footer">
                                        <div class="form-group">
                                            <small class="form-text text-muted text-right">Please check details again.</small>
                                            <button type="submit" class="btn btn-danger btn-lg float-right"><b>&nbsp; Save All&nbsp;</b>
                                            </button>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>


                            <div class="col-lg-12 col-12">
                                <div class="card card-info">

                                    <!-- /.card-header -->
                                    <!-- form start -->

                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-lg-6 col-12">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Gender</label>

                                                    <select id="gender" class="form-control" name="gender">
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                        <option value="prefer-not-to-say">Prefer not to say</option>
                                                      </select>

                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-12">
                                                <div class="form-group">
                                                    <label for="blood-group">Select your blood group:</label>
                                                    <select id="blood-group" name="bloodGroup" class="form-control">
                                                    <option value="A+">A Positive</option>
                                                    <option value="A-">A Negative</option>
                                                    <option value="B+">B Positive</option>
                                                    <option value="B-">B Negative</option>
                                                    <option value="AB+">AB Positive</option>
                                                    <option value="AB-">AB Negative</option>
                                                    <option value="O+">O Positive</option>
                                                    <option value="O-">O Negative</option>
                                                    </select>

                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                    <!-- /.card-body -->

                                    {{-- <div class="card-footer">
                                        <div class="form-group">
                                            <small class="form-text text-muted text-right">Please check details again.</small>
                                            <button type="submit" class="btn btn-danger btn-lg float-right"><b>&nbsp; Save All&nbsp;</b>
                                            </button>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>


                            <div class="col-lg-12 col-12">
                                <div class="card card-info">

                                    <!-- /.card-header -->
                                    <!-- form start -->

                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-lg-6 col-12">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Address</label>
                                                    <textarea name="address" class="form-control"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-12">
                                                <div class="form-group">
                                                    {{-- <label for="exampleInputPassword1">Account Address</label> --}}
                                                    {{-- <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"> --}}

                                                    <label for="crypto-address">Your ETH Address:</label>
                                                    <input type="text" name="account" id="crypto-address" class="form-control" pattern="^0x[a-fA-F0-9]{40}$" required>
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer text-right">
                                        <div class="form-group">
                                            <small class="form-text text-muted text-right">Please check details again.</small>
                                            <button type="submit" class="btn btn-danger btn-lg float-right"><b>&nbsp; Save All&nbsp;</b></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

                <div class="tab-pane" id="tab_2">
                    <form id="orgForm" action="{{route('registeringORG')}}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Organization's Details</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <div class="box-body">

                                        <div class="row">
                                            <div class="col-lg-6 col-12">
                                                <div class="form-group">
                                                    <label>Name of the Organization</label>
                                                    <input type="name" name="name" class="form-control" id="name" placeholder="Enter Name" required>
                                                </div>
                                            </div>
                                        {{-- Gender --}}

                                            <div class="col-lg-6 col-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea class="form-control" rows="3" name="Address" placeholder="Organization Address.." required></textarea>
                                                </div>
                                            </div>


                                        </div>


                                        <div class="row">
                                            <div class="col-lg-6 col-12">


                                                <!-- phone mask -->
                                                <div class="form-group">
                                                    <label>Contact Number</label>

                                                    <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-phone"></i>
                                                    </div>
                                                    <input type="text" class="form-control" name="mobile" data-inputmask='"mask": "(999) 999-9999"' data-mask required>
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                                <!-- /.form group -->

                                            </div>

                                            <div class="col-lg-6 col-12">
                                                <div class="form-group">
                                                    <label for="crypto-address">Your ETH Address:</label>
                                                    <input type="text" name="account" id="crypto-addressORG" class="form-control" pattern="^0x[a-fA-F0-9]{40}$" required>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row">

                                            <div class="col-lg-6 col-12">
                                                <div class="form-group">
                                                    <label>Date of Registration</label>
                                                    <input type="text" name="registerDate" class="form-control pull-right" id="datepickerORG" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-12">
                                                <div class="form-group">
                                                    <label>Registration Number</label>
                                                    <input type="name" name="registerNumber" class="form-control" placeholder="Registration Number" required>

                                                </div>
                                            </div>
                                        </div>





                                        {{-- Role value --}}
                                        <input name="role" type="hidden" value="2">
                                        <input id="orgRole" type="hidden" value="1">
                                        <!-- /.box-body -->


                                    </div>
                                </div>
                                <!-- /.box -->
                            </div>




                            {{-- Password form --}}
                            <div class="col-lg-12 col-12">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Organization's Login Credentials</h3>
                                    </div>

                                    <!-- /.card-header -->
                                    <!-- form start -->

                                    <div class="box-body">

                                        <div class="row">
                                            <div class="col-lg-6 col-12">
                                                <div class="form-group">
                                                    <label >Email Address</label>
                                                    <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                                                </div>
                                            </div>




                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 col-12">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" pattern="^(?=.*[!@#\$%\^&\*]).{8,}$">
                                                    <small class="">Password must contain at least one of the following special symbols: !@#$%^&* and be at least 8 characters long</small>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-12">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Confirm the Password</label>
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>

                                        </div>



                                        <div class="box-footer">
                                            <div class="form-group pull-right">
                                                <small class="form-text text-muted text-right">Please check details again.</small><br>
                                                <button type="submit" class="btn btn-danger btn-lg float-right"><b>&nbsp; Save All&nbsp;</b>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>



            </div>

        </div>

    </div>
</div>
@endsection

@push('specificJs')

<script>
    const addressInput = document.getElementById("crypto-address");
const errorMessage = document.querySelector(".error-message");

addressInput.addEventListener("input", () => {
  const address = addressInput.value;

  if (/^0x[a-fA-F0-9]{40}$/.test(address)) {
    errorMessage.textContent = "";
  } else {
    errorMessage.textContent = "Invalid Ethereum address";
  }
});

</script>

<script>
        const addressInput2 = document.getElementById("crypto-addressORG");
const errorMessage = document.querySelector(".error-message");

addressInput2.addEventListener("input", () => {
  const address = addressInput2.value;

  if (/^0x[a-fA-F0-9]{40}$/.test(address)) {
    errorMessage.textContent = "";
  } else {
    errorMessage.textContent = "Invalid Ethereum address";
  }
});
</script>



<script>

    // Date picker
  $('#datepicker').datepicker({
    autoclose: true
  }).on('changeDate', function () {
    validateDate();
  });

  // Validation function
  function validateDate() {
    var dob = $('#datepicker').datepicker('getDate');
    var today = new Date();
    var age = today.getFullYear() - dob.getFullYear();

    // Check if the birthday hasn't occurred yet this year
    if (today.getMonth() < dob.getMonth() || (today.getMonth() === dob.getMonth() && today.getDate() < dob.getDate())) {
      age--;
    }

    // Check if the person is 18 or older
    if (age >= 18) {
      // Valid date, the person is 18 or older
      $('#dateMsg').text('Valid date. User is 18 or older.').css('color', 'green');
    } else {
      // Invalid date, the person is younger than 18
      $('#dateMsg').text('Invalid date. User must be 18 or older.').css('color', 'red');

      // Clear the text box
      $('#datepicker').val('');
    }

    // Hide the message after 3 seconds
    setTimeout(function () {
      $('#dateMsg').text('').css('color', ''); // Empty text and reset color
    }, 5000);
  }
  </script>

<script>
    //Date picker
    $('#datepickerORG').datepicker({
      autoclose: true
    })
  </script>
{{-- C:\Users\SupunLap\Documents\BlockChain\public\js\contractJS\orgCampaign\orgCampaign.js --}}
<script src="https://cdn.jsdelivr.net/npm/web3@1.6.0/dist/web3.min.js"></script>
<script src="{{ asset('js/contractJS/orgCampaign/orgCampaign.js') }}"></script>
{{-- <script src="{{ mix('js/app.js') }}"></script> --}}

<script>

    function callSetDonorUserRole() {
        const userAddress = document.getElementById('crypto-address').value;
        const newRole = document.getElementById('donorRole').value;

        setUserRole(userAddress, newRole);

    }

    // Event listener for Donor form submission
    document.getElementById('donorForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Call your function to set user role
        callSetDonorUserRole();

        // Optionally, you can submit the form after handling the submission
        setTimeout(() => {
            event.target.submit(); // Submit the form after the delay
        }, 5000);
    });

    //organization role

    function callSetOrgUserRole() {
        const userAddress = document.getElementById('crypto-addressORG').value;
        const newRole = document.getElementById('orgRole').value;

        setUserRole(userAddress, newRole);

    }

    // Event listener for Donor form submission
    document.getElementById('orgForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Call your function to set user role
        callSetOrgUserRole();

        // Optionally, you can submit the form after handling the submission
        setTimeout(() => {
            event.target.submit(); // Submit the form after the delay
        }, 5000);
    });
    </script>
@endpush

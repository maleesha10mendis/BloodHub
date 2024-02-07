@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid ">

    {{-- button to go to all clients --}}
    <a class="btn btn-danger mb-1" href="{{route('admin.allDonors')}}">
        <i class="fa fa-th-list" aria-hidden="true"></i>
        <b> View All Donors</b>
    </a>
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form id="donorForm" action="{{route('admin.registeringDonor')}}" method="post">
        @csrf
        <div class="row">

            {{-- Client Details form --}}
            @include('Users.Admin.Donors.components.newDonorDetails')

            {{-- Client Password form --}}
            @include('Users.Admin.Donors.components.DonorPWD')


        </div>
    </form>
    {{-- End of Row --}}


    {{-- End of Form --}}


</div>
@endsection

@section('header')
Add New Donor
@endsection



@push('specificJs')

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

<script src="https://cdn.jsdelivr.net/npm/web3@1.6.0/dist/web3.min.js"></script>
<script src="{{ asset('js/contractJS/orgCampaign/orgCampaign.js') }}"></script>
{{-- <script src="{{ mix('js/app.js') }}"></script> --}}

<script>
    //Function to Org setUser Role
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
</script>
@endpush

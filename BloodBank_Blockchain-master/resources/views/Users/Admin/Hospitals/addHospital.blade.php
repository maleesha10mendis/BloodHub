@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid ">

    {{-- button to go to all clients --}}
    <a class="btn btn-danger mb-1" href="{{route('admin.allHospital')}}">
        <i class="fa fa-th-list" aria-hidden="true"></i>
        <b>View All Hospitals</b>
    </a>
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form id="hostForm" action="{{route('admin.addingHospital')}}" method="post">
        @csrf
        <div class="row">

            {{-- Client Details form --}}
            @include('Users.Admin.Hospitals.components.newHospitalDetails')

            {{-- Client Password form --}}
            @include('Users.Admin.Hospitals.components.HospitalPWD')

        </div>
    </form>
    {{-- End of Row --}}


    {{-- End of Form --}}


</div>
@endsection

@section('header')
Register Hospital
@endsection


@push('specificJs')
<script>
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
  </script>

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


<script src="https://cdn.jsdelivr.net/npm/web3@1.6.0/dist/web3.min.js"></script>
<script src="{{ asset('js/contractJS/orgCampaign/orgCampaign.js') }}"></script>
{{-- <script src="{{ mix('js/app.js') }}"></script> --}}

<script>

    function callSetHostUserRole() {
        const userAddress = document.getElementById('crypto-address').value;
        const newRole = document.getElementById('hostRole').value;

        setUserRole(userAddress, newRole);

    }

    // Event listener for Donor form submission
    document.getElementById('hostForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Call your function to set user role
        callSetHostUserRole();

        // Optionally, you can submit the form after handling the submission
        setTimeout(() => {
            event.target.submit(); // Submit the form after the delay
        }, 5000);
    });
</script>
@endpush

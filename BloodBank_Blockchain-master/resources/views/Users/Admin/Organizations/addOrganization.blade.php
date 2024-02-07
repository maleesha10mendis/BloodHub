@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid ">

    {{-- button to go to all clients --}}
    <a class="btn btn-danger mb-1" href="{{route('admin.allOrganization')}}">
        <i class="fa fa-th-list" aria-hidden="true"></i>
        <b>View All Organizations</b>
    </a>
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form id="orgForm" action="{{route('admin.addingOrganization')}}" method="post">
        @csrf
        <div class="row">

            {{-- Client Details form --}}
            @include('Users.Admin.Organizations.components.newOrganizationDetails')

            {{-- Client Password form --}}
            @include('Users.Admin.Organizations.components.OrganizationPWD')

        </div>
    </form>
    {{-- End of Row --}}


    {{-- End of Form --}}


</div>
@endsection

@section('header')
Register Organization
@endsection


@push('specificJs')
<script>
    //Date picker
    $('#datepickerORG').datepicker({
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


<script>
    //Function to Org setUser Role
    function setUserRoleFormSubmit() {
        const userAddress = document.getElementById('crypto-address').value;
        const newRole = document.getElementById('orgRole').value;

        setUserRole(userAddress, newRole);

    }

    // Event listener for Org form submission
    document.getElementById('orgForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Call your function to set user role
        setUserRoleFormSubmit();

        // Optionally, you can submit the form after handling the submission
        setTimeout(() => {
            event.target.submit(); // Submit the form after the delay
        }, 5000);
    });
</script>
@endpush

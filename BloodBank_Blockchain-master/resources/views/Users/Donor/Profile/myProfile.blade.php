@extends('layouts.donorLayout')

@section('content')
<div class="container-fluid ">


    @include('Users.Admin.messages.addMsg')

   <h3> Update the Account Details</h3>

        <div class="row">



            {{-- Client Password form --}}
            @include('Users.Donor.Profile.components.profilePWD')


            @include('Users.Donor.Profile.components.profileDelete')

        </div>




    {{-- End of Row --}}


    {{-- End of Form --}}


</div>
@endsection

@section('header')
My Profile
@endsection

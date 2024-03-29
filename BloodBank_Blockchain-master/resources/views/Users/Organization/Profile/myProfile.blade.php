@extends('layouts.organizationLayout')

@section('content')
<div class="container-fluid ">

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @include('Users.Admin.messages.addMsg')

   <h3> Update the Account Details</h3>

        <div class="row">



            {{-- Client Password form --}}
            @include('Users.Organization.Profile.components.profilePWD')


            @include('Users.Organization.Profile.components.profileDelete')

        </div>




    {{-- End of Row --}}


    {{-- End of Form --}}


</div>
@endsection

@section('header')
My Profile
@endsection

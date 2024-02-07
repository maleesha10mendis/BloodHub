@extends('layouts.adminLayout')

@section('content')


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif


                {{-- button to go to add client --}}
                <a class="btn btn-danger mb-1" href="{{route('admin.addDonor')}}">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    <b>Add New Donor</b>
                </a>

                <a class="btn btn-success mb-1" href="{{route('admin.allDonorsPdf')}} " target="_blank" >
                    <i class="fa fa-download" aria-hidden="true"></i>
                    <b>Download Report</b>
                </a>
                <!-- Import Table -->
               @include('Users.Admin.Donors.components.allDonorTable')

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
</section>





@endsection

@section('header')
All Donors
@endsection


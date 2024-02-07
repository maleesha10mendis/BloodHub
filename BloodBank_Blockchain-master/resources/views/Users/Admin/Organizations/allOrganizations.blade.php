@extends('layouts.adminLayout')

@section('content')


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                {{-- button to go to add client --}}
                <a class="btn btn-danger mb-1" href="{{route('admin.addOrganization')}}">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    <b>Add Organization</b>
                </a>

                <a class="btn btn-success mb-1" href="{{route('admin.allorgPdf')}} " target="_blank" >
                    <i class="fa fa-download" aria-hidden="true"></i>
                    <b>Download Report</b>
                </a>

                @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
                <!-- Import Table -->
               @include('Users.Admin.Organizations.components.allOrganizationsTable')

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>





@endsection

@section('header')
All Organizations
@endsection

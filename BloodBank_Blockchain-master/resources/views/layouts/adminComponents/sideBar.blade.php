
{{-- v2 admin --}}

<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src={{ URL::asset('adminPages/v2/dist/img/admin.png'); }} class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form> --}}
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu List</li>
        <!-- Optionally, you can add icons to the links -->

        <li class="{{ Route::currentRouteNamed('admin.home') ? 'active' : ' ' }}"><a href="{{ route('admin.home') }}"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
        <li class="{{ Route::currentRouteNamed('admin.bloodRequestsView') ? 'active' : ' ' }}"><a href="{{ route('admin.bloodRequestsView') }}" class="bt btn-danger"><i class="fa fa-hand-paper-o" aria-hidden="true"></i> <span>Hospital Requests </span></a></li>



        <li class="treeview {{ Route::currentRouteNamed('admin.bloodInventoryView') || Route::currentRouteNamed('admin.bloodTransferView') || Route::currentRouteNamed('admin.bloodTransferORG')? 'active' : '' }}">
          <a href="#"><i class="fa fa-tint" aria-hidden="true"></i> <span>Inventory</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Route::currentRouteNamed('admin.bloodInventoryView') ? 'active' : '' }}"><a href="{{ route('admin.bloodInventoryView') }}">Main Blood Inventory</a></li>
            <li class="{{ Route::currentRouteNamed('admin.bloodTransferView') ? 'active' : '' }}"><a href="{{ route('admin.bloodTransferView') }}">Transfer Blood to Hospitals</a></li>
            <li class="{{ Route::currentRouteNamed('admin.bloodTransferORG') ? 'active' : '' }}"><a href="{{ route('admin.bloodTransferORG') }}">Organizations Transfered Blood</a></li>

          </ul>
        </li>



        <li class="treeview {{ Route::currentRouteNamed('admin.organizationBloodS') || Route::currentRouteNamed('admin.hospitalBloodS') ? 'active' : '' }}">
          <a href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i> <span>Reports</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">

            <li class="{{ Route::currentRouteNamed('admin.organizationBloodS') ? 'active' : '' }}"><a href="{{ route('admin.organizationBloodS') }}">Organization Blood Report</a></li>
            <li class="{{ Route::currentRouteNamed('admin.hospitalBloodS') ? 'active' : '' }}"><a href="{{ route('admin.hospitalBloodS') }}">Hospital Blood Report</a></li>

          </ul>
        </li>



        <li class="treeview {{ Route::currentRouteNamed('admin.addDonor') || Route::currentRouteNamed('admin.allDonors') ? 'active' : '' }}">
          <a href="#"><i class="fa fa-users" aria-hidden="true"></i> <span>Donors</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Route::currentRouteNamed('admin.addDonor') ? 'active' : '' }}"><a href="{{ route('admin.addDonor') }}">Register Donor</a></li>
            <li class="{{ Route::currentRouteNamed('admin.allDonors') ? 'active' : '' }}"><a href="{{ route('admin.allDonors') }}">All Donors</a></li>

          </ul>

        </li>


        <li class="treeview {{ Route::currentRouteNamed('admin.addHospital') || Route::currentRouteNamed('admin.allHospital') ? 'active' : '' }}">
          <a href="#"><i class="fa fa-hospital-o" aria-hidden="true"></i> <span>Hospitals</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Route::currentRouteNamed('admin.addHospital') ? 'active' : '' }}"><a href="{{ route('admin.addHospital') }}">Add Hospital</a></li>
            <li class="{{ Route::currentRouteNamed('admin.allHospital') ? 'active' : '' }}"><a href="{{ route('admin.allHospital') }}">All Hospitals</a></li>

          </ul>

        </li>






        <li class="treeview {{ Route::currentRouteNamed('admin.addOrganization') || Route::currentRouteNamed('admin.allOrganization') ? 'active' : '' }}">
          <a href="#"><i class="fa fa-building" aria-hidden="true"></i> <span>Organizations</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>

          <ul class="treeview-menu">
            <li class="{{ Route::currentRouteNamed('admin.addOrganization') ? 'active' : '' }}"><a href="{{ route('admin.addOrganization') }}">Register Organization</a></li>
            <li class="{{ Route::currentRouteNamed('admin.allOrganization') ? 'active' : '' }}"><a href="{{ route('admin.allOrganization') }}">All Organizations</a></li>

          </ul>

        </li>

        <li class="{{ Route::currentRouteNamed('admin.allCampaigns') ? 'active' : '' }}"><a href="{{ route('admin.allCampaigns') }}"><i class="fa fa-tachometer"></i> <span>Campaigns</span></a></li>
        {{-- <li class="{{ Route::currentRouteNamed('adminCam') ? 'active' : '' }}"><a href="#"><i class="fa fa-id-badge"></i> <span>Badges</span></a></li> --}}
        <li class="{{ Route::currentRouteNamed('adminAds') ? 'active' : '' }}"><a href="{{ route('adminAds') }}"><i class="fa fa-money"></i> <span>Advertisements</span></a></li>
        {{-- <li class="{{ Route::currentRouteNamed('adminTest') ? 'active' : '' }}"><a href="{{ route('adminTest') }}"><i class="fa fa-money"></i> <span>Advertisements Test</span></a></li> --}}

        <li class="{{ Route::currentRouteNamed('AdminViewUpdateProfile') ? 'active' : '' }}"><a href="{{ route('AdminViewUpdateProfile') }}"><i class="fa fa-user"></i> <span>My Profile
          <span class="right badge badge-warning">Update</span></span></a></li>



      {{-- Logout --}}
      <li>
          <!-- Logout modal trigger Button -->
          <a href="#" class="nav-link btn btn-primary btn-lg" data-toggle="modal" data-target="#staticBackdrop">
          <span>Logout</span>
          </a>
      </li>




      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

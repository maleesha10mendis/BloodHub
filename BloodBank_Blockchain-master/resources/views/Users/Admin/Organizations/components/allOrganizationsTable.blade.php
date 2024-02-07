<div class="box">
    <div class="box-header">
      <h3 class="box-title">List of Organizations</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

          @include('Users.Admin.messages.addMsg')



          <table  id="example1" class="table table-bordered table-striped">

              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Reistration Date | Number</th>
                      <th>Address</th>
                      <th>ETH Address</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($usersWithOrganizations as $UserOrg)

                    <tr>
                        <td>{{$UserOrg->oid}}</td>
                        <td>{{$UserOrg->user->name}}</td>
                        <td>
                            {{-- @if ($UserOrg->gender == 'M')
                                Male
                            @elseif ($UserOrg->gender == 'F')
                                Female
                            @elseif ($UserOrg->gender == 'O')
                                Other
                            @endif --}}
                            {{$UserOrg->user->email}}
                        </td>

                        <td>{{$UserOrg->mobile}}</td>
                        <td>{{$UserOrg->registerDate}} | {{$UserOrg->registerNumber}}</td>
                        <td>{{$UserOrg->address}}</td>
                        <td>{{$UserOrg->account}}</td>




                        <td>
                            <a class="btn btn-warning" type="button" data-toggle="modal" data-target="#ClientEditModal-{{$UserOrg->oid}}" >
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#clientDeleteModal-{{$UserOrg->oid}}"  >
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>

                      {{-- delete modal --}}
                      @include('Users.Admin.Organizations.components.deleteOrganization')
                      {{-- update modal --}}
                      @include('Users.Admin.Organizations.components.updateOrganization')


                  @endforeach
              </tbody>
              <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Reistration Date | Number</th>
                    <th>Address</th>
                    <th>ETH Address</th>
                    <th>Actions</th>
                  </tr>
              </tfoot>
          </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->


  @push('specificJs')
  {{-- toastr msg --}}

  <script>
      $(function () {
        $('#example1').DataTable()
      });

    </script>



  @endpush

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
                  @foreach ($Hospitals as $UserHospital)

                    <tr>
                        <td>{{$UserHospital->hid}}</td>
                        <td>{{$UserHospital->user->name}}</td>
                        <td>
                            {{-- @if ($UserHospital->gender == 'M')
                                Male
                            @elseif ($UserHospital->gender == 'F')
                                Female
                            @elseif ($UserHospital->gender == 'O')
                                Other
                            @endif --}}
                            {{$UserHospital->user->email}}
                        </td>

                        <td>{{$UserHospital->mobile}}</td>
                        <td>{{$UserHospital->registerDate}} | {{$UserHospital->registerNumber}}</td>
                        <td>{{$UserHospital->address}}</td>
                        <td>{{$UserHospital->account}}</td>




                        <td>
                            <a class="btn btn-warning" type="button" data-toggle="modal" data-target="#ClientEditModal-{{$UserHospital->hid}}" >
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#clientDeleteModal-{{$UserHospital->hid}}"  >
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>

                      {{-- delete modal --}}
                      @include('Users.Admin.Hospitals.components.deleteHospital')
                      {{-- update modal --}}
                      @include('Users.Admin.Hospitals.components.updateHospital')


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
      })
    </script>



  @endpush

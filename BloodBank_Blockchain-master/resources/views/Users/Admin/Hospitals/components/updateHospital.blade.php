<!-- Edit branch -->
<div class="modal fade" id="ClientEditModal-{{$UserHospital->hid}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalCenterTitle">Update Hospital<b> {{$UserHospital->user->name}}</b> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('admin.updateHospital')}}" method="post">
                @csrf

            <div class="box box-primary">

                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">

                        <div class="row">
                            <div class="col-lg-8 col-12">
                                <div class="form-group">
                                    <label> Hospital Name </label>
                                    <input type="name" name="name" class="form-control" id="name" value="{{$UserHospital->user->name}}" placeholder="Enter Name">
                                </div>
                            </div>
                        {{-- Gender --}}

                        <div class="col-lg-4 col-12">
                            <!-- Date dd/mm/yyyy -->
                            <!-- Date -->
                            <div class="form-group">
                                <label>Registration Date</label>

                                <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" value="{{\Carbon\Carbon::parse($UserHospital->registerDate)->format('m/d/Y')}}" class="form-control pull-right" id="{{$UserHospital->hid}}datepicker" name="registerDate">
                                </div>
                                <!-- /.input group -->
                            </div>
                        <!-- /.form group -->
                        </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6 col-12">


                                <!-- phone mask -->
                                <div class="form-group">
                                    <label>Mobile</label>

                                    <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" class="form-control" name="mobile" value="{{$UserHospital->mobile}}" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->

                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label>Registration Number</label>
                                    <input type="name" name="registerNumber" class="form-control" placeholder="Clinic Name" value="{{$UserHospital->registerNumber}}">
                                </div>
                            </div>
                        </div>



                        <div class="row">



                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label>Hospital Address</label>
                                    <textarea class="form-control" rows="3" name="address" placeholder="Clinic Address..">{{$UserHospital->address}}</textarea>

                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-lg pull-right">Save</button>
                    </div>

                <input type="hidden" name="hid" value="{{$UserHospital->hid}}">
                <input type="hidden" name="id" value="{{$UserHospital->user->id}}">
    <!-- /.box -->
            </div>
            </form>

        </div>
    </div>
</div>


@push('specificJs')
    <script>
    //Date picker
    $('#{{$UserHospital->hid}}datepicker').datepicker({
        autoclose: true
    })
    </script>
@endpush

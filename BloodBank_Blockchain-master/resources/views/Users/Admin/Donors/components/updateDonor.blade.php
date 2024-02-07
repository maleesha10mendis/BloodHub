<!-- Edit branch -->
<div class="modal fade" id="ClientEditModal-{{$UserDonor->did}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalCenterTitle">Update Donor<b> {{$UserDonor->user->name}}</b> </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('admin.updateDonor')}}" method="post">
                @csrf
            <div class="box box-primary">

                    <!-- /.box-header -->
                    <!-- form start -->
                <div class="box-body">

                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <div class="form-group">
                                <label >Name</label>
                                <input type="name" name="name" value="{{$UserDonor->user->name}}" class="form-control" placeholder="Enter Name">
                            </div>
                        </div>
                    {{-- Gender --}}

                        <div class="col-lg-4 col-12">
                            <div class="form-group">
                                <label>Gender</label>

                                <select class="form-control" style="width: 100%;" name="gender">
                                    <option value="male" @if ($UserDonor->gender=="male") selected="selected" @endif>Male</option>
                                    <option value="female" @if ($UserDonor->gender=="female") selected="selected" @endif>Female</option>
                                    <option value="other" @if ($UserDonor->gender=="other") selected="selected" @endif>Other</option>
                                    <option value="prefer-not-to-say" @if ($UserDonor->gender=="prefer-not-to-say") selected="selected" @endif>Prefer Not To Say</option>
                                </select>

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <!-- Date -->
                        <div class="col-lg-6 col-12">
                            <!-- Date dd/mm/yyyy -->
                            <!-- Date -->
                            <div class="form-group">
                                <label>Date of Birth </label>

                                <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" value="{{\Carbon\Carbon::parse($UserDonor->dob)->format('m/d/Y')}}" class="form-control pull-right" id="{{$UserDonor->pid}}datepicker" name="dob">
                                </div>
                                <!-- /.input group -->
                            </div>
                        <!-- /.form group -->
                        </div>



                        {{-- Mobile --}}

                        <div class="col-lg-6 col-12">


                            <!-- phone mask -->
                            <div class="form-group">
                                <label>Mobile</label>

                                <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input type="text" value="{{$UserDonor->mobile}}" class="form-control" name="mobile" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                        </div>
                    </div>

                    {{-- address --}}
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" rows="3" name="address" placeholder="Enter ...">{{$UserDonor->address}}</textarea>

                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="form-group">
                                <label>Blood Group</label>
                                <select class="form-control" style="width: 100%;" name="bloodGroup">
                                    <option value="A+" @if ($UserDonor->bloodGroup=="A+") selected="selected" @endif>A+</option>
                                    <option value="A-" @if ($UserDonor->bloodGroup=="A-") selected="selected" @endif>A-</option>
                                    <option value="B+" @if ($UserDonor->bloodGroup=="B+") selected="selected" @endif>B+</option>
                                    <option value="B-" @if ($UserDonor->bloodGroup=="B-") selected="selected" @endif>B-</option>
                                    <option value="AB+" @if ($UserDonor->bloodGroup=="AB+") selected="selected" @endif>AB+</option>
                                    <option value="AB-" @if ($UserDonor->bloodGroup=="AB-") selected="selected" @endif>AB-</option>
                                    <option value="O+" @if ($UserDonor->bloodGroup=="O+") selected="selected" @endif>O+</option>
                                    <option value="O-" @if ($UserDonor->bloodGroup=="O-") selected="selected" @endif>O-</option>
                                </select>
                            </div>
                        </div>
                    </div>



                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-lg pull-right">Save</button>


                    </div>

                </div>

    <input type="hidden" name="did" value="{{$UserDonor->did}}">
    <input type="hidden" name="id" value="{{$UserDonor->user->id}}">
    <!-- /.box -->
            </div>
            </form>

        </div>
    </div>
</div>


@push('specificJs')
    <script>
    //Date picker
    $('#{{$UserDonor->did}}datepicker').datepicker({
        autoclose: true
    })
    </script>
@endpush

@include('Users.Admin.messages.addMsg')

<div class="col-lg-6">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Organization's Details</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">

            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label>Name of the Organization</label>
                        <input type="name" name="name" class="form-control" id="name" placeholder="Enter Name" required>
                    </div>
                </div>
            {{-- Gender --}}

                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" rows="3" name="Address" placeholder="Organization Address.." required></textarea>
                    </div>
                </div>


            </div>


            <div class="row">
                <div class="col-lg-6 col-12">


                    <!-- phone mask -->
                    <div class="form-group">
                        <label>Contact Number</label>

                        <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <input type="text" class="form-control" name="mobile" data-inputmask='"mask": "(999) 999-9999"' data-mask required>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                </div>

                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label for="crypto-address">Your ETH Address:</label>
                        <input type="text" name="account" id="crypto-address" class="form-control" pattern="^0x[a-fA-F0-9]{40}$" required>
                    </div>
                </div>
            </div>



            <div class="row">

                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label>Date of Registration</label>
                        <input type="text" name="registerDate" class="form-control pull-right" id="datepickerORG" required>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label>Registration Number</label>
                        <input type="name" name="registerNumber" class="form-control" placeholder="Registration Number" required>

                    </div>
                </div>
            </div>





            {{-- Role value --}}
            <input name="role" type="hidden" value="2">
            <input id="orgRole" type="hidden" value="1">
            <!-- /.box-body -->


        </div>
    </div>
    <!-- /.box -->
</div>






















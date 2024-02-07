@include('Users.Admin.messages.addMsg')

<div class="col-lg-6">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">New Donor's Details</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">

            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="form-group">
                        <label >Name</label>
                        <input type="name" name="name" class="form-control" id="name" placeholder="Enter Name" required>
                    </div>
                </div>
            {{-- Gender --}}

                <div class="col-lg-4 col-12">
                    <div class="form-group">
                        <label>Gender</label>

                        <select id="gender" class="form-control" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                            <option value="prefer-not-to-say">Prefer not to say</option>
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
                        <label>Date of Birth (M/D/Y)</label>

                        <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker" name="dob">
                    </div>
                    <span id = "dateMsg"></span>
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
                        <input type="text" class="form-control" name="mobile" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                </div>
            </div>



            <div class="row">


                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label for="blood-group">Select your blood group:</label>
                        <select id="blood-group" name="bloodGroup" class="form-control">
                        <option value="A+">A Positive</option>
                        <option value="A-">A Negative</option>
                        <option value="B+">B Positive</option>
                        <option value="B-">B Negative</option>
                        <option value="AB+">AB Positive</option>
                        <option value="AB-">AB Negative</option>
                        <option value="O+">O Positive</option>
                        <option value="O-">O Negative</option>
                        </select>

                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        {{-- <label for="exampleInputPassword1">Account Address</label> --}}
                        {{-- <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"> --}}

                        <label for="crypto-address">ETH Address:</label>
                        <input type="text" name="account" id="crypto-address" class="form-control" pattern="^0x[a-fA-F0-9]{40}$" required>
                    </div>
                </div>

            </div>



            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <textarea name="address" placeholder="Enter Address here..." class="form-control"></textarea>
                    </div>
                </div>



            </div>

            {{-- Role value --}}
            <input name="role" type="hidden" value="0">
            <input id="donorRole" type="hidden" value="2">
            <!-- /.box-body -->


        </div>


    <!-- /.box -->
    </div>

</div>






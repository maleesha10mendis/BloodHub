 <!-- This form included into addClient Blade -->

 {{-- Start of Second Card --}}

 <div class="col-lg-6 col-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Organization's Login Credentials</h3>
        </div>

        <!-- /.card-header -->
        <!-- form start -->

        <div class="box-body">

            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label >Email Address</label>
                        <input type="email" class="form-control" name="email" placeholder="Email Address">
                    </div>
                </div>




            </div>

            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" pattern="^(?=.*[!@#\$%\^&\*]).{8,}$">
                        <small class="">Password must contain at least one of the following special symbols: !@#$%^&* and be at least 8 characters long</small>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm the Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

            </div>


            <div class="box-footer">
                <div class="form-group pull-right">
                    <small class="form-text text-muted text-right">Please check details again.</small><br>
                    <button type="submit" class="btn btn-danger btn-lg float-right"><b>&nbsp; Save All&nbsp;</b>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
{{-- End of Second Card --}}


{{-- adminLTEv2 --}}
    <!-- jQuery 3 -->
<script src={{ URL::asset('adminPages/v2/bower_components/jquery/dist/jquery.min.js'); }}></script>
<!-- Bootstrap 3.3.7 -->
<script src={{ URL::asset('adminPages/v2/bower_components/bootstrap/dist/js/bootstrap.min.js'); }}></script>
<!-- AdminLTE App -->
<script src={{ URL::asset('adminPages/v2/dist/js/adminlte.min.js'); }}></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->



{{-- For charts --}}

<!-- ChartJS -->
<script src={{ URL::asset('adminPages/v2/bower_components/chart.js/Chart.js'); }}></script>
<!-- FastClick -->
<script src={{ URL::asset('adminPages/v2/bower_components/fastclick/lib/fastclick.js'); }}></script>
<!-- AdminLTE for demo purposes -->
<script src={{ URL::asset('adminPages/v2/dist/js/demo.js'); }}></script>







{{-- Data table --}}

<!-- DataTables -->
<script src={{ URL::asset('adminPages/v2/bower_components/datatables.net/js/jquery.dataTables.min.js'); }}></script>
<script src={{ URL::asset('adminPages/v2/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'); }}></script>
<!-- SlimScroll -->
<script src={{ URL::asset('adminPages/v2/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); }}></script>


{{-- date picker --}}

<!-- bootstrap datepicker -->
<script src={{ URL::asset('adminPages/v2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); }}></script>


{{-- input mask like mibile number --}}
<!-- InputMask -->
<script src={{ URL::asset('adminPages/v2/plugins/input-mask/jquery.inputmask.js'); }}></script>
<script src={{ URL::asset('adminPages/v2/plugins/input-mask/jquery.inputmask.date.extensions.js'); }}></script>
<script src={{ URL::asset('adminPages/v2/plugins/input-mask/jquery.inputmask.extensions.js'); }}></script>



<!-- date-range-picker -->
<script src={{ URL::asset('adminPages/v2/bower_components/moment/min/moment.min.js'); }}></script>
<script src={{ URL::asset('adminPages/v2/bower_components/bootstrap-daterangepicker/daterangepicker.js'); }}></script>
<!-- bootstrap datepicker -->
<script src={{ URL::asset('adminPages/v2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); }}></script>
<!-- bootstrap color picker -->
<script src={{ URL::asset('adminPages/v2/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js'); }}></script>
<!-- bootstrap time picker -->
<script src={{ URL::asset('adminPages/v2/plugins/timepicker/bootstrap-timepicker.min.js'); }}></script>
<!-- SlimScroll -->
<script src={{ URL::asset('adminPages/v2/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); }}></script>
<!-- iCheck 1.0.1 -->
<script src={{ URL::asset('adminPages/v2/plugins/iCheck/icheck.min.js'); }}></script>




<!-- Select2 -->
<script src={{ URL::asset('adminPages/v2/bower_components/select2/dist/js/select2.full.min.js'); }}></script>

{{-- time picker --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>

{{-- Phone Mask --}}
<script>
    $(function () {
    $('[data-mask]').inputmask()
})
</script>

{{-- Download as pdf html2pdf CDN --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- page script -->
@stack('specificJs')



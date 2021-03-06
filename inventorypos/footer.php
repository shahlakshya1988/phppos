<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        InventoryPOS V1.0
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="#">InventoryPOS</a>.</strong> All rights reserved.
</footer>
<!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->


<!-- Bootstrap 3.3.7 -->
<script src="<?php echo $baseurl; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $baseurl; ?>dist/js/adminlte.min.js"></script>
<script src="<?php echo $baseurl; ?>bower_components/sweetalert/sweetalert.js"></script>
<!-- DataTables -->
<script src="<?php echo $baseurl; ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $baseurl; ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- date-range-picker -->
<script src="<?php echo $baseurl; ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo $baseurl; ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo $baseurl; ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
<!-- iCheck 1.0.1 -->
<script src="<?php echo $baseurl; ?>plugins/iCheck/icheck.min.js"></script>
<!-- Select2 -->
<script src="<?php echo $baseurl; ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
    $('.datatable').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true,
        'responsive': true
    });
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        //alert("Worlding");
    });
    $('.datepicker').datepicker({
        autoclose: true,
        format:"dd-MM-yy"
    })
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    })
    $('.select2').select2()
</script>
</body>

</html>

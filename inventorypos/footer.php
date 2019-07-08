
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

<!-- jQuery 3 -->
<script src="<?php echo $baseurl; ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo $baseurl; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $baseurl; ?>dist/js/adminlte.min.js"></script>
<script src="<?php echo $baseurl; ?>bower_components/sweetalert/sweetalert.js"></script>
<!-- DataTables -->
<script src="<?php echo $baseurl; ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $baseurl; ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
     <script>
         $('.datatable').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true
            })
     </script>
</body>
</html>

    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            Page rendered in <strong>{elapsed_time}</strong> seconds.
        </div>
        <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=HTTP_PATH?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=HTTP_PATH?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=HTTP_PATH?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?=HTTP_PATH?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=HTTP_PATH?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?=HTTP_PATH?>bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable();
    $('.select2').select2();
  })
</script>
<!-- Morris.js charts -->
<script src="<?=HTTP_PATH?>bower_components/raphael/raphael.min.js"></script>
<script src="<?=HTTP_PATH?>bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?=HTTP_PATH?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?=HTTP_PATH?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=HTTP_PATH?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=HTTP_PATH?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=HTTP_PATH?>bower_components/moment/min/moment.min.js"></script>
<script src="<?=HTTP_PATH?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?=HTTP_PATH?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=HTTP_PATH?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?=HTTP_PATH?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=HTTP_PATH?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=HTTP_PATH?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=HTTP_PATH?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=HTTP_PATH?>dist/js/demo.js"></script>
</body>
</html>
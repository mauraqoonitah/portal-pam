<footer class="main-footer text-center my-auto">
  <strong>Copyright <?= date('Y'); ?>&copy;Portal Pam Jaya.</strong>

  <div class="float-right d-none d-sm-inline-block">
    <!-- <b>Version</b> 3.0.5 -->
  </div>
</footer>


</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/template/plugins') ?>/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/template/plugins') ?>/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/template/plugins') ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/template/plugins') ?>/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/template/plugins') ?>/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('assets/template/plugins') ?>/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url('assets/template/plugins') ?>/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/template/plugins') ?>/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/template/plugins') ?>/moment/moment.min.js"></script>
<script src="<?php echo base_url('assets/template/plugins') ?>/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/template/plugins') ?>/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/template/plugins') ?>/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/template/plugins') ?>/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/template/dist') ?>/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/template/dist') ?>/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/template/dist') ?>/js/demo.js"></script>


<script>
  $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });
</script>


<!-- manage admin checklist -->
<script>
  // get data
  $('.form-check-input').on('click', function() {
    const roleId = $(this).data('role');
    const id = $(this).data('id');

    $.ajax({
      url: "<?= base_url('admin/Admin_manage_account/changeRole/'); ?>",
      type: 'post',
      data: {
        roleId: roleId,
        id: id
      },
      success: function() {
        document.location.href = "<?= base_url('admin/Admin_manage_account/'); ?>"

      }
    })
  });
</script>

<script>
  // get data
  $('.form-check-input-status').on('click', function() {
    const activeId = $(this).data('active');
    const id = $(this).data('id');

    $.ajax({
      url: "<?= base_url('admin/Admin_manage_account/activeStatus/'); ?>",
      type: 'post',
      data: {
        activeId: activeId,
        id: id
      },
      success: function() {
        document.location.href = "<?= base_url('admin/Admin_manage_account/'); ?>"

      }
    })
  });
</script>

</body>

</html>
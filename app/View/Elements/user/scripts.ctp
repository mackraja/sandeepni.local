<!-- BEGIN CORE PLUGINS -->   
<!--[if lt IE 9]>
<script src="assets/plugins/respond.min.js"></script>
<script src="assets/plugins/excanvas.min.js"></script> 
<![endif]-->
<?php echo $this->Minify->script('plugins/jquery-1.10.2.min');?>
<?php echo $this->Minify->script('plugins/jquery-migrate-1.2.1.min');?>
<?php echo $this->Minify->script('plugins/bootstrap/js/bootstrap.min');?>
<?php echo $this->Minify->script('plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min');?>
<?php echo $this->Minify->script('plugins/jquery-slimscroll/jquery.slimscroll.min');?>
<?php echo $this->Minify->script('plugins/jquery.blockui.min');?>
<?php echo $this->Minify->script('plugins/jquery.cookie.min');?>
<?php echo $this->Minify->script('plugins/uniform/jquery.uniform.min');?>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php echo $this->Minify->script('plugins/select2/select2.min');?>
<?php echo $this->Minify->script('plugins/data-tables/jquery.dataTables');?>
<?php echo $this->Minify->script('plugins/data-tables/DT_bootstrap');?>
<?php echo $this->Minify->script('plugins/bootstrap-modal/js/bootstrap-modalmanager');?>
<?php echo $this->Minify->script('plugins/bootstrap-modal/js/bootstrap-modal');?>
<?php echo $this->Minify->script('plugins/jquery-validation/dist/jquery.validate.min'); ?>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php echo $this->Minify->script('scripts/app');?>
<?php echo $this->Minify->script('scripts/table-managed');?>
<?php echo $this->Minify->script('scripts/ui-extended-modals');?>
<?php echo $this->Minify->script('scripts/admin-validation'); ?>
<?php echo $this->Minify->script('scripts/ajax-function');?>
<?php echo $this->Minify->script('scripts/custom');?>
<!-- END PAGE LEVEL PLUGINS -->
<script>
   jQuery(document).ready(function() {  
         App.init();
         TableManaged.init();
         UIExtendedModals.init();
         Admin.init();
         Custom.init();
      });
</script>
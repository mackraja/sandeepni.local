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
<?php echo $this->Minify->script('plugins/bootstrap-fileupload/bootstrap-fileupload'); ?>
<?php echo $this->Minify->script('plugins/bootstrap-datepicker/js/bootstrap-datepicker');?>
<?php echo $this->Minify->script('plugins/jquery.sparkline.min');?>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php echo $this->Minify->script('plugins/jcrop/js/jquery.Jcrop');?>
<?php echo $this->Minify->script('scripts/jcropProfile');?>
<?php echo $this->Minify->script('scripts/app');?>
<!-- END PAGE LEVEL PLUGINS -->
<script>
   jQuery(document).ready(function() { 
      // initiate layout and plugins
      if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: App.isRTL(),
                autoclose: true
            });
            $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }
      App.init();
      // Upload and Crop Image 
      JcropProfile.init();
   });
</script>
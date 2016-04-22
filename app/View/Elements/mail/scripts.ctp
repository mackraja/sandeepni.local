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
<?php echo $this->Minify->script('plugins/fancybox/source/jquery.fancybox.pack');?>
<?php echo $this->Minify->script('plugins/bootstrap-wysihtml5/wysihtml5-0.3.0');?>
<?php echo $this->Minify->script('plugins/bootstrap-wysihtml5/bootstrap-wysihtml5');?>
<!-- BEGIN:File Upload Plugin JS files-->
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<?php //echo $this->Minify->script('plugins/jquery-file-upload/js/vendor/jquery.ui.widget');?>
<!-- The Templates plugin is included to render the upload/download listings -->
<?php //echo $this->Minify->script('plugins/jquery-file-upload/js/vendor/tmpl.min');?>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<?php //echo $this->Minify->script('plugins/jquery-file-upload/js/vendor/load-image.min');?>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<?php //echo $this->Minify->script('plugins/jquery-file-upload/js/vendor/canvas-to-blob.min');?>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<?php //echo $this->Minify->script('plugins/jquery-file-upload/js/jquery.iframe-transport');?>
<!-- The basic File Upload plugin -->
<?php //echo $this->Minify->script('plugins/jquery-file-upload/js/jquery.fileupload');?>
<!-- The File Upload processing plugin -->
<?php //echo $this->Minify->script('plugins/jquery-file-upload/js/jquery.fileupload-process');?>
<!-- The File Upload image preview & resize plugin -->
<?php //echo $this->Minify->script('plugins/jquery-file-upload/js/jquery.fileupload-image');?>
<!-- The File Upload audio preview plugin -->
<?php //echo $this->Minify->script('plugins/jquery-file-upload/js/jquery.fileupload-audio');?>
<!-- The File Upload video preview plugin -->
<?php //echo $this->Minify->script('plugins/jquery-file-upload/js/jquery.fileupload-video');?>
<!-- The File Upload validation plugin -->
<?php //echo $this->Minify->script('plugins/jquery-file-upload/js/jquery.fileupload-validate');?>
<!-- The File Upload user interface plugin -->
<?php //echo $this->Minify->script('plugins/jquery-file-upload/js/jquery.fileupload-ui');?>
<!-- The main application script -->
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="assets/plugins/jquery-file-upload/js/cors/jquery.xdr-transport.js"></script>
<![endif]-->
<!-- END:File Upload Plugin JS files-->
<!-- END: Page level plugins -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php echo $this->Minify->script('scripts/app');?>
<?php echo $this->Minify->script('scripts/inbox');?>
<!-- END PAGE LEVEL PLUGINS -->
<script>
   jQuery(document).ready(function() {       
        // initiate layout and plugins
        App.init();
        Inbox.init();
     });
</script>
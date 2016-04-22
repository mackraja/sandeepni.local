<?php echo $this->Html->docType('html5');?>
<html>
<head>
    <?php echo $this->Html->charset('utf-8'); ?>
    <title>GolokTech | Error : 404</title>
    <?php echo $this->element('meta'); ?>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->          
    <?php echo $this->element('header_global'); ?>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME STYLES --> 
    <?php echo $this->Minify->css(array('css/style-conquer','css/style','css/style-responsive','css/plugins')); ?>
    <?php echo $this->Minify->css('css/themes/default',array('id'=>'style_color')); ?>
    <?php echo $this->Minify->css(array('css/themes/default','css/pages/error','css/custom')); ?>
    <!-- END THEME STYLES -->
    <?php //echo $this->Html->meta('favicon.ico','',array('type' => 'icon'));?>
</head>
<!-- BEGIN BODY -->
<body class="page-404-full-page">
    <?php echo $this->fetch('content'); ?>
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
    <?php echo $this->Minify->script('scripts/app'); ?>
    <!-- END PAGE LEVEL SCRIPTS --> 
    <script>
            jQuery(document).ready(function() {     
              App.init();
            });
    </script>
</body>
<!-- END BODY -->
</html>
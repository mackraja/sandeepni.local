<?php echo $this->Html->docType('html5');?>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <?php echo $this->Html->charset('utf-8'); ?>
    <title>Hotel Management</title>
    <?php echo $this->element('meta'); ?>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <?php echo $this->element('header_global'); ?>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <?php //echo $this->Minify->css('plugins/select2/select2_conquer'); ?>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES --> 
    <?php echo $this->Minify->css(array('css/style-conquer','css/style','css/style-responsive','css/plugins')); ?>
    <?php //echo $this->Minify->css('css/themes/default',array('id'=>'style_color')); ?>
    <?php echo $this->Minify->css(array('css/themes/default','css/pages/login','css/custom')); ?>
    <!-- END THEME STYLES -->
    <?php echo $this->Html->meta('favicon.ico','',array('type' => 'icon'));?>
</head>
<!-- BEGIN BODY -->
<body class="login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <?php echo $this->Html->image('img/logo.png', array('alt' => '')); ?>
        </div>
        <!-- END LOGO --> 
	<?php echo $this->fetch('content'); ?>
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright">
                © 2015 goloktech.com, All rights reserved. Terms & Privacy. 
        </div>
        <!-- END COPYRIGHT -->
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   
        <!--[if lt IE 9]>
        <script src="assets/plugins/respond.min.js"></script>
        <script src="assets/plugins/excanvas.min.js"></script> 
        <![endif]--> 
        
        <?php 
        //debug($this->params);die;
        	if ($this->params['action'] == 'admin_login' && $this->params['admin'] == true){
	        	$css = 'Login.init();';
	        	$css_name = 'login';
	        }elseif ($this->params['action'] == 'admin_forget' && $this->params['admin'] == true){
	        	$css = 'Forget.init();';
	        	$css_name = 'forget';
	        }elseif ($this->params['action'] == 'admin_register' && $this->params['admin'] == true){
	        	$css = 'Register.init();';
	        	$css_name = 'register';
	        }elseif ($this->params['action'] == 'admin_reset' && $this->params['admin'] == true){
	        	$css = 'Reset.init();';
	        	$css_name = 'reset';
	        }else{
	        	$css = '';
	        	$css_name = '';
	        }
	    ?>
        
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
        <?php echo $this->Minify->script('plugins/jquery-validation/dist/jquery.validate.min'); ?>
        <?php echo $this->Minify->script('plugins/select2/select2.min'); ?>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <?php echo $this->Minify->script('scripts/app'); ?>
        <?php echo $this->Minify->script('scripts/'.$css_name); ?>
        <!-- END PAGE LEVEL SCRIPTS --> 
		<script>
                jQuery(document).ready(function() {
                  App.init();
                 <?php echo $css?>
                });
        </script>
	<!-- END JAVASCRIPTS -->
        <?php //echo $this->element('sql_dump'); ?>
</body>
<!-- END BODY -->
</html>
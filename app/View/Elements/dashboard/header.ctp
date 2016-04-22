<?php echo $this->Html->charset('utf-8'); ?>
<title>Admin Dashboard Template</title>
<base style="display:none" href="<?php echo $this->webroot;?>">
<?php echo $this->element('meta'); ?>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<?php echo $this->element('header_global'); ?>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES --> 
<?php echo $this->Minify->css('plugins/gritter/css/jquery.gritter'); ?>
<?php echo $this->Minify->css('plugins/bootstrap-daterangepicker/daterangepicker-bs3'); ?>
<?php echo $this->Minify->css('plugins/fullcalendar/fullcalendar/fullcalendar'); ?>
<?php echo $this->Minify->css('plugins/jqvmap/jqvmap/jqvmap'); ?>
<?php echo $this->Minify->css('plugins/jquery-easy-pie-chart/jquery.easy-pie-chart'); ?>
<!-- BEGIN THEME STYLES --> 
<?php echo $this->Minify->css(array('css/style-conquer','css/style','css/style-responsive','css/plugins')); ?>
<?php echo $this->Minify->css('css/pages/tasks'); ?>
<?php echo $this->Minify->css('css/themes/default',array('id' => 'style_color')); ?>
<?php echo $this->Minify->css('css/custom'); ?>
<!-- END THEME STYLES -->
<?php //echo $this->Html->meta('favicon.ico','',array('type' => 'icon'));?>
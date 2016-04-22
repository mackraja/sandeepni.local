<?php echo $this->Html->charset('utf-8'); ?>
<title>Admin Dashboard Template</title>
<base style="display:none" href="<?php echo $this->webroot;?>">
<?php echo $this->element('meta'); ?>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<?php echo $this->element('header_global'); ?>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->  
<?php echo $this->Minify->css('plugins/bootstrap-wysihtml5/bootstrap-wysihtml5'); ?>
<?php echo $this->Minify->css('plugins/fancybox/source/jquery.fancybox'); ?>
<!-- BEGIN:File Upload Plugin CSS files-->
<?php echo $this->Minify->css('plugins/jquery-file-upload/css/jquery.fileupload-ui'); ?>
<!-- END:File Upload Plugin CSS files-->
<!-- BEGIN THEME STYLES --> 
<?php echo $this->Minify->css(array('css/style-conquer','css/style','css/style-responsive','css/plugins')); ?>
<?php echo $this->Minify->css('css/themes/default',array('id' => 'style_color')); ?>
<?php echo $this->Minify->css('css/pages/inbox'); ?>
<?php echo $this->Minify->css('css/custom'); ?>
<!-- END THEME STYLES -->
<?php //echo $this->Html->meta('favicon.ico','',array('type' => 'icon'));?>